<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud</title>
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
    <?php 
    
    include "koneksi.php";

    if (isset($_GET['id_buku'])) {
        $id_buku=htmlspecialchars($_GET["id_buku"]);

        $sql="delete from buku where id_buku='$id_buku' ";
        $hasil=mysqli_query($conn,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>
  <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>ID Buku</th>
            <th>Kategori</th>
            <th>Nama Buku</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Penerbit</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from buku order by id_buku desc";

        $hasil=mysqli_query($conn,$sql);
        $id_buku=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $id_buku++;

            ?>
       <tbody>
            <tr>
                <td><?php echo $data["id_buku"]; ?></td>
                <td><?php echo $data["kategori"]; ?></td>
                <td><?php echo $data["buku_nama"];   ?></td>
                <td><?php echo $data["harga"];   ?></td>
                <td><?php echo $data["stok"];   ?></td>
                <td><?php echo $data["penerbit"];   ?></td>
                <td>
                    <a href="update.php?id_buku=<?php echo htmlspecialchars($data['id_buku']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_buku=<?php echo $data['id_buku']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>     
       <<?php 
        }
        
       ?> 
       </table>
       <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
       <a href="tampil.php" class="btn btn-primary" role="button">Tampilkan</a>


      
<div class="container">
    <br>
    <h4><center>TABEL PENERBIT</center></h4>
    <?php 
    
    include "koneksi.php";

    if (isset($_GET['id_penerbit'])) {
        $id_penerbit=htmlspecialchars($_GET["id_penerbit"]);

        $sql="delete from penerbit where id_penerbit='$id_penerbit' ";
        $hasil=mysqli_query($conn,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>
  <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>ID Penerbit</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kota</th>
            <th>Telepon</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>
        <?php
        include "koneksi.php";
        $sql="select * from penerbit order by id_penerbit desc";

        $hasil=mysqli_query($conn,$sql);
        $id_penerbit=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $id_penerbit++;

            ?>
       <tbody>
            <tr>
                <td><?php echo $data["id_penerbit"]; ?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td><?php echo $data["kota"];   ?></td>
                <td><?php echo $data["telepon"];   ?></td>
                
                <td>
                    <a href="buat.php?id_penerbit=<?php echo htmlspecialchars($data['id_penerbit']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_penerbit=<?php echo $data['id_penerbit']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>     
       <<?php 
        }
        
       ?> 
       </table>
       <a href="buat.php" class="btn btn-primary" role="button">Tambah Data</a>
       <a href="tampil.php" class="btn btn-primary" role="button">Tampilkan</a>
</body>
</html>