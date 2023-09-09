<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="tampilkan">
        <?php
        include('koneksi.php');

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $universitas = $_POST['universitas'];
            $alamat = $_POST['alamat'];

            $query = "UPDATE mahasiswa SET nama='$nama', universitas='$universitas', alamat='$alamat' WHERE id=$id";

            if ($koneksi->query($query) === TRUE) {
                echo "Data mahasiswa berhasil diperbarui.";
                echo "<a href='tampilkan.php'>Kembali Ke Data Mahasiswa</a>";
            } else {
                echo "Error: " . $query . "<br>" . $koneksi->error;
            }
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $query = "SELECT * FROM mahasiswa WHERE id=$id";
            $result = $koneksi->query($query);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                ?>
            </div>
            <div class="tabel">
                <form method="POST" action="edit.php">
                    <table class="tambah">
                        <tr>
                            <td>ID:</td>
                            <td>
                                <?php echo $row['id']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama:</td>
                            <td><input type="text" name="nama" value="<?php echo $row['nama']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Universitas:</td>
                            <td><input type="text" name="universitas" value="<?php echo $row['universitas']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Alamat:</td>
                            <td><textarea name="alamat"><?php echo $row['alamat']; ?></textarea></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <td colspan="2" align="center"><input type="submit" name="edit" value="Perbarui"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <?php
            } else {
                echo "Data mahasiswa tidak ditemukan.";
            }
        }

        $koneksi->close();
        ?>
</body>

</html>