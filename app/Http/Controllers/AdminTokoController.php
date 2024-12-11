<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\Kantin;
use App\Models\Users;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminTokoController extends Controller
{
    public function createToko()
    {
        $kantins = Kantin::all();
        $users = Users::all();
        return view('admin.toko.create', compact('kantins', 'users'));
    }

    public function storeToko(Request $request)
    {

        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'nama_toko' => 'required|max:255',
            'deskripsi_toko' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
            'path_foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kantin_id_kantin' => 'required|exists:kantin,id_kantin',
            'is_open' => 'required|in:0,1',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $userPicture = $request->file('picture');
        $userPictureName = Str::random(6) . '.' . $userPicture->getClientOriginalExtension();
        $userPicturePath = $userPicture->move(public_path('assets/users'), $userPictureName);
        $userPictureUrl = 'assets/users/' . $userPictureName;

        $user = Users::create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'status_user_id_status' => 2,
            'picture' => $userPictureUrl,
        ]);

        $storePicture = $request->file('path_foto');
        $storePictureName = Str::random(6) . '.' . $storePicture->getClientOriginalExtension();
        $storePicturePath = $storePicture->move(public_path('/assets/kantin/toko'), $storePictureName);
        $storePictureUrl = '/assets/kantin/toko/' . $storePictureName;

        $toko = Toko::create([
            'nama_toko' => $validatedData['nama_toko'],
            'deskripsi_toko' => $validatedData['deskripsi_toko'],
            'path_foto' => $storePictureUrl,
            'kantin_id_kantin' => $validatedData['kantin_id_kantin'],
            'users_id_users' => $user->id_users,
            'is_open' => $validatedData['is_open'],
        ]);

        return redirect()->route('admin.index', ['section' => 'toko'])->with('success', 'User  and store created successfully');
    }

    public function editToko($id)
    {
        $toko = Toko::findOrFail($id);
        $kantins = Kantin::all();
        $users = Users::all();
        return view('admin.toko.edit', compact('toko', 'kantins', 'users'));
    }

    public function updateToko(Request $request, $id)
    {
        $toko = Toko::findOrFail($id);

        $validatedData = $request->validate([
            'nama_toko' => 'required|max:255',
            'deskripsi_toko' => 'required|max:255',
            'path_foto' => 'required|string|max:255',
            'kantin_id_kantin' => 'required|exists:kantin,id_kantin',
            'users_id_users' => 'required|exists:users,id_users',
            'is_open' => 'required|in:0,1',
        ]);

        $toko->update($validatedData);
        return redirect()->route('admin.index', ['section' => 'toko'])->with('success', 'Store updated successfully');
    }
    public function deleteToko($id)
    {
        $toko = Toko::findOrFail($id);

        $toko->deleted_at = Carbon::now();
        $toko->save();

        return redirect()->route('admin.index', ['section' => 'toko'])->with('success', 'Store deleted successfully');
    }

    public function restoreToko($id)
    {
        $toko = Toko::findOrFail($id);

        $toko->deleted_at = null;
        $toko->save();

        return redirect()->route('admin.index', ['section' => 'toko'])->with('success', 'Store restored successfully');
    }

    
}
