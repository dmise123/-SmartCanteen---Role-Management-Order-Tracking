@extends('base.base')

@section('content')
<div class="px-5 mt-12">
  @if(auth()->user()->status_user_id_status == 1)

  <div class="grid grid-cols-1 justify-between mb-3">
    <div class="col-span-1 flex justify-start ">
      <a href="{{ route('home') }}" type="button" class="px-4 py-2 bg-blue-500 text-white font-bold rounded-lg">
        Back
      </a>
    </div>
    <div class="col-span-1 flex justify-center items-center ">
      <h1 class="ml-3 text-2xl font-semibold">Riwayat Pesanan</h5>
    </div>
  </div>

  <!-- MHS -->

  <div class="bg-gray-100 mt-2 grid md:grid-cols-2 grid-cols-1 p-5 rounded-lg gap-5">
    @foreach($riwayatPesanan as $pesanan)
    <div data-modal-target="modal-detail" data-modal-toggle="modal-detail" class=" card bg-white col-span-1 shadow-lg p-4 rounded-full hover:bg-gray-300" data-value="{{ $pesanan['transaksi']->id_transaksi}}">
      <div class="flex items-center">
        <div class="w-48 h-48 relative">
          <img
            src="{{ asset($pesanan['toko']->path_foto) }}"
            alt="Toko"
            draggable="false"

            class="w-full h-full object-cover rounded-full" />
        </div>
        <div class="ml-4 flex-grow">
          <div class="text-gray-900 font-semibold">{{ $pesanan['toko']->nama_toko }}</div>
          <div class="text-gray-600">{{ $pesanan['transaksi']->created_at }}</div>
        </div>
        <div class="ml-4">
          <div class="text-gray-900">Rp {{ $pesanan['transaksi']->total_harga }}</div>
          <div class="mt-2">

            @if($pesanan['transaksi']->status_pesanan_id_status == 1)
            <div class="px-3 py-1 text-white text-sm rounded-full text-center font-bold bg-red-500 ">
              Ditolak
            </div>
            @endif

            @if($pesanan['transaksi']->status_pesanan_id_status == 2)
            <div class="px-3 py-1 text-white text-sm rounded-full text-center font-bold bg-orange-500 ">
              Pesanan Masuk
            </div>
            @endif

            @if($pesanan['transaksi']->status_pesanan_id_status == 3)
            <div class="px-3 py-1 text-white text-sm rounded-full text-center font-bold bg-lime-500 ">
              Pesanan Diterima
            </div>
            @endif

            @if($pesanan['transaksi']->status_pesanan_id_status == 4)
            <div class="px-3 py-1 text-white text-sm rounded-full text-center font-bold bg-red-600 ">
              Pesanan Dibatalkan
            </div>
            @endif

            @if($pesanan['transaksi']->status_pesanan_id_status == 5)
            <div class="px-3 py-1 text-white text-sm rounded-full text-center font-bold bg-amber-500 ">
              Pesanan Diproses
            </div>
            @endif

            @if($pesanan['transaksi']->status_pesanan_id_status == 6)
            <div class="px-3 py-1 text-white text-sm rounded-full text-center font-bold bg-green-300 ">
              Pesanan Siap Diambil
            </div>
            @endif

            @if($pesanan['transaksi']->status_pesanan_id_status == 7)
            <div class="px-3 py-1 text-white text-sm rounded-full text-center font-bold bg-green-700 ">
              Pesanan Sudah Diambil
            </div>
            @endif

          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>


  @endif

  <!-- TOKO -->
  @if(auth()->user()->status_user_id_status == 2)
  @if(count($orders) == 0 )
  <h1>Belum ada pesanan</h1>
  @else

  <div class=" bg-gray-100 mt-2 grid grid-cols-1 md:grid-cols-2 p-5 rounded-lg gap-5">


    @foreach($orders as $order)
    <div data-modal-target="modal-detail" data-modal-toggle="modal-detail" class="card bg-white col-span-1 shadow-lg p-4 rounded-full hover:bg-gray-300" data-value="{{ $order['notaTransaksi']['id_transaksi'] }}">
      <div class="flex items-center">
        <div class="w-48 h-48 relative">
          <img src="{{ asset('assets/mahasiswa/profile/' . $order['pemesan']['picture']) }}"
            alt="Customer"
            draggable="false"
            class="w-full h-full object-cover rounded-full">
        </div>
        <div class="ml-4 flex-grow">
          <div class="text-gray-900 font-semibold">{{ $order['pemesan']['nama'] }}</div>
          <div class="text-gray-600">{{ $order['notaTransaksi']['created_at'] }}</div>
        </div>
        <div class="ml-4">
          <div class="text-gray-900">Rp {{ $order['notaTransaksi']['total_harga'] }}</div>
          <div class="mt-2">

            @if($order['notaTransaksi']['status_pesanan_id_status'] == 1)
            <div class="px-3 py-1 text-white text-sm rounded-full text-center font-bold bg-red-500 ">
              Ditolak
            </div>
            @endif

            @if($order['notaTransaksi']['status_pesanan_id_status'] == 2)
            <div class="px-3 py-1 text-white text-sm rounded-full text-center font-bold bg-orange-500 ">
              Pesanan Masuk
            </div>

            <button class="bg-lime-500">Terima</button>
            <button class="bg-red-500">Tolak</button>

            @endif

            @if($order['notaTransaksi']['status_pesanan_id_status'] == 3)
            <div class="px-3 py-1 text-white text-sm rounded-full text-center font-bold bg-lime-500 ">
              Pesanan Diterima
            </div>

            @endif

            @if($order['notaTransaksi']['status_pesanan_id_status'] == 4)
            <div class="px-3 py-1 text-white text-sm rounded-full text-center font-bold bg-red-600 ">
              Pesanan Dibatalkan
            </div>
            @endif

            @if($order['notaTransaksi']['status_pesanan_id_status'] == 5)
            <div class="px-3 py-1 text-white text-sm rounded-full text-center font-bold bg-amber-500 ">
              Pesanan Diproses
            </div>
            @endif

            @if($order['notaTransaksi']['status_pesanan_id_status'] == 6)
            <div class="px-3 py-1 text-white text-sm rounded-full text-center font-bold bg-green-300 ">
              Pesanan Siap Diambil
            </div>
            @endif

            @if($order['notaTransaksi']['status_pesanan_id_status'] == 7)
            <div class="px-3 py-1 text-white text-sm rounded-full text-center font-bold bg-green-700 ">
              Pesanan Sudah Diambil
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  @endif
  @endif
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
        <div class="sr-only">Close</div>
      </button>
    </div>
    <!-- Modal Body -->
    <div id="modal-body" class="p-6 space-y-4 max-h-[60vh] overflow-y-auto">


    </div>

    <!-- Modal Footer -->
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
          console.log(data)
          var detailTransaksi = "";
          data['data'].forEach(function(detail) {
            detailTransaksi +=
              `
            <div class="flex justify-between items-center">
            <div class="font-medium text-gray-700">${detail['nama_menu']}</div>
            <div class="text-gray-600">Jumlah: ${detail['kuantitas']}</div>
            <div class="text-gray-900 font-semibold">Rp ${detail['sub_total_harga']}</div>
            </div>
           <hr class="my-4 border-t border-gray-200 dark:border-gray-600">


                `

          })

          detailTransaksi += `
            <div class="flex justify-between items-center font-semibold text-lg p-4">
              <div class="text-gray-900">Total Harga</div>
              <div class="text-gray-900">Rp ${data['total_harga']}</div>
            </div>
            
            `
          $("#modal-header").text(`Transaksi ${transaksiId}`);
          $("#modal-body").html(detailTransaksi);

        })

    });

  });
</script>
@endsection