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
            Tambah Jadwal
        </button>
    </div>
    <!-- /Tambah Tugas Button -->

    <!-- Daftar Tugas -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title">Daftar Jadwal</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kode Matkul</th>
                            <th>Nama Dosen</th>
                            <th>Waktu Kelas</th>
                            <th>Mata Kuliah</th>
                            <th>Prodi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Koneksi ke database
                        include './auth/koneksi.php';

                        // Query untuk mengambil data dari tabel tasks
                        $query = "SELECT * FROM jadwal";
                        $result = $koneksi->query($query);

                        // Loop untuk menampilkan data
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['kode_matkul']}</td>";
                            echo "<td>{$row['nama_dosen']}</td>";
                            echo "<td>{$row['waktu_kelas']}</td>";
                            echo "<td>{$row['mata_kuliah']}</td>";
                            echo "<td>{$row['prodi']}</td>";
                            
                            // // Check if 'materi' key exists in the row array
                            // $materiLink = isset($row['tautan_materi']) ? "<a href='{$row['tautan_materi']}' target='_blank'>View</a>" : "Tidak Ada Materi";
                            // echo "<td>{$materiLink}</td>";

                            // echo "<td>{$row['detail_tugas']}</td>";
                            //                             echo "<td>";

                            // // Tambahkan hitung mundur dari deadline tugas
                            // $deadlineTimestamp = strtotime($row['deadline_tugas']);
                            // $currentTime = time();

                            // if ($currentTime < $deadlineTimestamp) {
                            //     $timeDiff = $deadlineTimestamp - $currentTime;
                            //     $days = floor($timeDiff / (60 * 60 * 24));
                            //     $hours = floor(($timeDiff % (60 * 60 * 24)) / (60 * 60));
                            //     $minutes = floor(($timeDiff % (60 * 60)) / 60);
                            //     echo "{$days} hari, {$hours} jam, {$minutes} menit";
                            // } else {
                            //     echo "Telah berakhir";
                            // }

                            echo "<td>";
                            echo "<a href='edit_jadwal.php?id={$row['id']}' class='btn btn-primary'>Edit</a> ";
                            echo "<a href='delete_jadwal.php?id={$row['id']}' class='btn btn-danger'>Hapus</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /Daftar Jadwal -->

    <!-- Modal Tambah Jadwal -->
    <div class="modal fade" id="tambahJadwalModal" tabindex="-1" aria-labelledby="tambahJadwalModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahJadwalModalLabel">Tambah Jadwal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulir penambahan tugas -->
                    <form action="./add_jadwal.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="kode_matkul" class="form-label">Kode Matkul</label>
                            <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" required>
                        </div>
                        <div class="mb-3">
                            <label for="mata_kuliah" class="form-label">Nama Matkul</label>
                            <input type="text" class="form-control" id="mata_kuliah" name="mata_kuliah" required>
                        </div>
                        <div class="mb-3">
                            <label for="prodi" class="form-label">Prodi</label>
                            <input type="text" class="form-control" id="prodi" name="prodi" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_dosen" class="form-label">Nama Dosen</label>
                            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" required>
                        </div>
                        <div class="mb-3">
                            <label for="waktu_kelas" class="form-label">Waktu Kelas</label>
                            <input type="text" class="form-control" id="waktu_kelas" name="waktu_kelas" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Tambah Tugas -->

    <!-- / Content -->
    <?php include './layout/footer.php'; ?>
