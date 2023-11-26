<?php
include './auth/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete task
    $query = "DELETE FROM tasks WHERE id=?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: manage_tugas.php");
        exit();
    } else {
        echo "Error deleting task: " . $stmt->error;
    }

    $stmt->close();
}

$koneksi->close();
?>
