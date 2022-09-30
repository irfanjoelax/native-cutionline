<div class="row">
    <div class="col-12">
        <h1 class="mt-4">Daftar Pengajuan</h1>
        <h6 class="text-muted">Daftar seluruh pengajuan cuti karyawan</h6>
    </div>
</div>

<div class="row my-4">
    <div class="col-12 mb-3">
        <form class="row row-cols-lg-auto g-3 align-items-center" method="POST" action="">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-text">Mulai</div>
                    <input type="date" class="form-control" name="mulai" value="<?= $_POST['mulai'] ?: ''  ?>" required>
                </div>
            </div>
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-text">Akhir</div>
                    <input type="date" class="form-control" name="akhir" value="<?= $_POST['akhir'] ?: ''  ?>" required>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" name="filter" class="btn btn-dark">Filter</button>
                <a href="?module=daftar-cuti" class="btn btn-warning">Reset</a>
            </div>
        </form>
    </div>
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover align-middle datatable">
                <thead>
                    <tr class="bg-secondary text-white">
                        <th scope="col" class="py-2 text-center">#</th>
                        <th scope="col" class="py-2 text-center">Nama Karyawan</th>
                        <th scope="col" class="py-2 text-center">Jenis Cuti</th>
                        <th scope="col" class="py-2 text-center">Tgl Pengajuan</th>
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
                    $query  = "SELECT * FROM pengajuan_cuti JOIN user ON pengajuan_cuti.user_id=user.id_user JOIN jenis_cuti ON pengajuan_cuti.jenis_id=jenis_cuti.id_cuti ORDER BY tgl_ajuan DESC";

                    if (isset($_POST['filter'])) {
                        $mulai = $_POST['mulai'];
                        $akhir = $_POST['akhir'];

                        $query = "SELECT * FROM pengajuan_cuti JOIN user ON pengajuan_cuti.user_id=user.id_user JOIN jenis_cuti ON pengajuan_cuti.jenis_id=jenis_cuti.id_cuti WHERE tgl_ajuan BETWEEN '$mulai' AND '$akhir' ORDER BY tgl_ajuan DESC";
                    }

                    $exeSQL = mysqli_query($conn, $query) or die(mysqli_error($conn));

                    while ($data = mysqli_fetch_array($exeSQL)) :
                    ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $no++; ?></th>
                            <td class="text-center"><?= $data['fullname_user']; ?></td>
                            <td class="text-center"><?= $data['nama_cuti']; ?></td>
                            <td class="text-center"><?= tanggal($data['tgl_ajuan']); ?></td>
                            <td class="text-center"><strong><?= $data['lama_ajuan']; ?></strong> hari</td>
                            <td class="text-center">
                                <span class="badge bg-<?= badgeColor($data['status']) ?>">
                                    <?= $data['status']; ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="?module=detail-cuti&id=<?= $data['id_ajuan'] ?>" class="badge bg-secondary text-white text-decoration-none">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>