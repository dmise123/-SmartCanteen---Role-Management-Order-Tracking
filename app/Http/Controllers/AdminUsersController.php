<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\StatusUser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class AdminUsersController extends Controller
{
    public function createUser($section)
    {
        $statuses = StatusUser::whereRaw('LOWER(nama_status) = ?', [strtolower($section)])->get();

        if ($statuses->isEmpty()) {
            abort(404, 'Status not found');
        }

        return view('admin.users.create', compact('statuses'));
    }



    public function storeUser(Request $request)
    {
        Log::info($request->all());


        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
            'status_user_id_status' => 'required|exists:status_user,id_status',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $status = StatusUser::findOrFail($validatedData['status_user_id_status']);
            $statusDirectory = $status->nama_status;
            $randomName = Str::random(6) . '.' . $picture->getClientOriginalExtension();
            $path = $picture->move(public_path('assets/' . $statusDirectory), $randomName);

            $validatedData['picture'] = 'assets/' . $statusDirectory . '/' . $randomName;
        }


        $validatedData['password'] = bcrypt($validatedData['password']);


        Users::create($validatedData);

        return redirect()->route('admin.index')->with('success', 'User  created successfully');
    }

    public function editUser($id_users)
    {
        $users = Users::findOrFail($id_users);
        $statuses = StatusUser::all();
        return view('admin.users.edit', compact('users', 'statuses'));
    }

    public function updateUser(Request $request, $id_users)
    {
        $user = Users::findOrFail($id_users);

        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id_users . ',id_users',
            'password' => 'nullable|min:8',
            'status_user_id_status' => 'required|exists:status_user,id_status',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            $validatedData['password'] = $user->password;
        }

        if ($request->hasFile('picture')) {

            if ($user->picture) {
                $oldPicturePath = public_path($user->picture);
                if (file_exists($oldPicturePath)) {
                    unlink($oldPicturePath);
                }
            }

            $picture = $request->file('picture');
            $status = StatusUser::findOrFail($validatedData['status_user_id_status']);
            $statusDirectory = $status->nama_status;
            $randomName = Str::random(6) . '.' . $picture->getClientOriginalExtension();


            $path = $picture->move(public_path('assets/' . $statusDirectory), $randomName);

            $validatedData['picture'] = 'assets/' . $statusDirectory . '/' . $randomName;
        } else {

            $validatedData['picture'] = $user->picture;
        }


        $user->update($validatedData);

        return redirect()->route('admin.index')->with('success', 'User  updated successfully');
    }

    // Delete a user
    public function deleteUser($id_users)
    {
        session(['previous_url' => url()->previous()]);
        $user = Users::findOrFail($id_users);

        $user->deleted_at = Carbon::now();
        $user->save();

        // return redirect()->route('admin.users')->with('success', 'User  deleted successfully');
        return redirect(session('previous_url'))->with('success', 'User deleted successfully.');
    }

    public function restoreUser($id_users)
    {
        session(['previous_url' => url()->previous()]);
        $user = Users::findOrFail($id_users);

        $user->deleted_at = null;
        $user->save();

        return redirect(session('previous_url'))->with('success', 'User  restored successfully');
    }
}
