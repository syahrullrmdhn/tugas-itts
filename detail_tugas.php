<?php
// Include the necessary files
include './auth/koneksi.php';

// Check if the task ID is provided in the URL
if (isset($_GET['id'])) {
    $taskId = $_GET['id'];

    // Query to retrieve task details based on the task ID
    $query = "SELECT * FROM tasks WHERE id = $taskId";
    $result = $koneksi->query($query);

    // Check if the task exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $tautanMateri = $row['tautan_materi'];
        $filename = $row['nama_tugas'];
    } else {
        // Redirect to index.php or show an error message
        header('Location: index.php?error=Task not found');
        exit();
    }
} else {
    // Redirect to index.php or show an error message
    header('Location: index.php?error=Task ID not provided');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include './layout/navbarAll.php'; ?>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h2 class="my-4">Detail Tugas: <?php echo $filename; ?></h2>

        <!-- Display the embedded file -->
        <iframe src="<?php echo $tautanMateri; ?>" style="width: 100%; height: 500px;"
            sandbox="allow-same-origin allow-scripts allow-popups allow-forms"></iframe>

        <?php include './layout/footer.php'; ?>

        <!-- Bootstrap JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>
