<?php include './layout/navbarAll.php'; ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-md-6 offset-md-3 mb-4">
        <form action="./backend/simpan_data_mahasiswa.php" method="post">
            <div class="mb-3">
                <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim" required>
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label>
                <select class="form-select" id="prodi" name="prodi" required>
                    <option value="Informatika">Informatika</option>
                    <option value="Teknologi Informasi">Teknologi Informasi</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="nomor_whatsapp" class="form-label">Nomor Whatsapp</label>
                <input type="number" class="form-control" id="nomor_whatsapp" name="nomor_whatsapp" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php include './layout/footer.php'; ?>
