<div class="row mb-4">
    <div class="col-12">
        <h1 class="mt-4">Dashboard</h1>
        <h6 class="text-muted">Ringkasan dan grafik dari data yang dimiliki</h6>
    </div>
</div>

<!-- WIDGET PANEL -->
<?php
$qPengajuan = mysqli_query($conn, 'SELECT * FROM pengajuan_cuti') or die(mysqli_error($conn));
$jmlPengajuan = mysqli_num_rows($qPengajuan);

$qUser = mysqli_query($conn, 'SELECT * FROM user') or die(mysqli_error($conn));
$jmlUser = mysqli_num_rows($qUser);

$qJenis = mysqli_query($conn, 'SELECT * FROM jenis_cuti') or die(mysqli_error($conn));
$jmlJenis = mysqli_num_rows($qJenis);
?>
<div class="row mb-4">
    <div class="col-xl-4 col-md-6">
        <div class="card bg-dark text-white mb-4">
            <div class="card-body">
                <h1><?= $jmlPengajuan ?> Data</h1>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?module=daftar-cuti">Pengajuan Cuti</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body">
                <h1><?= $jmlUser ?> Data</h1>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?module=user">Daftar User</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card bg-secondary text-white mb-4">
            <div class="card-body">
                <h1><?= $jmlJenis ?> Data</h1>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="?module=jenis-cuti">Jenis Cuti</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-12 mb-4">
        <div class="card shadow p-3">
            <h6 class="text-center fw-bold mb-4">
                Grafik Berdasarkan User
            </h6>
            <canvas id="PieChart" width="100%" height="40"></canvas>
        </div>
    </div>
    <div class="col-md-6 col-12 mb-4">
        <div class="card shadow p-3">
            <h6 class="text-center fw-bold mb-4">
                Grafik Berdasarkan Jenis Cuti
            </h6>
            <canvas id="BarChart" width="100%" height="40"></canvas>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card shadow p-3">
            <h6 class="text-center fw-bold mb-4">
                Grafik Pengajuan Cuti Berdasarkan Status
            </h6>
            <canvas id="LineChart" width="100%" height="40"></canvas>
        </div>
    </div>
</div>