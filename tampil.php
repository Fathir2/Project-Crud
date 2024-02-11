<?php
include('koneksi.php');

// Query untuk mendapatkan data buku
$result = $conn->query("SELECT * FROM buku");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">TABEL BUKU</span>
        </div>
</nav>
<div class="container">
    <br>
    <h4><center>DAFTAR BUKU PERPUSTAKAAN</center></h4>
    <h2>Data Buku</h2>
    <table class="my-3 table table-bordered">
            <tr class="table-primary">        
            <th>ID Buku</th>
            <th>Kategori</th>
            <th>Nama Buku</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Penerbit</th>
        </tr>

        <?php
        // Tampilkan data buku
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_buku'] . "</td>";
            echo "<td>" . $row['kategori'] . "</td>";
            echo "<td>" . $row['buku_nama'] . "</td>";
            echo "<td>" . $row['harga'] . "</td>";
            echo "<td>" . $row['stok'] . "</td>";
            echo "<td>" . $row['penerbit'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php
include('koneksi.php');

// Query untuk mendapatkan data buku
$result = $conn->query("SELECT * FROM penerbit");



?>


    <div class="container">
    <br>
    <h4><center>DAFTAR PENERBIT</center></h4>
    <h2>Data Penerbit</h2>
    <table class="my-3 table table-bordered">
            <tr class="table-primary">        
            <th>ID Penerbit</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Telepon</th>
        </tr>

        <?php
        // Tampilkan data buku
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_penerbit'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['alamat'] . "</td>";
            echo "<td>" . $row['kota'] . "</td>";
            echo "<td>" . $row['telepon'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
