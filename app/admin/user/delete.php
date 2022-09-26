<?php

$id     = $_GET['id'];
$query  = "DELETE FROM user WHERE id_user = '$id'";
$exeSQL = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($exeSQL) {
    echo alert('Data user Anda berhasil di HAPUS', 'dashboard.php?module=user');
}
