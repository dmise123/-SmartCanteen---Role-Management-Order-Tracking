@extends('base.base')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Edit User</h2>

        <!-- Display success message if available -->
        @if(session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.users.update', $users->id_users) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Name Input -->
            <div class="form-group">
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                <input type="text" name="nama" id="nama" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm" value="{{ old('nama', $users->nama) }}" required>
                @error('nama')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email Input -->
            <div class="form-group">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" id="email" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm" value="{{ old('email', $users->email) }}" required>
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="form-group">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" name="password" id="password" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm" placeholder="Leave blank if you do not want to change the password">
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- User Status Dropdown -->
            <div class="form-group">
                <label for="status_user_id_status" class="block text-sm font-medium text-gray-700 mb-2">Status User</label>
                <select name="status_user_id_status" id="status_user_id_status" class="block w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm" required>
                    @foreach($statuses as $status)
                        <option value="{{ $status->id_status }}" {{ $users->status_user_id_status == $status->id_status ? 'selected' : '' }}>
                            {{ $status->nama_status }}
                        </option>
                    @endforeach
                </select>
                @error('status_user_id_status')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Profile Picture Input -->
            <div class="form-group">
                <label for="picture" class="block text-sm font-medium text-gray-700 mb-2">Profile Picture</label>
                <input type="file" name="picture" id="picture" class="block w-full sm:w-1/2 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out sm:text-sm" accept="image/*">
                <small class="form-text text-muted">Leave blank if you do not want to change the picture.</small>
                @if ($users->picture)
                    <div class="mt-2">
                        <label>Current Picture:</label><br>
                        <img src="{{ asset($users->picture) }}" alt="Current Picture" class="w-24 h-24 rounded-md shadow-md">
                    </div>
                @endif
                @error('picture')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full sm:w-auto bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 mt-3">Update User</button>
            <a href="{{ route('admin.users') }}" class="w-full sm:w-auto bg-red-500 text-white px-6 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 mt-3">Cancel</a>

        </form>
    </div>
@endsection
