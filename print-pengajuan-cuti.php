<?php
include 'config/library.php';
include 'config/middleware.php';

$id_ajuan = $_GET['id'];
$query    = "SELECT * FROM pengajuan_cuti JOIN user ON pengajuan_cuti.user_id=user.id_user JOIN jenis_cuti ON pengajuan_cuti.jenis_id=jenis_cuti.id_cuti WHERE pengajuan_cuti.id_ajuan= '$id_ajuan'";
$exeSQL   = mysqli_query($conn, $query) or die(mysqli_error($conn));
$data     = mysqli_fetch_array($exeSQL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <!-- Styles -->
    <link rel="shortcut icon" href="asset/img/logo.svg" type="image/x-icon">
    <link href="asset/css/styles.css" rel="stylesheet" />
</head>

<body>
    <div id="surat" class="px-4 py-3">
        <!-- HEADING/KOP SURAT -->
        <table width="100%">
            <tr>
                <td width="15%" class=" text-center">
                    <img src="asset/img/logo.svg" width="80">
                </td>
                <td width="5%"></td>
                <td width="80%" class="text-center">
                    <h2 class="fw-bolder"><?= $kopSurat['title'] ?></h2>
                    <h6><?= $kopSurat['address'] ?></h6>
                    <small><?= $kopSurat['contact'] ?></small>
                </td>
            </tr>
        </table>
        <div class="mb-5 mt-2" style="height: 5px; background: black;"></div>

        <!-- BODY SURAT -->
        <p> Yang bertanda tangan dibawah ini menyatakan bahwa:</p>

        <table class="table table-bordered">
            <tr>
                <td width="22%"><strong>Nama Lengkap</strong></td>
                <td width="3%" class="text-center">:</td>
                <td width="75%" colspan="4"><?= $data['fullname_user']; ?></td>
            </tr>
            <tr>
                <td width="22%"><strong>Username</strong></td>
                <td width="3%" class="text-center">:</td>
                <td width="75%" colspan="4"><?= $data['name_user']; ?></td>
            </tr>
            <tr>
                <td width="22%"><strong>Jenis Cuti</strong></td>
                <td width="3%" class="text-center">:</td>
                <td width="25%"><?= $data['nama_cuti']; ?></td>
                <td width="22%"><strong>Durasi Cuti</strong></td>
                <td width="3%" class="text-center">:</td>
                <td width="25%"><strong><?= $data['lama_ajuan']; ?></strong> hari</td>
            </tr>
            <tr>
                <td width="22%"><strong>Tgl. Pengajuan</strong></td>
                <td width="3%" class="text-center">:</td>
                <td width="75%" colspan="4"><?= tanggal($data['tgl_ajuan']); ?></td>
            </tr>
            <tr>
                <td width="22%"><strong>Tgl. Awal</strong></td>
                <td width="3%" class="text-center">:</td>
                <td width="25%"><?= tanggal($data['tgl_awal']); ?></td>
                <td width="22%"><strong>Tgl. Akhir</strong></td>
                <td width="3%" class="text-center">:</td>
                <td width="25%"><?= tanggal($data['tgl_akhir']); ?></td>
            </tr>
            <tr>
                <td width="22%"><strong>Keperluan</strong></td>
                <td width="3%" class="text-center">:</td>
                <td width="75%" colspan="4"><?= $data['keperluan']; ?></td>
            </tr>
        </table>
        <p style="text-align: justify;">
            Telah mengajukan cuti dengan jenis dan durasi cuti yang telah ditentukan. Maka bersamaan dengan ini dinyatakan bahwa pengajuan cuti saudara telah <strong><?= $data['status']; ?></strong>.
        </p>
        <p style="text-align: justify;">
            Demikian surat keterangan ini diterbitkan agar dapat dipergunakan dengan sebagaimana mestinya.
        </p>

        <!-- SIGNATURE -->
        <div class="mt-4">
            <span><?= $kopSurat['kota'] ?>, <?= tanggal(date('Y-m-d')) ?></span> <br>
            <span><?= $kopSurat['jabatan'] ?>,</span><br>
            <strong class="mt-5 d-block"><?= $kopSurat['pejabat'] ?></strong>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>

</html>