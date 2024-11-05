<?php
// Konfigurasi database
$host = 'localhost';
$db = 'Jepitu';
$user = 'root';
$pass = '';

// Buat koneksi ke database
$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data penduduk
$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);

// Array untuk menyimpan data
$dataPenduduk = [];

if ($result->num_rows > 0) {
    // Loop melalui data hasil query
    while ($row = $result->fetch_assoc()) {
        $dataPenduduk[] = $row;
    }
}

// Mengubah data ke format JSON dan mengirimkannya ke front-end
echo json_encode($dataPenduduk);

// Menutup koneksi
$conn->close();
?>
