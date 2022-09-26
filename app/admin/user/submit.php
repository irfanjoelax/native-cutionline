<?php

$fullname = $_POST['fullname_user'];
$username = str_replace(' ', '-', strtolower($_POST['fullname_user']));
$password = md5('123456');
$level    = $_POST['level_user'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query   = "UPDATE supplier SET 
                    fullname_user = '$fullname',
                    name_user     = '$username',
                    level_user    = '$level'
                WHERE id_user     = '$id'
                ";
} else {
    $query   = "INSERT INTO user SET 
                    fullname_user = '$fullname',
                    name_user     = '$username',
                    pass_user     = '$password',
                    level_user    = '$level'
                ";
}

$exeSQL = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($exeSQL) {
    if (isset($_GET['id'])) {
        echo alert('Data user Anda berhasil di UBAH', 'dashboard.php?module=user');
    } else {
        echo alert('Data user Anda berhasil di TAMBAHKAN', 'dashboard.php?module=user');
    }
}
