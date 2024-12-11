@extends('base.base')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Tambah User dan Toko Baru</h2>

    <!-- Display errors -->
    @if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="text-red-500 text-sm">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.toko.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <!-- User Information -->
        <h4 class="text-lg font-semibold mb-3">Informasi User</h4>

        <div class="form-group">
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama User</label>
            <input type="text" name="nama" id="nama" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('nama') }}" required>
            @error('nama')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input type="email" name="email" id="email" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('email') }}" required>
            @error('email')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
            <input type="password" name="password" id="password" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            @error('password')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="picture" class="block text-sm font-medium text-gray-700 mb-2">Foto User</label>
            <input type="file" name="picture" id="picture" class="block w-full sm:w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" accept="image/*" onchange="previewImage(event)">
            @error('picture')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror

            <div id="preview" class="mt-2">
                <img id="preview-image" src="" alt="Image Preview" class="max-w-full h-auto rounded-md shadow-md" style="display: none;">
            </div>
        </div>

        <hr class="my-6">

        <!-- Store Information -->
        <h4 class="text-lg font-semibold mb-3">Informasi Toko</h4>

        <div class="form-group">
            <label for="nama_toko" class="block text-sm font-medium text-gray-700 mb-2">Nama Toko</label>
            <input type="text" name="nama_toko" id="nama_toko" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ old('nama_toko') }}" required>
            @error('nama_toko')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="deskripsi_toko" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Toko</label>
            <textarea name="deskripsi_toko" id="deskripsi_toko" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ old('deskripsi_toko') }}</textarea>
            @error('deskripsi_toko')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="is_open" class="block text-sm font-medium text-gray-700 mb-2">Status Toko</label>
            <select name="is_open" id="is_open" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                <option value="1">Open</option>
                <option value="0">Closed</option>
            </select>
            @error('is_open')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="path_foto" class="block text-sm font-medium text-gray-700 mb-2">Foto Toko</label>
            <input type="file" name="path_foto" id="path_foto" class="block w-full sm:w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" accept="image/*" required>
            @error('path_foto')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="kantin_id_kantin" class="block text-sm font-medium text-gray-700 mb-2">Pilih Kantin</label>
            <select name="kantin_id_kantin" id="kantin_id_kantin" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                @foreach ($kantins as $kantin)
                <option value="{{ $kantin->id_kantin }}">{{ $kantin->nama_kantin }}</option>
                @endforeach
            </select>
            @error('kantin_id_kantin')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex space-x-4">
            <button type="submit" class="w-full sm:w-auto bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 mt-3">Tambah User dan Toko</button>
            <a href="{{ route('admin.toko') }}" class="w-full sm:w-auto bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 mt-3">Cancel</a>
        </div>
    </form>
</div>

<script>
    document.getElementById("picture").addEventListener("change", function(event) {
        const file = event.target.files[0];
        const previewImage = document.getElementById("preview-image");
        const previewDiv = document.getElementById("preview");

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewImage.style.display = "block";
            };

            reader.readAsDataURL(file);
        } else {
            previewImage.style.display = "none";
        }
    });
</script>
@endsection
