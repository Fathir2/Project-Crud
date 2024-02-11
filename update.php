<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_buku = $_POST["id_buku"];
    $kategori = $_POST["kategori"];
    $buku_nama = $_POST["buku_nama"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $penerbit = $_POST["penerbit"];

    $sql = "UPDATE buku
            SET id_buku='$id_buku',
                kategori='$kategori', 
                buku_nama='$buku_nama', 
                harga='$harga', 
                stok='$stok', 
                penerbit='$penerbit' 
            WHERE id_buku='$id_buku'";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diupdate!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $hasil=mysqli_query($conn,$sql);

    //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
    if ($hasil) {
        header("Location:index.php");
    }
    else {
        echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

    }

}

// ... Kode untuk menampilkan data buku dan formulir update
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>

    <?php
    // ... Kode untuk menampilkan data buku pada form
    $id_buku_to_update = $_GET['id_buku'];

    // Query untuk mendapatkan data buku berdasarkan ID
    $result = $conn->query("SELECT * FROM buku WHERE id_buku='$id_buku_to_update'");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>

        <h2>Update Data Buku</h2>
        <form action="" method="post">
        <div class="form-group">
        <label>ID Buku</label>   
        <input type="text" name="id_buku" value="<?php echo $row['id_buku']; ?>" required><br>
    </div>
            <div class="form-group">  
            <label>Kategori:</label>
            <input type="text" name="kategori" value="<?php echo $row['kategori']; ?>" required><br>
    </div>     
            <div class="form-group">
            <label>Nama Buku:</label>
            <input type="text" name="buku_nama" value="<?php echo $row['buku_nama']; ?>" required><br>
    </div>
            <div class="form-group">
            <label>Harga:</label>
            <input type="text" name="harga" value="<?php echo $row['harga']; ?>" required><br>
    </div>
            <div class="form-group">
            <label>Stok:</label>
            <input type="text" name="stok" value="<?php echo $row['stok']; ?>" required><br>
    </div>        
            <div class="form-group">
            <label>Penerbit:</label>
            <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>" required><br>
    </div>
         <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>

        <?php
    } else {
        echo "Data buku tidak ditemukan.";
    }
    ?>

</body>
</html>
