<?php
// Include the database connection
include './auth/koneksi.php';

// Disable foreign key checks to avoid issues with references
$koneksi->query('SET foreign_key_checks = 0');

// Reset the auto-increment ID to 1
$koneksi->query('ALTER TABLE tasks AUTO_INCREMENT = 1');

// Enable foreign key checks
$koneksi->query('SET foreign_key_checks = 1');

// Close the database connection
$koneksi->close();

echo 'Auto-increment ID has been reset.';
?>
