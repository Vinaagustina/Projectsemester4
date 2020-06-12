<?php
error_reporting(0);
?>
<?php
$koneksi  = mysqli_connect("localhost", "root", "", "pos_free_v1");
$nmbrg   = mysqli_query($koneksi, "SELECT nmbrg FROM barang order by total_terjual desc");
$total_terjual   = mysqli_query($koneksi, "SELECT total_terjual FROM barang order by total_terjual desc");

// $stok   = mysqli_query($koneksi, "SELECT (stock-total_terjual) FROM barang order by id asc");
// $namabrg   = mysqli_query($koneksi, "SELECT nmbrg FROM barang order by id asc");

// $tgl_order  = mysqli_query($koneksi, "SELECT tgl_order FROM order_detail order by tgl_order asc");
// $jumlah     = mysqli_query($koneksi, "SELECT ((oder_detail.jumlah)*(barang.harga)) FROM orders_detail JOIN barang ON orders_detail.product_id = barang.id order by orders_detail.tgl_order asc");
?>

<div class="wrapper">
    <div class="row states-info">
        <a href="index.php?hal=transaksi_langsung" style="color: #fff;">
            <div class="col-md-3">
                <div class="panel red-bg">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-tag"></i>
                            </div>
                            <div class="col-xs-8">
                                <span class="state-title">Tansaksi</span>
                                <h4> Langsung</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="index.php?hal=transaksi_telpon" style="color: #fff;">
            <div class="col-md-3">
                <div class="panel blue-bg">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-tag"></i>
                            </div>
                            <div class="col-xs-8">
                                <span class="state-title"> Transaksi </span>
                                <h4> Via Telepon</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="?hal=master/barang/list" style="color: #fff;">
            <div class="col-md-3">
                <div class="panel green-bg">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-briefcase"></i>
                            </div>
                            <div class="col-xs-8">
                                <span class="state-title">Data  Barang  </span>
                                <h4>Barang</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>

    <div class="row">
        <div class="col-sm-6">
            <div class="panel">
                <header class="panel-heading">Grafik Produk Terlaris</header>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="terlaris" height="150px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- </body>
</html> -->
<script src="chartjs/js/Chart.js"></script>
<script  type="text/javascript">
// grafik produk terlaris
    var ctx = document.getElementById("terlaris").getContext("2d");
    var data = {
            labels: [<?php while ($p = mysqli_fetch_array($nmbrg)) { echo '"' . $p['nmbrg'] . '",';}?>],
            datasets: [
                {
              label: "Total Penjualan",
              data: [<?php while ($p = mysqli_fetch_array($total_terjual)) { echo '"' . $p['total_terjual'] . '",';}?>],
              backgroundColor: [
                '#20B2AA', //light sea green
                '#FFA07A', //ligt salmon
                '#F0E68C', //khaki
                '#CD5C5C', //indian red
                '#FFB6C1', //light pink
                // '#90EE90', //light green
                // '#B0C4DE' //light steel blue
              ]
            }
            ]
            };

            var myBarChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
            legend: {
              display: false
            },
            // barValueSpacing: 20,
            // scales: {
            //   yAxes: [{
            //       ticks: {
            //           min: 0,
            //       }
            //   }],
            //   xAxes: [{
            //               gridLines: {
            //                   color: "rgb(0, 0, 0)",
            //               }
            //           }]
            //   }
          }
        });

//grafik penjualan
//     var ctx = document.getElementById("penjualan").getContext("2d");
//     var data = {
//             labels: [<?php while ($p = mysqli_fetch_array($tgl_order)) { echo '"' . $p['tgl_order'] . '",';}?>],
//             datasets: [
//                 {
//               label: "Total Transaksi",
//               data: [
                
//               backgroundColor: [
//                 '#FFB6C1', //light pink
//                 '#90EE90', //light green
//                 '#FFA07A', //ligt salmon
//                 '#B0C4DE', //light steel blue
//                 '#F0E68C', //khaki
//                 '#CD5C5C' //indian red
//               ]
//             }
//             ]
//             };

//   var myBarChart = new Chart(ctx, {
//             type: 'bar',
//             data: data,
//             options: {
//             legend: {
//               display: false
//             },
//             barValueSpacing: 20,
//             scales: {
//               yAxes: [{
//                   ticks: {
//                       min: 0,
//                   }
//               }],
//               xAxes: [{
//                           gridLines: {
//                               color: "rgb(0, 0, 0)",
//                           }
//                       }]
//               }
//           }
//         });
</script>