@extends('base.base')

@section('content')

<style>
    /* Custom Swiper Styling */
    .swiper-button-prev,
    .swiper-button-next {
        background: linear-gradient(90deg, rgba(79, 70, 229, 0.7), rgba(109, 40, 217, 0.7));
        color: white;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        opacity: 0.9;
        transition: opacity 0.3s ease, transform 0.3s ease, background 0.3s ease;
    }

    /* Efek Hover */
    .swiper-button-prev:hover,
    .swiper-button-next:hover {
        background: linear-gradient(90deg, rgba(109, 40, 217, 1), rgba(147, 51, 234, 1));
        opacity: 1;
    }
</style>


<!-- Swiper Section -->
<div class="w-full relative mb-12 p-5">
    <div class="swiper multiple-slide-carousel relative">
        <div class="font-bold text-center mb-10 mt-5 text-3xl uppercase text-cyan-800">{{ $kantin->nama_kantin }}</div>
        <div class="swiper-wrapper ">
            @foreach ($listToko as $toko)

            @if($toko->is_open)
            <a class="swiper-slide border-black  border bg-black rounded-2xl overflow-hidden" href="{{ route('toMenu',['toko_id' => $toko->users_id_users]) }}">
                <div
                    id="toko-{{$toko->users_id_users}}"
                    style="background: url('{{ asset($toko->path_foto) }}') no-repeat center center; background-size: cover;"
                    class="grid grid-rows-2 rounded-2xl h-36  sm:min-h-72 duration-300 hover:opacity-80">
                    <div class="row-span-1 row-start-2 bg-white bg-opacity-90 sm:p-4 rounded-b-2xl">
                        <div class="text-xl text-center sm:text-start sm:text-2xl font-bold text-black">{{ $toko->nama_toko }}</div>
                        <div class="text-base sm:text-lg text-gray-900 hidden sm:block ">{{ $toko->deskripsi_toko }}</div>
                    </div>
                </div>
            </a>
            @else
            <a class="swiper-slide  border-black  border bg-black rounded-2xl overflow-hidden" href="{{ route('toMenu',['toko_id' => $toko->users_id_users]) }}">
                <div
                    id="toko-{{$toko->users_id_users}}"
                    style="background: url('{{ asset($toko->path_foto) }}') no-repeat center center; background-size: cover;"
                    class="grid grid-rows-2 grayscale rounded-2xl h-36  sm:min-h-72 duration-300 hover:opacity-80">
                    <div class="row-span-1 row-start-2 bg-white bg-opacity-90 sm:p-4 rounded-b-2xl">
                        <div class="text-xl text-center sm:text-start sm:text-2xl font-bold text-black">{{ $toko->nama_toko }} <span class="font-bold" id="closeSign">(TUTUP)</span></div>
                        <div class="text-base sm:text-lg text-gray-900 hidden sm:block ">{{ $toko->deskripsi_toko }}</div>
                    </div>
                </div>
            </a>
            @endif
            @endforeach
        </div>

        <!-- Navigation Buttons -->
        <div class="swiper-button-prev bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-purple-500 hover:to-pink-500 text-white w-12 h-12 sm:w-14 sm:h-14 rounded-full flex items-center justify-center shadow-lg transform transition-transform duration-300 hover:scale-110 absolute z-10 left-4 top-1/2 -translate-y-1/2">
            {{-- <i class="fas fa-chevron-left"></i>  --}}
        </div>
        <div class="swiper-button-next bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-purple-500 hover:to-pink-500 text-white w-12 h-12 sm:w-14 sm:h-14 rounded-full flex items-center justify-center shadow-lg transform transition-transform duration-300 hover:scale-110 absolute z-10 right-4 top-1/2 -translate-y-1/2">
            {{-- <i class="fas fa-chevron-right"></i> --}}
        </div>

    </div>
</div>

<!-- Recommendations Section -->
<div class="ms-4 sm:ms-10 text-xl sm:text-2xl mb-6 font-bold text-black">Top Recommendation</div>

<!-- Menu Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 px-4 sm:px-10">
    <!-- Example Menu Items -->
    @foreach ([
    ['name' => 'Ayam Goreng Krispi', 'desc' => 'Ayam goreng dengan tepung, lalu di goreng hangat-hangat.', 'img' => 'assets/foods/ayampinarak3.jpg'],
    ['name' => 'Bakso Ikan', 'desc' => 'Bakso ikan di goreng dengan tepung, lalu di goreng hangat-hangat.', 'img' => 'assets/foods/baksoIkan.jpg'],
    ['name' => 'Curly Fries', 'desc' => 'Bukan kentang goreng biasa, tetapi kentang goreng berputar-putar.', 'img' => 'assets/foods/carnival4.jpg']
    ] as $menu)
    <a class="bg-black rounded-2xl overflow-hidden">
        <div
            style="background: url('{{ asset($menu['img']) }}') no-repeat center center; background-size: cover;"
            class="grid grid-rows-2 rounded-2xl min-h-72 duration-300 hover:opacity-80">
            <div class="row-span-1 row-start-2 bg-white bg-opacity-70 p-4 rounded-b-2xl">
                <div class="text-lg sm:text-xl font-semibold text-black">{{ $menu['name'] }}</div>
                <div class="text-sm sm:text-base text-gray-600">{{ $menu['desc'] }}</div>
            </div>
        </div>
    </a>
    @endforeach
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
<script>
    var swiper = new Swiper(".multiple-slide-carousel", {
        loop: true,
        slidesPerView: 3,
        spaceBetween: 20,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            1920: {
                slidesPerView: 6.5,
                spaceBetween: 30
            },
            1028: {
                slidesPerView: 4.3,
                spaceBetween: 20
            },
            450: {
                slidesPerView: 2.3,
                spaceBetween: 20
            },
            200: {
                slidesPerView: 1.5,
                spaceBetween: 15
            },
            0: {
                slidesPerView: 1.2,
                spaceBetween: 10
            }
        }
    });

    socket.on("terima_status_toko", function(data) {
        console.log("Received status update:", data);
        if (data.status === "buka") {
            $(`#toko-${data.id_toko}`).removeClass('grayscale')
            $(`#closeSign`).text('');
        } else if (data.status === "tutup") {
            $(`#toko-${data.id_toko}`).addClass('grayscale')
            $(`#closeSign`).text('(TUTUP)');
        }
    });
</script>

@endsection