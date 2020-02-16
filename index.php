<?php
session_start();
include_once("functions/my_functions.php");
$account = new outentikasi;
if ($account->get_session('user') == 3) {
    header('location: kasir.php');
}

if (isset($_GET['delete'])) {
    $que = new komentar;
    $delete = $que->delete_komentar($_GET['delete']);
    if ($delete) {
        echo "<script>alert('Berhasil Dihapus')</script>";
        header('Refresh:0 url=index.php#komentar');
    } else {
        echo "<script>alert('Gagal Dihapus')</script>";
        header('Refresh:0 url=index.php#komentar');
    }
}
$control = new pemesanan;
$control->delete_expired();
$head = new top_buttom;
$head->top("Home");
?>
    <style type="text/css">
        .d-block {
            width: 100%;
            height: 100%;
        }

        .scroll-komentar {
            border: 2px solid lightblue;
            height: 80px;
            margin-left: 30px;
            overflow: auto;
            padding: 3px;
            text-align: justify;
            width: 80%;
            height: 250px;
        }

        .komentar-pelanggan {
            font-size: 10px;
            color: black;
        }

        .isi-komentar {
            font-size: 15px;
        }
    </style>
    <nav class="nav bg-light navbar-light wow fadeInUp">
        <div class="container-fluid">
            <div class="float-left col-md-3">
                <img src="">
                <label><b>Call Center : </b><span class="fa fa-phone"></span> +62 822 7414 8833</label>
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
                <a class="nav-link active" href="index.php"><i class="fa fa-home"></i> Home</a>
            </li>
            <?php if ((isset($_SESSION['is_logged_in']) && $account->get_session('user') == 1) || !isset($_SESSION['is_logged_in'])) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false"><i class="fa fa-list"></i> Pesan</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="pesan_makanan.php"><i class="fa fa-birthday-cake"></i>
                            Makanan</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="pesan_minuman.php"><i class="fa fa-beer"></i> Minuman</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="pesan_meja.php"><i class="fa fa-table"></i> Meja</a>
                    </div>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="about.php"><i class="fa fa-binoculars"></i> About</a>
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
                                        <input class="btn btn-primary btn-block" type="submit" name="login"
                                               value="Login">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" role="tab" id="headingTwo">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
                                        <label for="inputEmail" class="sr-only">Email</label>
                                        <input type="Email" name="email" class="form-control" required autofocus
                                               placeholder="email"><br>
                                        <label for="inputEmail" class="sr-only">NIK</label>
                                        <input type="text" name="nik" class="form-control" required autofocus
                                               placeholder="NIK"><br>
                                        <label for="inputEmail" class="sr-only">Telephone</label>
                                        <label for="inputEmail">Alamat</label>
                                        <textarea name="alamat" class="form-control"></textarea><br>
                                        <input type="text" name="nomor_telephone" class="form-control" required
                                               autofocus placeholder="Telephone"><br>
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
                        <div class="card">
                            <div class="card-header" role="tab" id="headingThree">
                                <h5 class="mb-0">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Forgot Password
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="card-body">
                                    <form action="functions/forgot_password.php" method="post">
                                        <label for="inputEmail" class="sr-only">Email</label>
                                        <input type="Email" name="email" class="form-control" required autofocus
                                               placeholder="Email"><br>
                                        <img src='captcha.php' alt="gambar">
                                        <input type="text" name="captcha" placeholder="Captcha" class="form-control"
                                               required><br>

                                        <input class="btn btn-primary btn-block" type="submit" name="forgot"
                                               placeholder="Forgot Password">
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
    </div> <b>
    <hr>
    <hr>
</b>
<?php if (isset($_SESSION['is_logged_in']) && $account->get_session('user') == 2) { ?>
    <div class="container-fluid">
        <div class="col-md-3" align="left">
<!--         punya Yohana B-->
            <a href="index.php?jenis=<?= base64_encode('makanan') ?>" class="btn btn-primary">Makanan</a>
            <a href="index.php?jenis=<?= base64_encode('minuman') ?>" class="btn btn-primary">Minuman</a>
        </div>
    </div>
<?php }
if (isset($_SESSION['is_logged_in']) && $account->get_session('user') == 2) {
    if ((isset($_GET['jenis']) && base64_decode($_GET['jenis']) == 'makanan') || !isset($_GET['jenis'])) { ?>
        <div class="container" align="right"><a href="form_tambah_menu.php?jenis=<?= base64_encode('makanan') ?>"
                                                class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Menu
                Makanan</a></div><br>
    <?php } else { ?>
        <div class="container" align="right"><a href="form_tambah_menu.php?jenis=<?= base64_encode('minuman') ?>"
                                                class="btn btn-danger"><i class="fa fa-plus"></i> Tambah Menu
                Minuman</a></div><br>
    <?php }
}

if (isset($_SESSION['is_logged_in']) && $account->get_session('user') == 2) {
    if (!isset($_GET['jenis']) || base64_decode($_GET['jenis']) == 'makanan') {
        ?>
        <div class="container-fluid img-thumbnail bg-dark" align="center">
        <h2 align="center"><label class="alert alert-primary btn-lg"><i class="fa fa-birthday-cake"></i> Menu Makanan<i
                        class="fa fa-birthday-cake"></i></label></h2>
        <div class="row">
        <?php
        $makanan = new menu;
        $menu_makanan = $makanan->read_menu();
        while ($row = mysqli_fetch_assoc($menu_makanan)) {
            ?>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="img-thumbnail img" src="img/menu/<?= $row['gambar'] ?>" alt="Card image cap">
                    <h4 align="center"><?= $row['nama_makanan'] ?></h4>
                    <h4 align="center">Rp.<?= number_format($row['Harga']) ?>.00</h4>
                    <div class="card-body">
                        <?php if (isset($_SESSION['is_logged_in']) && $account->get_session('user') == 2) { ?>
                            <a href="delete.php?id=<?= $row['idmenu'] ?>&jenis=<?= md5('makanan') ?>"
                               class="btn btn-danger btn-sm">Delete</a>&nbsp;
                            <a href="update_makanan.php?id=<?= $row['idmenu'] ?>" class="btn btn-info btn-sm">Update</a>
                            <?php if ($row['status_promosi'] == 'Tidak dipromosikan') { ?>
                                <a href="promosikan.php?id=<?= $row['idmenu'] ?>&jenis=<?= md5('makanan') ?>&status=<?= $row['status_promosi'] ?>"
                                   class="btn btn-dark btn-sm"><i class="fa fa-star"></i>Promosikan</a>
                            <?php } else { ?>
                                <a href="promosikan.php?id=<?= $row['idmenu'] ?>&jenis=<?= md5('makanan') ?>&status=<?= $row['status_promosi'] ?>"
                                   class="btn btn-dark btn-sm"><i class="fa fa-star"></i>HapusPromo</a>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
        <?php }
        echo "</div><br></div>";
    }
} ?>
<?php if (isset($_SESSION['is_logged_in']) && $account->get_session('user') == 2) {
if (isset($_GET['jenis']) && base64_decode($_GET['jenis']) == 'minuman') { ?>
    <div class="container-fluid img-thumbnail bg-dark" align="center">

    <h2 align="center"><label class="alert alert-primary btn-lg"><i class="fa fa-beer"></i> Menu Minuman <i
                    class="fa fa-beer"></i></label></h2>
    <div class="row">
    <?php
    $minum = new menu;
    $minuman = $minum->read_menu_minuman();
    while ($row_minum = mysqli_fetch_assoc($minuman)) { ?>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img class="img-thumbnail img" src="img/menu/<?= $row_minum['gambar'] ?>" alt="Card image cap">
                <h4 align="center"><?= $row_minum['nama_minuman'] ?></h4>
                <h4 align="center">Rp.<?= number_format($row_minum['harga']) ?>.00</h4>
                <div class="card-body" align="center">
                    <?php if (isset($_SESSION['is_logged_in']) && $account->get_session('user') == 2) { ?>
                        <a href="delete.php?id=<?= $row_minum['id_minum'] ?>&jenis=<?= md5('minuman') ?>"
                           class="btn btn-danger btn-sm">Delete</a>&nbsp;
                        <a href="update_minuman.php?id=<?= $row_minum['id_minum'] ?>&jenis=<?= md5('minuman') ?>"
                           class="btn btn-info btn-sm">Update</a>
                        <?php if ($row_minum['status_promosi'] == 'Tidak dipromosikan') { ?>
                            <a href="promosikan.php?id=<?= $row_minum['id_minum'] ?>&jenis=<?= md5('minuman') ?>&status=<?= $row_minum['status_promosi'] ?>"
                               class="btn btn-dark btn-sm"><i class="fa fa-star"></i>Promosikan</a>
                        <?php } else { ?>
                            <a href="promosikan.php?id=<?= $row_minum['id_minum'] ?>&jenis=<?= md5('minuman') ?>&status=<?= $row_minum['status_promosi'] ?>"
                               class="btn btn-dark btn-sm"><i class="fa fa-star"></i>HapusPromo</a>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    <?php }
    echo "</div></div>";
}
}
?>
<?php if ((isset($_SESSION['is_logged_in']) && $account->get_session('user') == 1) || !isset($_SESSION['is_logged_in'])) { ?>
    <div class="row">
        <div class="col-md-6 bg-light">
            <h2 align="center"><label class="alert alert-info text-black btn-lg"><i class="fa fa-birthday-cake"></i>
                    Menu Makanan Recomended <i class="fa fa-birthday-cake"></i></label></h2>
            <div class="row alert alert-secondary img-thumbnail">
                <?php $data = new menu;
                $data1 = $data->read_promo_makanan();
                $data2 = new pemesanan;
                while ($row = mysqli_fetch_assoc($data1)) {
                    ?>
                    <div class="col-md-6 wow bounceIn" data-wow-offset="0" data-wow-delay="1.5s">
                        <div class="card" style="width: 18rem;">
                            <img class="img-thumbnail img" src="img/menu/<?= $row['gambar'] ?>" alt="Card image cap">
                            <h4 align="center"><?= $row['nama_makanan'] ?></h4>
                            <h4 align="center">Rp.<?= number_format($row['Harga']) ?>.00</h4>
                            <div class="card-body" align="center">
                                <?php if (isset($_SESSION['is_logged_in']) && $account->get_session('user') == 1) {
                                    if ($row['status'] == 2) {
                                        echo "Makanan Sudah Habis";
                                    } else { ?>
                                        <a href="transaksi_makanan.php?id=<?= base64_encode($row['idmenu']) ?>"
                                           class="btn btn-success"><i class="fa fa-tags"></i> Pesan</a>
                                        <?php
                                    }
                                } else {
                                    if ($row['status'] == 2) {
                                        echo "Makanan Sudah Habis";
                                    } else { ?>
                                        <a href="index.php" class="btn btn-success"><i class="fa fa-tags"></i> Pesan</a>
                                    <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-6">
            <h2 align="center"><label class="alert alert-info text-black btn-lg"><i class="fa fa-beer"></i> Menu Minuman
                    Recomended<i class="fa fa-beer"></i></label></h2>
            <div class="row alert alert-secondary img-thumbnail">
                <?php $minum = new menu;
                $minuman = $minum->read_promo_minuman();
                while ($row_minum = mysqli_fetch_assoc($minuman)) { ?>
                    <div class="col-md-6 wow bounceIn" data-wow-offset="0" data-wow-delay="1.5s">
                        <div class="card" style="width: 18rem;">
                            <img class="img-thumbnail img" src="img/menu/<?= $row_minum['gambar'] ?>"
                                 alt="Card image cap">
                            <h4 align="center"><?= $row_minum['nama_minuman'] ?></h4>
                            <h4 align="center">Rp.<?= number_format($row_minum['harga']) ?>.00</h4>
                            <div class="card-body" align="center">
                                <?php if (isset($_SESSION['is_logged_in']) && $account->get_session('user') == 1) {
                                    if ($row_minum['status'] == 2)
                                        echo "Minuman ini Sudah Habis";
                                    else { ?>
                                        <a href="transaksi_minuman.php?id=<?= base64_encode($row_minum['id_minum']) ?>"
                                           class="btn btn-success"><i class="fa fa-tags"></i> Pesan</a>
                                    <?php }
                                } ?>
                                <?php if (!isset($_SESSION['is_logged_in'])) {
                                    if ($row_minum['status'] == 2) {
                                        echo "Minuman Sudah Habis";
                                    } else { ?>
                                        <a href="index.php" class="btn btn-success"><i class="fa fa-tags"></i> Pesan</a>
                                    <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
    <br><br>
<?php if ((isset($_SESSION['is_logged_in']) && $account->get_session('user') == 1) || !isset($_SESSION['is_logged_in'])) { ?>
    <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.5s">
        <div class="row">
            <div class="card-body card bg-light">
                <div class="alert bg-secondary text-white"><h5 align="center">Location</h5></div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d996.7082831867101!2d98.9774854!3d2.2165318!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e11a29988a121%3A0x4da8d232959238a0!2sGastro+Si+Jabu-Jabu!5e0!3m2!1sen!2sid!4v1525933266538"
                        width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div><br>
<?php } ?>
    <div class="container-fluid alert-dark wow bounceInUp" id="komentar" data-wow-offset="0" data-wow-delay="0.6s">
        <div class="row">
            <div class="col-md-6">
                <div class="container"><h2>Berikan Komentar Anda</h2></div>
                <form id="formKomentar" method="post" action="tambah_komentar.php">
                    <div>
                        <textarea class="form-control" name="komentar" rows="5" placeholder="Komentar"></textarea>
                    </div>
                    <br>

                    <div>
                        <?php if (isset($_SESSION['is_logged_in'])) {
                            echo '<input type="submit" class="btn btn-info" value="Tambahkan Komentar" name="tambah_komentar" />';
                        } else echo '<a href=index.php class="btn btn-info">Tambahkan Komentar</a>'; ?>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="container"><h2>Komentar</h2></div>
                <div class="scroll-komentar  img-thumbnail">
                    <?php
                    $data = new komentar;
                    $komentar = $data->read_komentar();
                    while ($all = mysqli_fetch_object($komentar)) {
                        if ($all->id_komentar != 1) {
                            ?>
                            <div class="alert-warning img-thumbnail">
                <span class="komentar-pelanggan"><i class="fa fa-user"></i> <?php
                    $name = $data->read_name($all->id_komentar)->fetch_object();
                    echo $name->firstname . ' ' . $name->lastname . '  ' . $all->date;
                    ?></span>
                                <p class="isi-komentar">
                                    <?php
                                    $decrypt_komentar = '';
                                    $def_caesar = 3;
                                    for ($i = 0; $i < strlen($all->komentar); $i++) {
                                        $decrypt_komentar .= chr(ord($all->komentar[$i]) - $def_caesar);
                                    }
                                    ?>
                                    <?= htmlspecialchars($decrypt_komentar, ENT_QUOTES, 'UTF-8') ?>
                                    <?php
                                    if (isset($_SESSION['is_logged_in']) && $_SESSION['user'] == 2) {
                                        echo '<a class="btn btn-danger btn-sm" href="index.php?delete=' . $all->id . '">Delete</a>';
                                    } ?></p>
                            </div><br>
                        <?php } else if ($all->id_komentar == 1) { ?>
                            <div class="alert-primary img-thumbnail">
                                <span class="komentar-pelanggan"><i
                                            class="fa fa-user"><b>Gastro SiJabu-Jabu</b></i> <?= '  ' . $all->date ?></span>
                                <p class="isi-komentar"><?php
                                    echo $all->komentar;
                                    if (isset($_SESSION['is_logged_in']) && $_SESSION['user'] == 2) {
                                        echo '<a class="btn btn-danger btn-sm" href="index.php?delete=' . $all->id . '">Delete</a>';
                                    } ?></p>
                            </div><br>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
        <br>
    </div>
    <div class="container-fluid bg-dark jumbotron text-white" style="opacity: 0.8;">
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
        <div>
            <div class="col-sm-6">
                <p class="mbr-text text-black">
                    © Copyright 2018 Gastro Sijabu jabu</p>
            </div>
            <br>
        </div>
    </div>
    </div>
<?php
$head->buttom();
?>