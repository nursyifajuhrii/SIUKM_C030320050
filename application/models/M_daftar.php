<?php
class M_daftar extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

//=============================== DAFTAR KUNJUNGAN ===============================

    public function dt_daftar_kunjungan($tanggal, $no_antrian)
        {
            $pengunjung = array(
                'nama_pjg' => $this->input->post('nama_pjg'),
                'nik_pjg' => $this->input->post('nik_pjg'),
                'id_tahanan' => $this->input->post('id_tahanan'),
                'id_jk' => $this->input->post('id_jk'),
                'alamat_pjg' => $this->input->post('alamat_pjg'),
                'id_relasi' => $this->input->post('id_relasi'),
                'pengikut' => $this->input->post('pengikut'),
                'vaksin' => $this->uploadFile('vaksin'),
                'kk' => $this->uploadFile('kk')
            );
            
            $this->db->insert('pengunjung', $pengunjung);
            $id_pengunjung = $this->db->insert_id();

            $barang = array(
                'id_pengunjung' => $id_pengunjung,
                'id_tahanan' => $this->input->post('id_tahanan'),
                'jenis_barang' => $this->input->post('jenis_barang'),
                'keterangan' => $this->input->post('keterangan'),
                'jumlah' => $this->input->post('jumlah')
        );

           $this->db->insert('barang', $barang);
           $id_sesi = $this->input->post('id_sesi');

            $kunjungan = array(
                'id_pengunjung' => $id_pengunjung,
                'id_sesi' => $id_sesi,
                'id_status' => 1,
                'no_antrian' => $no_antrian,
                'tgl_kunjungan' => $tanggal,
                'jam_mulai' => $this->getJamMulai($no_antrian, $id_sesi),
                'jam_selesai' => $this->getJamSelesai($no_antrian, $id_sesi)
            );
                $this->db->insert('kunjungan', $kunjungan);
        }

        public function getAutocompleteData($search) {
            $this->db->select('id_tahanan, nama_napi');
            $this->db->like('nama_napi', $search, 'both');
            $query = $this->db->get('napi');

            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return array();
            }
        }


        public function uploadFile($fieldName)
        {
          if (isset($_FILES[$fieldName]) && $_FILES[$fieldName]['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES[$fieldName]['name'];
            $tmp = $_FILES[$fieldName]['tmp_name'];
            $destination = './assets/foto/' . $fieldName . '/' . $file;
            move_uploaded_file($tmp, $destination);
            return $file;
          }
          return '';
        }


    public function getLatestKunjunganData()
    {
        $this->db->select('k.no_antrian, k.id_sesi, k.tgl_kunjungan, k.jam_mulai, k.jam_selesai,
                           p.nama_pjg as nama_pjg, j.nama_napi as nama_napi, p.nik_pjg, p.alamat_pjg, p.pengikut,
                           b.jenis_barang, b.keterangan, b.jumlah');
        $this->db->from('kunjungan k');
        $this->db->join('pengunjung p', 'k.id_pengunjung = p.id_pengunjung', 'left');
        $this->db->join('barang b', 'b.id_pengunjung = p.id_pengunjung', 'left');
        $this->db->join('napi j', 'j.id_tahanan = p.id_tahanan','left');
        $this->db->where('k.id_kunjungan = (SELECT MAX(id_kunjungan) FROM kunjungan)');
        $this->db->limit(1);

        $query = $this->db->get();
        return $query->row();   
    }

    public function getNoAntrian($id_sesi) {
        // Menghitung jumlah antrian sesuai dengan sesi
        $this->db->where('id_sesi', $id_sesi);
        $count = $this->db->count_all_results('kunjungan');

        // Mengambil kapasitas maksimal antrian sesi
        $kapasitas = ($id_sesi == 1) ? 16 : 4;

        // Jika jumlah antrian sudah mencapai kapasitas maksimal, return false
        if ($count >= $kapasitas) {
            return false;
        }

        // Menghitung nomor antrian
        $no_antrian = $count + 1;

        return $no_antrian;
    }

    public function getJamMulai($no_antrian, $id_sesi) {
        // Jam mulai untuk antrian pertama pada sesi 1 adalah 09:00
        // Jam mulai untuk antrian pertama pada sesi 2 adalah 14:00
        $jam_mulai = ($id_sesi == 1) ? '09:00' : '14:00';

        // Menghitung jumlah menit berdasarkan nomor antrian
        $menit = ($no_antrian - 1) * 15;

        // Menambahkan menit ke jam mulai
        $jam_mulai = date('H:i', strtotime($jam_mulai . "+$menit minutes"));

        return $jam_mulai;
    }

    public function getJamSelesai($no_antrian, $id_sesi) {
        // Menghitung jam selesai berdasarkan jam mulai dan durasi kunjungan
        $jam_mulai = $this->getJamMulai($no_antrian, $id_sesi);
        $durasi = 15; // Durasi kunjungan dalam menit
        $jam_selesai = date('H:i', strtotime($jam_mulai . "+$durasi minutes"));

        return $jam_selesai;
    }

    
    public function isNapiDikunjungiMingguIni($napiId) {
        $mingguIni = new DateTime('this week');
        $mingguIni->setTime(0, 0, 0);
        $mingguIni->modify('+1 day'); // Tambahkan 1 hari karena Anda ingin tanggal besok

        $mingguDepan = clone $mingguIni;
        $mingguDepan->modify('+7 days');

        $this->db->select('*');
        $this->db->from('kunjungan');
        $this->db->join('pengunjung', 'kunjungan.id_pengunjung = pengunjung.id_pengunjung');
        $this->db->where('pengunjung.id_tahanan', $napiId);
        $this->db->where('kunjungan.tgl_kunjungan >=', $mingguIni->format('Y-m-d'));
        $this->db->where('kunjungan.tgl_kunjungan <', $mingguDepan->format('Y-m-d'));
        $query = $this->db->get();

        return $query->num_rows() > 0;
    }

    //=============================== DROPDOWN ===============================
    public function dropdown_sesi()
    {
        $query = $this->db->get('sesi');
        $result = $query->result();

        $id_sesi = array('-Pilih-');
        $id_sesi = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_sesi, $result[$i]->id_sesi);
            array_push($id_sesi, $result[$i]->id_sesi);
        }
        return array_combine($id_sesi, $id_sesi);
    }

    public function dropdown_jk()
    {
        $query = $this->db->get('jenis_kelamin');
        $result = $query->result();

        $id_jk = array('-Pilih-');
        $ket = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_jk, $result[$i]->id_jk);
            array_push($ket, $result[$i]->ket);
        }
        return array_combine($id_jk, $ket);
    }

    public function dropdown_napi()
    {
        $query = $this->db->get('napi');
        $result = $query->result();

        $id_tahanan = array('-Pilih-');
        $nama_napi = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_tahanan, $result[$i]->id_tahanan);
            array_push($nama_napi, $result[$i]->nama_napi);
        }
        return array_combine($id_tahanan, $nama_napi);
    }

    public function dropdown_relasi()
    {
        $query = $this->db->get('relasi');
        $result = $query->result();

        $id_relasi = array('-Pilih-');
        $hub = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_relasi, $result[$i]->id_relasi);
            array_push($hub, $result[$i]->hub);
        }
        return array_combine($id_relasi, $hub);
    }

     public function dropdown_pjg()
    {
        $query = $this->db->get('pengunjung');
        $result = $query->result();

        $id_pengunjung = array('-Pilih-');
        $nama_pjg = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_pengunjung, $result[$i]->id_pengunjung);
            array_push($nama_pjg, $result[$i]->nama_pjg);
      }
        return array_combine($id_pengunjung, $nama_pjg);
    }
} 