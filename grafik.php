<?php
include 'config/library.php';
$qJenis = mysqli_query($conn, "SELECT * FROM jenis_cuti") or die(mysqli_error($conn));

while ($data = mysqli_fetch_array($qJenis)) {
    $nama[] = $data['nama_cuti'];
    $durasi[] = $data['durasi'];
}

echo json_encode($durasi);
