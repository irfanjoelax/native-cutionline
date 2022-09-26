<div class="row">
    <div class="col-12">
        <h1 class="mt-4">Pengajuan Cuti</h1>
        <h6 class="text-muted">Harap masukkan data pengajuan cuti anda dengan benar</h6>
    </div>
</div>

<div class="row my-4">
    <div class="col-12">
        <form action="?module=pengajuan-cuti-submit" class="shadow p-3" method="POST">
            <div class="row mb-4">
                <label for="jenis_id" class="col-sm-2 col-form-label">Jenis Cuti</label>
                <div class="col-sm-5">
                    <select name="jenis_id" class="form-select" required>
                        <option value="" selected>Silakan pilih jenis cuti</option>
                        <?php
                        $query = "SELECT * FROM jenis_cuti ORDER BY id_cuti DESC";
                        $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

                        while ($data = mysqli_fetch_array($sql)) :
                        ?>
                            <option value="<?= $data['id_cuti'] ?>"><?= $data['nama_cuti'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <label for="tgl_awal" class="col-sm-2 col-form-label">Tanggal Awal</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" name="tgl_awal" required>
                </div>
            </div>
            <div class="row mb-4">
                <label for="tgl_akhir" class="col-sm-2 col-form-label">Tanggal Akhir</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" name="tgl_akhir" required>
                </div>
            </div>
            <div class="row mb-4">
                <label for="keperluan" class="col-sm-2 col-form-label">Keperluan</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="keperluan" rows="2" placeholder="Masukkan detail keperluan cuti Anda" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 offset-2 text-end">
                    <button type="submit" class="btn btn-dark">Kirim Pengajuan</button>
                </div>
            </div>
        </form>
    </div>
</div>