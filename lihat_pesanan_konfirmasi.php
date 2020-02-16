<?php
session_start();
include_once("functions/my_functions.php");
if (!isset($_SESSION['is_logged_in'])) {
    header('location: index.php');
}
$head = new top_buttom;
$head->top("Home");
?>
    <div class="container" align="center">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Makanan/ Minuman</th>
                <th scope="col">Jumlah Porsi</th>
                <th scope="col">Total Harga</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $my = new pemesanan;
            $i = 1;
            $tot = 0;
            $makanan = $my->get_nama_makanan($_GET['id']);
            while ($makanan1 = mysqli_fetch_object($makanan)) {
                ?>
                <tr>
                    <td><?= $i ?>.</td>
                    <td><?= $my->read_makanan($makanan1->id_menu)->fetch_assoc()['nama_makanan'] ?></td>
                    <td><?= $makanan1->jumlah_pesanan ?></td>
                    <td>Rp.<?= number_format($makanan1->total_harga) ?>.00</td>
                </tr>
                <?php $tot += $makanan1->total_harga;
                $i++;
            } ?>
            <?php
            $minuman = $my->get_nama_minuman($_GET['id']);
            while ($minuman1 = mysqli_fetch_object($minuman)) {
                ?>
                <tr>
                    <td><?= $i ?>.</td>
                    <td><?= $my->read_minuman($minuman1->Id_menu_minum)->fetch_assoc()['nama_minuman'] ?></td>
                    <td><?= $minuman1->jumlah_pesanan ?></td>
                    <td>Rp.<?= number_format($minuman1->total_harga) ?>.00</td>
                </tr>
                <?php $tot += $minuman1->total_harga;
            } ?>
            <tr>
                <td colspan="3">Total Seluruhnya</td>
                <td>Rp.<?= number_format($tot) ?>.00</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <a href="penyelesaian_pesanan.php" class="btn btn-primary btn-large">Back</a>
        <a href="cetak_laporan.php?id=<?= $_GET['id'] ?>" target="_blank" class="btn btn-info float-right">Lihat/Cetak
            Pembayaran</a>
    </div>
<?php
$head->buttom();
?>