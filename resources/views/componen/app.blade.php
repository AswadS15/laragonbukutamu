<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('build/assets/app-ee1baeca.css') }}" data-navigate-track="reload">
    <script type="module" src="{{ asset('build/assets/app-b1941ff8.js') }}" data-navigate-track="reload"></script>
  {{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
  @livewireStyles
  <title>@yield('titel')</title>
</head>
<body class="font-popins relative">
  @include('sweetalert::alert')
   
   @include('componen.nav')
   @include('componen.sidebar')
   
   @yield('isi')
   @livewireScripts
   @yield('js')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>


  