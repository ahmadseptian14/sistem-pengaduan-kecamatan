@extends('layouts.admin')

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Grafik Status Pengaduan</h2>
        </div>
        {{-- <div class="dashboard-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Grafik Status Pengaduan
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>

{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('pieChart');
    const pieChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Belum di Proses', 'Sedang di Proses', 'Selesai'],
            datasets: [{
                label: '# of Votes',
                data: [{{$belumDiProses}}, {{$sedangDiProses}}, {{$selesai}}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    // 'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    // 'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
    });
    </script> --}}

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Element", "Jumlah", { role: "style" } ],
          ["Belum di Proses", {{$belumDiProses}}, "#b87333"],
          ["Sedang di Proses", {{$sedangDiProses}}, "silver"],
          ["Selesai", {{$selesai}}, "gold"],
        //   ["Platinum", 21.45, "color: #e5e4e2"]
        ]);
  
        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                         { calc: "stringify",
                           sourceColumn: 1,
                           type: "string",
                           role: "annotation" },
                         2]);
  
        var options = {
          title: "Grafik Status Pengaduan",
          width: 600,
          height: 400,
          bar: {groupWidth: "95%"},
          legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
    }
    </script>
  <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
@endsection
