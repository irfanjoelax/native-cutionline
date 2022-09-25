<?php

/**
 * Include seluruh library yang digunakan
 */
include '../config/library.php';

/**
 * Variabel untuk menangkap seluruh input dari form login
 * 
 * NOTE: untuk password di proteksi dengan encrypt standar md5()
 */
$username = $_POST['name_user'];
$password = md5($_POST['pass_user']);

/**
 *  VARIABEL QUERY MYSQL 
 * 
 * $query  => untuk menulis script query dari MySQL
 * $exeSQL => untuk menjalankan perintah atau eksekusi query dari variabel $query
 */
$query  = "SELECT * FROM user WHERE name_user='$username' AND pass_user='$password'";
$exeSQL = mysqli_query($conn, $query) or die(mysqli_error($conn));

// Hitung jumlah data yang terambil
$jumlah_data = mysqli_num_rows($exeSQL);

// Fetching (ambil data dari MySQL) kemudian ubah ke bentuk array PHP 
$data = mysqli_fetch_array($exeSQL);

/**
 * Validasi
 * => apakah jumlah data ditemukan (benar-benar berjumlah 1)?
 */
if ($jumlah_data == 1) {
    // JIKA TRUE
    /**
     * VARIABEL SESSION
     * 
     * untuk membuat session dari user yang sedang login
     */
    session_start();
    $_SESSION['id_user']       = $data['id_user'];
    $_SESSION['fullname_user'] = $data['fullname_user'];
    $_SESSION['name_user']     = $data['name_user'];
    $_SESSION['pass_user']     = $data['pass_user'];
    $_SESSION['level_user']    = $data['level_user'];

    // Validasi berdasarkan level user yang Login
    if ($_SESSION['level_user'] == 'admin') {
        header("location: ../dashboard.php?module=admin");
    }

    if ($_SESSION['level_user'] == 'karyawan') {
        header("location: ../dashboard.php?module=karyawan");
    }
} else {
    // JIKA FALSE
    echo alert('User tidak ditemukan atau Data login Anda salah', '../index.php');
}
