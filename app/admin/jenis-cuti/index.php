<div class="row">
    <div class="col-12">
        <h1 class="mt-4">Jenis Cuti</h1>
        <h6 class="text-muted">Daftar data jenis cuti yang tersedia</h6>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <div class="shadow p-3">
            <a href="?module=jenis-cuti-form" class="btn btn-dark mb-4">Tambah Data</a>

            <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover align-middle datatable">
                    <thead>
                        <tr class="bg-secondary text-white">
                            <th scope="col" class="py-2 text-center">#</th>
                            <th scope="col" class="py-2 ">Jenis Cuti</th>
                            <th scope="col" class="py-2 ">Durasi</th>
                            <th scope="col" class="py-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = "SELECT * FROM jenis_cuti ORDER BY id_cuti DESC";
                        $exeSQL = mysqli_query($conn, $query) or die(mysqli_error($conn));

                        while ($data = mysqli_fetch_array($exeSQL)) :
                        ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $no++; ?></th>
                                <td><?= $data['nama_cuti']; ?></td>
                                <td><?= $data['durasi']; ?> hari</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="?module=jenis-cuti-form&id=<?= $data['id_cuti'] ?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a onclick="return confirm('Apakah yakin ingin menghapus data berikut?')" href="?module=jenis-cuti-delete&id=<?= $data['id_cuti'] ?>" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>