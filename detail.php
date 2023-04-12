<?php
include 'layout/navbar.php';

$id = $_GET["id"];
$produk = query("SELECT * FROM produk WHERE id_produk = '$id'")[0];

?>
<div id="detail" class="container">
    <form action="" method="POST">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4">
            <img src="image/<?= $produk["foto"]; ?>" class="w-100">
        </div>
        <div class="col-md-6">
            <div class="detail-container">
                <h1><?= $produk["nama_produk"]; ?></h1>
                <h4>Rp. <?= number_format($produk['harga'], 0, ',', '.'); ?></h4>
                <div class="text-secondary">Tersisa <?= $produk["stok"]; ?> barang</div>
                <div><?= $produk["deskripsi"]; ?></div>
                <div class="mt-3">
                    <label for="qty" class="form-label">Masukkan Jumlah Barang Yang Ingin Dibeli</label>
                    <input class="form-control" type="number" name="qty" id="qty" placeholder="0 Barang">
                </div>
                <div class="mt-2"><button class="btn btn-success" type="submit" name="beli"><i class="fa-solid fa-basket-shopping me-2"></i>Masukkan ke keranjang</button></div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<?php

if (isset($_POST["beli"])) {
    $qty = $_POST["qty"];
    $_SESSION["cart"][$id] = $qty;

    echo "
    <script type='text/javascript'>
        alert('Produk Berhasil Ditambahkan Ke Keranjang Belanja!');
        window.location= 'keranjang.php'
    </script>
    ";
}
?>
<?php 
include 'layout/footer.php';
?>