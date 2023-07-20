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
        include "koneksi.php";
    ?>
        <div class="main">
            <div class="detail" text-align="center">
                <h1><span style="color:#00E8F8;">RIWAYAT PENDIDIKAN</span></h1>
                <p><a href="add_edu.php"><button type="button">Tambah Data</button></a></p>
            </div>
            <table>
                <tr>
                    <td>NO</td>
                    <td>Nama Sekolah</td>
                    <td>Jenjang</td>
                    <td>Tahun Mulai</td>
                    <td>Tahun Selesai</td>
                    <td>Aksi</td>
                </tr>
                <?php
                $query = mysqli_query($koneksi, "SELECT * FROM education");
                $no=0;
                while($row = mysqli_fetch_array($query)) {
                    $no=$no+1;
                    ?>           
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $row['school_name'];?></td>
                <td><?php echo $row['degree'];?></td>
                <td><?php echo $row['start_year'];?></td>
                <td><?php echo $row['end_year'];?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>"><i class="bi bi-pencil-square"></i></a> | 
                    <a href="delete.php?id=<?php echo $row['id']; ?>"><i class="bi bi-trash"></i></a></td>
                </tr>
                <?php
            }?>
        </table>
    </div>
</body>
</html>