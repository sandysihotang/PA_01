<?php
	include_once"top_buttom.php";
	class connection{
		private $my_connect;
	public function connect(){
			$this->my_connect=new mysqli("localhost","root","","pa01");
            
			 return $this->my_connect;
		}
	}
	class outentikasi extends connection{
		public function set_session($session,$action){
			$_SESSION[$session]=$action;
		}

		public function get_session($session){

			$data=(isset($_SESSION[$session])?$_SESSION[$session]:NULL);
			return $data;
			
		}
		public function destroy_session($key){
			session_destroy();
			
		}
		public function get_user($id){
		
		$query=("select * from pelanggan where nik =".$id);
		$mydata=mysqli_query($this->connect(),$query);
		
		return $mydata;
	}
}

	class menu extends connection{
		public function tambah_menu_makanan($nama_makanan,$fotobaru,$harga,$stock){
			$status_promosi='Tidak dipromosikan';
			$myquery=("INSERT INTO makanan(nama_makanan,gambar,Harga,status,status_promosi) VALUES (?,?,?,?,?)");
			$data=$this->connect()->prepare($myquery);
			$data->bind_param('ssiis',$nama_makanan,$fotobaru,$harga,$stock,$status_promosi);
			$query=$data->execute();			

			return $query;
		}
		public function tambah_menu_minuman($nama_minuman,$fotobaru,$harga,$stock){
			$status_promosi='Tidak dipromosikan';
			$myquery=("INSERT INTO minuman(nama_minuman,gambar,Harga,status,status_promosi) VALUES (?,?,?,?,?)");
			$data=$this->connect()->prepare($myquery);
			$data->bind_param('ssiis',$nama_minuman,$fotobaru,$harga,$stock,$status_promosi);
			$query=$data->execute();			

			return $query;
		}
		public function update_menu_makanan($nama_makanan,$fotobaru,$harga,$stock,$id){
			$myquery=("UPDATE makanan SET nama_makanan=?, gambar=?,Harga=?,status=? WHERE idmenu=?");
			$data=$this->connect()->prepare($myquery);
			$data->bind_param('ssiii',$nama_makanan,$fotobaru,$harga,$stock,$id);
			$query=$data->execute();			

			return $query;
		}
		public function delete_menu($id,$pengenal){
			if ($pengenal=="makanan") {
				mysqli_query($this->connect(),('DELETE FROM makanan WHERE idmenu='.$id));
			}
			else if($pengenal="minuman"){
				mysqli_query($this->connect(),('DELETE FROM minuman WHERE id_minum='.$id));
			}
			
		}
		public function update_menu_minuman	($nama_minuman,$fotobaru,$harga,$stock,$id){
			$myquery=("UPDATE minuman SET nama_minuman=?, gambar=?,harga=?,status=? WHERE id_minum=?");
			$data=$this->connect()->prepare($myquery);
			$data->bind_param('ssiii',$nama_minuman,$fotobaru,$harga,$stock,$id);
			$query=$data->execute();			

			return $query;
		}
		public function read_menu(){
			$myquery="SELECT * from makanan";
			$data=$this->connect()->prepare($myquery);
			$data->execute();
			$data1=$data->get_result();

			return $data1;
		}
		public function read_menu_minuman(){
			$myquery="SELECT * from minuman";
			$data=$this->connect()->prepare($myquery);
			$data->execute();
			$data1=$data->get_result();

			return $data1;
		}
		public function promosi_makanan($id,$status){
			$query=("UPDATE makanan SET status_promosi= '$status' WHERE idmenu=".$id); 
			$data=mysqli_query($this->connect(),$query);
			return $data;
		}
		public function promosi_minuman($id,$status){
			$query=("UPDATE minuman SET status_promosi= '$status' WHERE id_minum=".$id); 
			$data=mysqli_query($this->connect(),$query);
			return $data;
		}
		public function read_promo_makanan(){
			$data=mysqli_query($this->connect(),"SELECT * FROM makanan WHERE status_promosi='Promosikan'");
			return $data;
		}
		public function read_promo_minuman(){
			$data=mysqli_query($this->connect(),"SELECT * FROM minuman WHERE status_promosi='Promosikan'");
			return $data;
		}
		public function get_while_id($id){
			$data=mysqli_query($this->connect(),"SELECT * FROM makanan WHERE idmenu=".$id);
			return $data;
		}
		public function get_while_id_minum($id){
			$data=mysqli_query($this->connect(),"SELECT * FROM minuman WHERE id_minum=".$id);
			return $data;	
		}
	}

	class galery extends connection{
		public function read_galery(){
			$data=mysqli_query($this->connect(),'select * from galery');
			return $data;
		}
		public function add_galery($img,$deskripsi){
			$query='insert into galery(img,Deskripsi) values(?,?)';
			$data=$this->connect()->prepare($query);
			$data->bind_param('ss',$img,$deskripsi);
			return $data->execute();
		}
		public function delete_galery($id){
			$delete=mysqli_query($this->connect(),"DELETE FROM galery WHERE id='$id'");
			return $delete;
		}
	}

	class pemesanan extends connection{
		public function pesan_makanan($id){
			$data=mysqli_query($this->connect(),"SELECT * FROM makanan WHERE idmenu='$id'");
			return $data;
		}
		public function pesan_minuman($id){
			$data=mysqli_query($this->connect(),"SELECT * FROM minuman WHERE id_minum='$id'");
			return $data;
		}
		public function add_to_chart_makanan($id_pelanggan,$id_makanan,$porsi,$total_harga){
			$status='Belum dibayar';
			$data=mysqli_query($this->connect(),"INSERT INTO pemesanan_makanan(id_menu,id_pelanggan,jumlah_pesanan,status_bayar,total_harga) VALUES ('$id_makanan','$id_pelanggan','$porsi','$status','$total_harga')");
			return $data;
		}
		public function add_to_chart_minuman($id_pelanggan,$id_minuman,$porsi,$total_harga){
			$status='Belum dibayar';
			$data=mysqli_query($this->connect(),"INSERT INTO pemesanan_minuman(Id_menu_minum,id_pelanggan,jumlah_pesanan,status_bayar,total_harga) VALUES ('$id_minuman','$id_pelanggan','$porsi','$status','$total_harga')");
			return $data;
		}
		public function read_makanan($id){
			$data=mysqli_query($this->connect(),"SELECT * FROM makanan WHERE idmenu='$id'");
			return $data;
		}
		public function read_minuman($id){
			$data=mysqli_query($this->connect(),"SELECT * FROM minuman WHERE id_minum='$id'");
			return $data;
		}
		public function update_porsi_minuman($id_minuman,$porsi_baru){
			$data=mysqli_query($this->connect(),"UPDATE minuman SET status='$porsi_baru' WHERE id_minum='$id_minuman'");
			return $data;
		}
		public function ambil_data_makanan_belum_bayar($id){
			$status_bayar="Belum dibayar";
			$data=mysqli_query($this->connect(),"SELECT * FROM pemesanan_makanan WHERE id_pelanggan='$id' AND status_bayar='$status_bayar' AND id_pemesanan is null");
			return $data;
		}
		public function ambil_data_minuman_belum_bayar($id){
			$status_bayar="Belum dibayar";
			$data=mysqli_query($this->connect(),"SELECT * FROM pemesanan_minuman WHERE id_pelanggan='$id' AND status_bayar='$status_bayar' AND id_pemesanan is null");
			return $data;
		}
		public function update_menu_beli($id,$porsi,$harga){
			$data=mysqli_query($this->connect(),"UPDATE pemesanan_makanan SET jumlah_pesanan='$porsi',total_harga='$harga' WHERE id='$id'");
			return $data;
		}
		public function update_menu_beli_minum($id,$porsi,$harga){
			$data=mysqli_query($this->connect(),"UPDATE pemesanan_minuman SET jumlah_pesanan='$porsi',total_harga='$harga' WHERE id='$id'");
			return $data;
		}
		public function action_metode_bayar_cash($id_pelanggan,$action,$date){
			$status_bayar_sebelumnya="Belum dibayar";
			$id_pemesanan=md5(date('Y-m-d i s'));
			$makanan=mysqli_query($this->connect(),"SELECT SUM(total_harga) as makanan FROM pemesanan_makanan WHERE id_pemesanan is null AND id_pelanggan=$id_pelanggan")->fetch_assoc();
			$minuman=mysqli_query($this->connect(),"SELECT SUM(total_harga) as minuman FROM pemesanan_minuman WHERE id_pemesanan is null AND id_pelanggan=$id_pelanggan")->fetch_assoc();
			$total_harga=$makanan['makanan']+$minuman['minuman'];
			$all_pemesanan=mysqli_query($this->connect(),"INSERT INTO all_pemesanan(id,tanggal_ambil,pelanggan,status_bayar,metode_bayar,total_harga) VALUES ('$id_pemesanan','$date','$id_pelanggan','$status_bayar_sebelumnya',$action,$total_harga)");
			$update_makanan=mysqli_query($this->connect(),"UPDATE pemesanan_makanan SET id_pemesanan='$id_pemesanan' WHERE id_pelanggan=$id_pelanggan AND status_bayar='$status_bayar_sebelumnya' AND id_pemesanan is null" );
			$update_minuman=mysqli_query($this->connect(),"UPDATE pemesanan_minuman SET id_pemesanan='$id_pemesanan' WHERE id_pelanggan=$id_pelanggan AND status_bayar='$status_bayar_sebelumnya' AND id_pemesanan is null");

			return $all_pemesanan && $update_makanan && $update_minuman;

		}
		public function action_metode_bayar_atm($id_pelanggan,$action,$date){
			$status_bayar_sebelumnya="Belum dibayar";

			$id_pemesanan=md5(date('Y-m-d i s'));
			$makanan=mysqli_query($this->connect(),"SELECT SUM(total_harga) as makanan FROM pemesanan_makanan WHERE id_pemesanan is null AND id_pelanggan=$id_pelanggan")->fetch_assoc();
			$minuman=mysqli_query($this->connect(),"SELECT SUM(total_harga) as minuman FROM pemesanan_minuman WHERE id_pemesanan is null AND id_pelanggan=$id_pelanggan")->fetch_assoc();	
			$total_harga=$makanan['makanan']+$minuman['minuman'];
			$all_pemesanan=mysqli_query($this->connect(),"INSERT INTO all_pemesanan(id,tanggal_ambil,pelanggan,status_bayar,metode_bayar,total_harga) VALUES ('$id_pemesanan','$date','$id_pelanggan','$status_bayar_sebelumnya',$action,$total_harga)");
			$update_makanan=mysqli_query($this->connect(),"UPDATE pemesanan_makanan SET id_pemesanan='$id_pemesanan' WHERE id_pelanggan=$id_pelanggan AND status_bayar='$status_bayar_sebelumnya' AND id_pemesanan is null" );
			$update_minuman=mysqli_query($this->connect(),"UPDATE pemesanan_minuman SET id_pemesanan='$id_pemesanan' WHERE id_pelanggan=$id_pelanggan AND status_bayar='$status_bayar_sebelumnya' AND id_pemesanan is null");

			return $all_pemesanan && $update_makanan && $update_minuman;
		
		}
		public function	ambil_data_belum_bayar($id_pelanggan){
			$data_belum_bayar=mysqli_query($this->connect(),"SELECT * FROM all_pemesanan WHERE pelanggan='$id_pelanggan' AND metode_bayar=1 AND (status_bayar='Belum dibayar' OR status_bayar='Dikonfirmasi') ");
			return $data_belum_bayar;	
		}
		public function ambil_data_belum_bayar_atm($id_pelanggan){
			$data_belum_bayar=mysqli_query($this->connect(),"SELECT * FROM all_pemesanan WHERE pelanggan='$id_pelanggan' AND (status_bayar='Belum dibayar' OR status_bayar='Dikonfirmasi') AND metode_bayar=2");
			return $data_belum_bayar;	
		}
		public function kirim_bukti($nama_bukti,$id,$pel){
			$status_bayar='Belum dibayar';
			$metode=2;
			$update=mysqli_query($this->connect(),"UPDATE all_pemesanan SET bukti_bayar='$nama_bukti' WHERE metode_bayar='$metode' AND id='$id' AND status_bayar='$status_bayar' AND pelanggan='$pel'");
			return $update;
		}
		public function get_nama_makanan($id){
			$return =mysqli_query($this->connect(),"SELECT * from pemesanan_makanan WHERE id_pemesanan='$id'");
			return $return;
		}
		public function get_nama_minuman($id){
			$return =mysqli_query($this->connect(),"SELECT * from pemesanan_minuman WHERE id_pemesanan='$id'");
			return $return;
		}
		public function all_menu_makanan(){
			$return =mysqli_query($this->connect(),"SELECT * FROM makanan");
			return $return;
		}
		public function all_menu_minuman(){
			$return =mysqli_query($this->connect(),"SELECT * FROM minuman");
			return $return;
		}
	}

	class konfirmasi_pelanggan extends connection{
		public function get_data_pemesanan(){
			$query=mysqli_query($this->connect(),"SELECT * FROM all_pemesanan WHERE metode_bayar=1 AND status_bayar='Belum dibayar'");
			return $query;
		}
		public function get_data_pemesanan1(){
			$query=mysqli_query($this->connect(),"SELECT * FROM all_pemesanan WHERE metode_bayar=2 AND status_bayar='Belum dibayar' AND bukti_bayar IS NOT NULL");
			return $query;
		}
		public function get_pesanan_byid_makanan($id){
			$query=mysqli_query($this->connect(),"SELECT * FROM pemesanan_makanan WHERE id_pelanggan='$id' AND status_bayar='Belum dibayar'");
			return $query;
		}
		public function get_pesanan_byid_minuman($id){
			$query=mysqli_query($this->connect(),"SELECT * FROM pemesanan_minuman WHERE id_pelanggan='$id' AND status_bayar='Belum dibayar'");
			return $query;
		}
		public function get_data_makanan($id){
			$query=mysqli_query($this->connect(),"SELECT * FROM makanan WHERE idmenu='$id'");
			return $query;
		}
		public function get_data_minuman($id){
			$query=mysqli_query($this->connect(),"SELECT * FROM minuman WHERE id_minum='$id'");
			return $query;
		}
		public function action_pemesanan($action,$id){
			$query=mysqli_query($this->connect(),"UPDATE all_pemesanan SET status_bayar='$action' WHERE id='$id'");
		}
		public function get_penyelesaian_pesanan_cash(){
			$query=mysqli_query($this->connect(),"SELECT * FROM all_pemesanan WHERE status_bayar='Konfirmasi' AND metode_bayar=1");
			return $query;
		}
		public function get_penyelesaian_pesanan_atm(){
			$query=mysqli_query($this->connect(),"SELECT * FROM all_pemesanan WHERE status_bayar='Konfirmasi' AND metode_bayar=2");
			return $query;
		}
		public function get_data_to_penyelesaian($id){
			$query=mysqli_query($this->connect(),"SELECT * FROM all_pemesanan WHERE id_pemesanan=$id");
			return $query;
		}
		public function selesai_cash($id){
			$query=mysqli_query($this->connect(),"UPDATE all_pemesanan SET status_bayar='Selesai',tanggal_selesai=NOW() WHERE id='$id'");
			return $query;
		}
		public function selesai_atm($id){
			$query=mysqli_query($this->connect(),"UPDATE all_pemesanan SET status_bayar='Selesai',tanggal_selesai=NOW() WHERE id='$id'");
			return $query;
		}
	}


	class meja extends connection{
		public function add_meja($jenis,$jumlah,$date,$id){
			$data=mysqli_query($this->connect(),"INSERT INTO booking_meja(id_pelanggan,volume,tangal_pemakaian,status,jenis) VALUES ('$id',$jumlah,'$date','Dipesan','$jenis')");
			return $data;
		}
		public function check($id){
			$benar=false;
			$data=mysqli_query($this->connect(),"SELECT * FROM booking_meja WHERE id_pelanggan='$id' AND status='Dipesan'");
			if ($data->num_rows) {
				$benar=true;
			}
			return $benar;
		}
		public function read_meja_by($id){
			$data=mysqli_query($this->connect(),"SELECT * FROM booking_meja WHERE id_pelanggan='$id' AND status='Dipesan'");
			return $data;
		}
		public function read_pemesanan_meja(){
			$data=mysqli_query($this->connect(),"SELECT * FROM booking_meja WHERE status='Dipesan'");
			return $data;
		}
		public function selesai_pemakaian($id){
			mysqli_query($this->connect(),"UPDATE booking_meja SET status='Selesai' WHERE id_pemesanan=$id");
		}
	}
	class komentar extends connection{
		public function tambah_komentar($id,$komentar){
			$return=mysqli_query($this->connect(),"INSERT INTO komentar(id_pelanggan,komentar) VALUES ('$id','$komentar')");
			return $return;
		}
	}
?>	