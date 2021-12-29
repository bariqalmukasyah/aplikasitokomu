<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Tokomu</title>
</head>
<body>
<div class="container pt-4">
    <div class="row">
            <h1>APLIKASI TOKOMU<a href="index.php"></a></h1><br>
    <div class="container">
    <br/>
    <a class="btn btn-success" href="transaksi.php"><i class='fa fa-cart-plus'></i> Transaksi</a>
    <a class="btn btn-primary" href="form.php"><i class='fa fa-plus'></i> Tambah Barang</a>
    <br/>
    <br/>
    <table id="tabelbarang" class="table table-sm">
        <thead class="thead-light">
            <tr>
                <th>Nomor</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Edit</th>
            </tr>
            <tbody>
<?php
include "koneksi.php";
$id=1;
$tampil=mysqli_query($koneksi, "select * from produk ORDER BY id");
while($r=mysqli_fetch_array($tampil)){
    echo"
    <tr>
    <td>$id.</td>
    <td>$r[kode]</td>
    <td>$r[barang]</td>
    <td>$r[harga]</td>
    <td>
    <a href='edit.php?kode=".$r['kode']."' class='btn btn-info btn-sm'><i class='fa fa-pencil'></i></a>
    <a href='hapus.php?kode=".$r['kode']."' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></a>
    </td>
    </tr>
    ";
    $id++;
}
echo"</table>";
?>
<tbody>
<footer class="text-center text-lg-start bg-light text-muted">
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright:
    <a class="text-reset fw-bold" href="index.php">Muhammad Bariq Al Mukasyah - 20.01.53.3005</a>
    </div>
</footer>
</body>
</html>