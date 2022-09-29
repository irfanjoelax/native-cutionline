<div class="row">
    <div class="col-12">
        <h1 class="mt-4">Dashboard</h1>
        <h6 class="text-muted">Ringkasan data cuti yang anda miliki</h6>
    </div>
</div>

<div class="row my-4">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover align-middle">
                <thead>
                    <tr class="bg-secondary text-white">
                        <th scope="col" class="py-2 text-center">#</th>
                        <th scope="col" class="py-2 text-center">Jenis Cuti</th>
                        <th scope="col" class="py-2 text-center">Tgl Pengajuan</th>
                        <th scope="col" class="py-2 text-center">Tgl Awal</th>
                        <th scope="col" class="py-2 text-center">Tgl Akhir</th>
                        <th scope="col" class="py-2 text-center">Durasi</th>
                        <th scope="col" class="py-2 text-center">Status</th>
                        <th scope="col" class="py-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    function badgeColor($status)
                    {
                        if ($status == 'Pengajuan') {
                            return 'info';
                        }

                        if ($status == 'Verifikasi') {
                            return 'warning';
                        }

                        if ($status == 'Diterima') {
                            return 'success';
                        }

                        if ($status == 'Ditolak') {
                            return 'danger';
                        }
                    }

                    $no     = 1;
                    $query  = "SELECT * FROM pengajuan_cuti JOIN jenis_cuti ON pengajuan_cuti.jenis_id=jenis_cuti.id_cuti WHERE user_id='$_SESSION[id_user]' ORDER BY id_ajuan DESC";
                    $exeSQL = mysqli_query($conn, $query) or die(mysqli_error($conn));

                    while ($data = mysqli_fetch_array($exeSQL)) :
                    ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $no++; ?></th>
                            <td class="text-center"><?= $data['nama_cuti']; ?></td>
                            <td class="text-center"><?= tanggal($data['tgl_ajuan']); ?></td>
                            <td class="text-center"><?= tanggal($data['tgl_awal']); ?></td>
                            <td class="text-center"><?= tanggal($data['tgl_akhir']); ?></td>
                            <td class="text-center"><strong><?= $data['lama_ajuan']; ?></strong> hari</td>
                            <td class="text-center">
                                <span class="badge bg-<?= badgeColor($data['status']) ?>">
                                    <?= $data['status']; ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <?php if ($data['status'] == 'Pengajuan' or $data['status'] == 'Verifikasi') : ?>
                                    <span class="badge bg-secondary">
                                        Menunggu
                                    </span>
                                <?php endif; ?>
                                <?php if ($data['status'] == 'Diterima') : ?>
                                    <a target="_blank" href="print-pengajuan-cuti.php?id=<?= $data['id_ajuan'] ?>" class="badge bg-primary text-decoration-none text-white">
                                        Cetak
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>