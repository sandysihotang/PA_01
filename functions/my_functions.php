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
			$myquery=("INSERT INTO menu(nama_makanan,gambar,Harga,stock,status_promosi) VALUES (?,?,?,?,?)");
			$data=$this->connect()->prepare($myquery);
			$data->bind_param('ssiis',$nama_makanan,$fotobaru,$harga,$stock,$status_promosi);
			$query=$data->execute();			

			return $query;
		}
		public function tambah_menu_minuman($nama_minuman,$fotobaru,$harga,$stock){
			$status_promosi='Tidak dipromosikan';
			$myquery=("INSERT INTO minuman(nama_minuman,gambar,Harga,stock,status_promosi) VALUES (?,?,?,?,?)");
			$data=$this->connect()->prepare($myquery);
			$data->bind_param('ssiis',$nama_minuman,$fotobaru,$harga,$stock,$status_promosi);
			$query=$data->execute();			

			return $query;
		}
		public function update_menu_makanan($nama_makanan,$fotobaru,$harga,$stock,$id){
			$myquery=("UPDATE menu SET nama_makanan=?, gambar=?,Harga=?,stock=? WHERE idmenu=?");
			$data=$this->connect()->prepare($myquery);
			$data->bind_param('ssiii',$nama_makanan,$fotobaru,$harga,$stock,$id);
			$query=$data->execute();			

			return $query;
		}
		public function delete_menu($id,$pengenal){
			if ($pengenal=="makanan") {
				mysqli_query($this->connect(),('DELETE FROM menu WHERE idmenu='.$id));
			}
			else{
				mysqli_query($this->connect(),('DELETE FROM minuman WHERE id_minum='.$id));
			}
			
		}
		public function update_menu(){
			$query=mysqli_query($this->connect(),'UPDATE FROM menu SET ');
		}
		public function read_menu(){
			$myquery="SELECT * from menu";
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
			$query=("UPDATE menu SET status_promosi= '$status' WHERE idmenu=".$id); 
			$data=mysqli_query($this->connect(),$query);
			return $data;
		}
		public function promosi_minuman($id,$status){
			$query=("UPDATE minuman SET status_promosi= '$status' WHERE id_minum=".$id); 
			$data=mysqli_query($this->connect(),$query);
			return $data;
		}
		public function read_promo_makanan(){
			$data=mysqli_query($this->connect(),"SELECT * FROM menu WHERE status_promosi='Promosikan'");
			return $data;
		}
		public function read_promo_minuman(){
			$data=mysqli_query($this->connect(),"SELECT * FROM minuman WHERE status_promosi='Promosikan'");
			return $data;
		}
		public function get_while_id($id){
			$data=mysqli_query($this->connect(),"SELECT * FROM menu WHERE idmenu=".$id);
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
	}

	class pemesanan extends connection{
		public function pesan_makanan($id){
			$data=mysqli_query($this->connect(),"SELECT * FROM menu WHERE idmenu='$id'");
			return $data;
		}
		public function add_to_chart_makanan($id_pemesanan,$id_pelanggan,$id_makanan,$porsi,$total_harga){
			$status='Belum dibayar';
			$data=mysqli_query($this->connect(),"INSERT INTO pemesanan(id_pemesanan,id_menu,id_pelanggan,jumlah_pesanan,status_bayar,total_harga) VALUES ('$id_pemesanan','$id_makanan','$id_pelanggan','$porsi','$status','$total_harga')");
			return $data;
		}
		public function read_makanan($id){
			$data=mysqli_query($this->connect(),"SELECT * FROM menu WHERE idmenu='$id'");
			return $data;
		}
		public function update_porsi($id_makanan,$porsi_baru){
			$data=mysqli_query($this->connect(),"UPDATE menu SET stock='$porsi_baru' WHERE idmenu='$id_makanan'");
			return $data;
		}
		public function ambil_data_makanan_belum_bayar($id){
			$status_bayar="Belum dibayar";
			$data=mysqli_query($this->connect(),"SELECT * FROM pemesanan WHERE id_pelanggan='$id' AND status_bayar='$status_bayar'");
			return $data;
		}
		public function update_menu_beli($id,$porsi,$harga){
			$data=mysqli_query($this->connect(),"UPDATE pemesanan SET jumlah_pesanan='$porsi',total_harga='$harga' WHERE id_pemesanan='$id'");
			return $data;
		}
	}



?>	