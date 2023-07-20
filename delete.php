<?php
include "koneksi.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Query untuk menghapus data dari database berdasarkan ID
    $query = "DELETE FROM education WHERE id=$id";

    if (mysqli_query($koneksi, $query)) {
        // Redirect kembali ke halaman utama setelah data berhasil dihapus
        header("Location: edu.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo "ID tidak diberikan.";
    exit();
}
?>
