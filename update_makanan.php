<?php 
session_start();
include_once("functions/my_functions.php");
$head=new top_buttom;
$head->top("Home");
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
     else{ ?>
         <div class="nav navbar float-right"><button class="btn btn-primary btn-sm" >
        <i class="fa fa-user"></i> Sandy
      </button>&nbsp;<a href="functions/logout.php" class="btn btn-danger btn-sm">Logout</a>      
    </div>
    <?php } ?>

  </div>
	</nav>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	  <ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list"></i> Pesan</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="pesan_makanan.php"><i class="fa fa-birthday-cake"></i> Makanan</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="pesan_minuman.php"><i class="fa fa-beer"></i> Minuman</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="pesan_meja.php"><i class="fa fa-table"></i> Meja</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="about.php"><i class="fa fa-binoculars"></i> About</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="galery.php"><i class="fa fa-folder-open"></i> Galery</a>
  </li>
  <?php 
  $account=new outentikasi;
  if (isset($_SESSION['is_logged_in']) && $account->get_session('user')==1) { ?>
  <li class="nav-item">
    <a href="list_transaksi.php" class="nav-link"><i class="fa fa-book-heart"></i> List Pemesanan</a>
  </li>
   <?php } ?>
</ul>
	</nav><br>
  <div class="container img-thumbnail alert alert-info">
        <div class="row">
          <div class="col-md-12">
            <div class="product">
              <h3 align="center">Update Makanan</h3><hr class="pg-titl-bdr-bte"></hr>
              <?php 
              $data=new menu;
              $menu=$data->get_while_id($_GET['id']);
              $makanan=mysqli_fetch_assoc($menu);
               ?>
              <form action="tambah.php?id=<?=$_GET['id']?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <p>Nama Makanan</p>
                  <input type="text" name="nama_makanan" value="<?=$makanan['nama_makanan']?>" class="form-control" required />
                </div>
                <div class="form-group">
                  <p>Harga Makanan</p>
                  <input type="number" name="harga" value="<?=$makanan['Harga']?>" class="form-control" required />
                </div>
                <div class="form-group">
                  <p>Deskripsi</p>
                  <textarea name="deskripsi" class="form-control" placeholder="Deskripsi Minuman"><?= $makanan['deskripsi'] ?></textarea>
                </div>
                <div class="form-group">
                  <p>Status KeterSediaan</p>
                  <select name="stok" class="form-control" required>
                    <option value="1">Tersedia</option>
                    <option value="2">Tidak Tersedia</option>
                  </select>
                </div>
                <div class="form-group">
                  <p>Gambar</p>
                  <input type="file" name="gambar" required class="btn btn-primary">
                </div>
                <div class="text-center"><button name="update_makanan" type="submit" class="btn btn-md"><i class="fa fa-plus"></i>Update</button></div>
              </form>
            </div>
          </div>
        </div>
      </div><br>
      <div class="container-fluid bg-dark text-white jumbotron" style="opacity: 0.8;">
        <div class="row">
        <div class="col-md-4">
          <h2>GASTRO SIJABU JABU</h2>
            <p>Website Resto yang berada di : Pasar Siborong-Borong, Siborong-Borong, North Tapanuli Regency, North Sumatra 22474</p>
        </div>
        <div class="col-md-4">
          <h2>Developper:</h2>
          <h3>Institut Teknologi Del</h3>
          <ul>
            <li>Sandy Sihotang</li>
            <li>Mariana Sinaga</li>
            <li>Sarah Simanjuntak</li>
            <li>Edwinda Tampubolon</li>
          </ul>
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