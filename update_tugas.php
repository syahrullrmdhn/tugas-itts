<?php
include './auth/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['task_id'])) {
        $taskId = $_POST['task_id'];
        $namaDosen = $_POST['nama_dosen'];
        // ... (sisa kolom data)

        // File-file yang sudah ada
        $filePathsLama = explode(',', $_POST['file_paths_lama']);

        // Proses file-file baru
        $filePathsBaru = array();
        if (!empty($_FILES['file_baru']['name'][0])) {
            $fileCount = count($_FILES['file_baru']['name']);
            for ($i = 0; $i < $fileCount; $i++) {
                $namaFile = $_FILES['file_baru']['name'][$i];
                $tmpFilePath = $_FILES['file_baru']['tmp_name'][$i];
                $newFilePath = "./uploads/" . $namaFile;

                // Pindahkan file baru ke direktori uploads
                move_uploaded_file($tmpFilePath, $newFilePath);

                // Tambahkan path file baru ke array
                $filePathsBaru[] = $newFilePath;
            }
        }

        // Gabungkan path file baru dengan path file lama
        $filePathsGabungan = array_merge($filePathsLama, $filePathsBaru);

        // Konversi array paths ke string (CSV)
        $filePathsString = implode(',', $filePathsGabungan);

        // Update data tugas di database
        $updateQuery = "UPDATE tasks SET nama_dosen='$namaDosen', tautan_materi='$filePathsString' WHERE id=$taskId";
        $koneksi->query($updateQuery);

        // Redirect ke halaman dashboard atau halaman lainnya setelah update
        header("Location: ./dashboard.php");
        exit();
    } else {
        echo "Parameter ID tidak ditemukan.";
    }
} else {
    echo "Metode permintaan tidak valid.";
}

// Tutup koneksi setelah selesai menggunakan
$koneksi->close();
?>
