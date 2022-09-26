<div class="row">
    <div class="col-12">
        <h1 class="mt-4">Pengaturan</h1>
        <h6 class="text-muted">Ubah Data User dan Password Anda</h6>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <form action="?module=pengaturan-submit" class="shadow p-3" method="POST">
            <div class="row mb-4">
                <label for="fullname_user" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="fullname_user" value="<?= $_SESSION['fullname_user'] ?>" required>
                </div>
            </div>
            <div class="row mb-4">
                <label for="name_user" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name_user" value="<?= $_SESSION['name_user'] ?>" required>
                </div>
            </div>
            <div class="row mb-4">
                <label for="pass_user" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="pass_user" placeholder="Kosongkan jika tidak ingin mengubah password saat ini">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 offset-2 text-end">
                    <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>