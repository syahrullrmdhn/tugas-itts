<?php include './layout/navbar.php'; ?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Edit Tugas</h5>
        </div>
        <div class="card-body">
            <?php
            include './auth/koneksi.php';

            if (isset($_GET['id'])) {
                $taskId = $_GET['id'];

                // Query untuk mengambil data tugas berdasarkan ID
                $query = "SELECT * FROM tasks WHERE id = $taskId";
                $result = $koneksi->query($query);

                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $namaDosen = $row['nama_dosen'];
                    $namaMatkul = $row['nama_matkul'];
                    $namaTugas = $row['nama_tugas'];
                    $deadline = $row['deadline'];
                    $tautanMateri = $row['tautan_materi'];
                    // ... (sisa kolom data)

                    // Tampilkan formulir edit
                    ?>
                    <form action="./update_tugas.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="task_id" value="<?php echo $taskId; ?>">
                        <div class="mb-3">
                            <label for="nama_dosen" class="form-label">Nama Dosen</label>
                            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="<?php echo $namaDosen; ?>" required>
                        </div>
                        <!-- Tambahkan input untuk field-file baru -->
                        <div class="mb-3">
                            <label for="file_baru" class="form-label">File Baru</label>
                            <input type="file" class="form-control" id="file_baru" name="file_baru[]" multiple>
                        </div>
                        <!-- Tampilkan file-file yang sudah ada -->
                        <div class="mb-3">
                            <label>File yang Sudah Ada</label><br>
                            <?php
                            if (!empty($tautanMateri)) {
                                $filePaths = explode(',', $tautanMateri);
                                foreach ($filePaths as $filePath) {
                                    echo "<a href='$filePath' target='_blank'>$filePath</a><br>";
                                }
                            } else {
                                echo "Tidak ada file yang sudah diunggah.";
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="nama_matkul" class="form-label">Nama Mata Kuliah</label>
                            <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" value="<?php echo $namaMatkul; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="deadline" class="form-label">Deadline</label>
                            <input type="datetime-local" class="form-control" id="deadline" name="deadline" value="<?php echo date('Y-m-d\TH:i', strtotime($deadline)); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_tugas" class="form-label">Nama Tugas</label>
                            <input type="text" class="form-control" id="nama_tugas" name="nama_tugas" value="<?php echo $namaTugas; ?>" required>
                        </div>
                        <!-- Tambahkan sisa kolom formulir lainnya sesuai kebutuhan -->
                        <!-- ... -->
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                    <?php
                } else {
                    echo "Tidak ada data tugas dengan ID tersebut.";
                }
            } else {
                echo "Parameter ID tidak ditemukan.";
            }

            // Tutup koneksi setelah selesai menggunakan
            $koneksi->close();
            ?>
        </div>
    </div>
</div>

<?php include './layout/footer.php'; ?>
