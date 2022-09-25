<?php
// Jalankan fungsi Session PHP
session_start();

/**
 * Validasi apakah data level user kosong atau tidak
 */
if (empty($_SESSION['level_user'])) {
    header("location: ../index.php");
}
