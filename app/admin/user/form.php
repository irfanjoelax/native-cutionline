<div class="row">
    <div class="col-12">
        <h1 class="mt-4">Form User</h1>
        <h6 class="text-muted">Harap masukkan data user dengan benar</h6>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <?php
        $isEdit = false;
        $url    = '?module=user-submit';

        if (isset($_GET['id'])) {
            $isEdit = true;
            $id     = $_GET['id'];
            $url    = '?module=user-submit&id=' . $id;

            $query = "SELECT * FROM user WHERE id_user = '$id'";
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
                <label for="fullname_user" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="fullname_user" value="<?= ($isEdit) ? $data['fullname_user'] : '' ?>" required>
                </div>
            </div>
            <div class="row mb-4">
                <label for="level_user" class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-10 d-flex align-items-center">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="level_user" id="karyawan" value="karyawan" <?= ($isEdit) ? isChecked('karyawan', $data['level_user']) : '' ?>>
                        <label class="form-check-label" for="karyawan">
                            Karyawan
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="level_user" id="admin" value="admin" <?= ($isEdit) ? isChecked('admin', $data['level_user']) : '' ?>>
                        <label class="form-check-label" for="admin">
                            Administrator
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 offset-2 text-end">
                    <a href="?module=user" class="btn btn-warning">Kembali ke Daftar</a>
                    <button type="submit" class="btn btn-dark">Simpan Sekarang</button>
                </div>
            </div>
        </form>
    </div>
</div>