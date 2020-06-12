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
<!-- <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Grafik Penjualan</title>
    <script src="chartjs/js/Chart.js"></script>
    <style type="text/css">
        .container {
            width: 30%;
            margin: 10px auto;
        }
    </style>
  </head>
  <body> -->
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
<<<<<<< HEAD
        </a>
        <!-- <a href="?hal=coming" style="color: #fff;">
=======
        </a><!--
        <a href="?hal=coming" style="color: #fff;">
>>>>>>> 04f442589363d056e30d9543d1709312a7b11e21
            <div class="col-md-3">
                <div class="panel yellow-bg">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-bar-chart-o"></i>
                            </div>
                            <div class="col-xs-8">
                                <span class="state-title">Laporan  </span>
                                <h4>Laporan</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </a> -->

    <div class="row">
        <!-- <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    TRANSAKSI DAY : <span style="color:#FF6600;"><?php echo date('d F Y'); ?></span>
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                    </span>
                </header>
                <div class="panel-body">
                    <div id="graph-area1"></div>
                    <script>
                        var transDayStat = [{period: '1.00', Rp: 5155, Transaksi: '1'}, {
                            period: '2.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '3.00', Rp: 0, Transaksi: '0'}, {
                            period: '4.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '5.00', Rp: 0, Transaksi: '0'}, {
                            period: '6.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '7.00', Rp: 22097, Transaksi: '3'}, {
                            period: '8.00',
                            Rp: 77806,
                            Transaksi: '5'
                        }, {period: '9.00', Rp: 98711, Transaksi: '4'}, {
                            period: '10.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '11.00', Rp: 134765, Transaksi: '4'}, {
                            period: '12.00',
                            Rp: 97300,
                            Transaksi: '1'
                        }, {period: '13.00', Rp: 0, Transaksi: '0'}, {
                            period: '14.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '15.00', Rp: 0, Transaksi: '0'}, {
                            period: '16.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '17.00', Rp: 0, Transaksi: '0'}, {
                            period: '18.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '19.00', Rp: 0, Transaksi: '0'}, {
                            period: '20.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '21.00', Rp: 0, Transaksi: '0'}, {
                            period: '22.00',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '23.00', Rp: 0, Transaksi: '0'}, {period: '24.00', Rp: 0, Transaksi: '0'}];
                    </script>
            </div>
        </section>
        </div> -->
        <!-- <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    TRANSAKSI MONTH : <span style="color:#FF6600;"><?php echo date('F Y'); ?></span>
                    <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                    </span>
                </header>
                <div class="panel-body">
                    <div id="graph-area2"></div>

                    <script>
                        var transMonthStat = [{
                            period: '2017-05-01',
                            Rp: 435834,
                            Transaksi: '18'
                        }, {period: '2017-05-02', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-03',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-04', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-05',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-06', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-07',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-08', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-09',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-10', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-11',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-12', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-13',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-14', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-15',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-16', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-17',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-18', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-19',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-20', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-21',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-22', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-23',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-24', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-25',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-26', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-27',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-28', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-29',
                            Rp: 0,
                            Transaksi: '0'
                        }, {period: '2017-05-30', Rp: 0, Transaksi: '0'}, {
                            period: '2017-05-31',
                            Rp: 0,
                            Transaksi: '0'
                        }];
                    </script>


                    <script>

                    </script>
                </div>
            </section>
        </div> -->
    <!-- <div class="col-12">
        <h3 style="color:Black">Grafik</h3>
    </div> -->
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
        <!-- <div class="col-sm-6">
            <div class="panel">
                <header class="panel-heading">Stok Barang</header>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="stok" height="150px"></canvas>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <div class="col-sm-6">
            <div class="panel">
                <header class="panel-heading">Penjualan Bulan Ini</header>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="penjualan" style="min-height: 250px; height: 450px; max-height: 450px; max-width: 100%"></canvas>
                    </div>
                </div>
            </div>
        </div> -->
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
    
//stok barang
    var ctx = document.getElementById("stok").getContext("2d");
    var data = {
            labels: [<?php while ($s = mysqli_fetch_array($namabrg)) { echo '"' . $s['namabrg'] . '",';}?>],
            datasets: [
                {
              label: "Stok Barang",
              data: [<?php while ($s = mysqli_fetch_array($stok)) { echo '"' . $s['stok'] . '",';}?>],
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
//                 <?php while ($p = mysqli_fetch_array($jumlah)) {echo '"' . $p['jumlah'] . '",';}?>},
//                 //         $sub_total = $data['harga'] * $data['jumlah'];
//                 //         $total += $sub_total;})
//                 // {echo '"'.$p['total'].'",';}?>],
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