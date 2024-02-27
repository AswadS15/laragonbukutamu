<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/css/costom.css', 'resources/js/app.js'])
  @livewireStyles
  <title>@yield('titel')</title>
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


  