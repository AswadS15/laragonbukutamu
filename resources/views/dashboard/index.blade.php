@extends('componen.app')
@section('titel')
    Dashboard
@endsection
@section('isi')
  <div class="h-screen sm:ml-64 bg-white py-5 pt-16 font-popins">
    <div class=" flex p-4 justify-between  text-2xl text-emerald-700 font-bold bg-white  fixed z-10 top-16 w-full border-b">
      <h1 class="">Dashboard</h1>
      <div class="grid grid-cols-1 gap-2 md:me-64">
        <a href="{{ route('downloadReport') }}" class="bg-red-500 py-1 px-2 xl:text-sm text-[10px]  text-white rounded-md">Export Pdf</a>
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

           <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 pt-6">
                <div class="col-span-2 shadow-md border rounded-lg">
                      <div>
                        <h1 class="md:text-xl xl:text-2xl text-center text-gray-400 font-bold px-3 py-6">Data Pengunjung Berdasarkan Hari, Bulan,dan Tahun</h1>
                      </div>
                      <div>
                        <canvas id="myLineChart"></canvas>
                      </div>
                </div>
                <div class="col-span-1 shadow-md border rounded-lg relative px-2 ">
                      <h1 class="md:text-xl xl:text-2xl text-center text-gray-400 font-bold px-3 py-6">Ulasan</h1>
                      <div class="w-full bg-gray-50 h-[285px] border rounded-md px-2 overflow-y-auto">
                        @foreach ($ulasan as $item)
                          @if ($item->reaksi)
                          
                            <div class="flex py-3 border-b gap-3 p-3">
                              @if ($item->reaksi == 'kurang puas')
                                <img class="w-10 h-10 " src="{{ asset('img/tidaksuka.gif') }}" alt="kurang puas">
                              @endif
                              @if ($item->reaksi == 'puas')
                                <img class="w-10 h-10   " src="{{ asset('img/suka.gif') }}" alt="puas">
                              @endif
                                <div>
                                  <h1 class="font-bold text-base text-black/70 capitalize">{{$item->pengunjung->nama}}</h1>
                                  <p class="text-sm text-black/80">{{$item->ulasan}}</p>
                                </div>
                            </div>
                          @endif
                        @endforeach
                      </div>
                      <div class="flex justify-between px-1">
                        <div class="text-xs font-semibold pt-1 text-black/70">
                          <tr>
                            <td>TOTAL</td>
                            <td>:</td>
                            <td>{{$totalUlasan}}</td>
                          </tr>
                        </div>
                        <div class="text-xs font-semibold pt-1 text-black/70 flex-row gap-2">
                          <div>
                            <tr>
                              <td>Puas</td>
                              <td>:</td>
                              <td>{{$puas}}</td>
                            </tr>
                          </div>
                          <div>
                            <tr>
                              <td>Kurang Puas</td>
                              <td>:</td>
                              <td>{{$kurangPuas}}</td>
                            </tr>
                          </div>
                        </div>
                      </div>
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
      labels: ['Pimpinan','Tata Usaha', 'ISDHTL', 'PKH'],
      datasets: [{
        label: 'Bar Grafik',
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 255, 102, 0.2)'
      
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
          'rgba(255, 255, 102)',
        ],
        borderWidth: 1,
        data: [{{$pimpinan}}, {{ $tatausaha }}, {{ $isdhtl }}, {{ $pkh }}],
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
      options: {
          scales: {
              y: {
                  ticks: {
                    stepSize: 1,
                      beginAtZero: true, // Mulai dari 0
                      callback: function(value, index, values) {
                          return Math.floor(value).toLocaleString(); // Menggunakan Math.floor untuk memastikan bilangan bulat
                      }
                  }
              }
          },
          plugins: {
              datalabels: {
                  anchor: 'end',
                  align: 'end',
              }
          }
      }
  };

  // Mendapatkan elemen canvas
  var ctx = document.getElementById('myLineChart').getContext('2d');

  // Membuat chart baru
  var myLineChart = new Chart(ctx, config);
</script>

 
 

@endsection