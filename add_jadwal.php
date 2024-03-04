<?php
// Pastikan form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include file koneksi.php untuk menghubungkan ke database
    include './auth/koneksi.php';

    // Mengambil nilai dari form
    $kode_matkul = $_POST['kode_matkul'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $prodi = $_POST['prodi'];
    $nama_dosen = $_POST['nama_dosen'];
    $waktu_kelas = $_POST['waktu_kelas'];

    // Query untuk menyimpan jadwal ke database
    $query = "INSERT INTO jadwal (kode_matkul, mata_kuliah, prodi, nama_dosen, waktu_kelas) VALUES ('$kode_matkul', '$mata_kuliah', '$prodi', '$nama_dosen', '$waktu_kelas')";

    if ($koneksi->query($query) === TRUE) {
        // Redirect ke halaman daftar jadwal jika penambahan berhasil
        header("Location: ./manage_jadwal");
        exit();
    } else {
        // Jika terjadi error, redirect kembali ke halaman tambah jadwal dengan pesan error
        header("Location: ./manage_jadwal?error=Error: " . $koneksi->error);
        exit();
    }

    // Tutup koneksi database
    $koneksi->close();
}
?>
