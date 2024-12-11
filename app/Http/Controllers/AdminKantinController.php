<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kantin;
use App\Models\Toko;
use Carbon\Carbon;

class AdminKantinController extends Controller
{

    public function search(Request $request, $section = 'kantin')
    {
        $searchTerm = $request->input('search');
        if ($section === 'toko') {
            $tokos = Toko::where('nama_toko', 'LIKE', '%' . $searchTerm . '%')->get();
            return view('admin.home', compact('tokos', 'section'));
        }

        $kantins = Kantin::where('nama_kantin', 'LIKE', '%' . $searchTerm . '%')->get();
        return view('admin.home', compact('kantins', 'section', 'filter'));
    }

    public function kantin()
    {
        // Logic for showing the kantin page
        return view('admin.kantin'); // Replace with your actual view
    }
    // CRUD Kantin
    public function createKantin()
    {
        return view('admin.kantin.create');
    }

    public function storeKantin(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kantin' => 'required|max:255'
        ]);

        Kantin::create($validatedData);

        return redirect()->route('admin.kantin')->with('success', 'Canteen created successfully');
    }

    public function editKantin($id)
    {
        $kantin = Kantin::findOrFail($id);
        return view('admin.kantin.edit', compact('kantin'));
    }

    public function deleteKantin($id)
    {
        $kantin = Kantin::findOrFail($id);

        $kantin->deleted_at = Carbon::now();
        $kantin->save();

        return redirect()->route('admin.kantin')->with('success', 'Canteen deleted successfully');
    }


    public function updateKantin(Request $request, $id)
    {
        $kantin = Kantin::findOrFail($id);

        $validatedData = $request->validate([
            'nama_kantin' => 'required|max:255',
        ]);

        $kantin->update($validatedData);

        return redirect()->route('admin.index')->with('success', 'Canteen updated successfully');
    }

    public function restoreKantin($id)
    {
        $kantin = Kantin::findOrFail($id);

        $kantin->deleted_at = null;
        $kantin->save();

        return redirect()->route('admin.kantin')->with('success', 'Canteen restored successfully');
    }
}
