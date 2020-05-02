<?php

$sql = $koneksi->query("select * from tb_anggota");

while ($tampil = $sql->fetch_assoc()) {
    $jumlahanggota = $sql->num_rows;
};

$sql1 = $koneksi->query("select * from tb_anggota where expired = 0");
while ($tampil1 = $sql1->fetch_assoc()) {
    $jumlahexpired = $sql1->num_rows;
};


$total = 0;

$sql = $koneksi->query("select * from tb_tranggota");

while ($data = $sql->fetch_assoc()) {

    $total += $data['total'];
};

//    $sql2 = $koneksi->query("select * from tb_barang");
//    while ($tampil2 = $sql2->fetch_assoc()){
//     $jumlahbarang = $sql2->num_rows;
//    };

//  Chart Label and query transaksi anggota

$label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

for ($bulan = 1; $bulan < 13; $bulan++) {
    $query = mysqli_query($koneksi, "select sum(total) as total from tb_tranggota where MONTH(tgl_bayar)='$bulan'");
    $chart = $query->fetch_array();
    $jumlah_penjualan[] = $chart['total'];
}

// Chart Label and query transaksi barang

$label1 = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

for ($bulan1 = 1; $bulan1 < 13; $bulan1++) {
    $query1 = mysqli_query($koneksi, "select sum(total_belanja) as total_belanja from tb_trbarang where MONTH(tanggal_belanja)='$bulan1'");
    $chart1 = $query1->fetch_array();
    $jumlah_penjualan1[] = $chart1['total_belanja'];
}



?>
<marquee>Selamat Datang Di Aplikasi Keanggotaan Emperium Gym</marquee>





<!-- /. ROW  -->
<hr />
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-red set-icon">
                <i class="fa fa-user"></i>
            </span>
            <div class="text-box">
                <p class="main-text"><a href="index.php?page=anggota">Anggota</a></p>
                <p class="text-muted"><?php echo $jumlahanggota; ?></p>

            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue set-icon">
                <i class="fa fa-bell-o"></i>
            </span>
            <div class="text-box">
                <p class="main-text"><a href="index.php?page=anggota_expired">Expired</a></p>
                <p class="text-muted"><?php echo $jumlahexpired ?></p>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-brown set-icon">
                <i class="fa fa-money"></i>
            </span>
            <div class="text-box">
                <p class="main-text">Pedapatan Gym Anggota</p>
                <p class="text-muted"><?php echo $total ?></p>
            </div>
        </div>

    </div> -->

    <script src="assets/js/Chart.js"></script>
    <!-- chart transaksi anggota -->
    <div class="col-md-6 col-sm-6 col-xs-6">
        <canvas id="myChart"></canvas>
    </div>


    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($label); ?>,
                datasets: [{
                    label: 'Grafik Transaksi Anggota',
                    data: <?php echo json_encode($jumlah_penjualan); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

    <!-- chart transaksi barang -->
    <div class="col-md-6 col-sm-6 col-xs-6">
        <canvas id="myChart1"></canvas>
    </div>


    <script>
        var ctx = document.getElementById("myChart1").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($label1); ?>,
                datasets: [{
                    label: 'Grafik Transaksi Barang',
                    data: <?php echo json_encode($jumlah_penjualan1); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</div>