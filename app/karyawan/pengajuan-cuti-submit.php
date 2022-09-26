<?php

/**
 * Fungsi untuk menghitung jumlah selisih tanggal
 */
function diffDate($awal, $akhir)
{
    $tgl1 = strtotime($awal);
    $tgl2 = strtotime($akhir);

    $jarak = $tgl2 - $tgl1;

    $hari = $jarak / 60 / 60 / 24 + 1;
    return $hari;
}

/**
 * Variabel untuk menangkap seluruh input dari form
 */
$user_id    = $_SESSION['id_user'];
$jenis_id   = $_POST['jenis_id'];
$tgl_ajuan  = date('Y-m-d');
$tgl_awal   = $_POST['tgl_awal'];
$tgl_akhir  = $_POST['tgl_akhir'];
$lama_ajuan = diffDate($_POST['tgl_awal'], $_POST['tgl_akhir']);
$keperluan  = $_POST['keperluan'];
$status     = 'Pengajuan';


/**
 * VALIDASI JUMLAH CUTI 
 * 
 * apakah jumlah hari cuti yg diajukan sesuai dengan durasi masing-masing jenis cuti?
 */
$query = "SELECT * FROM jenis_cuti WHERE id_cuti='$jenis_id' LIMIT 1";
$sql   = mysqli_query($conn, $query) or die(mysqli_error($conn));
$data  = mysqli_fetch_array($sql);

if ($lama_ajuan <= $data['durasi']) {
    $query2  = "INSERT INTO pengajuan_cuti SET user_id='$user_id', jenis_id='$jenis_id', tgl_ajuan='$tgl_ajuan' ,tgl_awal='$tgl_awal', tgl_akhir='$tgl_akhir', lama_ajuan='$lama_ajuan', keperluan='$keperluan', status='$status'";
    $exeSQL = mysqli_query($conn, $query2) or die(mysqli_error($conn));

    if ($exeSQL) {
        echo alert('Pengajuan cuti Anda BERHASIL dikirim', 'dashboard.php?module=karyawan');
    } else {
        echo alert('Pengajuan cuti Anda GAGAL dikirim', 'dashboard.php?module=karyawan');
    }
} else {
    echo alert('Durasi pengajuan cuti anda melebih batas yang ditentukan', 'dashboard.php?module=pengajuan-cuti');
}
