<?php 
session_start();
include_once("functions/my_functions.php");
if (!isset($_SESSION['is_logged_in'])) {
  header('location: index.php');
}
$head=new top_buttom;
$head->top("Home");
 ?>
<div class="container" align="center">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Makanan/ Minuman</th>
                <th scope="col">Jumlah Porsi</th>
                <th scope="col">Tanggal Pengambilan</th>
                <th scope="col">Total Harga</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $data=new konfirmasi_pelanggan;
                $i=1;
                $tot=0;
                $pemesanan=$data->get_pesanan_byid_makanan($_GET['id']);
                while($makanan=mysqli_fetch_assoc($pemesanan)){ 
                  $nama=$data->get_data_makanan($makanan['id_menu']);
                  $nama_makanan=$nama->fetch_assoc();
                  $tot+=$makanan['total_harga'];
                  ?>
                  <tr>
                    <th><?=$i?></th>
                    <td><?= $nama_makanan['nama_makanan'] ?></td>
                    <td><?=$makanan['jumlah_pesanan']?></td>
                    <td><?=$makanan['waktu_pengambilan']?></td>
                    <td>Rp.<?= number_format($makanan['total_harga']) ?>.00</td>
                  </tr>
                  <?php $i++; } ?>
              <?php 
                $pemesanan_minum=$data->get_pesanan_byid_minuman($_GET['id']);
                while($minuman=mysqli_fetch_assoc($pemesanan_minum)){ 
                  $nama=$data->get_data_minuman($minuman['Id_menu_minum']);
                  $nama_minuman=$nama->fetch_assoc();
                  $tot+=$minuman['total_harga'];
                  ?>
                  <tr>
                    <th><?=$i?></th>
                    <td><?= $nama_minuman['nama_minuman'] ?></td>
                    <td><?=$minuman['jumlah_pesanan']?></td>
                    <td><?=$minuman['waktu_pengambilan']?></td>
                    <td>Rp.<?= number_format($minuman['total_harga']) ?>.00</td>
                  </tr>
                  <?php $i++; } ?>
                  <tr>
                    <td colspan="4" align="center">Total Seluruhnya</td>
                    <td>Rp.<?= number_format($tot) ?>.00</td>
                  </tr>                  
            </tbody>
          </table>
</div>
<div class="container">
	<a href="kasir.php" class="btn btn-primary btn-large">Back</a>
</div>
<?php 
  $head->buttom();
 ?>