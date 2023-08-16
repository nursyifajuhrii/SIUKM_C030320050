<?php  

	function getAutoNumber(){
		$ci = get_instace();
		$query = "SELECT max(id_pegawai) as max_id FROM pegawai"; 
		$data = $ci->db->query($query)->row_array();
		$kode = $data['max_id'];
		$noUrut = (int)substr($kode, 2, 3);
		$noUrut++;
		$char = "ID";
		$kodeBaru = $char.sprintf("%03s", $noUrut);
		return $kodeBaru;
	}

?>