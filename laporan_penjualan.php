<?php 
session_start();
include_once("functions/my_functions.php");
$head=new top_buttom;
$head->top("Laporan Penjualan");
 ?>
  <style type="text/css">
  .d-block{
    width: 100%;
    height: 100%;
  }
  .scroll-komentar{
    border: 2px solid lightblue; 
    height: 80px; 
    margin-left: 30px; 
    overflow: auto; 
    padding: 3px; 
    text-align: justify; 
    width:80%;
    height: 250px;
  }
  .komentar-pelanggan{
    font-size: 10px;
    color: black;
  }
  .isi-komentar{
    font-size: 15px;
  }
</style>
	<nav class="nav bg-light navbar-light wow fadeInUp">
    <div class="container-fluid">
		<div class="float-left col-md-3">
      <img src="">
      <label><i class="fa fa-phone"></i> +91234</label>      
    </div>
    <?php 
    if (!isset($_SESSION['is_logged_in'])) { ?>
       <div class="nav navbar float-right"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
        Login
      </button>
    </div>
     <?php } 
     else{ 
      $account=new outentikasi;

      if ($account->get_session('user')==2) { ?>
      <div class="nav navbar float-right"><button class="btn btn-primary btn-sm" >
        <i class="fa fa-user"></i><b>Administrator</b></button>
        
      
     <?php }
     else if($account->get_session('user')==3){
     ?>
     <div class="nav navbar float-right"><button class="btn btn-primary btn-sm" >
        <i class="fa fa-user"></i><b>Kasir</b></button>
     <?php } 
     else { $user=$account->get_user($account->get_session('id'));
            $name=$user->fetch_assoc(); ?>
      <div class="nav navbar float-right"><button class="btn btn-primary btn-sm" >
        <i class="fa fa-user"></i><?= $name['firstname']." ".$name['lastname'] ?></button>
      <?php } ?>
        &nbsp;<a href="functions/logout.php" class="btn btn-danger btn-sm">Logout</a></button>      
    </div> 
    <?php } ?>

  </div>
	</nav>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	  <ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="about.php"><i class="fa fa-binoculars"></i> About</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="galery.php"><i class="fa fa-folder-open"></i> Galery</a>
  </li>
  <?php if (isset($_SESSION['is_logged_in']) && $account->get_session('user')==2) { ?>
    <li class="nav-item">
      <a href="laporan_penjualan.php" class="nav-link active"><i class="fa fa-book"></i> Laporan Penjualan</a>
    </li> 
  <?php } ?>

</ul>
	</nav>
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Login/Register</h4>
            </div>
            <div class="modal-body">

              <div id="accordion" role="tablist">
                <div class="card">
                  <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Login
                      </a>
                    </h5>
                  </div>

                  <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                    <div class="card-body">
                      <form action="functions/login_proses.php" method="post" class="form-signin">
                        <h2>Please Sign in</h2>
                        <label for="inputEmail" class="sr-only">Username</label>
                        <input type="text" name="username" class="form-control" required autofocus placeholder="Username"><br>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="Password" name="password" class="form-control" required autofocus placeholder="Password"><br>
                        <input class="btn btn-primary btn-block" type="submit" name="login" value="Login">
                      </form>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" role="tab" id="headingTwo">
                    <h5 class="mb-0">
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Register
                      </a>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="card-body">
                      <form action="functions/registrasi_proses.php" method="post">
                        <label for="inputEmail" class="sr-only">Nama Depan</label>
                        <input type="text" name="nama_depan" class="form-control" required autofocus placeholder="Nama Depan"><br>
                        <label for="inputEmail" class="sr-only">Last Name</label>
                        <input type="text" name="nama_belakang" class="form-control" required autofocus placeholder="Nama Akhir"><br>
                        <label for="inputEmail" class="sr-only">NIK</label>
                        <input type="text" name="nik" class="form-control" required autofocus placeholder="NIK"><br>
                        <label for="inputEmail" class="sr-only">Telephone</label>
                        <label for="inputEmail">Alamat</label>
                        <textarea name="alamat" class="form-control"></textarea><br>
                        <input type="text" name="nomor_telephone" class="form-control" required autofocus placeholder="Telephone"><br>
                        <label for="inputEmail" class="sr-only">Username</label>
                        <input type="text" name="username" class="form-control" required autofocus placeholder="Username"><br>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="Password" name="password" class="form-control" required autofocus placeholder="Password"><br>
                        <input  class="btn btn-primary btn-block" type="submit" name="registrasi" placeholder="Register">
                      </form>
                    </div>
                  </div>
                </div>
               
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="firefoxModal" tabindex="-1" role="dialog" aria-labelledby="firefoxModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div> 
      </div> <br>
      <div class="container-fluid alert alert-secondary img-thumbnail">
      	  <h3 align="center">Laporan Penjualan Cafe</h3>
          <div align="right">
          <form action="laporan_penjualan.php" method="post">
            <?php if (isset($_POST['submit'])) {?>
            <input type="date" value="<?= $_POST['tanggal'] ?>" name="tanggal" required>
          <?php } else {?>
            <input type="date" name="tanggal" required>
            <?php } ?>
            <button type="submit" name="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
      </div>
      <div class="container-fluid">
      	<table class="table table-striped img-thumbnail">
      		<tr>
      			<th scope="col">#</th>
      			<th scope="col">Kode Pembelian</th>
      			<th scope="col">Tanggal Selesai</th>
      			<th scope="col">Harga</th>
      		</tr>
      		<?php
      		$query=new laporan_penjualan;
          $data=$query->read_laporan();
          $no=1;
          if (!isset($_POST['submit'])) {
          while ($data3=$data->fetch_assoc()){ 
          ?>
      		<tr>
            <td><?php echo $no; ?></td>
      			<td><?php echo $data3['id']; ?></td>
      			<td><?php echo $data3['tanggal_selesai']; ?></td>
      			<td><?php echo "Rp. ".number_format($data3['total_harga']).".00"; ?></td>      			
      		</tr>
        <?php $no++; } 
      }
      else{
        $data2=$query->search($_POST['tanggal']);
        if (!mysqli_num_rows($data2)) { ?>
          <tr>
            <td colspan="4">Data pada tanggal <?= $_POST['tanggal'] ?> tidak ada..</td>
          </tr>
       <?php }else{
        while ($data3=$data2->fetch_assoc()){ ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data3['id']; ?></td>
            <td><?php echo $data3['tanggal_selesai']; ?></td>
            <td><?php echo "Rp. ".number_format($data3['total_harga']).".00"; ?></td>           
          </tr>
        <?php $no ++;
          } 
        }
      }
      ?>
      	</table>
      </div>
      <div class="container-fluid bg-dark jumbotron text-white" style="opacity: 0.8;">
        <div class="row">
        <div class="col-md-4">
          <h2>GASTRO SIJABU JABU</h2>
            <p>Website Resto yang berada di : Pasar Siborong-Borong, Siborong-Borong, North Tapanuli Regency, North Sumatra 22474</p>
        </div>
        <div class="col-md-4">
          <h2>Developer:</h2>
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
      <div>
            <div class="col-sm-6">
                <p class="mbr-text text-black">
                  © Copyright 2018 Gastro Sijabu jabu</p>
              </div><br>
          </div>
       </div> 
       </div>
<?php 
  $head->buttom();
 ?>