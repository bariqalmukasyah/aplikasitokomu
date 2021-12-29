<?php
include "koneksi.php";

$kode = $_POST['kode'];
$barang = $_POST['barang'];
$harga = $_POST['harga'];

$sql = "INSERT INTO produk(kode,barang,harga) values ('$kode','$barang','$harga')";
$insert = mysqli_query($koneksi,$sql);

if($insert) {
    header("Location: index.php");
}else{
    echo mysqli_error($koneksi);
}

?>