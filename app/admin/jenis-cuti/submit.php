<?php

$nama_cuti = $_POST['nama_cuti'];
$durasi    = $_POST['durasi'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query   = "UPDATE jenis_cuti SET 
                    nama_cuti = '$nama_cuti',
                    durasi     = '$durasi'
                WHERE id_cuti     = '$id'
                ";
} else {
    $query   = "INSERT INTO jenis_cuti SET 
                    nama_cuti = '$nama_cuti',
                    durasi     = '$durasi'
                ";
}

$exeSQL = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($exeSQL) {
    if (isset($_GET['id'])) {
        echo alert('Data jenis cuti Anda berhasil di UBAH', 'dashboard.php?module=jenis-cuti');
    } else {
        echo alert('Data jenis cuti Anda berhasil di TAMBAHKAN', 'dashboard.php?module=jenis-cuti');
    }
}
