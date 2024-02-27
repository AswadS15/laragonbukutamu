<!doctype html>
<html class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/app-ec433321.css') }}">
    <script src="{{ asset('build/assets/app-b1941ff8.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('https://unpkg.com/trix@2.0.8/dist/trix.css') }}">
    <script type="text/javascript" src="{{ asset('https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js') }}"></script>
    <title>Layanan Buku Tamu BPKHTK XV Gorontalo</title>
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
    <nav id="myNavbar" class=" bg-emerald-700 backdrop-blur-sm  w-full z-20 fixed">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 overflow-scroll">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center font-mosrat text-4xl text-white font-bold whitespace-nowrap">BPKHTL-XV</span>
            </a>
            <div style="color: aliceblue" class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse items-center">
                <a href="/login"><button type="button"  class="text-white bg-emerald-400 p-2
                     text-2xl hover:bg-emerald-200 hover:text-emerald-700 text-center font-popins rounded-md transition-all">LOGIN</button></a>
                <button data-collapse-toggle="navbar-sticky" type="button" class="transition-all group inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5 text-white group-hover:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            <div  class="items-center justify-between hidden w-full  md:flex md:w-auto md:order-1 overflow-scroll" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 gap-3" id="menuList">
                    <li class="hover:bg-white hover:rounded-md md:hover:bg-opacity-0">
                        <a href="#" class="block py-2 px-3  text-white rounded font-popins font-normal md:dark:text-green-500 hover:text-gray-700 md:p-1" aria-current="page">Home</a>
                    </li>
                    <li class="hover:bg-white hover:rounded-md md:hover:bg-opacity-0"> 
                        <a href="#panduan" class="block py-2 px-3 font-popins font-normal rounded text-white  md:dark:hover:text-green-500 md:dark:hover:bg-transparent hover:text-gray-700 md:p-1">Panduan</a>
                    </li>
                    <li class="hover:bg-white hover:rounded-md md:hover:bg-opacity-0">
                        <a href="#layanan" class="block py-2 px-3 hover:text-gray-700 md:p-1  rounded font-popins font-normal  text-white  md:dark:hover:text-green-500 md:dark:hover:bg-transparent">Layanan</a>
                    </li>
                    <li class="hover:bg-white hover:rounded-md md:hover:bg-opacity-0"> 
                        <a href="#about" class="block py-2 px-3 font-popins font-normal rounded text-white  md:dark:hover:text-green-500 md:dark:hover:bg-transparent hover:text-gray-700 md:p-1">About</a>
                    </li>
                </ul>
                <div class="grid-cols-2 xl:grid-cols-5 grid md:hidden pb-3 md:grid-rows-none gap-2 font-mosrat mx-5 mt-1 ">
                    @foreach ($users as $user)
                        <div class="cols-span-1 bg-white rounded-md shadow-md border py-3 group capitalize">
                            <div class="py-2 flex gap-2 justify-center items-center text-xs">
                                @if ($user->photo)
                                    <div class="h-8 w-8 rounded-full bg-cover bg-center" style="background-image: url({{ asset('storage/profile/'. $user->photo) }})">

                                    </div>
                                @else
                                    <img src="{{ asset('img/profil.png') }}" alt="Profile" class="h-8 w-8">
                                @endif
                                <div>
                                    <p class="font-semibold text-black/70">{{$user->name}}</p>
                                    @if ($user->id_divisi != 0)
                                        <p class=" text-black/70">{{$user->divisi->divisi_type}}</p>
                                    @else
                                        <p class=" text-black/70">{{$user->role}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="flex justify-center items-center gap-1 text-xs">
                                @if ($user->status != 'online')
                                    <span class="h-2 w-2 rounded-full bg-gray-400 group-hover:bg-gray-300 block"></span>
                                    <span class="text-gray-400 group-hover:text-gray-300">{{$user->status}}</span>
                                @else
                                    <span class="h-2 w-2 rounded-full bg-emerald-400 block"></span>
                                    <span class="text-emerald-400 group-hover:text-emerald-300">{{$user->status}}</span>
                                @endif
                            </div>
                        </div>    
                    @endforeach
                </div>
            </div>
        </div>
    </nav>
{{-- NAVBAR --}}
@include('home.buka1')
@include('home.buka2')
@include('home.buka3')

{{-- SECTION 1 --}}
@include('home.section1')
{{-- END SECTION 1 --}} 

{{-- PANDUAN --}}
@include('home.panduan')
{{-- END PANDUAN --}}

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










<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>



<script>
    $(document).ready(function () {
        // Aktifkan modal saat gambar diklik
        $('#panduan1').click(function () {
            $('#buka1').removeClass('hidden').addClass('flex');
        });

        // Tutup modal saat tombol ditutup
        $('#btnClose').click(function () {
            $('#buka1').removeClass('flex').addClass('hidden');
        });
    });

    $(document).ready(function () {
        // Aktifkan modal saat gambar diklik
        $('#panduan2').click(function () {
            $('#buka2').removeClass('hidden').addClass('flex');
        });

        // Tutup modal saat tombol ditutup
        $('#btnClose2').click(function () {
            $('#buka2').removeClass('flex').addClass('hidden');
        });
    });

    $(document).ready(function () {
        // Aktifkan modal saat gambar diklik
        $('#panduan3').click(function () {
            $('#buka3').removeClass('hidden').addClass('flex');
        });

        // Tutup modal saat tombol ditutup
        $('#btnClose3').click(function () {
            $('#buka3').removeClass('flex').addClass('hidden');
        });
    });
</script>
<script>
  $('#hp').on('keyup', function () {
    // Mengambil nilai dari elemen dengan ID 'hp'
    var value = $(this).val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',
        url: '{{ URL::to('cekpengunjung') }}',
        dataType: 'json',
        data: { 'search': value },
        success: function (data) {
            // Memproses data yang diterima setelah permintaan berhasil
            if (data.length > 0) {
                // Data pengunjung ditemukan
                var pengunjungData = data[0];

                // Mengisi nilai elemen-elemen form dengan data yang diterima
                $('#nama').val(pengunjungData.nama).prop({ readonly: true });
                $("#instansi").val(pengunjungData.instansi).prop('readonly', true);
                $('#alamat').val(pengunjungData.alamat).prop('readonly', true);
                $('#email').val(pengunjungData.email).prop('readonly', true);
            } else {
                // Data pengunjung tidak ditemukan
                // Mengosongkan nilai elemen-elemen form dan menghapus atribut readonly
                $('#nama, #instansi, #alamat, #email').val('').prop('readonly', false);
            }
        }
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