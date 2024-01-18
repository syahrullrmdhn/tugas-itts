<?php
$host = "localhost:3306";
$username = "u1574155_aplikasitugas";
$password = "aplikasitugas";
$database = "u1574155_aplikasitugas";

$koneksi = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
