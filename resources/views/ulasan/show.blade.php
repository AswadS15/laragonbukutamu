<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Berikan Ulasan Anda</title>

    <style>
        #konten {
        left: 110%;
}

.reaction-image {
        transition: transform 0.3s ease-in-out;
    }

    .selected {
        transform: scale(1.2); /* Besaran perbesaran dapat disesuaikan */
    }
    </style>
</head>
<body class="bg-emerald-500">
    @include('sweetalert::alert')
    <section class="h-screen flex justify-center items-center">
        <div class=" bg-gray-100 rounded-sm md:rounded-xl shadow-md w-[900px]">
            <div class="flex justify-center mt-5">
                <img src="{{ asset('/img/2.png') }}" class="w-[70px] h-[70px] md:h-[100px] md:w-[100px]" alt="Logo BPKHTL">
            </div>
            <h1 class="pt-2 font-Rubik font-semibold text-2xl md:text-4xl text-center">Berikan Ulasan Anda</h1>
            <div class="mt-12">    
                <div class="">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                   Status Ulasan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ulasan as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize"> 
                                        {{ $item->pengunjung->nama }}   
                                    </th>
                                    @if ($item->reaksi != null)
                                    <td class="px-16 py-4">
                                        <span class="text-white p-1 rounded-xl md:text-base text-xs bg-green-500 w-full">Telah Memberi Ulasan</span> 
                                    </td> 
                                    <td class="px-6 py-4">
                                        <button data-modal-target="crud-modal" class="">
                                            Berikan Ulasan
                                        </button>
                                    </td> 
                                    @else
                                    <td class="px-6 py-4">
                                        <span class="text-white p-1 rounded-xl bg-red-500">Belum Memberi Ulasan</span>
                                    </td>  
                                    <td class="px-6 py-2">
                                        {{-- <button href="#" class="font-popins font-normal bg-emerald-500 py-1 px-3 rounded-md text-white hover:bg-emerald-300 hover:ring-4 hover:ring-emerald-400">Masukan</button> --}}
                                        
                                        <button data-id="{{ $item->id }}" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block crud text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm py-1 px-3 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800" type="button">
                                            Berikan Ulasan
                                        </button>

                                          <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                <!-- Modal content -->
                                                <div id="konten" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                            Masukan Ulasan Anda
                                                        </h3>
                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        
                                                        <form class="p-4 md:p-5" action="{{ route('simpan_ulasan', ['id'=>$item->id_pengunjungs]) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" id="id">
                                                            <div class="flex gap-7 justify-center items-center mb-10 mt-5">
                                                                <div>
                                                                    <h1 class="text-emerald-700/70 text-xl font-semibold text-center pb-5">Puas</h1>
                                                                    <label>
                                                                        <input type="radio" name="reaksi" value="puas" style="display: none;">
                                                                        <img width="100px" src="{{ asset('img/suka.gif') }}" alt="Suka" id="sukaImage" class="reaction-image" onclick="selectReaction('puas')">
                                                                    </label>
                                                                </div>
                                                                <div>
                                                                    <h1 class="text-emerald-700/70 text-xl font-semibold text-center pb-5">Kurang Puas</h1>
                                                                    <label>
                                                                        <input type="radio" name="reaksi" value="kurang puas" style="display: none;">
                                                                        <img src="{{ asset('img/tidaksuka.gif') }}" alt="Tidak Suka" width="100px" class="transition-all reaction-image mx-auto" id="tidakSukaImage" onclick="selectReaction('kurang puas')">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        
                                                            <div id="alasanContainer" style="display: none;">
                                                                <fieldset id="cek">
                                                                    <legend class="sr-only">Alasan</legend>
                                                                    <div class="flex items-center mb-4">
                                                                        <input id="country-option-1" type="radio" name="ulasan" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600" value="Pelayanan yang kurang memuaskan">
                                                                        <label for="country-option-1" class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                                            Pelayanan yang kurang memuaskan
                                                                        </label>
                                                                    </div>
                                                                    <div class="flex items-center mb-4">
                                                                        <input id="country-option-2" type="radio" name="ulasan" value=" Pelayanan lambat" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                                                        <label for="country-option-2" class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                                        Pelayanan lambat
                                                                        </label>
                                                                    </div>
        
                                                                    <div class="flex items-center mb-4">
                                                                        <input id="country-option-3" type="radio" name="ulasan" value="Tidak responsif dengan keluhan pengunjung" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                                                        <label for="country-option-3" class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                                        Tidak responsif dengan keluhan pengunjung
                                                                        </label>
                                                                    </div>
        
                                                                    <div class="flex items-center mb-4">
                                                                        <input id="country-option-4" type="radio" name="ulasan" value="Lainnya" class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring:blue-300 dark:focus-ring-blue-600 dark:bg-gray-700 dark:border-gray-600">
                                                                        <label for="country-option-4" class="block ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                                        Lainnya
                                                                        </label>
                                                                    </div>
                                                                    <!-- Sisipkan pilihan alasan lainnya di sini -->
                                                                </fieldset>
                                                            </div>
                                                        
                                                            <div class="flex justify-center">
                                                                <button type="submit" class="block text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-lg py-2 px-5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">OK</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div> 
                                    </td>
                                    @endif                           
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p id="helper-text-explanation" class=" font-popins font-normal my-4 text-sm text-gray-500 text-center dark:text-gray-400">Silahkan Berikan ULASAN bagi kantor BPKHTL-XV agar menjadi <br>lebih baik lagi kedepannya</p>
                </div>
            </div>       
        </div>
    </section>

    <script>
        function selectReaction(reaksi) {
            const sukaImage = document.getElementById('sukaImage');
            const tidakSukaImage = document.getElementById('tidakSukaImage');
            const alasanContainer = document.getElementById('alasanContainer');
            const alasanCheckboxes = document.querySelectorAll('input[name="ulasan"]');
    
            // Hapus kelas 'selected' dari semua gambar
            sukaImage.classList.remove('selected');
            tidakSukaImage.classList.remove('selected');
    
            // Tambahkan kelas 'selected' pada gambar yang dipilih
            const selectedImage = (reaksi === 'puas') ? sukaImage : tidakSukaImage;
            selectedImage.classList.add('selected');
    
            // Centang radio button yang terkait
            const radioInput = document.querySelector(`input[name="reaksi"][value="${reaksi}"]`);
            radioInput.checked = true;
    
            // Tampilkan atau sembunyikan checkbox alasan berdasarkan pilihan 'Tidak Suka'
            alasanContainer.style.display = (reaksi === 'kurang puas') ? 'block' : 'none';
    
            alasanCheckboxes.forEach(checkbox => {
                checkbox.disabled = (reaksi === 'puas');
                checkbox.checked = false; // Pastikan checkbox tidak ada yang terpilih
            });
        }
    
        function submitForm() {
            const reaksiSuka = document.querySelector('input[name="reaksi"][value="puas"]');
            const reaksiTidakSuka = document.querySelector('input[name="reaksi"][value="kurang puas"]');
            const alasanCheckboxes = document.querySelectorAll('input[name="ulasan"]:checked');
    
            if ((!reaksiSuka || !reaksiSuka.checked) && (!reaksiTidakSuka || !reaksiTidakSuka.checked)) {
                alert('Pilih nilai reaksi terlebih dahulu.');
                return false;
            }
    
            if (reaksiTidakSuka && reaksiTidakSuka.checked && alasanCheckboxes.length === 0) {
                alert('Pilih setidaknya satu alasan.');
                return false;
            }
    
            return true;
        }
    </script>

    {{-- <script>
        function selectReaction(reaksi) {
            const sukaImage = document.getElementById('sukaImage');
            const tidakSukaImage = document.getElementById('tidakSukaImage');
            const alasanContainer = document.getElementById('alasanContainer');
            const alasanCheckboxes = document.querySelectorAll('input[name="alasan"]');
        
            // Hapus kelas 'selected' dari semua gambar
            sukaImage.classList.remove('selected');
            tidakSukaImage.classList.remove('selected');
        
            // Tambahkan kelas 'selected' pada gambar yang dipilih
            const selectedImage = (reaksi === 'suka') ? sukaImage : tidakSukaImage;
            selectedImage.classList.add('selected');
        
            // Centang radio button yang terkait
            const radioInput = document.querySelector(`input[name="reaksi"][value="${reaksi}"]`);
            radioInput.checked = true;

             // Tampilkan atau sembunyikan checkbox alasan berdasarkan pilihan 'Tidak Suka'
            alasanContainer.style.display = (reaksi === 'tidak suka') ? 'block' : 'none';

            alasanCheckboxes.forEach(checkbox =>{
                checkbox.disabled = (reaksi === 'suka')
            });
            
        }

       
    </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Ambil tombol "Toggle modal" dengan atribut data
            const toggleModalButton = document.querySelector('[data-modal-toggle="crud-modal"]');
    
            // Ambil modal dengan ID yang sesuai
            const crudModal = document.getElementById('crud-modal');
    
            // Ambil input id pada formulir
            const idInput = document.getElementById('id');
    
            // Tambahkan event listener untuk tombol "Toggle modal"
            if (toggleModalButton && crudModal && idInput) {
                toggleModalButton.addEventListener('click', function () {
                    // Ambil nilai data-id dari tombol "Toggle modal"
                    const dataId = toggleModalButton.getAttribute('data-id');
    
                    // Setel nilai input id dengan nilai data-id
                    idInput.value = dataId;
    
                    // Toggle keterlihatan modal
                    crudModal.classList.toggle('hidden');
                });
            }

        });
    </script>
    
    
    
</body>
</html>