<?php include './layout/navbar.php'; ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-md-6 offset-md-3 mt-4">
        <form action="./backend/submit_article.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="paragraf" class="form-label">Paragraf</label>
                <textarea class="form-control" id="paragraf" name="paragraf" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Unggah Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" required>
            </div>
            <div class="mb-3">
                <label for="timestamp" class="form-label">Timestamp</label>
                <input type="datetime-local" class="form-control" id="timestamp" name="timestamp" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Article</button>
        </form>
    </div>
</div>

<?php include './layout/footer.php'; ?>
