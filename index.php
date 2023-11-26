<?php include './layout/navbarAll.php'; ?>

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Table -->
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
                            <th>Detail</th>
                            <th>Download</th>
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
                            echo "<td><a href='detail_tugas.php?id={$row['id']}' class='btn btn-primary'>Detail</a></td>";
                            echo "<td><a href='{$row['tautan_materi']}' download class='btn btn-success'>Download</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /Table -->
</div>
<!-- / Content -->

<?php include './layout/footer.php'; ?>

<!-- JavaScript -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
