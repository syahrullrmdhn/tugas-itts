<?php include './layout/navbarAll.php'; ?>

<div class="container-xxl flex-grow-1 container-p-y">
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
                            echo "<td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#materiModal{$row['id']}'>Lihat Materi</button></td>";
                            echo "<td>{$row['detail_tugas']}</td>";
                            echo "<td>";

                            // Tambahkan hitung mundur dari deadline tugas
                            $deadlineTimestamp = strtotime($row['deadline_tugas']);
                            $currentTime = time();

                            if ($currentTime < $deadlineTimestamp) {
                                $timeDiff = $deadlineTimestamp - $currentTime;
                                $days = floor($timeDiff / (60 * 60 * 24));
                                $hours = floor(($timeDiff % (60 * 60 * 24)) / (60 * 60));
                                $minutes = floor(($timeDiff % (60 * 60)) / 60);
                                echo "{$days} hari, {$hours} jam, {$minutes} menit";
                            } else {
                                echo "Telah berakhir";
                            }

                            echo "</td>";
                            echo "</tr>";

                            // Modal Materi
                            echo "<div class='modal fade' id='materiModal{$row['id']}' tabindex='-1' role='dialog' aria-labelledby='materiModalLabel' aria-hidden='true'>";
                            echo "<div class='modal-dialog' role='document'>";
                            echo "<div class='modal-content'>";
                            echo "<div class='modal-header'>";
                            echo "<h5 class='modal-title' id='materiModalLabel'>Materi - {$row['nama_matkul']}</h5>";
                            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                            echo "<span aria-hidden='true'>&times;</span>";
                            echo "</button>";
                            echo "</div>";
                            echo "<div class='modal-body'>";
                            echo "<iframe src='{$row['tautan_materi']}' style='width: 100%; height: 500px;'></iframe>";
                            echo "</div>";
                            echo "<div class='modal-footer'>";
                            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Tutup</button>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /Daftar Tugas -->

    <!-- / Content -->
    <?php include './layout/footer.php'; ?>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
