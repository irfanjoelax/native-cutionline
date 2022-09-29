<?php
$id_ajuan = $_GET['id'];

$query = "UPDATE pengajuan_cuti SET status='Ditolak' WHERE id_ajuan= '$id_ajuan'";
mysqli_query($conn, $query) or die(mysqli_error($conn));

echo alert('Pengajuan Cuti telah DITOLAK', 'dashboard.php?module=daftar-cuti');
