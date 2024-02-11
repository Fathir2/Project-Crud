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

        $id_penerbit=input($_POST["id_penerbit"]);
        $nama=input($_POST["nama"]);
        $alamat=input($_POST["alamat"]);
        $kota=input($_POST["kota"]);
        $telepon=input($_POST["telepon"]);
        

        //Query input menginput data kedalam tabel anggota
        $sql="insert into penerbit (id_penerbit,nama,alamat,kota,telepon) values
        ('$id_penerbit','$nama','$alamat','$kota','$telepon')";

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
            <label>ID Penerbit:</label>
            <input type="text" name="id_penerbit" class="form-control" placeholder="Masukan ID Penerbit" required />
         </div>
       <div class="form-group">
        <label>Nama:</label>
        <input type="text" name="nama" class="form-control" placeholder="Maukkan Nama" required />

    </div>
    <div class="form-group">
        <label>Alamat:</label>
        <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" required/>
    </div>
   <div class="form-group">
        <label>Kota :</label>
        <input type="text" name="kota" class="form-control" placeholder="Masukan Kota" required/>
    </div>
            </p>
    <div class="form-group">
        <label>Telepon:</label>
        <input type="text" name="telepon" class="form-control" placeholder="Masukan Nomor Telepon" required/>
     <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>