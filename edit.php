<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Edit Data Pendidikan</title>
</head>
<body>
    <?php
        include "nav.php";
        include "koneksi.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Proses form jika data dikirimkan
            $id = $_POST["id"];
            $school_name = $_POST["school_name"];
            $degree = $_POST["degree"];
            $start_year = $_POST["start_year"];
            $end_year = $_POST["end_year"];

            // Query untuk menyimpan perubahan ke database
            $query = "UPDATE education SET school_name='$school_name', degree='$degree', start_year='$start_year', end_year='$end_year' WHERE id=$id";

            if (mysqli_query($koneksi, $query)) {
                // Redirect ke halaman utama setelah data berhasil diubah
                header("Location: edu.php");
                exit();
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
            }
        } else {
            // Ambil data dari database berdasarkan ID yang diberikan
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = mysqli_query($koneksi, "SELECT * FROM education WHERE id = $id");

                if (mysqli_num_rows($query) == 1) {
                    $row = mysqli_fetch_array($query);
                    $school_name = $row['school_name'];
                    $degree = $row['degree'];
                    $start_year = $row['start_year'];
                    $end_year = $row['end_year'];
                } else {
                    echo "Data tidak ditemukan.";
                    exit();
                }
            } else {
                echo "ID tidak diberikan.";
                exit();
            }
        }
    ?>

    <div class="main">
        <div class="detail" text-align="center">
            <h1><span style="color:#00E8F8;">EDIT DATA PENDIDIKAN</span></h1>
        </div>
        <div class="form-container">
            <br>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            <br><label for="school_name">Nama Sekolah:</label>
            <input type="text" name="school_name" value="<?php echo $school_name; ?>" required></br>

            <br><label for="degree">Jenjang:</label>
            <input type="text" name="degree" value="<?php echo $degree; ?>" required></br>

            <br><label for="start_year">Tahun Mulai:</label>
            <input type="text" name="start_year" value="<?php echo $start_year; ?>" required></br>

            <br><label for="end_year">Tahun Selesai:</label>
            <input type="text" name="end_year" value="<?php echo $end_year; ?>" required></br>

            <br><input type="submit" value="Simpan"></br>
            </form>
        </div>
    </div>
</body>
</html>
