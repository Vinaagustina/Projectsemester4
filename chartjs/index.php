<?php
$koneksi  = mysqli_connect("localhost", "root", "", "pos_free_v1");
$kdbrg   = mysqli_query($koneksi, "SELECT kdbrg FROM barang order by id asc");
$total_terjual   = mysqli_query($koneksi, "SELECT total_terjual FROM barang order by id asc");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Grafik Penjualan</title>
    <script src="js/Chart.js"></script>
    <style type="text/css">
            .container {
                width: 40%;
                margin: 15px auto;
            }
    </style>
  </head>
  <body>
  <h1>Grafik Penjualan</h1>
    <div class="container">
        <canvas id="barchart" width="100" height="100"></canvas>
    </div>

  </body>
</html>

<script  type="text/javascript">
  var ctx = document.getElementById("barchart").getContext("2d");
  var data = {
            labels: [<?php while ($p = mysqli_fetch_array($kdbrg)) { echo '"' . $p['kdbrg'] . '",';}?>],
            datasets: [
            {
              label: "Penjualan Barang",
              data: [<?php while ($p = mysqli_fetch_array($total_terjual)) { echo '"' . $p['total_terjual'] . '",';}?>],
              backgroundColor: [
                '#FFB6C1', //light pink
                '#90EE90', //light green
                '#FFA07A', //ligt salmon
                '#B0C4DE', //light steel blue
                '#F0E68C', //khaki
                '#CD5C5C' //indian red
              ]
            }
            ]
            };

  var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
            legend: {
              display: false
            },
            barValueSpacing: 20,
            scales: {
              yAxes: [{
                  ticks: {
                      min: 0,
                  }
              }],
              xAxes: [{
                          gridLines: {
                              color: "rgb(0, 0, 0)",
                          }
                      }]
              }
          }
        });
</script>