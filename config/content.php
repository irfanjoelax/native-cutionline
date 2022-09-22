<?php

/**
 * KONFIGURASI KONTEN WEB APP
 * ========================================
 * 
 * Seluruh file pada folder '/app' harus didaftarkan pada file ini agar
 * dapat ditampilkan dan dijalankan secara dinamis
 */

if (isset($_GET['module'])) $module = $_GET['module'];
else $module = "beranda";

if ($module == "beranda") include("app/beranda.php");
elseif ($module == "operator") include("app/operator.php");
elseif ($module == "keluar") include("src/keluar.php");
