<?php include './layout/navbar.php'; 
if (isset($_GET['error'])) {
    echo $_GET['error'];
} ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Tambah Tugas Button -->
    <div class="mb-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahTugasModal">
            Tambah Tugas
        </button>
    </div>
    <!-- /Tambah Tugas Button -->

    <!-- Daftar Tugas -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title">Daftar Tugas</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Dosen</th>
                            <th>Nama Matkul</th>
                            <th>Nama Tugas</th>
                            <th>Deadline Tugas</th>
                            <th>Lihat Materi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Koneksi ke database
                        include './auth/koneksi.php';

                        // Query untuk mengambil data dari tabel tasks
                        $query = "SELECT * FROM tasks";
                        $result = $koneksi->query($query);

                        // Loop untuk menampilkan data
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['nama_dosen']}</td>";
                            echo "<td>{$row['nama_matkul']}</td>";
                            echo "<td>{$row['nama_tugas']}</td>";
                            echo "<td>{$row['deadline']}</td>";
                            echo "<td><a href='{$row['tautan_materi']}' target='_blank'>Lihat Materi</a></td>";
                            echo "<td>";
                            echo "<a href='edit_tugas.php?id={$row['id']}' class='btn btn-primary'>Edit</a> ";
                            echo "<a href='delete_tugas.php?id={$row['id']}' class='btn btn-danger'>Hapus</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /Daftar Tugas -->

    <!-- Modal Tambah Tugas -->
    <div class="modal fade" id="tambahTugasModal" tabindex="-1" aria-labelledby="tambahTugasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahTugasModalLabel">Tambah Tugas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulir penambahan tugas -->
                   <form action="./add_tugas.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama_dosen" class="form-label">Nama Dosen</label>
                            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_matkul" class="form-label">Nama Matkul</label>
                            <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_tugas" class="form-label">Nama Tugas</label>
                            <input type="text" class="form-control" id="nama_tugas" name="nama_tugas" required>
                        </div>
                        <div class="mb-3">
                            <label for="deadline" class="form-label">Deadline</label>
                            <input type="date" class="form-control" id="deadline" name="deadline" required>
                        </div>
                        <div class="mb-3">
        <label for="tautan_materi" class="form-label">Tautan Materi (File: PPT, Word, Excel, TXT)</label>
        <input type="file" class="form-control" id="tautan_materi" name="tautan_materi" accept=".ppt, .pptx, .doc, .docx, .xls, .xlsx, .txt">
    </div>
    <button type="submit" class="btn btn-primary">Tambah Tugas</button>
</form>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Tambah Tugas -->

    <!-- / Content -->
<?php include './layout/footer.php'; ?>
