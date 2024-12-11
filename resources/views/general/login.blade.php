@extends('base.base')

@section('content')

<!-- @if(session('error'))
<div id="error-alert" class="fixed mx-auto mt-4 w-1/3 bg-red-700 border border-red-400 text-white px-4 py-3 rounded shadow-md" role="alert">
    <div class="flex justify-between items-center">
        <span>{{ session('error') }}</span>
        <button onclick="document.getElementById('error-alert').style.display='none'" class="text-green-700 hover:text-green-900 font-bold ml-4">
            &times;
        </button>
    </div>
</div>
@endif -->

<div class="w-full min-h-screen flex items-center justify-center bg-gray-100">
    <div class="grid grid-cols-1 md:grid-cols-8 w-full max-w-6xl shadow-lg">
        <div class="col-span-1 md:col-span-3 bg-cover bg-center flex md:hidden items-center justify-center p-8" style="background-image: url('assets/login/landingIMG.jpeg');">
            <div class="bg-white bg-opacity-90 p-8 rounded-lg w-full max-w-md shadow-lg">
                <form action="{{ route('checkLogin') }}" method="post" accept-charset="UTF-8">
                    {{ csrf_field() }}

                    <h3 class="text-2xl font-semibold mb-3">Welcome, Petranesian</h3>
                    <h4 class="text-lg mb-6">Log in to access our full features.</h4>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email address</label>
                        <input type="email" id="email" name="email" class="form-control w-full border rounded p-3 focus:outline-none focus:ring focus:border-blue-300">
 -->
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control w-full border rounded p-3 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div class="pt-1 mb-4">
                        <button type="submit" class="w-full bg-blue-500 text-white font-bold py-3 rounded-lg hover:bg-blue-600 transition">Sign in</button>
                    </div>

                    <p class="text-gray-600 text-sm mb-5"><a class="text-blue-500 hover:underline" href="#!">Forgot password?</a></p>


                </form>
            </div>
        </div>

        <div class="col-span-1 md:col-span-3 bg-cover bg-center flex md:block hidden items-center justify-center p-8">
            <div class="bg-white bg-opacity-90 p-8 rounded-lg w-full max-w-md shadow-lg">
                <form action="{{ route('checkLogin') }}" method="post" accept-charset="UTF-8">
                    {{ csrf_field() }}

                    <h3 class="text-2xl font-semibold mb-3">Welcome, Petranesian</h3>
                    <h4 class="text-lg mb-6">Log in to access our full features.</h4>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email address</label>
                        <input type="email" id="email" name="email" class="form-control w-full border rounded p-3 focus:outline-none focus:ring focus:border-blue-300">
                        @error('email')
                        <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control w-full border rounded p-3 focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div class="pt-1 mb-4">
                        <button type="submit" class="w-full bg-blue-500 text-white font-bold py-3 rounded-lg hover:bg-blue-600 transition">Sign in</button>
                    </div>

                    <p class="text-gray-600 text-sm mb-5"><a class="text-blue-500 hover:underline" href="#!">Forgot password?</a></p>

                    @if(Session::has('error'))
                    <div class="alert alert-danger bg-red-100 text-red-600 p-3 rounded">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                </form>
            </div>
        </div>
        <div class="col-span-1 md:col-span-5 hidden md:block bg-cover bg-center" style="background-image: url('assets/login/landingIMG.jpeg');">
        </div>
    </div>
</div>

@endsection