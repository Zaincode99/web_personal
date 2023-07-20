
<!---Log-in-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Portfolio</title>
</head>

<body>
<?php
    include "nav.php";
    include "koneksi.php"
    ?>
    <section>
        <div class="main">
            <div class="detail">
                <img class="profile-image" src="image/laptop.jpeg" alt="Foto Profil">
                <h1><span>Hi, It's Me</span> <br> I'm <span style="color:#00E8F8;">Zainur</span></h1>
                    <!-- // Ambil data dari tabel "about" // -->
                    <?php
                        $sql = "SELECT * FROM about";
                        $result = $koneksi->query($sql);
                    
                        // Tampilkan data
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<p>" . $row['description'] . "</p>";
                            }
                        }?>
            <!--- SOCIAL -->
            <a href="tentang.php"><button type="button">Detail >></button></a>
            <div class="social">
                    <a href="https://www.github.com/zaincode99"><i class="bi bi-github"></i></a>
                    <a href="https://www.instagram.com/zainzainy"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=100019999875637"><i class="bi bi-facebook"></i></a>
                </div>
            </div>
        </div>
    </section>

</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap');
</style>

</html>