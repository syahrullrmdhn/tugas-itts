<?php
// Sesuaikan dengan detail koneksi database Anda
include '../auth/koneksi.php';

// Query untuk mengambil data mahasiswa dari tabel mahasiswa
$query = "SELECT * FROM mahasiswa";
$result = $conn->query($query);

// Membuat file Excel
$filename = "data_mahasiswa_" . date('Ymd') . ".xls";
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$filename");

echo "<table border='1'>";
echo "<tr><th>Nama Mahasiswa</th><th>NIM</th><th>Prodi</th><th>Email</th><th>Nomor Whatsapp</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['nama_mahasiswa'] . "</td>";
    echo "<td>" . $row['nim'] . "</td>";
    echo "<td>" . $row['prodi'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['nomor_whatsapp'] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Tutup koneksi database
$conn->close();
?>
