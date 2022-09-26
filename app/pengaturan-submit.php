<?php

/**
 * Include seluruh library yang digunakan
 */
include 'config/library.php';

/**
 * Variabel untuk menangkap seluruh input dari form
 */
$iduser   = $_SESSION['id_user'];
$fullname = $_POST['fullname_user'];
$username = $_POST['name_user'];

if ($_POST['pass_user'] == null) {
    $pasword  = $_SESSION['pass_user'];
} else {
    $pasword  = md5($_POST['pass_user']);
}

/**
 *  VARIABEL QUERY MYSQL 
 * 
 * $query  => untuk menulis script query dari MySQL
 * $exeSQL => untuk menjalankan perintah atau eksekusi query dari variabel $query
 */
$query  = "UPDATE user SET fullname_user='$fullname', name_user='$username', pass_user='$pasword' WHERE id_user='$iduser'";
$exeSQL = mysqli_query($conn, $query) or die(mysqli_error($conn));

if ($exeSQL) {

    // Ambil data yang telah dirubah
    $queryData  = "SELECT * FROM user WHERE id_user='$iduser' LIMIT 1";
    $exeSQLData = mysqli_query($conn, $queryData) or die(mysqli_error($conn));
    $data       = mysqli_fetch_array($exeSQLData);

    /**
     * VARIABEL SESSION
     * 
     * untuk membuat session dari user yang sedang login
     */
    $_SESSION['id_user']       = $data['id_user'];
    $_SESSION['fullname_user'] = $data['fullname_user'];
    $_SESSION['name_user']     = $data['name_user'];
    $_SESSION['pass_user']     = $data['pass_user'];
    $_SESSION['level_user']    = $data['level_user'];

    echo alert('Pengaturan user Anda BERHASIL diperbarui', 'dashboard.php?module=pengaturan');
} else {
    // JIKA FALSE
    echo alert('Pengaturan user Anda GAGAL diperbarui', 'dashboard.php?module=pengaturan');
}
