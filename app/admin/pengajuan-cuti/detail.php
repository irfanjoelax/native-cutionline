<div class="row">
    <div class="col-12">
        <h1 class="mt-4">Detail Cuti</h1>
        <h6 class="text-muted">Daftar lengkap detail pengajuan cuti karyawan</h6>
    </div>
</div>

<?php

$id_ajuan = $_GET['id'];
$query    = "SELECT * FROM pengajuan_cuti JOIN user ON pengajuan_cuti.user_id=user.id_user JOIN jenis_cuti ON pengajuan_cuti.jenis_id=jenis_cuti.id_cuti WHERE pengajuan_cuti.id_ajuan= '$id_ajuan'";
$exeSQL   = mysqli_query($conn, $query) or die(mysqli_error($conn));
$data     = mysqli_fetch_array($exeSQL);

if ($data['status'] == 'Pengajuan') {
    $query = "UPDATE pengajuan_cuti SET status='Verifikasi' WHERE id_ajuan= '$id_ajuan'";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
}
?>

<div class="row my-4">
    <div class="col-12">
        <?php
        if ($data['status'] == 'Pengajuan' or $data['status'] == 'Verifikasi') :
        ?>
            <div class="row mb-3">
                <div class="col-sm-12">
                    <a href="?module=setuju-cuti&id=<?= $id_ajuan ?>" class="btn btn-dark me-2">Setujui Pengajuan</a>
                    <a onclick="return confirm('Apakah anda yakin MENOLAK pengajuan berikut ini?')" href="?module=tolak-cuti&id=<?= $id_ajuan ?>" class="btn btn-danger">Tolak Pengajuan</a>
                </div>
            </div>
        <?php endif; ?>
        <div class="row mb-3">
            <div class="col-sm-2">Nama Lengkap</div>
            <div class="col-sm-10">:&nbsp; <?= $data['fullname_user'] ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-2">Username</div>
            <div class="col-sm-10">:&nbsp; <?= $data['name_user'] ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-2">Level User</div>
            <div class="col-sm-10">:&nbsp; <?= ucfirst($data['level_user']) ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-2">Jenis Cuti</div>
            <div class="col-sm-10">:&nbsp; <?= $data['nama_cuti'] ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-2">Tgl. Pengajuan</div>
            <div class="col-sm-10">:&nbsp; <?= $data['tgl_ajuan'] ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-2">Durasi Cuti</div>
            <div class="col-sm-10">:&nbsp; <?= $data['lama_ajuan'] ?> hari</div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-2">Tgl. Awal</div>
            <div class="col-sm-10">:&nbsp; <?= $data['tgl_awal'] ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-2">Tgl. Akhir</div>
            <div class="col-sm-10">:&nbsp; <?= $data['tgl_akhir'] ?></div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-2">Keperluan</div>
            <div class="col-sm-10">:&nbsp; <?= $data['keperluan'] ?></div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-2">Status</div>
            <div class="col-sm-10">:&nbsp; <?= $data['status'] ?></div>
        </div>

    </div>
</div>