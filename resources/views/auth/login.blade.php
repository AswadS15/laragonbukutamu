@extends('componen.guest')
@section('isi')
<main class="h-screen bg-gray-100">
    <div class="flex flex-col items-center justify-center px-6 mx-auto h-screen">
        {{-- <a href="/" class="flex items-center justify-center mb-8 text-2xl font-bold lg:mb-10">
            <img src="{{ asset('/assets/images/LOGO_KOTA_GORONTALO.png') }}" class="h-16 mr-4" alt="Inspektorat" />
        </a> --}}
        <!-- Card -->
        <div class="w-full max-w-md p-6 space-y-8 sm:p-8 bg-gray-50 rounded-lg shadow">
            <h2 class="text-2xl font-bold text-green-400">
                Sign In
            </h2>
            <form class="mt-8 space-y-5" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="relative">
                    <input type="email" id="email" name="email"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        placeholder=" " autocomplete="username" value="{{ old('email') }}" />
                    <label for="email"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-gray-50 px-2 peer-focus:px-2 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Email</label>
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="relative">
                    <input type="password" id="password" name="password"
                        class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        placeholder=" " autocomplete="new-password" value="{{ old('password') }}" />
                    <label for="password"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-gray-50 px-2 peer-focus:px-2 peer-focus:text-green-600 peer-focus:dark:text-green-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Password</label>
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-between">
                    <!-- Remember Me -->
                    <div class="block">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                </div>
                <button type="submit"
                    class="w-full px-5 py-2 text-base font-medium text-center text-white bg-green-400 hover:bg-green-500 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto ">Login</button>

            </form>
        </div>
    </div>

</main>
@endsection