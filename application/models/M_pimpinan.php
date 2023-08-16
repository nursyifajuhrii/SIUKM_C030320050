<?php
class M_pimpinan extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

//=============================== ANTRIAN ===============================
	public function dt_cetlap($bulantahun)
        {
            $this->db->select('k.no_antrian, p.nama_pjg, n.nama_napi, k.tgl_kunjungan, k.jam_mulai, k.jam_selesai');
            $this->db->from('kunjungan k');
            $this->db->join('pengunjung p', 'p.id_pengunjung = k.id_pengunjung', 'left');
            $this->db->join('napi n', 'n.id_tahanan = p.id_tahanan', 'left');
            $this->db->where('DATE_FORMAT(tgl_kunjungan, "%m%Y") =', $bulantahun);
            $this->db->order_by('nama_pjg', 'asc');
            $query = $this->db->get();
            return $query->result_array();       
        }

}