<?php

// Assuming you have a database connection file
include './auth/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the form
    $judul = $_POST['judul'];
    $paragraf = $_POST['paragraf'];
    $penulis = $_POST['penulis'];
    $timestamp = $_POST['timestamp'];

    // Validate form fields
    if (empty($judul) || empty($paragraf) || empty($penulis) || empty($timestamp)) {
        header('Location: manage_informasi.php?error=Please fill in all required fields');
        exit();
    }

    // Handle file upload
    $uploadDir = 'uploads/'; // Specify your upload directory
    $uploadedFile = $uploadDir . basename($_FILES['gambar']['name']);
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($uploadedFile)) {
        header('Location: manage_informasi.php?error=Sorry, file already exists.');
        exit();
    }

    // Check file size (adjust as needed)
    if ($_FILES['gambar']['size'] > 500000) {
        header('Location: manage_informasi.php?error=Sorry, your file is too large.');
        exit();
    }

    // Allow certain file formats (you can customize this list)
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $fileExtension = strtolower(pathinfo($uploadedFile, PATHINFO_EXTENSION));
    if (!in_array($fileExtension, $allowedExtensions)) {
        header('Location: manage_informasi.php?error=Sorry, only JPG, JPEG, PNG, and GIF files are allowed.');
        exit();
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        header('Location: manage_informasi.php?error=Sorry, your file was not uploaded.');
        exit();
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadedFile)) {
            // File uploaded successfully, proceed with database insertion

            // Insert the article into the database (modify the SQL query based on your database schema)
            $sql = "INSERT INTO articles (judul, paragraf, gambar, penulis, timestamp) VALUES (?, ?, ?, ?, ?)";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("sssss", $judul, $paragraf, $uploadedFile, $penulis, $timestamp);

            if ($stmt->execute()) {
                // Successfully inserted, redirect to the page where you display articles
                header('Location: informasi.php');
                exit();
            } else {
                // Handle database error, redirect back to the form with an error message
                header('Location: manage_informasi.php?error=Database error occurred');
                exit();
            }
        } else {
            header('Location: manage_informasi.php?error=Sorry, there was an error uploading your file.');
            exit();
        }
    }
} else {
    // Handle cases where the form is not submitted via POST method
    // Redirect back to the form page or show an error message
    header('Location: manage_informasi.php?error=Invalid form submission');
    exit();
}
