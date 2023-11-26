<?php include './layout/navbar.php';?>

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Tombol untuk menampilkan modal tambah informasi -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahInformasiModal">
        Tambah Informasi
    </button>

    <!-- Tampilkan informasi -->
    <div class="row">
        <?php
        // Ambil data informasi dari database atau sumber data lainnya
        $informasi = []; // Isi dengan data dari database

        // Tampilkan informasi
        foreach ($informasi as $info) {
            echo '<div class="col-sm-6 col-lg-4 mb-4">';
            echo '<div class="card text-center">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $info['judul'] . '</h5>';
            echo '<p class="card-text">' . $info['paragraf'] . '</p>';
            echo '<p class="card-text"><small class="text-muted">Last updated ' . date('M d, Y H:i:s', strtotime($info['timestamp'])) . '</small></p>';
            echo '<a href="edit_informasi.php?id=' . $info['id'] . '" class="btn btn-primary">Edit</a>';
            echo '</div></div></div>';
        }
        ?>
    </div>
</div>

<!-- Modal untuk menambah informasi -->
<div class="modal fade" id="tambahInformasiModal" tabindex="-1" role="dialog" aria-labelledby="tambahInformasiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahInformasiModalLabel">Tambah Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form untuk menambah informasi -->
                <form method="post" action="proses_tambah_informasi.php">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="paragraf">Paragraf</label>
                        <textarea class="form-control" id="paragraf" name="paragraf" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">URL Gambar</label>
                        <input type="text" class="form-control" id="gambar" name="gambar" required>
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Informasi</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include './layout/footer.php';?>
