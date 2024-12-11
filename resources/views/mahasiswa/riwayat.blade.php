@extends('base.base')

@section('content')
<!-- History -->
<div class="px-5 mt-12">
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
  @if(auth()->user()->status_user_id_status == 1)
  <div class=" bg-gray-100 mt-2 grid grid-cols-1 md:grid-cols-2 p-5 rounded-lg gap-5">
    @foreach($riwayatPesanan as $pesanan)
    <div data-modal-target="modal-detail" data-modal-toggle="modal-detail" class="card bg-white col-span-1 shadow-lg p-4 rounded-full hover:bg-gray-300" data-value="{{ $pesanan['transaksi']->id_transaksi}}">
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
            <span class="px-3 py-1 text-white text-sm rounded-full
            @if($pesanan['transaksi']->status_pesanan_id_status == 0) bg-red-500 
            @elseif($pesanan['transaksi']->status_pesanan_id_status == 1) bg-blue-500 
            @elseif($pesanan['transaksi']->status_pesanan_id_status == 2) bg-yellow-500 
            @else bg-green-500 @endif">
              @if($pesanan['transaksi']->status_pesanan_id_status == 0) Ditolak @endif
              @if($pesanan['transaksi']->status_pesanan_id_status == 1) Pesan @endif
              @if($pesanan['transaksi']->status_pesanan_id_status == 2) Proses @endif
              @if($pesanan['transaksi']->status_pesanan_id_status == 3) Selesai @endif
            </span>
          </div>
        </div>
      </div>
    </div>
    @endforeach
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
            <span class="font-medium text-gray-700">${detail['nama_menu']}</span>
            <span class="text-gray-600">Jumlah: ${detail['kuantitas']}</span>
            <span class="text-gray-900 font-semibold">Rp ${detail['sub_total_harga']}</span>
            </div>
           <hr class="my-4 border-t border-gray-200 dark:border-gray-600">


                `

            })

            detailTransaksi += `
            <div class="flex justify-between items-center font-semibold text-lg p-4">
              <span class="text-gray-900">Total Harga</span>
              <span class="text-gray-900">Rp ${data['total_harga']}</span>
            </div>
            
            `
            $("#modal-header").text(`Transaksi ${transaksiId}`);
            $("#modal-body").html(detailTransaksi);

          })

      });

    });
  </script>

  @endif

  <!-- TOKO -->
  @if(auth()->user()->status_user_id_status == 2)
  @foreach($customers as $customer)
  <div class="mt-2 bg-white shadow p-4 rounded">
    <div class="flex items-center">
      <img src="{{ asset('assets/mahasiswa/profile/' . $customer->picture) }}" alt="Customer" class="w-15 h-15 rounded-full">
      <div class="ml-4 flex-grow">
        <div class="text-gray-900 font-semibold">{{ $customer->nama }}</div>
        <div class="text-gray-600">{{ $customer->tanggal }}</div>
      </div>
      <div class="ml-4">
        <div class="text-gray-900">Rp {{ $customer->nominal }}</div>
        <div class="mt-2">
          <span class="px-3 py-1 text-white text-sm rounded-full
            @if($customer->status_pesanan == 0) bg-red-500 
            @elseif($customer->status_pesanan == 1) bg-blue-500 
            @elseif($customer->status_pesanan == 2) bg-yellow-500 
            @else bg-green-500 @endif">
            @if($customer->status_pesanan == 0) Ditolak @endif
            @if($customer->status_pesanan == 1) Pesan @endif
            @if($customer->status_pesanan == 2) Proses @endif
            @if($customer->status_pesanan == 3) Selesai @endif
          </span>
        </div>
      </div>
    </div>
  </div>
  @endforeach

  @endif
</div>
@endsection