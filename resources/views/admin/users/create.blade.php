@extends('base.base')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Create New User</h2>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
    <div class="alert alert-success mb-4">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div class="form-group">
            <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
            <input type="text" name="nama" id="nama" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm" value="{{ old('nama') }}" required>
            @error('nama')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input type="email" name="email" id="email" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm" value="{{ old('email') }}" required>
            @error('email')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
            <input type="password" name="password" id="password" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm" required>
            @error('password')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
    <label for="picture" class="block text-sm font-medium text-gray-700 mb-2">Profile Picture</label>
    <input 
        type="file" 
        name="picture" 
        id="picture" 
        class="block w-full sm:w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm" 
        accept="image/*" 
        onchange="previewImage(event)">
    
    @error('picture')
    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror

    <div id="preview" class="mt-2">
        <img id="preview-image" src="" alt="Image Preview" class="max-w-full h-auto rounded-md shadow-md" style="display: none;">
    </div>
</div>


        <div class="form-group">
            <label for="status_user_id_status" class="block text-sm font-medium text-gray-700 mb-2">User Status</label>
            <select name="status_user_id_status" id="status_user_id_status" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm" required>
                <option value="">Select Status</option>
                @foreach($statuses as $status)
                <option value="{{ $status->id_status }}">{{ $status->id_status }} - {{ $status->nama_status }}</option>
                @endforeach
            </select>
            @error('status_user_id_status')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="w-full sm:w-auto bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 mt-3">Create User</button>
            <a href="{{ route('admin.users') }}" class="w-full sm:w-auto bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 mt-3">Cancel</a>
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