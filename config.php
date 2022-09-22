<?php

$host     = 'localhost';
$username = 'root';
$password = '';
$db       = 'native_cutinoline';

$conn = mysqli_connect($host, $username, $password, $db);

if ($conn) {
    echo 'koneksi database berhasil';
}
