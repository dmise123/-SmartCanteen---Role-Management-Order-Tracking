@extends('base.base')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Edit Toko</h2>

        <form action="{{ route('admin.toko.update', $toko->users_id_users) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_toko" class="block text-sm font-medium text-gray-700 mb-2">Nama Toko</label>
                <input type="text" name="nama_toko" id="nama_toko" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm" 
                       value="{{ old('nama_toko', $toko->nama_toko) }}" required>
                @error('nama_toko')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi_toko" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Toko</label>
                <textarea name="deskripsi_toko" id="deskripsi_toko" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm" required>{{ old('deskripsi_toko', $toko->deskripsi_toko) }}</textarea>
                @error('deskripsi_toko')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="path_foto" class="block text-sm font-medium text-gray-700 mb-2">Upload Foto</label>
                <input type="file" name="path_foto" id="path_foto" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm" 
                       value="{{ old('path_foto') }}">
                <small class="text-sm text-gray-500 mt-1">Leave blank if you do not want to change the photo.</small>
                @error('path_foto')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
                @if ($toko->path_foto)
                    <div class="mt-2">
                        <label>Current Photo:</label><br>
                        <img src="{{ asset($toko->path_foto) }}" alt="Current Photo" class="w-24 h-24 rounded-md shadow-md">
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="kantin_id_kantin" class="block text-sm font-medium text-gray-700 mb-2">Pilih Kantin</label>
                <select name="kantin_id_kantin" id="kantin_id_kantin" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm" required>
                    @foreach ($kantins as $kantin)
                        <option value="{{ $kantin->id_kantin }}" 
                            {{ $kantin->id_kantin == $toko->kantin_id_kantin ? 'selected' : '' }}>{{ $kantin->nama_kantin }}
                        </option>
                    @endforeach
                </select>
                @error('kantin_id_kantin')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="users_id_users" class="block text-sm font-medium text-gray-700 mb-2">User</label>
                <input type="text" id="users_id_users" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm" value="{{ $toko->users->nama }}" readonly>
                <input type="hidden" name="users_id_users" value="{{ $toko->users_id_users }}">
            </div>

            <div class="form-group">
                <label for="is_open" class="block text-sm font-medium text-gray-700 mb-2">Status Toko</label>
                <select name="is_open" id="is_open" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm" required>
                    <option value="1" {{ $toko->is_open == '1' ? 'selected' : '' }}>Open</option>
                    <option value="0" {{ $toko->is_open == '0' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>

            <button type="submit" class="w-full sm:w-auto bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 mt-3">Update Toko</button>
            <a href="{{ route('admin.toko') }}" class="w-full sm:w-auto bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 mt-3">Cancel</a>
        </form>
    </div>
@endsection
