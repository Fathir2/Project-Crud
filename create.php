<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_buku=input($_POST["id_buku"]);
        $kategori=input($_POST["kategori"]);
        $buku_nama=input($_POST["buku_nama"]);
        $harga=input($_POST["harga"]);
        $stok=input($_POST["stok"]);
        $penerbit=input($_POST["penerbit"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into buku (id_buku,kategori,buku_nama,harga,stok,penerbit) values
        ('$id_buku','$kategori','$buku_nama','$harga','$stok','$penerbit')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($conn,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
         <div class="form-group">
            <label>ID Buku:</label>
            <input type="text" name="id_buku" class="form-control" placeholder="Masukan ID Buku7" required />
         </div>
       <div class="form-group">
        <label>Kategori:</label>
        <input type="text" name="kategori" class="form-control" placeholder="Masukan Kategori Buku" required />

    </div>
    <div class="form-group">
        <label>Nama Buku:</label>
        <input type="text" name="buku_nama" class="form-control" placeholder="Masukan Nama Buku" required/>
    </div>
   <div class="form-group">
        <label>Harga :</label>
        <input type="text" name="harga" class="form-control" placeholder="Masukan Harga" required/>
    </div>
            </p>
    <div class="form-group">
        <label>Stok:</label>
        <input type="text" name="stok" class="form-control" placeholder="Masukan Stok" required/>
    </div>
    <div class="form-group">
        <label>Penerbit:</label>
        <textarea name="penerbit" class="form-control" rows="5"placeholder="Masukan Penerbit" required></textarea>
    </div>       
     <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>