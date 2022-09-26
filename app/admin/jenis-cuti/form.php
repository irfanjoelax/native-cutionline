<div class="row">
    <div class="col-12">
        <h1 class="mt-4">Form Jenis Cuti</h1>
        <h6 class="text-muted">Harap masukkan data jenis cuti dengan benar</h6>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <?php
        $isEdit = false;
        $url    = '?module=jenis-cuti-submit';

        if (isset($_GET['id'])) {
            $isEdit = true;
            $id     = $_GET['id'];
            $url    = '?module=jenis-cuti-submit&id=' . $id;

            $query = "SELECT * FROM jenis_cuti WHERE id_cuti = '$id'";
            $sql   = mysqli_query($conn, $query) or die(mysqli_error($conn));
            $data  = mysqli_fetch_array($sql);

            function isChecked($level, $array)
            {
                if ($array == $level) {
                    echo 'checked';
                }
            }
        }
        ?>
        <form action="<?= $url ?>" class="shadow p-3" method="POST">
            <div class="row mb-4">
                <label for="nama_cuti" class="col-sm-2 col-form-label">Nama Jenis Cuti</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_cuti" value="<?= ($isEdit) ? $data['nama_cuti'] : '' ?>" required>
                </div>
            </div>
            <div class="row mb-4">
                <label for="durasi" class="col-sm-2 col-form-label">Durasi (hari)</label>
                <div class="col-sm-3">
                    <input type="number" class="form-control" name="durasi" value="<?= ($isEdit) ? $data['durasi'] : '' ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 offset-2 text-end">
                    <a href="?module=jenis-cuti" class="btn btn-warning">Kembali ke Daftar</a>
                    <button type="submit" class="btn btn-dark">Simpan Sekarang</button>
                </div>
            </div>
        </form>
    </div>
</div>