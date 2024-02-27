<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('build/assets/app-ec433321.css') }}">
  <script src="{{ asset('build/assets/app-b1941ff8.js') }}"></script>
  @livewireStyles
  <title>@yield('titel')</title>
  <style>
    .active {
    background: #fff;
    color: #047857;
    margin-left: 20px;
    transition-property: all;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 150ms;
    border-start-start-radius: 0.5rem /* 8px */;
    border-end-start-radius: 0.5rem /* 8px */;
}
  </style>
</head>
<body class="font-popins relative">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
  @include('sweetalert::alert')
   
   @include('componen.nav')
   @include('componen.sidebar')
   
   @yield('isi')
   @livewireScripts
   @yield('js')
   <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>


  