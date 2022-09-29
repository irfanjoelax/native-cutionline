<?php
include 'config/library.php';
include 'config/middleware.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title><?= $title ?></title>

    <!-- Styles -->
    <link rel="shortcut icon" href="asset/img/logo.svg" type="image/x-icon">
    <link href="asset/css/styles.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="#"><?= $title ?></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                    <span class="ml-2"><?= $_SESSION['fullname_user'] ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="?module=pengaturan">Pengaturan</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="app/logout.php" onclick="return confirm('Apakah yakin keluar dari Aplikasi?')">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <?php
                        if ($_SESSION['level_user'] == 'admin') {
                            include 'nav-admin.php';
                        }

                        if ($_SESSION['level_user'] == 'karyawan') {
                            include 'nav-karyawan.php';
                        }
                        ?>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?= ucfirst($_SESSION['level_user']); ?>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <?php include 'content.php'; ?>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-center small">
                        <div class="text-muted">Copyright &copy; <strong><?= $title ?></strong> <?= date('Y') ?></div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="asset/js/scripts.js"></script>
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable();
        });
    </script>

    <script>
        <?php
        $qUserKaryawan = mysqli_query($conn, "SELECT * FROM user WHERE level_user='karyawan'") or die(mysqli_error($conn));
        $jmlUserKaryawan = mysqli_num_rows($qUserKaryawan);

        $qUserAdmin = mysqli_query($conn, "SELECT * FROM user WHERE level_user='admin'") or die(mysqli_error($conn));
        $jmlUserAdmin = mysqli_num_rows($qUserAdmin);
        ?>

        // Pie Chart Example
        var ctx = document.getElementById("PieChart");
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Karyawan", "Administrator"],
                datasets: [{
                    data: [<?= $jmlUserKaryawan ?>, <?= $jmlUserAdmin ?>],
                    backgroundColor: ['#007bff', '#dc3545'],
                }],
            },
        });
    </script>
    <script>
        <?php
        include 'config/library.php';
        $qJenis = mysqli_query($conn, "SELECT * FROM jenis_cuti") or die(mysqli_error($conn));

        while ($data = mysqli_fetch_array($qJenis)) {
            $label[] = $data['nama_cuti'];
            $durasi[] = $data['durasi'];
        }
        ?>
        // Bar Chart Example
        var ctx = document.getElementById("BarChart");
        var myLineChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($label) ?>,
                datasets: [{
                    label: "Total",
                    backgroundColor: "rgba(2,117,216,1)",
                    borderColor: "rgba(2,117,216,1)",
                    data: <?= json_encode($durasi) ?>,
                }],
            },
            options: {
                legend: {
                    display: false
                }
            }
        });
    </script>
    <script>
        <?php
        $qPengajuan = mysqli_query($conn, "SELECT * FROM pengajuan_cuti WHERE status='Pengajuan'") or die(mysqli_error($conn));
        $jmlPengajuan = mysqli_num_rows($qPengajuan);

        $qVerifikasi = mysqli_query($conn, "SELECT * FROM pengajuan_cuti WHERE status='Verifikasi'") or die(mysqli_error($conn));
        $jmlVerifikasi = mysqli_num_rows($qVerifikasi);

        $qDiterima = mysqli_query($conn, "SELECT * FROM pengajuan_cuti WHERE status='Diterima'") or die(mysqli_error($conn));
        $jmlDiterima = mysqli_num_rows($qDiterima);

        $qDitolak = mysqli_query($conn, "SELECT * FROM pengajuan_cuti WHERE status='Ditolak'") or die(mysqli_error($conn));
        $jmlDitolak = mysqli_num_rows($qDitolak);
        ?>

        // Line Chart Example
        var ctx = document.getElementById("LineChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Pengajuan", "Verifikasi", "Diterima", "Ditolak"],
                datasets: [{
                    label: "Total",
                    backgroundColor: "rgba(2,117,216,1)",
                    borderColor: "rgba(2,117,216,1)",
                    data: [
                        <?= $jmlPengajuan ?>,
                        <?= $jmlVerifikasi ?>,
                        <?= $jmlDiterima ?>,
                        <?= $jmlDitolak ?>
                    ],
                }],
            },
            options: {
                legend: {
                    display: false
                }
            }
        });
    </script>
</body>

</html>