<?php

/**
 * KONFIGURASI KONTEN WEB APP
 * ========================================
 * 
 * Seluruh file pada folder '/app' harus didaftarkan pada file ini agar
 * dapat ditampilkan dan dijalankan secara dinamis
 */

if (isset($_GET['module'])) $module = $_GET['module'];

if ($module == "admin") include("app/admin/home.php");
elseif ($module == "karyawan") include("app/karyawan/home.php");

elseif ($module == "pengaturan") include("app/pengaturan.php");
elseif ($module == "pengaturan-submit") include("app/pengaturan-submit.php");
