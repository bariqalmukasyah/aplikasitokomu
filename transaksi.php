<?php
include 'koneksi.php';

$barang = mysqli_query($koneksi, 'SELECT * from produk');

if (isset($_POST['submit'])) {
    $kode = $_POST['kode'];
    $qty = $_POST['qty'];

    $getbarang = mysqli_fetch_array(mysqli_query($koneksi, "SELECT harga from produk where kode='$kode'"));
    $harga = $getbarang['harga'];

    $q = mysqli_query($koneksi, "INSERT INTO transaksi (kode,harga,qty) VALUES ('$kode','$harga','$qty')");

    if($q) {
        header('Location: transaksi.php');
    } else {
        echo "<script>alert('Gagal menambahkan data'); window.location.href = transaksi.php;</script>";
    }
}

?>


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
    <title>Transaksi Barang</title>
</head>
<body>
<div class="container pt-4">
    <div class="row">
            <h1><a href="index.php" class="btn btn-info text-white"><i class="fa fa-angle-left"></i></a> Transaksi Barang</h1><br>
    <div class="container">
    <br/>
    <form method="POST" action="" class="form-inline mt-3">
					<label for="kode">Kode Barang&nbsp;</label>
					<select name="kode" id="kode" class="form-control mr-sm-2">
                        <option value=''>Pilih Barang</option>
                        <?php while ($a = mysqli_fetch_array($barang)) {
                            ?>
                            <option value='<?php echo $a ['kode']?>' ><?php echo $a ['barang']; ?> </option>
                            <?php }
                            ?>        
                    </select>
					
					<label>Qty&nbsp;</label>
					<input type="number" name="qty" id="qty" class="form-control mr-sm-2">
					<button type="submit" name="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                    
				</form>
                <br/>
    <table id="tabelbarang" class="table table-sm">
        <thead class="thead-light">
            <tr>
                <th>Nomor</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Total Harga</th>
                <th>Diskon</th>
                <th>Harga Fix</th>
            </tr>
            <tbody>
<?php
$q = mysqli_query($koneksi, "SELECT t.kode,p.barang,t.harga,t.qty,t.diskon,t.total from transaksi AS t join produk as p on t.kode=p.kode");

$total=0;
$total_bayar=0;
$no=1;
$diskon=0;
$hargafix=0;

while ($r = $q->fetch_assoc()) {
    $total = $r['harga']*$r['qty'];
    if ($total > 500000) {
        $diskon=$total*5/100;
    }else {
        $diskon=0;
    }
    $hargafix=$total-$diskon;
    $total_bayar += $hargafix
?>

<tr>
    <td><?= $no++ ?></td>
    <td><?= $r['kode']?></td>
    <td><?= $r['barang']?></td>
    <td><?= $r['harga']?></td>
    <td><?= $r['qty']?></td>
    <td><?= $total ?></td>
    <td><?= $diskon ?></td>
    <td><?= $hargafix ?></td>
</tr>

<?php
}
?>
<tr>
    <th colspan="7">Total Pembayaran</th>
    <th><?= $total_bayar ?></th>
</tr>
</table>
<a href='delete.php' class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
<br/>
<br/>
<footer class="text-center text-lg-start bg-light text-muted">
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2021 Copyright:
    <a class="text-reset fw-bold" href="index.php">Muhammad Bariq Al Mukasyah - 20.01.53.3005</a>
    </div>
</footer>
</body>
</html>