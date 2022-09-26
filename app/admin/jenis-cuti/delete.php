<?php

$id     = $_GET['id'];
$query  = "DELETE FROM jenis_cuti WHERE id_cuti = '$id'";
$exeSQL = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($exeSQL) {
    echo alert('Data jenis cuti Anda berhasil di HAPUS', 'dashboard.php?module=jenis-cuti');
}
