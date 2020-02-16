<?php
include_once "top_buttom.php";


class connection
{
    private $my_connect;

    public function connect()
    {
        $this->my_connect = new mysqli("localhost", "root", "", "pa01");

        return $this->my_connect;
    }
}

class activity extends connection
{
    public function getActifity($id)
    {
        $query = $this->connect()->prepare("SELECT 
		firstname, 
		lastname, 
		Activity, 
		DATE(current_create) as date1,
		TIME(current_create) as time1 
		FROM activity_user
		INNER JOIN pelanggan 
		ON id_user = nik WHERE type_activity = ?
		ORDER BY current_create DESC");
        $query->bind_param('i', $id);
        $query->execute();
        $query->bind_result($firstname, $lastname, $Activity, $date1, $time1);
        $data = array();
        while ($query->fetch()) {
            $temp = array();
            $temp['firstname'] = $firstname;
            $temp['lastname'] = $lastname;
            $temp['Activity'] = $Activity;
            $temp['date'] = $date1;
            $temp['time'] = $time1;
            array_push($data, $temp);
        }
        return $data;
    }
}

class outentikasi extends connection
{
    public function set_session($session, $action)
    {
        $_SESSION[$session] = $action;
    }

    public function get_session($session)
    {

        $data = (isset($_SESSION[$session]) ? $_SESSION[$session] : NULL);
        return $data;

    }

    public function destroy_session($key)
    {
        session_destroy();

    }

    public function get_user($id)
    {

        $query = ("select * from pelanggan where nik =" . $id);
        $mydata = mysqli_query($this->connect(), $query);

        return $mydata;
    }
}

class menu extends connection
{
    public function tambah_menu_makanan($nama_makanan, $fotobaru, $harga, $stock, $deskripsi)
    {
        $status_promosi = 'Tidak dipromosikan';
        $myquery = ("INSERT INTO makanan(nama_makanan,gambar,Harga,status,status_promosi,deskripsi,tgl_tambah) VALUES (?,?,?,?,?,?,NOW())");
        $data = $this->connect()->prepare($myquery);
        $data->bind_param('ssiiss', $nama_makanan, $fotobaru, $harga, $stock, $status_promosi, $deskripsi);
        $query = $data->execute();

        return $query;
    }

    public function tambah_menu_minuman($nama_minuman, $fotobaru, $harga, $stock, $deskripsi)
    {
        $status_promosi = 'Tidak dipromosikan';
        $myquery = ("INSERT INTO minuman(nama_minuman,gambar,Harga,status,status_promosi,deskripsi,tgl_tambah) VALUES (?,?,?,?,?,?,NOW())");
        $data = $this->connect()->prepare($myquery);
        $data->bind_param('ssiiss', $nama_minuman, $fotobaru, $harga, $stock, $status_promosi, $deskripsi);
        $query = $data->execute();

        return $query;
    }

    public function update_menu_makanan($nama_makanan, $fotobaru, $harga, $stock, $id, $deskripsi)
    {
        $myquery = ("UPDATE makanan SET nama_makanan=?, gambar=?,Harga=?,status=?, deskripsi=?,tgl_tambah=NOW() WHERE idmenu=?");
        $data = $this->connect()->prepare($myquery);
        $data->bind_param('ssiisi', $nama_makanan, $fotobaru, $harga, $stock, $deskripsi, $id);
        $query = $data->execute();

        return $query;
    }

    public function delete_menu($id, $pengenal)
    {
        if ($pengenal == "makanan") {
            mysqli_query($this->connect(), ('DELETE FROM makanan WHERE idmenu=' . $id));
        } else if ($pengenal = "minuman") {
            mysqli_query($this->connect(), ('DELETE FROM minuman WHERE id_minum=' . $id));
        }

    }

    public function update_menu_minuman($nama_minuman, $fotobaru, $harga, $stock, $id, $deskripsi)
    {
        $myquery = ("UPDATE minuman SET nama_minuman=?, gambar=?,harga=?,status=?,deskripsi=?,tgl_tambah=NOW() WHERE id_minum=?");
        $data = $this->connect()->prepare($myquery);
        $data->bind_param('ssiisi', $nama_minuman, $fotobaru, $harga, $stock, $deskripsi, $id);
        $query = $data->execute();

        return $query;
    }

    public function read_menu()
    {
        $myquery = "SELECT * from makanan ORDER BY tgl_tambah DESC";
        $data = $this->connect()->prepare($myquery);
        $data->execute();
        $data1 = $data->get_result();

        return $data1;
    }

    public function read_menu_minuman()
    {
        $myquery = "SELECT * from minuman order by tgl_tambah DESC";
        $data = $this->connect()->prepare($myquery);
        $data->execute();
        $data1 = $data->get_result();

        return $data1;
    }

    public function promosi_makanan($id, $status)
    {
        $query = ("UPDATE makanan SET status_promosi= '$status' WHERE idmenu=" . $id);
        $data = mysqli_query($this->connect(), $query);
        return $data;
    }

    public function promosi_minuman($id, $status)
    {
        $query = ("UPDATE minuman SET status_promosi= '$status' WHERE id_minum=" . $id);
        $data = mysqli_query($this->connect(), $query);
        return $data;
    }

    public function read_promo_makanan()
    {
        $data = mysqli_query($this->connect(), "SELECT * FROM makanan WHERE status_promosi='Promosikan' LIMIT 2");
        return $data;
    }

    public function read_promo_minuman()
    {
        $data = mysqli_query($this->connect(), "SELECT * FROM minuman WHERE status_promosi='Promosikan' LIMIT 2");
        return $data;
    }

    public function get_while_id($id)
    {
        $data = mysqli_query($this->connect(), "SELECT * FROM makanan WHERE idmenu=" . $id);
        return $data;
    }

    public function get_while_id_minum($id)
    {
        $data = mysqli_query($this->connect(), "SELECT * FROM minuman WHERE id_minum=" . $id);
        return $data;
    }
}

class galery extends connection
{
    public function read_galery()
    {
        $data = mysqli_query($this->connect(), 'select * from galery');
        return $data;
    }

    public function add_galery($img, $deskripsi)
    {
        $query = 'insert into galery(img,Deskripsi) values(?,?)';
        $data = $this->connect()->prepare($query);
        $data->bind_param('ss', $img, $deskripsi);
        return $data->execute();
    }

    public function delete_galery($id)
    {
        $delete = mysqli_query($this->connect(), "DELETE FROM galery WHERE id='$id'");
        return $delete;
    }
}

class pemesanan extends connection
{
    public function pesan_makanan($id)
    {
        $id = base64_decode($id);
        $data = mysqli_query($this->connect(), "SELECT * FROM makanan WHERE idmenu='$id'");
        return $data;
    }

    public function pesan_minuman($id)
    {
        $id = base64_decode($id);
        $data = mysqli_query($this->connect(), "SELECT * FROM minuman WHERE id_minum='$id'");
        return $data;
    }

    public function add_to_chart_makanan($id_pelanggan, $id_makanan, $porsi, $total_harga)
    {
        $status = 'Belum dibayar';
        $data = mysqli_query($this->connect(), "INSERT INTO pemesanan_makanan(id_menu,id_pelanggan,jumlah_pesanan,status_bayar,total_harga) VALUES ('$id_makanan','$id_pelanggan','$porsi','$status','$total_harga')");
        return $data;
    }

    public function add_to_chart_minuman($id_pelanggan, $id_minuman, $porsi, $total_harga)
    {
        $status = 'Belum dibayar';
        $data = mysqli_query($this->connect(), "INSERT INTO pemesanan_minuman(Id_menu_minum,id_pelanggan,jumlah_pesanan,status_bayar,total_harga) VALUES ('$id_minuman','$id_pelanggan','$porsi','$status','$total_harga')");
        return $data;
    }

    public function read_makanan($id)
    {
        $data = mysqli_query($this->connect(), "SELECT * FROM makanan WHERE idmenu='$id'");
        return $data;
    }

    public function read_minuman($id)
    {
        $data = mysqli_query($this->connect(), "SELECT * FROM minuman WHERE id_minum='$id'");
        return $data;
    }

    public function ambil_data_makanan_belum_bayar($id)
    {
        $status_bayar = "Belum dibayar";
        $data = mysqli_query($this->connect(), "SELECT * FROM pemesanan_makanan WHERE id_pelanggan='$id' AND status_bayar='$status_bayar' AND id_pemesanan is null");
        return $data;
    }

    public function ambil_data_minuman_belum_bayar($id)
    {
        $status_bayar = "Belum dibayar";
        $data = mysqli_query($this->connect(), "SELECT * FROM pemesanan_minuman WHERE id_pelanggan='$id' AND status_bayar='$status_bayar' AND id_pemesanan is null");
        return $data;
    }

    public function update_menu_beli($id, $porsi, $harga)
    {
        $data = mysqli_query($this->connect(), "UPDATE pemesanan_makanan SET jumlah_pesanan='$porsi',total_harga='$harga' WHERE id='$id'");
        return $data;
    }

    public function update_menu_beli_minum($id, $porsi, $harga)
    {
        $data = mysqli_query($this->connect(), "UPDATE pemesanan_minuman SET jumlah_pesanan='$porsi',total_harga='$harga' WHERE id='$id'");
        return $data;
    }

    public function action_metode_bayar_cash($id_pelanggan, $action)
    {
        $status_bayar_sebelumnya = "Sudah dibayar";
        $kode_barang = $this->maxId()->fetch_array()['id'];
        $nourut = (int)substr($kode_barang, 4, 4);
        $nourut++;
        $char = 'GS-';
        $id_pemesanan = $char . sprintf("%05s", $nourut);
        $makanan = mysqli_query($this->connect(), "SELECT SUM(total_harga) as makanan FROM pemesanan_makanan WHERE id_pemesanan is null AND id_pelanggan=$id_pelanggan")->fetch_assoc();
        $minuman = mysqli_query($this->connect(), "SELECT SUM(total_harga) as minuman FROM pemesanan_minuman WHERE id_pemesanan is null AND id_pelanggan=$id_pelanggan")->fetch_assoc();
        $total_harga = $makanan['makanan'] + $minuman['minuman'];
        $all_pemesanan = mysqli_query($this->connect(), "INSERT INTO all_pemesanan(id,tanggal_ambil,pelanggan,status_bayar,metode_bayar,total_harga) VALUES ('$id_pemesanan',NOW(),'$id_pelanggan','$status_bayar_sebelumnya',$action,$total_harga)");
        $update_makanan = mysqli_query($this->connect(), "UPDATE pemesanan_makanan SET id_pemesanan='$id_pemesanan',status_bayar='Sudah bayar' WHERE id_pelanggan=$id_pelanggan AND id_pemesanan is null");
        $update_minuman = mysqli_query($this->connect(), "UPDATE pemesanan_minuman SET id_pemesanan='$id_pemesanan',status_bayar='Sudah bayar' WHERE id_pelanggan=$id_pelanggan AND id_pemesanan is null");

        return $all_pemesanan && $update_makanan && $update_minuman;

    }

    public function maxId()
    {
        $query = mysqli_query($this->connect(), "SELECT max(id) as id FROM all_pemesanan");
        return $query;
    }

    public function action_metode_bayar_atm($id_pelanggan, $action, $date)
    {
        $status_bayar_sebelumnya = "Belum dibayar";
        $kode_barang = $this->maxId()->fetch_array()['id'];
        $nourut = (int)substr($kode_barang, 4, 4);
        $nourut++;
        $char = 'GS-';
        $id_pemesanan = $char . sprintf("%05s", $nourut);
        $makanan = mysqli_query($this->connect(), "SELECT SUM(total_harga) as makanan FROM pemesanan_makanan WHERE id_pemesanan is null AND id_pelanggan=$id_pelanggan")->fetch_assoc();
        $minuman = mysqli_query($this->connect(), "SELECT SUM(total_harga) as minuman FROM pemesanan_minuman WHERE id_pemesanan is null AND id_pelanggan=$id_pelanggan")->fetch_assoc();
        $total_harga = $makanan['makanan'] + $minuman['minuman'];
        $all_pemesanan = mysqli_query($this->connect(), "INSERT INTO all_pemesanan(id,tanggal_ambil,pelanggan,status_bayar,metode_bayar,total_harga) VALUES ('$id_pemesanan','$date','$id_pelanggan','$status_bayar_sebelumnya',$action,$total_harga)");
        $update_makanan = mysqli_query($this->connect(), "UPDATE pemesanan_makanan SET id_pemesanan='$id_pemesanan' WHERE id_pelanggan=$id_pelanggan AND status_bayar='$status_bayar_sebelumnya' AND id_pemesanan is null");
        $update_minuman = mysqli_query($this->connect(), "UPDATE pemesanan_minuman SET id_pemesanan='$id_pemesanan' WHERE id_pelanggan=$id_pelanggan AND status_bayar='$status_bayar_sebelumnya' AND id_pemesanan is null");

        return $all_pemesanan && $update_makanan && $update_minuman;

    }

    public function ambil_data_belum_bayar($id_pelanggan)
    {
        $data_belum_bayar = mysqli_query($this->connect(), "SELECT * FROM all_pemesanan WHERE pelanggan='$id_pelanggan' AND metode_bayar=1 AND (status_bayar='Belum dibayar' OR status_bayar='Konfirmasi') ");
        return $data_belum_bayar;
    }

    public function ambil_data_belum_bayar_atm($id_pelanggan)
    {
        $data_belum_bayar = mysqli_query($this->connect(), "SELECT * FROM all_pemesanan WHERE pelanggan='$id_pelanggan' AND (status_bayar='Belum dibayar' OR status_bayar='Konfirmasi') AND metode_bayar=2");
        return $data_belum_bayar;
    }

    public function kirim_bukti($nama_bukti, $id, $pel)
    {
        $status_bayar = 'Belum dibayar';
        $metode = 2;
        $update = mysqli_query($this->connect(), "UPDATE all_pemesanan SET bukti_bayar='$nama_bukti' WHERE metode_bayar=$metode AND id='$id' AND status_bayar='$status_bayar' AND pelanggan='$pel'");
        return $update;
    }

    public function get_nama_makanan($id)
    {
        $return = mysqli_query($this->connect(), "SELECT * from pemesanan_makanan WHERE id_pemesanan='$id'");
        return $return;
    }

    public function get_nama_minuman($id)
    {
        $return = mysqli_query($this->connect(), "SELECT * from pemesanan_minuman WHERE id_pemesanan='$id'");
        return $return;
    }

    public function all_menu_makanan()
    {
        $return = mysqli_query($this->connect(), "SELECT * FROM makanan");
        return $return;
    }

    public function all_menu_minuman()
    {
        $return = mysqli_query($this->connect(), "SELECT * FROM minuman");
        return $return;
    }

    public function delete_expired()
    {
        $data = mysqli_query($this->connect(), "SELECT * FROM all_pemesanan WHERE `tanggal_ambil` < NOW() AND status_bayar='Belum dibayar'");
        while ($tes = mysqli_fetch_object($data)) {
            mysqli_query($this->connect(), "DELETE FROM pemesanan_makanan WHERE id_pemesanan='$tes->id'");
            mysqli_query($this->connect(), "DELETE FROM pemesanan_minuman WHERE id_pemesanan='$tes->id'");
            mysqli_query($this->connect(), "DELETE FROM all_pemesanan WHERE id='$tes->id'");
        }
        mysqli_query($this->connect(), "DELETE FROM booking_meja WHERE `tangal_pemakaian` < NOW() AND status='Dipesan'");

    }

    public function delete_pemesanan($jenis, $id)
    {
        if ($jenis == 'makanan') {
            mysqli_query($this->connect(), "DELETE FROM pemesanan_makanan where id=$id");
        } else {
            mysqli_query($this->connect(), "DELETE FROM pemesanan_minuman where id=$id");
        }
    }
}

class konfirmasi_pelanggan extends connection
{
    public function get_data_pemesanan1()
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM all_pemesanan WHERE metode_bayar=2 AND status_bayar='Belum dibayar' AND bukti_bayar IS NOT NULL");
        return $query;
    }

    public function get_pesanan_byid_makanan($id)
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM pemesanan_makanan WHERE id_pelanggan='$id' AND status_bayar='Belum dibayar'");
        return $query;
    }

    public function get_pesanan_byid_minuman($id)
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM pemesanan_minuman WHERE id_pelanggan='$id' AND status_bayar='Belum dibayar'");
        return $query;
    }

    public function get_data_makanan($id)
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM makanan WHERE idmenu='$id'");
        return $query;
    }

    public function get_data_minuman($id)
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM minuman WHERE id_minum='$id'");
        return $query;
    }

    public function action_pemesanan($action, $id)
    {
        if ($action == 'Konfirmasi') {
            mysqli_query($this->connect(), "UPDATE all_pemesanan SET status_bayar='$action' WHERE id='$id'");
        } else {
            mysqli_query($this->connect(), "UPDATE all_pemesanan SET status_bayar='$action', tanggal_selesai= NOW() WHERE id='$id'");
            mysqli_query($this->connect(), "UPDATE pemesanan_minuman SET status_bayar='Sudah Bayar' WHERE id_pemesanan='$id'");
            mysqli_query($this->connect(), "UPDATE pemesanan_makanan SET status_bayar='Sudah Bayar' WHERE id_pemesanan='$id'");
        }
    }

    public function sendEmailKonfirmasiPesanan($id)
    {
        $query = $this->connect()->prepare('SELECT
        email FROM
        account INNER JOIN
        all_pemesanan on pelanggan = account.id
        WHERE all_pemesanan.id = ?
        LIMIT 1');
        $query->bind_param('s', $id);
        $query->execute();
        $query->bind_result($email);
        if ($query->fetch()) {
            require_once 'MailForConfirm.php';
            $mail = new MailForConfirm();
            $mail->sendEmail($email, $id);
        }
    }

    public function get_penyelesaian_pesanan_atm()
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM all_pemesanan WHERE status_bayar='Sudah dibayar' || status_bayar='Konfirmasi'");
        return $query;
    }

    public function get_data_to_penyelesaian($id)
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM all_pemesanan WHERE id_pemesanan=$id");
        return $query;
    }

    public function selesai_cash($id)
    {
        $query = mysqli_query($this->connect(), "UPDATE all_pemesanan SET status_bayar='Selesai', tanggal_selesai= NOW() WHERE id='$id'");
        mysqli_query($this->connect(), "UPDATE pemesanan_minuman SET status_bayar='Sudah Bayar' WHERE id_pemesanan='$id'");
        mysqli_query($this->connect(), "UPDATE pemesanan_makanan SET status_bayar='Sudah Bayar' WHERE id_pemesanan='$id'");

        return $query;
    }

    public function setActivityOrder($id)
    {
        $query = $this->connect()->prepare('
        SELECT 
        firstname, 
        lastname, 
        all_pemesanan.id as id,
        metode_bayar, nik
        from all_pemesanan
        INNER JOIN pelanggan
        ON all_pemesanan.pelanggan = nik
        LIMIT 1');
        $query->execute();
        $query->bind_result($firstname, $lastname, $id, $metode_bayar, $nik);
        if ($query->fetch()) {
            $activity = 'Telah melakukan pemesanan makanan dengan NO Order: ';
            $activity .= $id;
            $activity .= ' dengan metode bayar: ' . ($metode_bayar == 1 ? 'Cash' : 'ATM');

            $query_activity = $this->connect()->prepare('
            INSERT INTO activity_user(id_user, Activity) VALUES (?, ?)');
            $query_activity->bind_param('ss', $nik, $activity);
            $query_activity->execute();
        }
    }

    public function selesai_atm($id)
    {

        $query = mysqli_query($this->connect(), "UPDATE all_pemesanan SET status_bayar='Selesai', tanggal_selesai= NOW() WHERE id='$id'");
        mysqli_query($this->connect(), "UPDATE pemesanan_minuman SET status_bayar='Sudah Bayar' WHERE id_pemesanan='$id'");
        mysqli_query($this->connect(), "UPDATE pemesanan_makanan SET status_bayar='Sudah Bayar' WHERE id_pemesanan='$id'");
        return $query;
    }
}


class meja extends connection
{
    public function add_meja($jenis, $jumlah, $date, $id)
    {
        $data = mysqli_query($this->connect(), "INSERT INTO booking_meja(id_pelanggan,volume,tangal_pemakaian,status,jenis) VALUES ('$id',$jumlah,'$date','Dipesan','$jenis')");
        return $data;
    }

    public function check($id)
    {
        $benar = false;
        $data = mysqli_query($this->connect(), "SELECT * FROM booking_meja WHERE id_pelanggan='$id' AND status='Dipesan'");
        if ($data->num_rows) {
            $benar = true;
        }
        return $benar;
    }

    public function read_meja_by($id)
    {
        $data = mysqli_query($this->connect(), "SELECT * FROM booking_meja WHERE id_pelanggan='$id' AND status='Dipesan'");
        return $data;
    }

    public function read_pemesanan_meja()
    {
        $data = mysqli_query($this->connect(), "SELECT * FROM booking_meja WHERE status='Dipesan'");
        return $data;
    }

    public function selesai_pemakaian($id)
    {
        mysqli_query($this->connect(), "UPDATE booking_meja SET status='Selesai' WHERE id_pemesanan=$id");
    }
}

class komentar extends connection
{
    public function tambah_komentar($id, $komentar)
    {
        $encrypt_komentar = '';
        $def_caesar = 3;
        for ($i = 0; $i < strlen($komentar); $i++) {
            $encrypt_komentar .= chr(ord($komentar[$i]) + $def_caesar);
        }
        $return = mysqli_query($this->connect(), "INSERT INTO komentar(id_komentar,komentar,date) VALUES ('$id','$encrypt_komentar',NOW())");
        return $return;
    }

    public function read_komentar()
    {
        $return = mysqli_query($this->connect(), "SELECT * FROM komentar ORDER BY date DESC");
        return $return;
    }

    public function read_name($id)
    {
        $return = mysqli_query($this->connect(), "SELECT * from pelanggan WHERE nik='$id'");
        return $return;
    }

    public function delete_komentar($id)
    {
        $return = mysqli_query($this->connect(), "DELETE FROM komentar WHERE id=$id");
        return $return;
    }
}

class informasi extends connection
{
    public function add_informasi($fotobaru, $deskripsi, $judul)
    {
        $return = mysqli_query($this->connect(), "INSERT INTO informasi(gambar,deskripsi,Judul,date) VALUES ('$fotobaru','$deskripsi','$judul',NOW())");
        return $return;
    }

    public function get_informasi()
    {
        $return = mysqli_query($this->connect(), "SELECT * FROM informasi ORDER BY date DESC");
        return $return;
    }

    public function delete_info($id)
    {
        mysqli_query($this->connect(), "DELETE FROM informasi WHERE id=$id");
    }
}

class daftar_admin_kasir extends connection
{
    public $username;
    public $password;
    public $role;
    public $id;

    public function daftar()
    {
        $return = mysqli_query($this->connect(), "INSERT INTO account VALUES ($this->id, '$this->username','$this->password',$this->role)");
        return true;
    }
}

class laporan_penjualan extends connection
{
    public function read_laporan()
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM all_pemesanan where status_bayar='Selesai' ORDER BY tanggal_selesai");
        return $query;
    }

    public function search($date)
    {
        $query = mysqli_query($this->connect(), "SELECT * FROM all_pemesanan WHERE tanggal_selesai LIKE '" . $date . "%'");
        return $query;
    }
}

?>