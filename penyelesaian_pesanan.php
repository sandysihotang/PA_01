<?php 
session_start();
include_once("functions/my_functions.php");
if (!isset($_SESSION['is_logged_in'])) {
  header('location: index.php');
}

  if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $pesanan=new konfirmasi_pelanggan;
    if ($_GET['jenis']=='cash') {
      if ($pesanan->selesai_cash($id)) {
        echo "<script>alert('Transaksi Sudah Selesai!')</script>";
        header('Refresh:0 url= penyelesaian_pesanan.php');
      }else{
        echo "<script>alert('Penyelesaian Transaksi Gagal!')</script>";
        header('Refresh:0 url= penyelesaian_pesanan.php');
      }
    }
    if($_GET['jenis']=='atm'){
      if ($pesanan->selesai_atm($id)) {
        echo "<script>alert('Transaksi Sudah Selesai!')</script>";
        header('Refresh:0 url= penyelesaian_pesanan.php');
      }else{
        echo "<script>alert('Penyelesaian Transaksi Gagal!')</script>";
        header('Refresh:0 url= penyelesaian_pesanan.php');
      }
    }
  }
$head=new top_buttom;
$head->top("Penyelesaian");
 ?>
  <style type="text/css">
  .d-block{
    width: 1300px;
    height: 700px;
  }
</style>
	<nav class="nav bg-light navbar-light wow fadeInUp">
    <div class="container-fluid">
		<div class="float-left col-md-3">
      <label><b>Call Center : </b><i class="fa fa-phone"></i> +62 822 7414 8833</label>         
    </div>
    <?php 
    if (!isset($_SESSION['is_logged_in'])) { ?>
       <div class="nav navbar float-right"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
        Login
      </button>
    </div>
     <?php } 
     else{  ?>
      <div class="nav navbar float-right"><button class="btn btn-primary btn-sm" >
        <i class="fa fa-user"></i><b>Kasir</b></button>
        &nbsp;<a href="functions/logout.php" class="btn btn-danger btn-sm">Logout</a></button>      
    </div> 
    <?php } ?>

  </div>
	</nav>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	  <ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" href="kasir.php"><i class="fa fa-home"></i> Konfirmasi Pelanggan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="penyelesaian_pesanan.php"><i class="fa fa-binoculars"></i> Penyelesaian Pesanan</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list"></i> Buat Pesanan</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="pesan_makanan_manual.php"><i class="fa fa-birthday-cake"></i> Makanan</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="pesan_minuman_manual.php"><i class="fa fa-beer"></i> Minuman</a>
    </div>
  </li>
  <li class="nav-item">
    <a href="list_transaksi_manual.php" class="nav-link"><i class="fa fa-user"></i> List Transaksi Manual</a>
  </li>
</ul>
	</nav>
		<br><br>
		<div class="container-fluid">
			<h2 class="alert alert-dark">PENYELESAIAN PESANAN</h2>
			<table class="table table-striped img-thumbnail">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama</th>
						<th scope="col">Tanggal Ambil</th>
						<th scope="col">Daftar Pesanan</th>
            <th scope="col">Action</th>
					</tr>
				</thead>
        <tbody>
          <?php 
        $i=1;
        $data=new konfirmasi_pelanggan;
        $all=$data->get_penyelesaian_pesanan_atm(); 
        while ($pesanan=mysqli_fetch_object($all)) {
         ?>
         <tr>
           <td><?=$i?></td>
           <td><?php 
            $nam1=new outentikasi;
            $name1=$nam1->get_user($pesanan->pelanggan)->fetch_assoc();
            echo $name1['firstname']." ".$name1['lastname']; ?></td>
            <td><?= $pesanan->tanggal_ambil ?></td>
            <td><a href="lihat_pesanan_konfirmasi.php?id=<?= $pesanan->id ?>" class="btn btn-primary btn-sm">LOOK</a></td>
            <td><a href="penyelesaian_pesanan.php?id=<?= $pesanan->id ?>&jenis=atm" class="btn btn-success btn-sm">SELESAI</a></td>
            <td></td>
         </tr>
        <?php $i++; } ?>
        </tbody>
			</table>
		</div>
<br>

      <div class="container-fluid bg-dark text-white jumbotron" style="opacity: 0.8;">
        <div class="row">
        <div class="col-md-4">
          <h2>GASTRO SIJABU JABU</h2>
            <p>Website Resto yang berada di : Pasar Siborong-Borong, Siborong-Borong, North Tapanuli Regency, North Sumatra 22474</p>
        </div>
        <div class="col-md-4">
          <!-- <h2>Developer:</h2>
          <h3>Institut Teknologi Del</h3>
          <ul>
            <li>Sandy Sihotang</li>
            <li>Mariana Sinaga</li>
            <li>Sarah Simanjuntak</li>
            <li>Edwinda Tampubolon</li>
          </ul> -->
        </div>
        <div class="col-md-4">
          <h2>Contact Us</h2>
          <p><a href="#"><i class="fa fa-envelope"></i> sandysihotang12@gmail.com</a></p>
          <p><i class="fa fa-phone"></i> +62 822 7696 5297</p>
          <p><i class="fa fa-home"></i> Gastro Sijabu-jabu</p>
        </div>
      </div>
      <hr>
      <div class="bg-dark">
            <div class="col-sm-6">
                <p class="mbr-text text-white">
                  © Copyright 2018 Gastro Sijabu jabu</p>
              </div><br>
          </div>
       </div> 
       </div>
<?php 
  $head->buttom();
 ?>
