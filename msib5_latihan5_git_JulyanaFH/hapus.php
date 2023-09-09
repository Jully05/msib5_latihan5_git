<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="DM">
        <?php
        echo "<a href='tampilkan.php'>Lihat Data Mahasiswa</a>";
        ?>
    </div>
    <div class="hapus">
        <?php
        include('koneksi.php');

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $query = "DELETE FROM mahasiswa WHERE id=$id";

            if ($koneksi->query($query) === TRUE) {
                echo "Data mahasiswa berhasil dihapus 😥";
            } else {
                echo "Error: " . $query . "<br>" . $koneksi->error;
            }
        }

        $koneksi->close();
        ?>
    </div>
</body>

</html>