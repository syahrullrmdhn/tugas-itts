<?php
include './auth/koneksi.php';

$nama_dosen = $_POST['nama_dosen'];
$nama_matkul = $_POST['nama_matkul'];
$nama_tugas = $_POST['nama_tugas'];
$deadline = $_POST['deadline'];

// Handle file upload
$uploadDirectory = './assets/outputmateri/'; // Update with the actual directory path
$uploadedFile = $_FILES['tautan_materi'];

$tautan_materi = ''; // Initialize with an empty string

if ($uploadedFile['error'] == UPLOAD_ERR_OK) {
    $tautan_materi = $uploadDirectory . basename($uploadedFile['name']);

    if (!move_uploaded_file($uploadedFile['tmp_name'], $tautan_materi)) {
        header("Location: manage_tugas.php?error=" . urlencode("Failed to move uploaded file"));
        exit();
    }
} else {
    header("Location: manage_tugas.php?error=" . urlencode("File upload error: " . $uploadedFile['error']));
    exit();
}

// Add the 'tautan_materi' column in the INSERT query
$query = "INSERT INTO tasks (nama_dosen, nama_matkul, nama_tugas, deadline, tautan_materi) 
          VALUES (?, ?, ?, ?, ?)";

$stmt = $koneksi->prepare($query);
$stmt->bind_param("sssss", $nama_dosen, $nama_matkul, $nama_tugas, $deadline, $tautan_materi);

if ($stmt->execute()) {
    header("Location: manage_tugas.php");
    exit();
} else {
    header("Location: manage_tugas.php?error=" . urlencode("Error: " . $query . "<br>" . $stmt->error));
    exit();
}

$stmt->close();
$koneksi->close();
?>
