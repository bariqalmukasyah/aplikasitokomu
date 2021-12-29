<?php
include "koneksi.php";

$kode = $_GET['kode'];
$sql = "DELETE from produk where kode='$kode'";
$delete = mysqli_query($koneksi,$sql);

if ($delete) {
    header("Location: index.php");
}else{
    echo mysqli_error($koneksi);
}

?>