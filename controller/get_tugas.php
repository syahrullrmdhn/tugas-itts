<?php
// Koneksi ke database
include './auth/koneksi.php';

// Query untuk mengambil data file dari database
$query = "SELECT file FROM tasks WHERE tautan_materi = '{$_GET['materi']}'";
$result = $koneksi->query($query);

// Jika data file ditemukan
if ($result->num_rows > 0) {
  // Ambil data file
  $row = $result->fetch_assoc();
  $file = $row['file'];

  // Encode file ke base64
  $base64 = base64_encode($file);

  // Keluarkan file dalam format base64
  echo $base64;
} else {
  // File tidak ditemukan
  echo '';
}

?>
