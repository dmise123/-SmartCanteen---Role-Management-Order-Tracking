@extends('base.base')

@section('content')
<div class="min-h-screen flex flex-row bg-gray-200">
  <div class="flex-none w-1/4 bg-white flex flex-col items-center py-4">
    <img src="{{ asset('assets/logoPetraEats/logoPetraEats.png') }}" alt="logo" width="55" height="50" />
    <div class="flex flex-col items-center mt-6">
      <img class="w-32 h-32 rounded-full object-cover border-4 border-gray-200 shadow-md" src="{{ asset('assets/admin/profile/' . auth()->user()->picture) }}" alt="Admin Profile" />
      <p class="text-xl mt-8 text-gray-800 font-semibold">Welcome, {{ auth()->user()->nama }}</p>
    </div>
    <div class="mt-6 w-11/12 text-center">
      <a href="{{ route('admin.index', ['section' => 'mahasiswa']) }}" class="block py-2 px-4 mb-2 bg-gray-300 rounded hover:bg-blue-500 transition-all duration-300 transform hover:scale-105 ">Mahasiswa</a>
      <a href="{{ route('admin.index', ['section' => 'admin']) }}" class="block py-2 px-4 mb-2 bg-gray-300 rounded hover:bg-blue-500 transition-all duration-300 transform hover:scale-105">Admin</a>
      <a href="{{ route('admin.index', ['section' => 'kantin']) }}" class="block py-2 px-4 mb-2 bg-gray-300 rounded hover:bg-blue-500 transition-all duration-300 transform hover:scale-105">KANTIN</a>
      <a href="{{ route('admin.index', ['section' => 'toko']) }}" class="block py-2 px-4 mb-2 bg-gray-300 rounded hover:bg-blue-500 transition-all duration-300 transform hover:scale-105">TOKO</a>
      <a href="{{ route('admin.index', ['section' => 'transaksi']) }}" class="block py-2 px-4 mb-2 bg-gray-300 rounded hover:bg-blue-500 transition-all duration-300 transform hover:scale-105">Riwayat Transaksi</a>
      <a href="{{ route(name: 'logout') }}" class="block py-2 px-4 bg-red-500 text-white rounded transition-all duration-300 transform hover:scale-105 hover:bg-red-600">Logout</a>
    </div>
  </div>

  <div class="flex-1 flex flex-col p-6 bg-gray-100">
    <div class="flex justify-between mb-4">
      <a href="{{ route('admin.' . $section . '.create') }}"
        class="bg-gradient-to-r from-blue-500 via-blue-600 to-indigo-500 text-white px-6 py-3 rounded-lg shadow-2xl hover:from-blue-600 hover:to-indigo-600 transform hover:scale-110 transition-all duration-500 ease-in-out focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 ring-offset-2 hover:ring-blue-400">
        Tambah
      </a>
    </div>

    <div class="flex justify-between items-center mb-4">
      <form method="GET" action="{{ route('admin.index', ['section' => $section]) }}" class="flex items-center space-x-2">
        <label for="filter" class="text-gray-700 text-lg font-semibold">Show:</label>
        <select name="filter" id="filter" class=" border-gray-500 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300 ease-in-out transform hover:scale-105" onchange="this.form.submit()">
          <option value="active" {{ request('filter', 'active') === 'active' ? 'selected' : '' }} class="">Active</option>
          <option value="restore" {{ request('filter') === 'restore' ? 'selected' : '' }} class="">Restore</option>
        </select>
      </form>
    </div>

    @if($section === 'admin' || $section === 'mahasiswa')
    @if($users->isEmpty())
    <p>No users found.</p>
    @else
    @foreach ($users as $u)
    <div class="flex items-center justify-between bg-white border border-gray-300 p-4 rounded shadow hover:bg-gray-50">
      <div>
        <p class="text-lg font-bold">{{ $u->id_users }}</p>
        <p class="text-lg font-bold">{{ $u->nama }}</p>
        <p class="text-sm text-gray-600">{{ $u->email }}</p>
      </div>
      <div class="flex space-x-2">
        <a href="{{ route('admin.users.edit', $u->id_users) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
        @if($u->deleted_at === null)
        <form action="{{ route('admin.users.delete', $u->id_users) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
        </form>
        @else
        <form action="{{ route('admin.users.restore', $u->id_users) }}" method="POST" onsubmit="return confirm('Are you sure you want to restore this user?');">
          @csrf
          @method('PATCH')
          <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Restore</button>
        </form>
        @endif
      </div>
    </div>
    @endforeach
    @endif
    @elseif($section === 'toko')
    @if($tokos->isEmpty())
    <p>No toko found.</p>
    @else
    @foreach ($tokos as $t)
    <div class="flex items-center justify-between bg-white border border-gray-300 p-4 rounded shadow hover:bg-gray-50">
      <div>
        <p class="text-lg font-bold">{{ $t->users_id_users }}</p>
        <p class="text-lg font-bold">{{ $t->nama_toko }}</p>
      </div>
      <div class="flex space-x-2">
        <a href="{{ route('admin.toko.edit', $t->users_id_users) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit Toko</a>
        <a href="{{ route('admin.users.edit', $t->users_id_users) }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Edit Owner</a>
        @if($t->deleted_at === null)
        <form action="{{ route('admin.toko.delete', $t->users_id_users) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
        </form>
        @else
        <form action="{{ route('admin.toko.restore', $t->users_id_users) }}" method="POST" onsubmit="return confirm('Are you sure you want to restore this user?');">
          @csrf
          @method('PATCH')
          <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Restore</button>
        </form>
        @endif
      </div>
    </div>
    @endforeach
    @endif
    @elseif($section === 'kantin')
    @if($kantins->isEmpty())
    <p>No kantin found.</p>
    @else
    @foreach ($kantins as $k)
    <div class="flex items-center justify-between bg-white border border-gray-300 p-4 rounded shadow hover:bg-gray-50">
      <div>
        <p class="text-lg font-bold">{{ $k->id_kantin }}</p>
        <p class="text-lg font-bold">{{ $k->nama_kantin }}</p>
      </div>
      <div class="flex space-x-2">
        <a href="{{ route('admin.kantin.edit', $k->id_kantin) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
        @if($k->deleted_at === null)
        <form action="{{ route('admin.kantin.delete', $k->id_kantin) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
        </form>
        @else
        <form action="{{ route('admin.kantin.restore', $k->id_kantin) }}" method="POST" onsubmit="return confirm('Are you sure you want to restore this user?');">
          @csrf
          @method('PATCH')
          <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Restore</button>
        </form>
        @endif
      </div>
    </div>
    @endforeach
    @endif
    @elseif($section === 'transaksi')
    @if(empty($riwayatPesanan) || count($riwayatPesanan) === 0)
    <p>No transactions found.</p>
    @else
    <div class="bg-gray-100 mt-2 grid grid-cols-1 p-5 rounded-lg gap-5">
      @foreach ($riwayatPesanan as $pesanan)
      <div class="flex items-center justify-between bg-white border border-gray-300 p-4 rounded shadow hover:bg-gray-50 card" data-modal-target="modal-detail" data-modal-toggle="modal-detail" data-value="{{ $pesanan['transaksi']->id_transaksi }}">
        <div class="flex items-center">
          <img src="{{ asset($pesanan['toko']->path_foto) }}" alt="Toko" draggable="false" class="w-24 h-24 object-cover rounded-full" />
          <div class="ml-4">
            <p class="text-lg font-semibold text-gray-800">{{ $pesanan['toko']->nama_toko }}</p>
            <p class="text-sm text-gray-600 flex items-center space-x-2">
              <span class="font-medium text-gray-800">Tanggal:</span>
              <span class="text-gray-900 font-semibold">
                {{ \Carbon\Carbon::parse($pesanan['transaksi']->created_at)->format('d M Y, H:i') }}
              </span>
            </p>

            <p class="text-sm text-gray-600 flex items-center">
              <span class="font-medium">Status: </span>
              @if ($pesanan['status']->nama_status_pesanan == 'Pesanan dibatalkan')
              <span class="px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">Pesanan dibatalkan</span>
              @elseif ($pesanan['status']->nama_status_pesanan == 'Pesanan diproses')
              <span class="px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">Pesanan diproses</span>
              @elseif ($pesanan['status']->nama_status_pesanan == 'Pesanan diterima')
              <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">Pesanan diterima</span>
              @elseif ($pesanan['status']->nama_status_pesanan == 'Pesanan ditolak')
              <span class="px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">Pesanan ditolak</span>
              @elseif ($pesanan['status']->nama_status_pesanan == 'Pesanan masuk')
              <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">Pesanan masuk</span>
              @elseif ($pesanan['status']->nama_status_pesanan == 'Pesanan siap diambil')
              <span class="px-3 py-1 rounded-full text-xs font-semibold bg-teal-100 text-teal-800">Pesanan siap diambil</span>
              @elseif ($pesanan['status']->nama_status_pesanan == 'Pesanan sudah diambil')
              <span class="px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-800">Pesanan sudah diambil</span>
              @endif
            </p>
            <p class="text-sm text-gray-600 flex items-center space-x-2">
              <span class="font-medium text-gray-800">Pembeli:</span>
              <span class="text-gray-900 font-semibold">
                {{ $pesanan['pembeli']->nama ?? 'Nama tidak tersedia'}}, {{ $pesanan['mahasiswa']->nrp }}
              </span>
            </p>
          </div>

        </div>
        <div class="flex space-x-2">
          <a href="{{ route('admin.transaksi.edit', $pesanan['transaksi']->id_transaksi) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Edit</a>
          @if($pesanan['transaksi']->deleted_at === null)
          <form action="{{ route('admin.transaksi.delete', $pesanan['transaksi']->id_transaksi) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this transaksi?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
          </form>
          @else
          <form action="{{ route('admin.transaksi.restore', $pesanan['transaksi']->id_transaksi) }}" method="POST" onsubmit="return confirm('Are you sure you want to restore this user?');">
            @csrf
            @method('PATCH')
            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Restore</button>
          </form>
          @endif

        </div>
      </div>
      @endforeach
    </div>
    @endif

    @endif
  </div>
</div>
<div id="modal-detail" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-gray-800 bg-opacity-50">
  <div class="relative p-6 w-full max-w-3xl bg-white rounded-lg shadow-lg">
    <div class="flex items-center justify-between p-4 border-b dark:border-gray-600">
      <h3 id="modal-header" class="text-2xl font-semibold text-gray-900 dark:text-white">
        Order Summary
      </h3>
      <button type="button" class="text-gray-500 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal-detail">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close</span>
      </button>
    </div>
    <div id="modal-body" class="p-6 space-y-4 max-h-[60vh] overflow-y-auto">
    </div>

    <div class="flex justify-center items-center p-4 border-t border-gray-200 rounded-b dark:border-gray-600">
      <button data-modal-hide="modal-detail" type="button" class="w-full sm:w-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Ok
      </button>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $(".card").on("click", function() {
      const transaksiId = $(this).data("value");
      const url = `{{ route('api_detail_transaksi', ':id') }}`.replace(':id', transaksiId);
      $("#modal-header").text(`Transaksi ... `);
      $("#modal-body").html(`
            <div class="flex w-full justify-center">
                <img src='https://img.pikbest.com/png-images/20190918/cartoon-snail-loading-loading-gif-animation_2734139.png!bw700' style='width:12rem;height:12rem'>
            </div>
        `);
      fetch(url)
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(data => {
          var detailTransaksi = "";
          data['data'].forEach(function(detail) {
            detailTransaksi += `
                        <div class="flex justify-between items-center">
                            <span class="font-medium text-gray-700">${detail['nama_menu']}</span>
                            <span class="text-gray-600">Jumlah: ${detail['kuantitas']}</span>
                            <span class="text-gray-900 font-semibold">Rp ${detail['sub_total_harga']}</span>
                        </div>
                        <hr class="my-4 border-t border-gray-200 dark:border-gray-600">
                    `;
          });
          detailTransaksi += `
                    <div class="flex justify-between items-center font-semibold text-lg p-4">
                        <span class="text-gray-900">Total Harga</span>
                        <span class="text-gray-900">Rp ${data['total_harga']}</span>
                    </div>
                `;
          $("#modal-header").text(`Transaksi ${transaksiId}`);
          $("#modal-body").html(detailTransaksi);
        });

      $("body").addClass("modal-open");
    });

    $(document).on("click", "[data-modal-hide='modal-detail']", function() {
      $("#modal-detail").addClass("hidden");
      $("body").removeClass("modal-open");
    });

    $(document).on("click", ".edit-button", function(event) {
      event.stopPropagation();
    });
  });
</script>
@endsection