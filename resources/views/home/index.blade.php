<!doctype html>
<html class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/css/costom.css', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="{{ asset('https://unpkg.com/trix@2.0.8/dist/trix.css') }}">
    <script type="text/javascript" src="{{ asset('https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js') }}"></script>
    
</head>
<style>
    #permintaan {
        background-image: url('{{ asset('img/1.jpeg') }}');
        background-size: cover; /* Atur ukuran gambar latar belakang */
        background-position: center; /* Posisikan gambar latar belakang di tengah */
        /* Lainnya sesuai kebutuhan Anda */
        background-attachment: 
    }
    #top {
        background-image: url('{{ asset('img/3.jpg') }}');
        background-size: cover; /* Atur ukuran gambar latar belakang */
        background-position: center; /* Posisikan gambar latar belakang di tengah */
    }
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }
    .hidup {
        background-color: rgb(243 244 246);
        color: rgb(55 65 81 );
        border-radius: 0.25rem
    }

</style>
<body>
    @include('sweetalert::alert')
{{-- NAVBAR --}}
    <nav id="myNavbar" class=" bg-emerald-700 backdrop-blur-sm fixed w-full z-20 top-0 start-0 ">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center font-mosrat text-4xl text-white font-bold whitespace-nowrap">BPKHTL-XV</span>
            </a>
            <div style="color: aliceblue" class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="/login"><button type="button"  class="text-white bg-emerald-400 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-600 rounded-lg text-lg font-bold px-4 py-2 text-center font-popins">Login</button></a>
                <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            <div  class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0" id="menuList">
                    <li class="{{ Str::startsWith(request()->path(), '/') ? 'hidup' : '' }}">
                        <a href="#" class="block py-2 px-3  hover:bg-gray-100 rounded font-popins font-normal md:dark:text-green-500 hover:text-gray-700 md:p-1" aria-current="page">Home</a>
                    </li>
                    <li class="{{ Str::startsWith(request()->path(), '/') ? 'hidup' : '' }}">
                        <a href="#layanan" class="block py-2 px-3 hover:text-gray-700 md:p-1  rounded font-popins font-normal  hover:bg-gray-100  md:dark:hover:text-green-500 md:dark:hover:bg-transparent">Layanan</a>
                    </li>
                    <li class="{{ Str::startsWith(request()->path(), '/') ? 'hidup' : '' }}"> 
                        <a href="#about" class="block py-2 px-3 font-popins font-normal rounded hover:bg-gray-100  md:dark:hover:text-green-500 md:dark:hover:bg-transparent hover:text-gray-700 md:p-1">About</a>
                    </li>
                    {{-- <li>
                        <a href="#" class="block py-2 px-3 font-popins font-normal  text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-green-700 md:p-0 md:dark:hover:text-green-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"></a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
{{-- NAVBAR --}}


{{-- SECTION 1 --}}
@include('home.section1')
{{-- END SECTION 1 --}} 

{{-- SECTION 2 --}}
@include('home.section2')
{{-- END SECTION 2 --}}

{{-- SECTION 3 --}}
@include('home.section3')
{{-- END SECTION 3 --}}

{{-- SECTION 4 --}}
@include('home.section4')
{{-- END SECTION 4 --}}

{{-- FOOTER --}}
@include('home.footer')
{{-- END FOOTER --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>




<script>
    document.addEventListener('DOMContentLoaded', function () {
        var getDataBtn = document.getElementById('getDataBtn');

        getDataBtn.addEventListener('click', function () {
            var hp = document.getElementById('hp').value;

            fetch('/ambil/' + hp)
                .then(response => response.json())
                .then(data => {
                    // Isi formulir dengan data yang diterima dari server
                    document.getElementById('nama').value = data.nama;
                    document.getElementById('instansi').value = data.instansi;
                    document.getElementById('alamat').value = data.alamat;
                    document.getElementById('hp').value = data.hp;

                    // Tambahkan atribut readonly pada elemen formulir
                    document.getElementById('nama').readOnly = true;
                    document.getElementById('instansi').readOnly = true;
                    document.getElementById('alamat').readOnly = true;
                    document.getElementById('hp').readOnly = true;

                    // Isi placeholder dengan nilai yang diterima dari server
                    document.getElementById('nama').placeholder = data.nama;
                    document.getElementById('instansi').placeholder = data.instansi;
                    document.getElementById('alamat').placeholder = data.alamat;
                    document.getElementById('hp').placeholder = data.hp;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        });
    });
</script>

<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>


<script>

    // JAM
    function updateClock() {
            // Dapatkan objek Date untuk waktu saat ini
            var now = new Date();

            // Ekstrak jam, menit, dan detik dari objek Date
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();

            // Format waktu dalam format 12 jam
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // Jam 0 akan dianggap sebagai 12

            // Buat string waktu dalam format HH:mm:ss AM/PM
            var timeString = hours + ':' + addLeadingZero(minutes) + ':' + addLeadingZero(seconds) + ' ' + ampm;

            // Tampilkan waktu di dalam elemen dengan id "digitalClock"
            document.getElementById('digitalClock').innerText = timeString;
        }

        function addLeadingZero(number) {
            // Tambahkan nol di depan angka jika angka < 10
            return number < 10 ? '0' + number : number;
        }

        // Panggil fungsi updateClock setiap detik
        setInterval(updateClock, 1000);

        // Inisialisasi jam pada saat halaman dimuat
        updateClock();
    // GRAFIK
  const ctx1 = document.getElementById('myChart');

  new Chart(ctx1, {
    type: 'doughnut',
    data: {
      labels: ['Hari ini', 'Minggu ini', 'Bulan ini'],
      datasets: [{
          label: ['Jumlah'],
          data: [{{ $hari }}, {{ $hari2 }}, {{ $hari3 }}],
        borderWidth: 1
      }]
    },
  });

  const ctx2 = document.getElementById('ulasan');

  new Chart(ctx2, {
    type: 'doughnut',
    data: {
      labels: ['Puas', 'Kurang Puas'],
      datasets: [{
          label: ['Jumlah'],
        data: [{{ $puas }}, {{ $tidakpuas }}],
        borderWidth: 1
      }]
    },
  });

  document.addEventListener('DOMContentLoaded', function () {
    var navbar = document.getElementById('myNavbar');

    window.addEventListener('scroll', function () {
      if (window.scrollY > 50) {
        navbar.classList.add('bg-emerald-900'); // Ganti dengan warna latar belakang yang diinginkan
        navbar.classList.add('bg-opacity-80',);
       
        navbar.classList.remove('bg-emerald-700');
      } else {
        navbar.classList.add('bg-emerald-700');
        navbar.classList.remove('bg-emerald-900');
        navbar.classList.remove('bg-opacity-80');
       
      }
    });
  });




</script>

</body>

</html>