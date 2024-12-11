@extends('base.base')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Tambah Kantin Baru</h2>

    <form action="{{ route('admin.kantin.update', $kantin->id_kantin) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_kantin" class="block text-sm font-medium text-gray-700 mb-2">Nama Kantin</label>
            <input type="text" name="nama_kantin" id="nama_kantin" class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm" value="{{ old('nama_kantin', $kantin->nama_kantin) }}" required placeholder="Masukkan nama kantin">
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="w-full sm:w-auto bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 mt-3">Tambah Kantin</button>
            <a href="{{ route('admin.kantin') }}" class="w-full sm:w-auto bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 mt-3">cancel</a>
        </div>
    </form>
</div>
@endsection