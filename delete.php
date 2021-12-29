<?php
include 'koneksi.php';
$delete=mysqli_query($koneksi, 'DELETE from transaksi');

if ($delete) {
    header("Location: transaksi.php");
}else{
    echo mysqli_error($koneksi);
}

?>