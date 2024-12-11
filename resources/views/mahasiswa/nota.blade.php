@extends('base.base')

@section('content')

<div class="w-full flex justify-center items-center mt-5">
    <div class="flex justify-start mb-4">
        <button id="back-button" type="button" class="bg-gray-500 text-white py-2 px-5 rounded-md hover:bg-gray-600">
            Batalkan Pemesanan
        </button>
    </div>
    <div class="bg-white rounded-lg w-full sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-1/3 p-5 sm:p-14 border m-5 border-black">
        <!-- Back Button at the top for easier access -->
        <div class="grid grid-cols-1">
            @foreach($ordersData as $order)
            <div class="grid grid-cols-1 sm:grid-cols-3 content-center gap-5 sm:gap-0 mb-5 border-b pb-5">
                <div class="items-center flex justify-center text-center sm:col-span-1 text-lg">
                    <img src="{{ asset($order['path_foto']) }}" class="img-fluid w-48 sm:w-72 rounded border border-black" />
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 col-span-2 content-center border border-black">
                    <div class="items-center flex text-center justify-center text-lg sm:col-span-1">
                        {{ $order['nama_menu'] }}
                    </div>
                    <div class="items-center flex text-center justify-center text-lg sm:col-span-1">
                        {{ $order['kuantitas'] }} x
                    </div>
                    <div class="flex col-span-1 col-start-3 justify-center items-end text-lg">
                        Sub-Total: {{ $order['sub_total_harga'] }}
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col mt-3 mb-1">
                <label class="block mb-2" for="description">Deskripsi Tambahan:</label>
                <textarea class="w-full p-2 border rounded" id="description" name="description" rows="6 sm:rows-8"></textarea>
            </div>

            <div class="flex justify-center sm:justify-between mt-5">
                <div class="flex flex-col sm:flex-row justify-center items-center sm:gap-5 w-full">
                    <p class="text-lg text-center">
                        Total Harga<br>
                        <b>{{ $transaction['total_harga'] }}</b>
                    </p>
                    <button id="pay-button" type="button" class="bg-indigo-500 text-white py-2 px-5 rounded-md hover:bg-indigo-600 mt-5 sm:mt-0">
                        Bayar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="snap-container"></div>

    <script>
        $(document).ready(function() {
            var payButton = document.getElementById('pay-button');
            var backButton = document.getElementById('back-button');
            const description = $("#description").val();

            // Emit the order message
            socket.emit("pesan", {
                pemesan: "{{ auth()->user()->id_users }}",
                toko: "{{ $ordersData[0]['toko'] }}",
                orders: @json($ordersDataJSON),
                total: "{{ $transaction['total_harga'] }}",
                deskripsi: description,
                token1: "{{ $token['token1'] }}",
                token2: "{{ $token['token2'] }}",
                token3: "{{ $token['token3'] }}",
                token4: "{{ $token['token4'] }}",
            });

            // Pay button functionality
            payButton.addEventListener('click', function() {
                Swal.fire({
                    title: 'Pesanan Terikirim',
                    text: 'Tunggu Toko Menerima Pesananmu',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                socket.on('status_pesanan', function(response) {
                    if (response == "terima") {
                        Swal.fire({
                            title: 'Pesanan Diterima!',
                            icon: 'success',
                            showConfirmButton: true,
                            confirmButtonText: "Bayar"
                        }).then(
                            window.snap.pay("{{ $snap }}", {
                                onSuccess: function(result) {
                                    Swal.fire({
                                        title: 'Pembayaran Berhasil!',
                                        icon: 'success',
                                        confirmButtonColor: '#6988DC',
                                    }).then(() => {
                                        window.location.href = '/';
                                    });
                                },
                                onError: function(result) {
                                    Swal.fire({
                                        title: 'Pembayaran Gagal!',
                                        icon: 'error',
                                        confirmButtonColor: '#6988DC'
                                    }).then(() => {
                                        window.location.reload();
                                    });
                                }
                            })
                        );
                    }
                });
            });

            // Back button functionality
            backButton.addEventListener('click', function() {
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda akan membatalkan pemesanan ini.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Batalkan',
                    cancelButtonText: 'Tidak, Kembali',
                    confirmButtonColor: '#e74c3c',
                    cancelButtonColor: '#3498db'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.history.back(); // Navigate back to the previous page
                    }
                });
            });
        });
    </script>

@endsection
