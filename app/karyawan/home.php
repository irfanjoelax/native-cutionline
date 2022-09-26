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
                        <th scope="col" class="py-2 text-center">Tgl Pengajuan</th>
                        <th scope="col" class="py-2 text-center">Tgl Awal</th>
                        <th scope="col" class="py-2 text-center">Tgl Akhir</th>
                        <th scope="col" class="py-2 text-center">Durasi</th>
                        <th scope="col" class="py-2 text-center">Status</th>
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
                    $query  = "SELECT * FROM pengajuan_cuti WHERE user_id='$_SESSION[id_user]' ORDER BY id_ajuan DESC";
                    $exeSQL = mysqli_query($conn, $query) or die(mysqli_error($conn));

                    while ($data = mysqli_fetch_array($exeSQL)) :
                    ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $no++; ?></th>
                            <td class="text-center"><?= tanggal($data['tgl_ajuan']); ?></td>
                            <td class="text-center"><?= tanggal($data['tgl_awal']); ?></td>
                            <td class="text-center"><?= tanggal($data['tgl_akhir']); ?></td>
                            <td class="text-center"><?= $data['lama_ajuan']; ?> hari</td>
                            <td class="text-center">
                                <span class="badge bg-<?= badgeColor($data['status']) ?>">
                                    <?= $data['status']; ?>
                                </span>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>