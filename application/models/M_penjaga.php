<?php
class M_penjaga extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

//=============================== BARANG ===============================
    public function dt_barang()
        {
            $this->db->select('p.id_barang, j.nama_napi, n.nama_pjg, p.jenis_barang, p.keterangan, p.jumlah ');
            $this->db->from('barang p');
            $this->db->join('napi j', 'j.id_tahanan = p.id_tahanan','left');
            $this->db->join('pengunjung n', 'n.id_pengunjung = p.id_pengunjung','left');
            $query = $this->db->get();
            return $query->result_array();        
        }

    public function dt_barang_detil($id)
    {
            $this->db->select('p.id_barang, j.nama_napi, n.nama_pjg, p.jenis_barang, p.keterangan, p.jumlah ');
            $this->db->from('barang p');
            $this->db->join('napi j', 'j.id_tahanan = p.id_tahanan','left');
            $this->db->join('pengunjung n', 'n.id_pengunjung = p.id_pengunjung','left');

        $this->db->where('id_barang',$id);
        $query = $this->db->get();
        return $query->row_array();           
    }

    //=============================== PENGUNJUNG ===============================
    public function dt_pengunjung()
        {
            $this->db->select('p.id_pengunjung, p.nama_pjg, p.nik_pjg, j.nama_napi, p.alamat_pjg, r.hub ');
            $this->db->from('pengunjung p');
            $this->db->join('napi j', 'j.id_tahanan = p.id_tahanan','left');
            $this->db->join('relasi r', 'r.id_relasi = p.id_relasi','left');
            $query = $this->db->get();
            return $query->result_array();        
        }

    public function dt_pengunjung_detil($id)
        {
            $this->db->select('p.id_pengunjung, m.ket, p.nama_pjg, p.nik_pjg, j.nama_napi, p.alamat_pjg, r.hub, p.pengikut, p.vaksin, p.kk');
            $this->db->from('pengunjung p');
            $this->db->join('napi j', 'j.id_tahanan = p.id_tahanan','left');
            $this->db->join('jenis_kelamin m', 'm.id_jk = p.id_jk','left');
            $this->db->join('relasi r', 'r.id_relasi = p.id_relasi','left');
            $this->db->where('id_pengunjung',$id);
            $query = $this->db->get();
            return $query->row_array();           
        }

        //=============================== KUNJUNGAN ===============================
    public function dt_kunjungan()
        {
            $this->db->select('k.id_kunjungan, p.nama_pjg, n.status, s.id_sesi, k.no_antrian, k.tgl_kunjungan, k.jam_mulai, k.jam_selesai');
            $this->db->from('kunjungan k');
            $this->db->join('pengunjung p', 'p.id_pengunjung = k.id_pengunjung', 'left');
            $this->db->join('status_kunjungan n', 'n.id_status = k.id_status', 'left');
            $this->db->join('sesi s', 's.id_sesi = k.id_sesi', 'left');
            $query = $this->db->get();
            return $query->result_array();        
        }

    public function dt_kunjungan_detil($id)
        {
            $this->db->select('k.id_kunjungan, p.nama_pjg, n.status, s.id_sesi, k.no_antrian, k.tgl_kunjungan, k.jam_mulai, k.jam_selesai');
            $this->db->from('kunjungan k');
            $this->db->join('pengunjung p', 'p.id_pengunjung = k.id_pengunjung', 'left');
            $this->db->join('status_kunjungan n', 'n.id_status = k.id_status', 'left');
            $this->db->join('sesi s', 's.id_sesi = k.id_sesi', 'left');

            $this->db->where('id_kunjungan',$id);
            $query = $this->db->get();
            return $query->row_array();    
        }

//=============================== ANTRIAN ===============================
    public function dt_antrian()
        {
            $this->db->select('k.no_antrian, p.nama_pjg, k.tgl_kunjungan, k.jam_mulai, k.jam_selesai');
            $this->db->from('kunjungan k');
            $this->db->join('pengunjung p', 'p.id_pengunjung = k.id_pengunjung', 'left');
            $query = $this->db->get();
            return $query->result_array();        
        }

    //=============================== SESI ===============================
    public function dt_sesi()
        {
            $this->db->select('s.id_sesi, s.jam_mulai, s.jam_selesai');
            $this->db->from('sesi s');
            $query = $this->db->get();
            return $query->result_array();        
        }

    public function dt_sesi_detil($id)
        {
            $this->db->select('s.id_sesi, s.jam_mulai, s.jam_selesai');
            $this->db->from('sesi s');

            $this->db->where('id_sesi',$id);
            $query = $this->db->get();
            return $query->row_array();    
        }
}
?>

    