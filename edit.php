<?php
session_start();
include ('koneksi.php');

if(isset($_POST['edit'])){
    $no_lama = $_POST['no_lama'];
    $kode_buku = $_POST['kode_buku'];
    $no_buku = $_POST['no_buku'];
    $judul_buku = $_POST['judul_buku'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $nama_penulis = $_POST['nama_penulis'];
    $penerbit = $_POST['penerbit'];
    $jumlah_halaman = $_POST['jumlah_halaman'];
    $harga = $_POST['harga'];
    $gambar_buku = $_POST['gambar_buku'];

    mysqli_query($koneksi, "UPDATE buku SET kode_buku='$kode_buku', no_buku='$no_buku', judul_buku='$judul_buku', tahun_terbit='$tahun_terbit', nama_penulis='$nama_penulis', 
    penerbit='$penerbit', jumlah_halaman='$jumlah_halaman', harga='$harga', gambar_buku='$gambar_buku'
    WHERE no_buku='$no_lama'");

   header('Location: admin.php'); 
}

if (isset($_GET['no_buku'])) {
    $id = $_GET['no_buku'];
    $sql = mysqli_query($koneksi, "SELECT * FROM widya WHERE no_buku='$id'");
    
    if(mysqli_num_rows($sql) === 0) {
        header('Location: admin.php');
        exit();
    }
    
    $data = mysqli_fetch_assoc($sql);
} else {
    header('Location: admin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fcefee; /* soft pink background */
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: #fff0f6; /* very soft pink */
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(166, 77, 121, 0.3);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            color: #a64d79; /* dark pink */
            margin-bottom: 20px;
            text-align: center;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #f8bbd0; /* soft pink */
            color: #7a2e51; /* dark pink text */
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #f48fb1; /* slightly darker pink on hover */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Buku</h2>
        <form action="" method="post">
            <input type="hidden" name="no_lama" value="<?= $data['no_buku'] ?>" required>
            <input type="text" name="kode_buku" value="<?=$data['kode_buku']?>" required placeholder="Kode Buku">
            <input type="text" name="no_buku" value="<?=$data['no_buku']?>" required placeholder="No Buku">
            <input type="text" name="judul_buku" value="<?=$data['judul_buku']?>" required placeholder="Judul Buku">
            <input type="number" name="tahun_terbit" value="<?=$data['tahun_terbit']?>" required placeholder="Tahun Terbit">
            <input type="text" name="nama_penulis" value="<?=$data['nama_penulis']?>" required placeholder="Nama Penulis">
            <input type="text" name="penerbit" value="<?=$data['penerbit']?>" required placeholder="Penerbit">
            <input type="number" name="jumlah_halaman" value="<?=$data['jumlah_halaman']?>" required placeholder="Jumlah Halaman">
            <input type="number" name="harga" value="<?=$data['harga']?>" required placeholder="Harga">
            <input type="text" name="gambar_buku" value="<?=$data['gambar_buku']?>" required placeholder="Gambar Buku">
            <input type="submit" name="edit" value="EDIT">
        </form>
    </div>
</body>
</html>

