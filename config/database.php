<?php

/**
 * Konfigurasi username, password dan nama database pada phpMyAdmin (MySQL)
 */
// $host     = 'localhost';
// $username = 'root';
// $password = '';
// $db       = 'native_cutionline';

/**
 * SETUP UNTUK PRODUCTION
 */
$host     = 'localhost';
$username = 'buan1824_mirfanpermana';
$password = 'irfan020412';
$db       = 'buan1824_nativecutionline';

/**
 * Menjalankan perintah untuk koneksi PHP dengan MySQL
 */
$conn = mysqli_connect($host, $username, $password, $db);

/**
 * Lakukan cek jika proses koneksi tidak berhasil dan tampilkan pesan gagal
 */
if (!$conn) {
    echo 'koneksi tidak berhasil';
}
