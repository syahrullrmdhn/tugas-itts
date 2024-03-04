<?php include './layout/navbarAll.php'; ?>

<div class="container-xxl flex-grow-1 container-p-y">

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
                            echo "<td>{$row['prodi']}</td>";}
                            ?>
