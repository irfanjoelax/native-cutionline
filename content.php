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

// MODULE CRUD USER
elseif ($module == "user") include("app/admin/user/index.php");
elseif ($module == "user-form") include("app/admin/user/form.php");
elseif ($module == "user-submit") include("app/admin/user/submit.php");
elseif ($module == "user-delete") include("app/admin/user/delete.php");

// MODULE CRUD JENIS CUTI
elseif ($module == "jenis-cuti") include("app/admin/jenis-cuti/index.php");
elseif ($module == "jenis-cuti-form") include("app/admin/jenis-cuti/form.php");
elseif ($module == "jenis-cuti-submit") include("app/admin/jenis-cuti/submit.php");
elseif ($module == "jenis-cuti-delete") include("app/admin/jenis-cuti/delete.php");

// MODULE PENGAJUAN CUTI PADA KARYAWAN
elseif ($module == "pengajuan-cuti") include("app/karyawan/pengajuan-cuti.php");
elseif ($module == "pengajuan-cuti-submit") include("app/karyawan/pengajuan-cuti-submit.php");

// MODULE PENGAJUAN CUTI PADA ADMINISTRATOR
elseif ($module == "daftar-cuti") include("app/admin/pengajuan-cuti/index.php");
elseif ($module == "detail-cuti") include("app/admin/pengajuan-cuti/detail.php");
elseif ($module == "setuju-cuti") include("app/admin/pengajuan-cuti/setuju.php");
elseif ($module == "tolak-cuti") include("app/admin/pengajuan-cuti/tolak.php");
