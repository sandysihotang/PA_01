<?php
session_start();
include_once("functions/my_functions.php");
if (!isset($_SESSION['is_logged_in'])) {
    header('location: index.php');
}
if (isset($_GET['meja'])) {
    $id = $_GET['meja'];
    $meja = new meja;
    $meja->selesai_pemakaian($id);
    echo "<script>alert('Berhasi Mengupdate')</script>";
    header('Refresh:0 url=kasir.php');
}
$control = new pemesanan;
$control->delete_expired();
$head = new top_buttom;
$head->top("KASIR");
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
        <?php } else { ?>
            <div class="nav navbar float-right">
                <button class="btn btn-primary btn-sm">
                    <i class="fa fa-user"></i><b>Kasir</b></button>
                &nbsp;<a href="functions/logout.php" class="btn btn-danger btn-sm">Logout</a></button>
            </div>
        <?php } ?>

    </div>
</nav>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" href="kasir.php"><i class="fa fa-home"></i> Konfirmasi Pelanggan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="penyelesaian_pesanan.php"><i class="fa fa-binoculars"></i> Penyelesaian
                Pesanan</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
               aria-expanded="false"><i class="fa fa-list"></i> Buat Pesanan</a>
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
</div><br>
<div class="container-fluid">
    <h2 class="alert alert-dark">Konfirmasi Pesanan</h2>
    <table class="table table-striped img-thumbnail">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Pesanan</th>
            <th scope="col">Tanggal Ambil</th>
            <th scope="col">Bukti-bayar</th>
            <th scope="col">Action</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $data = new konfirmasi_pelanggan;
        $i = 1;
        $data1 = $data->get_data_pemesanan1();
        while ($row1 = mysqli_fetch_assoc($data1)) {
            ?>
            <tr>
                <td><?= $i ?></td>
                <td><?php
                    $nam1 = new outentikasi;
                    $name1 = $nam1->get_user($row1['pelanggan'])->fetch_assoc();
                    echo $name1['firstname'] . " " . $name1['lastname']; ?></td>
                <td><a class="btn btn-success btn-sm" href="all_pemesanan.php?id=<?= $row1['id'] ?>">LOOK</a></td>
                <td><?= $row1['tanggal_ambil'] ?></td>
                <td><a href="img/bukti-bayar/<?= $row1['bukti_bayar'] ?>"><?= $row1['bukti_bayar'] ?></a></td>
                <form method="post" action="konfirmasi_pesanan.php?id=<?= $row1['id'] ?>">
                    <td><select class="form-control" name="aksi">
                            <option>Konfirmasi</option>
                            <option>Selesai</option>
                        </select></td>
                    <td><input type="submit" name="ubah" value="Update" class="btn-sm btn btn-primary"></td>
                </form>

            </tr>
            <?php
            $i++;
        } ?>
        </tbody>
    </table>
</div>
<br>
<div class="container-fluid">
    <h2 class="alert alert-dark">MEJA</h2>
    <table class="table table-striped img-thumbnail">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Jumlah Kursi</th>
            <th scope="col">Tanggal Pemakaian</th>
            <th scope="col">Jenis</th>
            <th scope="col">Action</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $data = new meja;
        $meja = $data->read_pemesanan_meja();
        $j = 1;
        while ($row = $meja->fetch_object()) {
            ?>
            <tr>
                <td><?= $j ?></td>
                <td><?php
                    $nam1 = new outentikasi;
                    $name = $nam1->get_user($row->id_pelanggan)->fetch_object();
                    echo $name->firstname . ' ' . $name->lastname; ?></td>
                <td><?= $row->volume ?> Kursi</td>
                <td><?= $row->tangal_pemakaian ?></td>
                <td><?= $row->jenis ?></td>
                <td><a href="kasir.php?meja=<?= $row->id_pemesanan ?>" class="btn btn-success btn-sm">Selesai</a></td>
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
