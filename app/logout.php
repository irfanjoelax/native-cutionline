<?php
session_start();

/**
 * Hapus seluruh session login
 */
session_destroy();

/**
 * Arahkan kehalaman Login kembali
 */
header("location: ../index.php");
