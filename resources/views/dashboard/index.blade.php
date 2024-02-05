@extends('componen.app')
@section('isi')
  <div class="h-screen sm:ml-64 bg-white  overflow-auto py-5 pt-16">
    <div class=" flex p-4 justify-between  text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
      <h1 class="">Dashboard</h1>
      <div class="flex">
          <a href="#" class="bg-red-500 py-1 px-2 text-sm me-4 text-white rounded-md">Export Pdf</a>
      </div>
    </div>
     <div class="p-4  rounded-lg dark:border-gray-700 ">
        <div class="relative  sm:rounded-lg mt-10">
           <div class="grid xl:grid-cols-2 sm:grid-cols-1  gap-4 pt-6">
              <div class="col-span-1 shadow-md border rounded-lg">
                <div>
                  <h1 class="md:text-xl xl:text-2xl text-center text-gray-400 font-bold px-3 py-6">Total Pengunjung Keseluruhan</h1>
                </div>
                <div class="pb-3">
                  <canvas id="donutChart"></canvas>
                </div>
              </div>
              <div class="col-span-1 shadow-md border rounded-lg">
                <div>
                  <h1 class="md:text-xl xl:text-2xl text-center text-gray-400 font-bold px-3 py-6">Data Pengunjung Berdasarkan Divisi</h1>
                </div>
                <div>
                  <canvas id="myChart"></canvas>
                </div>
              </div>
           </div>

           <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 pt-6">
              <div class="col-span-1 shadow-md border rounded-lg">
                <div>
                  <h1 class="md:text-xl xl:text-2xl text-center text-gray-400 font-bold px-3 py-6">Data Pengunjung Berdasarkan Hari, Bulan,dan Tahun</h1>
                </div>
                <div>
                  <canvas id="myLineChart"></canvas>
                </div>
              </div>
              <div class="col-span-1 shadow-md border rounded-lg">
                
              </div>
           </div>
        </div>
     </div>
  </div>

  
@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/chartjs-to-image"></script> --}}

<script>
    // Get the canvas element
    var ctx = document.getElementById('myChart');
  
    // Define your data
    var data = {
      labels: ['Tata Usaha', 'ISDHTL', 'PKH'],
      datasets: [{
        label: 'Bar Grafik',
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)',
      
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
        ],
        borderWidth: 1,
        data: [{{ $tatausaha }}, {{ $isdhtl }}, {{ $pkh }}],
      }]
    };
  
    // Configure the options
    var options = {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    };
  
    // Create the chart
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: data,
      options: options
    });

    // total divisi

    // Data
    var data = {
      labels: ['TOTAL'],
      datasets: [{
        data: [{{ $T }}], // Gantilah ini dengan data sesuai kebutuhan
        backgroundColor: [
          'rgba(255, 99, 132, 0.7)',
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
        ],
        borderWidth: 1
      }]
    };

    // Konfigurasi
    var options = {
      responsive: true,
      maintainAspectRatio: false, // Menjaga aspek rasio chart
      plugins: {
        legend: {
          position: 'bottom'
          
        },
        title: {
          display: true,
          text: 'Doughnut Grafik',
        }
      }
    };

    // Membuat doughnut chart
    var ctx1 = document.getElementById('donutChart').getContext('2d');
    var myDoughnutChart = new Chart(ctx1, {
      type: 'doughnut',
      data: data,
      options: options
    });




  //   TOTAL BULANAN TAHUNAN HARIAN

  // Data
  var data = {
      labels: ['2023-12-01', '2023-12-02', '2023-12-03', '2023-12-04', '2023-12-05'],
      datasets: [{
        label: 'Total Pengunjung',
        data: [50, 70, 30, 90, 60], // Gantilah ini dengan data sesuai kebutuhan
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 2,
        fill: false
      }]
    };

    // Konfigurasi


   
</script>

<script>
  // Data untuk chart
  var data = {
      labels: ["Hari", "Bulan", "Tahun"],
      datasets: [{
          label: "Line Grafik",
          borderColor: "rgb(75, 192, 192)",
          data: [{{ $hari1 }}, {{ $hari3 }}, {{ $totalTahunan }}],
          fill: false,
      }]
  };

  // Konfigurasi chart
  var config = {
      type: 'line',
      data: data,
  };

  // Mendapatkan elemen canvas
  var ctx = document.getElementById('myLineChart').getContext('2d');

  // Membuat chart baru
  var myLineChart = new Chart(ctx, config);
</script>

 
 

@endsection