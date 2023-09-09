<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilkan Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="tampilkan">
        <?php
        include('koneksi.php');

        $query = "SELECT * FROM mahasiswa";
        $result = $koneksi->query($query);

        if ($result->num_rows > 0) {
            echo '<table border="1">';
            echo '<tr><th>ID</th><th>Nama</th><th>Universitas</th><th>Alamat</th><th>Aksi</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                echo '<td>' . $row["nama"] . '</td>';
                echo '<td>' . $row["universitas"] . '</td>';
                echo '<td>' . $row["alamat"] . '</td>';
                echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a> | <a href="hapus.php?id=' . $row['id'] . '">Hapus</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "Tidak ada data mahasiswa 😴";
        }

        $koneksi->close();
        ?>
    </div>
</body>

</html>