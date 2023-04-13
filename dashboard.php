<?php
require 'functions.php';


if (!isset($_SESSION["username"])) {
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

$transaksi = query("SELECT * FROM transaksi WHERE status = 'proses'");
$tolak = query("SELECT * FROM transaksi WHERE status = 'ditolak'");
$verifikasi = query("SELECT * FROM transaksi WHERE status = 'terverifikasi'");

?>

<?php require '../layout/sidebar.php'; ?>
<div id="main">
<div class="content">
    <h1>Data Transaksi</h1>
    <hr>
    <h3>Produk Request</h3>
    <h3>Produk Selesai - Terverifikasi</h3>
    <table class="table table-responsive table-hover mb-5">
        <tr>
            <th>Id Transaksi</th>
            <th>Tanggal Transaksi</th>
            <th>Alamat</th>
            <th>No Whatsapp</th>
            <th>Nama Lengkap</th>
            <th>Nama Produk</th>
            <th>Total Harga</th>
            <th>Foto</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
            <?php foreach($verifikasi as $data_1) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data_1["tanggal_transaksi"]; ?></td>
                <td><?= $data_1["nama_lengkap"]; ?></td>
                <td><?= $data_1["alamat"]; ?></td>
                <td><?= $data_1["nomor_whatsapp"]; ?></td>
                <td><?= $data_1["nama_produk"]; ?></td>
                <td><?= $data_1["subtotal"]; ?></td>
                <td><img src="../image/<?= $data_1["foto"]; ?>" alt="" width="70"></td>
                <td><?= $data_1["status"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    <h3>Produk Selesai - Di Tolak</h3>
    <table class="table table-responsive table-hover">
        <tr>
            <th>Id Transaksi</th>
            <th>Tanggal Transaksi</th>
            <th>Alamat</th>
            <th>No Whatsapp</th>
            <th>Nama Lengkap</th>
            <th>Nama Produk</th>
            <th>Total Harga</th>
            <th>Foto</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($tolak as $data_2) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $data_2["tanggal_transaksi"]; ?></td>
                <td><?= $data_2["nama_lengkap"]; ?></td>
                <td><?= $data_2["alamat"]; ?></td>
                <td><?= $data_2["nomor_whatsapp"]; ?></td>
                <td><?= $data_2["nama_produk"]; ?></td>
                <td><?= $data_2["subtotal"]; ?></td>
                <td><img src="../image/<?= $data_2["foto"]; ?>" alt="" width="70"></td>
                <td><?= $data_2["status"]; ?></td>
                
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    
</div>
</div>