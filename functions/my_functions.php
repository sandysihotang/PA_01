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


	class pemesanan_makanan extends connection{
		public function pesanmakanan($menu,$pelanggan){
			$query=mysqli_query($this->connect(),('INSERT INTO pemesanan_makanan(id_menu,id_pelanggan) VALUES ('.$menu.','.$pelanggan.')'));
		}

	}

	class menu extends connection{
		public function tambah_menu_makanan($nama_makanan,$fotobaru,$harga,$stock){
			$myquery=("INSERT INTO menu(nama_makanan,gambar,Harga,stock) VALUES (?,?,?,?)");
			$data=$this->connect()->prepare($myquery);
			$data->bind_param('ssii',$nama_makanan,$fotobaru,$harga,$stock);
			$query=$data->execute();			

			return $query;
		}
		public function tambah_menu_minuman($nama_minuman,$fotobaru,$harga,$stock){
			$myquery=("INSERT INTO minuman(nama_minuman,gambar,Harga,stock) VALUES (?,?,?,?)");
			$data=$this->connect()->prepare($myquery);
			$data->bind_param('ssii',$nama_minuman,$fotobaru,$harga,$stock);
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
	}




?>	