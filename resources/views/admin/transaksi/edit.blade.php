@extends('base.base')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Transaction</h1>

    <form action="{{ route('admin.transaksi.update', $transaksi->id_transaksi) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="mahasiswa_id_users" class="block text-sm font-medium text-gray-700">Mahasiswa</label>
            <select name="mahasiswa_id_users" id="mahasiswa_id_users" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @foreach($mahasiswa as $mhs)
                    <option value="{{ $mhs->id_users }}" {{ $transaksi->mahasiswa_id_users == $mhs->id_users ? 'selected' : '' }}>{{ $mhs->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="toko_id_users" class="block text-sm font-medium text-gray-700">Toko</label>
            <select name="toko_id_users" id="toko_id_users" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @foreach($toko as $tk)
                    <option value="{{ $tk->id_users }}" {{ $transaksi->toko_id_users == $tk->id_users ? 'selected' : '' }}>{{ $tk->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="total_harga" class="block text-sm font-medium text-gray-700">Total Harga</label>
            <input type="number" name="total_harga" id="total_harga" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $transaksi->total_harga }}" required>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="3">{{ $transaksi->deskripsi }}</textarea>
        </div>

        <div class="mb-4">
            <label for="status_pesanan_id_status" class="block text-sm font-medium text-gray-700">Status Pesanan</label>
            <select name="status_pesanan_id_status" id="status_pesanan_id_status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @foreach($statuses as $status)
                    <option value="{{ $status->id_status_pesanan }}" {{ $transaksi->status_pesanan_id_status == $status->id_status_pesanan ? 'selected' : '' }}>{{ $status->nama_status_pesanan }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Transaction</button>
    </form>
</div>
@endsection