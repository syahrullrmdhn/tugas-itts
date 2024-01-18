<?php
include './auth/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_dosen = $_POST["nama_dosen"];
    $nama_matkul = $_POST["nama_matkul"];
    $prodi = $_POST["prodi"];
    $deadline_tugas = $_POST["deadline_tugas"];
    $tautan_materi = "";  // Initialize to empty string
    $detail_tugas = $_POST["detail_tugas"];

    // Penanganan unggahan file materi
    $target_dir = "./uploads/";
    $file_name = basename($_FILES["info_materi"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a valid document type
    $allowedTypes = ["pdf", "docx", "ppt"];
    if (!in_array($fileType, $allowedTypes)) {
        die("Hanya file PDF, DOCX, dan PPT yang diterima.");
    }

// Move the file to the uploads directory
if (move_uploaded_file($_FILES["info_materi"]["tmp_name"], $target_file)) {
    echo "File " . htmlspecialchars(basename($_FILES["info_materi"]["name"])) . " berhasil diunggah.";
    $tautan_materi = $target_file;  // Set the link to the uploaded file
} else {
    echo "Gagal mengunggah file. Error: " . $_FILES["info_materi"]["error"];
}


    // Query untuk memasukkan data ke database
    $query = "INSERT INTO tasks (nama_dosen, nama_matkul, prodi, deadline_tugas, tautan_materi, detail_tugas) 
              VALUES (?, ?, ?, ?, ?, ?)";

    // Persiapkan statement
    $stmt = $koneksi->prepare($query);

    // Bind parameter
    $stmt->bind_param("ssssss", $nama_dosen, $nama_matkul, $prodi, $deadline_tugas, $tautan_materi, $detail_tugas);

    // Eksekusi statement
    if ($stmt->execute()) {
        header("Location: manage_tugas.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();
}

// Tutup koneksi
$koneksi->close();
?>
