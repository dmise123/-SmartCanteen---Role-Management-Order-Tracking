@if(auth()->user()->status_user_id_status == 1)
<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center">
      <img src="{{ asset('assets/logoPetraEats/logoPetraEats.png') }}" class="w-16 " alt="MDB Logo" loading="lazy" />
      <div class="nav-link sm:block hidden" href="/">PetraEats</div>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto md:me-20" id="navbar-default">
      <ul class="font-medium items-center flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li class="hover:bg-gray-300 transition duration-300 w-full text-center">
          <a href="{{ route('home') }}" class="block py-2 px-3 text-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
        </li>
        <li class="hover:bg-gray-300 transition duration-300 w-full text-center">
          <span id="dropdownKantinButton" data-dropdown-toggle="dropdownKantin" class="block py-2 px-3 text-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">
            Kantin</span>
        </li>
        <li class="hover:bg-gray-300 transition duration-300 w-full text-center">
          <a href="{{ route('history') }}" class="block py-2 px-3 text-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Riwayat</a>
        </li>
        <li class="hover:bg-gray-300 transition duration-300 w-full text-center md:hidden block ">
          <a href="{{ route('logout') }}" class="block py-2 px-3 text-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Logout</a>
        </li>
      </ul>
    </div>
    <span id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class=" md:flex hidden font-medium items-center gap-4 py-2 px-3 text-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">
      {{ auth()->user()->nama }}
      <img draggable="false" class="w-12 h-12 rounded-full object-cover" src="{{ asset('assets/mahasiswa/profile/' .auth()->user()->picture) }}">
    </span>
  </div>
</nav>
@elseif(auth()->user()->status_user_id_status == 2)
<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/" class="flex items-center">
      <img src="{{ asset('assets/logoPetraEats/logoPetraEats.png') }}" class="w-16 " alt="MDB Logo" loading="lazy" />
      <div class="nav-link" href="/">PetraEats</div>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="{{ route('homeCanteen') }}" class="block py-2 px-3 ">Home</a>

        </li>
        <li>
          <a href="{{ route('orderCanteen') }}" class="block py-2 px-3 ">Pesanan Masuk</a>
        </li>
        <li class="md:hidden flex ">
          <span id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="py-2 px-3 ">{{ auth()->user()->nama }}</span>
        </li>
      </ul>
    </div>
    <li>
      <span id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="md:flex hidden py-2 px-3 ">{{ auth()->user()->nama }}</span>
    </li>
  </div>
</nav>
@endif
<!-- Dropdown menu -->

<div id="dropdown" class="z-10 hidden bg-white border-gray border-2 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
  <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
    <li>
      <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</a>
    </li>
  </ul>
</div>

<div id="dropdownKantin" class="z-10 hidden bg-white border-gray border-2 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
  <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownKantinButton">
    <li>
      <a href="{{ route('store',['kantin_id' => 3])}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Kantin P</a>
    </li>
    <li>
      <a href="{{ route('store',['kantin_id' => 4])}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Kantin Q</a>
    </li>
    <li>
      <a href="{{ route('store',['kantin_id' => 1])}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Kantin W</a>
    </li>
    <li>
      <a href="{{ route('store',['kantin_id' => 2])}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Kantin T</a>
    </li>
  </ul>
</div>