<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Tambah Data Pendidikan</title>
</head>
<body>
    <?php
        include "nav.php";
        include "koneksi.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Proses form jika data dikirimkan
            $school_name = $_POST["school_name"];
            $degree = $_POST["degree"];
            $start_year = $_POST["start_year"];
            $end_year = $_POST["end_year"];

            // Query untuk menyimpan data ke database
            $query = "INSERT INTO education (school_name, degree, start_year, end_year) VALUES ('$school_name', '$degree', '$start_year', '$end_year')";

            if (mysqli_query($koneksi, $query)) {
                // Redirect ke halaman utama setelah data berhasil ditambahkan
                header("Location: edu.php");
                exit();
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
            }
        }
    ?>
    <div class="main">
        <div class="detail" text-align="center">
            <h1><span style="color:#00E8F8;">TAMBAH DATA PENDIDIKAN</span></h1>
        </div>
        <div class="form-container">
            <br>
            <form method="post">
                <label for="school_name">Nama Sekolah:</label>
                <input type="text" name="school_name" required>
                </br>
                <br>
                <label for="degree">Jenjang:</label>
                <input type="text" name="degree" required>
                </br>
                <br>
                <label for="start_year">Tahun Mulai:</label>
                <input type="text" name="start_year" required>
                </br>
                <br>
                <label for="end_year">Tahun Selesai:</label>
                <input type="text" name="end_year" required>
                </br>
                <br>
                <input type="submit" value="Simpan"></br>
            </form>
        </div>
    </div>
</body>
</html>
