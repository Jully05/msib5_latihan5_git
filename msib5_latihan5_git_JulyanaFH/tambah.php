<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahkan Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="tanda">
    <?php
    include('koneksi.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $universitas = $_POST['universitas'];
        $alamat = $_POST['alamat'];

        $query = "INSERT INTO mahasiswa (nama, universitas, alamat) VALUES ('$nama', '$universitas', '$alamat')";

        if ($koneksi->query($query) === TRUE) {
            echo "Data mahasiswa berhasil ditambahkan.";
            echo "<br>";
            echo "<a href='tampilkan.php' target='_blank'>Lihat Data Mahasiswa</a>";
        } else {
            echo "Error: " . $query . "<br>" . $koneksi->error;
        }

        $koneksi->close();
    }
    ?>
    </div>
    <div class="tabel">
        <form method="POST" action="tambah.php">
            <table class="tambah">
                <tr>
                    <td>Nama</td>
                    <td>: <input type="text" name="nama" class="ukuran"></td>
                </tr>
                <tr>
                    <td>Universitas</td>
                    <td>: <input type="text" name="universitas" class="ukuran"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <textarea name="alamat" class="ukuran"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" value="Tambahkan" class="ukuran"></td>
                </tr>
            </table>

        </form>
    </div>
</body>

</html>