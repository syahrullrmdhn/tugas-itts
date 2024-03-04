<?php
// Include file koneksi
include '../auth/koneksi.php';

// Ambil data dari form
$nama_mahasiswa = $_POST['nama_mahasiswa'];
$nim = $_POST['nim'];
$prodi = $_POST['prodi'];
$email = $_POST['email'];
$nomor_whatsapp = $_POST['nomor_whatsapp'];

// Validasi NIM harus angka
if (!is_numeric($nim)) {
    die("Error: NIM harus berupa angka");
}

// Validasi nomor WhatsApp harus angka
if (!is_numeric($nomor_whatsapp)) {
    die("Error: Nomor WhatsApp harus berupa angka");
}

// Validasi email harus berupa alamat email yang valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Error: Format email tidak valid");
}

// Query untuk menyimpan data mahasiswa ke dalam tabel mahasiswa
$sql = "INSERT INTO mahasiswa (nama_mahasiswa, nim, prodi, email, nomor_whatsapp) 
        VALUES ('$nama_mahasiswa', '$nim', '$prodi', '$email', '$nomor_whatsapp')";

// Eksekusi query
if ($conn->query($sql) === TRUE) {
    echo "Data mahasiswa berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();
