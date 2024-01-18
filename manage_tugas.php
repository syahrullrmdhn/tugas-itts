<?php
include './layout/navbar.php';

if (isset($_GET['error'])) {
    echo $_GET['error'];
}
?>

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
                            <th>Prodi</th>
                            <th>Deadline Tugas</th>
                            <th>Materi</th>
                            <th>Detail Tugas</th>
                            <th>Timestamp</th>
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
                            echo "<td>{$row['prodi']}</td>";
                            echo "<td>{$row['deadline_tugas']}</td>";

                            // Check if 'materi' key exists in the row array
                            $materiLink = isset($row['materi']) ? "<a href='./uploads/{$row['materi']}' target='_blank'>Lihat Materi</a>" : "Tidak Ada Materi";
                            echo "<td>{$materiLink}</td>";

                            echo "<td>{$row['detail_tugas']}</td>";

                            // Check if 'timestamp' key exists in the row array
                            $timestamp = isset($row['timestamp']) ? $row['timestamp'] : "Tidak Tersedia";
                            echo "<td>{$timestamp}</td>";

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
                            <label for="prodi" class="form-label">Prodi</label>
                            <input type="text" class="form-control" id="prodi" name="prodi" required>
                        </div>
                        <div class="mb-3">
                            <label for="deadline_tugas" class="form-label">Deadline Tugas</label>
                            <input type="date" class="form-control" id="deadline_tugas" name="deadline_tugas" required>
                        </div>
                        <div class="mb-3">
                            <label for="info_materi" class="form-label">Info Materi (File: PPT, Word, Excel, TXT)</label>
                            <input type="file" class="form-control" id="info_materi" name="info_materi" accept=".ppt, .pptx, .doc, .docx, .xls, .xlsx, .txt">
                        </div>
                        <div class="mb-3">
                            <label for="detail_tugas" class="form-label">Detail Tugas</label>
                            <textarea class="form-control" id="detail_tugas" name="detail_tugas" rows="5"></textarea>
                            <small id="detail_tugas_help" class="form-text text-muted">Anda dapat menggunakan HTML untuk format teks (bold, link, dll.).</small>
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
