<?php
include "koneksi.php";

$kode = $_POST['kode'];
$barang = $_POST['barang'];
$harga = $_POST['harga'];

$sql = "UPDATE produk SET barang='$barang',harga='$harga' where kode='$kode'";
$update = mysqli_query($koneksi,$sql);

if($update) {
    header("Location: index.php");
}else{
    echo mysqli_error($koneksi);
}

?>