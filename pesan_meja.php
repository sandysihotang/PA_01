<?php
session_start();
include_once("functions/my_functions.php");
$head = new top_buttom;
$head->top("Meja");
?>
<style type="text/css">
    .d-block {
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
            <div class="nav navbar float-right">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                    Login
                </button>
            </div>
        <?php }
        else{
        $account = new outentikasi;

        if ($account->get_session('user') == 2) { ?>
        <div class="nav navbar float-right">
            <button class="btn btn-primary btn-sm">
                <i class="fa fa-user"></i><b>Administrator</b></button>


            <?php }
            else if ($account->get_session('user') == 3){
            ?>
            <div class="nav navbar float-right">
                <button class="btn btn-primary btn-sm">
                    <i class="fa fa-user"></i><b>Kasir</b></button>
                <?php }
                else {
                $user = $account->get_user($account->get_session('id'));
                $name = $user->fetch_assoc(); ?>
                <div class="nav navbar float-right">
                    <button class="btn btn-primary btn-sm">
                        <i class="fa fa-user"></i><?= $name['firstname'] . " " . $name['lastname'] ?></button>
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
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle  active" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false"><i class="fa fa-list"></i> Pesan</a>
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
        <?php if (isset($_SESSION['is_logged_in']) && $account->get_session('user') == 1) { ?>
            <li class="nav-item">
                <a href="list_transaksi.php" class="nav-link"><i class="fa fa-bar-chart-o"></i> List Pemesanan</a>
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
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                   aria-expanded="true" aria-controls="collapseOne">
                                    Login
                                </a>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                            <div class="card-body">
                                <form action="functions/login_proses.php" method="post" class="form-signin">
                                    <h2>Please Sign in</h2>
                                    <label for="inputEmail" class="sr-only">Username</label>
                                    <input type="text" name="username" class="form-control" required autofocus
                                           placeholder="Username"><br>
                                    <label for="inputPassword" class="sr-only">Password</label>
                                    <input type="Password" name="password" class="form-control" required autofocus
                                           placeholder="Password"><br>
                                    <img src='captcha.php' alt="gambar">
                                    <input type="text" name="captcha" placeholder="Captcha" class="form-control"
                                           required><br>
                                    <input class="btn btn-primary btn-block" type="submit" name="login" value="Login">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="headingTwo">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                                   aria-expanded="false" aria-controls="collapseTwo">
                                    Register
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="card-body">
                                <form action="functions/registrasi_proses.php" method="post">
                                    <label for="inputEmail" class="sr-only">Nama Depan</label>
                                    <input type="text" name="nama_depan" class="form-control" required autofocus
                                           placeholder="Nama Depan"><br>
                                    <label for="inputEmail" class="sr-only">Last Name</label>
                                    <input type="text" name="nama_belakang" class="form-control" required autofocus
                                           placeholder="Nama Akhir"><br>
                                    <label for="inputEmail" class="sr-only">NIK</label>
                                    <input type="text" name="nik" class="form-control" required autofocus
                                           placeholder="NIK"><br>
                                    <label for="inputEmail" class="sr-only">Telephone</label>
                                    <label for="inputEmail">Alamat</label>
                                    <textarea name="alamat" class="form-control"></textarea><br>
                                    <input type="text" name="nomor_telephone" class="form-control" required autofocus
                                           placeholder="Telephone"><br>
                                    <label for="inputEmail" class="sr-only">Username</label>
                                    <input type="text" name="username" class="form-control" required autofocus
                                           placeholder="Username"><br>
                                    <label for="inputPassword" class="sr-only">Password</label>
                                    <input type="Password" name="password" class="form-control" required autofocus
                                           placeholder="Password"><br>
                                    <img src='captcha.php' alt="gambar">
                                    <input type="text" name="captcha" placeholder="Captcha" class="form-control"
                                           required><br>
                                    <input class="btn btn-primary btn-block" type="submit" name="registrasi"
                                           placeholder="Register">
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

    <div class="modal fade" id="firefoxModal" tabindex="-1" role="dialog" aria-labelledby="firefoxModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div align="center"><h3>Pesan Meja</h3></div>
<div class="container wow flipInY" data-wow-offset="0" data-wow-delay="1s">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-sm-6 bg-secondary  img-thumbnail">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form method="post" action="add_meja.php">
                        <div align="center">
                            <label class="btn-secondary btn-sm"><b>Jenis Booking</b></label>
                            <select class="form-control" name="jenis" required>
                                <option>Party</option>
                                <option>Pertemuan</option>
                                <option>Biasa</option>
                            </select>
                        </div>
                        <br>
                        <div align="center">
                            <label class="btn-secondary btn-sm"><b>Jumlah Kursi</b></label>
                            <select class="form-control" name="jumlah" required>
                                <?php for ($i = 1; $i <= 10; $i++) { ?>
                                    <option><?= $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>
                        <div align="center">
                            <label class="btn-secondary btn-sm"><b>Waktu Pemakaian</b></label>
                            <input type="datetime-local" class="form-control" required name="date">
                        </div>
                        <br>
                        <div align="center">
                            <?php if (!isset($_SESSION['is_logged_in'])) { ?>
                                <a href="index.php" class="btn btn-success"><i class="fa fa-plus"></i> Pesan Meja</a>
                            <?php } else { ?>
                                <button type="submit" class="btn btn-success" name="pesan"><i class="fa fa-plus"></i>
                                    Pesan Meja
                                </button>
                            <?php } ?>
                        </div>
                        <br>
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<br>
<?php if (isset($_SESSION['is_logged_in'])) { ?>
    <div align="center"><h3>Pesanan</h3></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-sm-6 bg-secondary  img-thumbnail text-white">
                <?php
                $data = new meja;
                $meja1 = $data->read_meja_by($_SESSION['id']);
                while ($meja = $meja1->fetch_object()) {
                    ?>
                    <label>1. Tanggal Pemakaian : <?= $meja->tangal_pemakaian ?></label><br>
                    <label>2. Jenis: <?= $meja->jenis ?></label><br>
                    <label>3. Jumlah Kursi: <?= $meja->volume ?></label><br>
                    <label>4. Status: <?= $meja->status ?></label><br>
                <?php } ?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
<?php } ?>
<div class="container-fluid bg-dark text-white jumbotron" style="opacity: 0.8;">
    <div class="row">
        <div class="col-md-4">
            <h2>GASTRO SIJABU JABU</h2>
            <p>Website Resto yang berada di : Pasar Siborong-Borong, Siborong-Borong, North Tapanuli Regency, North
                Sumatra 22474</p>
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
        </div>
        <br>
    </div>
</div>
</div>
<?php
$head->buttom();
?>
 