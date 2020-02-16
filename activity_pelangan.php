<?php
session_start();
include_once("functions/my_functions.php");
if (isset($_GET['id'])) {
    $data = new informasi;
    $data->delete_info($_GET['id']);
    echo "<script>alert('Berhasil Dihapus')</script>";
    header('Refresh:0 url=about.php');
}

$head = new top_buttom;
$head->top("Activity");
?>
<style type="text/css">
    .d-block {
        width: 1300px;
        height: 700px;
    }

    .informasi {
        width: 30%;
        height: 100%;
        float: left;
        text-align: justify;
    }

    .informasi1 {
        width: 30%;
        height: 100%;
        float: right;
        text-align: justify;
    }
</style>
<nav class="nav bg-light navbar-light  wow fadeInUp">
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
        <?php if ((isset($_SESSION['is_logged_in']) && $account->get_session('user') == 1) || !isset($_SESSION['is_logged_in'])) { ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                   aria-expanded="false"><i class="fa fa-list"></i> Pesan</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="pesan_makanan.php"><i class="fa fa-birthday-cake"></i> Makanan</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="pesan_minuman.php"><i class="fa fa-beer"></i> Minuman</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="pesan_meja.php"><i class="fa fa-table"></i> Meja</a>
                </div>
            </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link active" href="about.php"><i class="fa fa-binoculars"></i> About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="galery.php"><i class="fa fa-folder-open"></i> Galery</a>
        </li>
        <?php if (isset($_SESSION['is_logged_in']) && $account->get_session('user') == 2) { ?>
            <li class="nav-item">
                <a href="laporan_penjualan.php" class="nav-link"><i class="fa fa-book"></i> Laporan Penjualan</a>
            </li>
            <li class="nav-item">
                <a href="activity_pelangan.php" class="nav-link"><i class="fa fa-shopping-basket"></i> Aktifitas
                    Pelanggan</a>
            </li>
        <?php }
        if (isset($_SESSION['is_logged_in']) && $account->get_session('user') == 1) { ?>
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
<div class="container-fluid alert-secondary" align=center><h1>Activitas Pelanggan</h1><br></div>
<div class="container-fluid">
    <div class="col-md-5" align="left">
        <a href="activity_pelangan.php?q=<?= md5('pesan') ?>" class="btn btn-primary">Aktivitas Pemesanan</a>
        <a href="activity_pelangan.php?q=<?= md5('pass') ?>" class="btn btn-primary">Aktivitas Lain</a>
    </div>
</div>
<div class="container-fluid">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Aktifitas</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Waktu</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include_once "functions/my_functions.php";
        $activity = new activity();
        $id = (empty($_GET) || $_GET['q'] == md5('pesan') ? 0 : 1);
        $data = $activity->getActifity($id);
        foreach ($data as $key => $all) {
            $temp = $all;
            ?>
            <tr>
                <th scope="row"><?= $key + 1 ?></th>
                <td><?= $temp['firstname'] ?> <?= $temp['lastname'] ?></td>
                <td><?= $temp['Activity'] ?></td>
                <td><?= $temp['date'] ?></td>
                <td><?= $temp['time'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<div class="container-fluid bg-dark text-white jumbotron" style="opacity: 0.8;">
    <div class="row">
        <div class="col-md-4">
            <h2>GASTRO SIJABU JABU</h2>
            <p>Website Resto yang berada di : Pasar Siborong-Borong, Siborong-Borong, North Tapanuli Regency, North
                Sumatra 22474</p>
        </div>
        <div class="col-md-4">
            <!--  <h2>Developer:</h2>
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
