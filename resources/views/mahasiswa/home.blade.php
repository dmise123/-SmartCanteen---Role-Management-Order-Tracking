@extends('base.base')

@section('content')

<div class="min-h-screen flex flex-col lg:flex-row bg-gray-200">
  <!-- Left Sidebar Section -->
  <div class="flex-none w-full lg:w-1/4 bg-white flex flex-col items-center py-6">
    <img draggable="false" class="mt-4" src="{{ asset('assets/logoPetraEats/logoPetraEats.png') }}" alt="logo" width="55" height="50" />
    <div class="flex flex-col items-center mt-6 lg:mt-12 text-center">
      <img draggable="false" class="w-36 h-36 lg:w-56 lg:h-56 rounded-full object-cover" src="{{ asset('assets/mahasiswa/profile/' . auth()->user()->picture) }}" alt="Profile Picture" />
      <p class="text-lg lg:text-xl mt-3">{{ auth()->user()->nama }}</p>
      <p class="text-gray-500 text-sm lg:text-base">{{ auth()->user()->email }}</p>
    </div>
    <div class="mt-6 lg:mt-8 w-3/4">
      <a href="{{ route('history') }}" class="w-full py-2 px-4 border border-gray-400 text-gray-800 rounded-lg hover:bg-gray-200 flex items-center justify-center text-sm lg:text-base">
        <i class="fa fa-history mr-2" aria-hidden="true"></i> Riwayat Pemesanan
      </a>
    </div>
    <div class="mt-4">
      <div class="lg:flex lg:w-full lg:justify-center">
        @auth
        <a href="{{ route('logout') }}" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
          Log out
        </a>
        @endauth
      </div>
    </div>
  </div>

  <!-- Main Content Section -->
  <div class="w-full flex-1 grid grid-cols-1 lg:grid-cols-2 gap-4 p-4">
    <div class="group relative hover:z-30">
      <a href="{{ route('store',['kantin_id' => 3])}}" class="w-full h-full">
        <img draggable="false" src="{{ asset('assets/kantin/KantinP.jpg') }}" alt="Kantin P" class="border-2 rounded-md border-black w-full h-48 sm:h-64 lg:h-full object-cover transition-transform duration-300 group-hover:scale-105" />
      </a>
    </div>
    <div class="group relative hover:z-30">
      <a href="{{ route('store',['kantin_id' => 4])}}" class="w-full h-full">
        <img draggable="false" src="{{ asset('assets/kantin/KantinQ.jpg') }}" alt="Kantin Q" class="border-2 rounded-md border-black w-full h-48 sm:h-64 lg:h-full object-cover transition-transform duration-300 group-hover:scale-105" />
      </a>
    </div>
    <div class="group relative hover:z-30">
      <a href="{{ route('store',['kantin_id' => 1])}}" class="w-full h-full">
        <img draggable="false" src="{{ asset('assets/kantin/KantinW.jpg') }}" alt="Kantin W" class="border-2 rounded-md border-black w-full h-48 sm:h-64 lg:h-full object-cover transition-transform duration-300 group-hover:scale-105" />
      </a>
    </div>
    <div class="group relative hover:z-30">
      <a href="{{ route('store',['kantin_id' => 2])}}" class="w-full h-full">
        <img draggable="false" src="{{ asset('assets/kantin/KantinT.jpeg') }}" alt="Kantin T" class="border-2 rounded-md border-black w-full h-48 sm:h-64 lg:h-full object-cover transition-transform duration-300 group-hover:scale-105" />
      </a>
    </div>
  </div>
</div>

@endsection