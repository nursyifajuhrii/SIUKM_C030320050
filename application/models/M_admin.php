<?php
class M_admin extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

//=============================== MAHASISWA ===============================
    public function dt_mahasiswa()
        {
            $this->db->select('id, nim, nama, tgl_lahir, alamat');
            $this->db->from('mahasiswa_nursyifa');
           
            $query = $this->db->get();
            return $query->result_array();        
        }

    public function dt_mahasiswa_detil($id)
        {
            $this->db->select('id, nim, nama, tgl_lahir, alamat');
            $this->db->from('mahasiswa_nursyifa');
           
            $this->db->where('id', $id);
            $query = $this->db->get();
            return $query->row_array();
       
        }

    public function dt_mahasiswa_tambah($id)
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat')
        );
            return $this->db->insert('mahasiswa_nursyifa', $data);
    }

    public function dt_mahasiswa_edit($id)
    {
        $data = array(
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'alamat' => $this->input->post('alamat')
        );
        $this->db->where('id', $id);
        return $this->db->update('mahasiswa_nursyifa', $data);
    }

//=============================== UKM ===============================
    public function dt_ukm()
        {
            $this->db->select('id_ukm, nama_ukm, deskripsi');
            $this->db->from('ukm_nursyifa');
           
            $query = $this->db->get();
            return $query->result_array();        
        }

    public function dt_ukm_detil($id)
        {
            $this->db->select('id_ukm, nama_ukm, deskripsi');
            $this->db->from('ukm_nursyifa');
           
            $this->db->where('id_ukm', $id);
            $query = $this->db->get();
            return $query->row_array();
       
        }

    public function dt_ukm_tambah($id)
    {
        $data = array(
            'nama_ukm' => $this->input->post('nama_ukm'),
            'deskripsi' => $this->input->post('deskripsi')
        );
            return $this->db->insert('ukm_nursyifa', $data);
    }

    public function dt_ukm_edit($id)
    {
        $data = array(
             'nama_ukm' => $this->input->post('nama_ukm'),
             'deskripsi' => $this->input->post('deskripsi')
        );
        $this->db->where('id_ukm', $id);
        return $this->db->update('ukm_nursyifa', $data);
    }


    //=============================== ANGGOTA ===============================
    public function dt_anggota()
        {
            $this->db->select('p.id_anggota, j.nama, j.nim, k.nama_ukm');
            $this->db->from('anggota_nursyifa p');
            $this->db->join('mahasiswa_nursyifa j', 'j.id = p.id','left');
            $this->db->join('ukm_nursyifa k', 'k.id_ukm = p.id_ukm','left');
           
            $query = $this->db->get();
            return $query->result_array();        
        }

    public function dt_anggota_tambah()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'id_ukm' => $this->input->post('id_ukm'),
        );
        return $this->db->insert('anggota_nursyifa', $data);
    }

    public function dropdown_mhs()
    {
        $query = $this->db->get('mahasiswa_nursyifa');
        $result = $query->result();

        $id = array('-Pilih-');
        $nim = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id, $result[$i]->id);
            array_push($nim, $result[$i]->nim);
            
        }
        return array_combine($id, $nim);
    }

    public function dropdown_ukm()
    {
        $query = $this->db->get('ukm_nursyifa');
        $result = $query->result();

        $id_ukm = array('-Pilih-');
        $nama_ukm = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_ukm, $result[$i]->id_ukm);
            array_push($nama_ukm, $result[$i]->nama_ukm);
            
        }
        return array_combine($id_ukm, $nama_ukm);
    }

//=============================== NARAPIDANA ===============================
    public function dt_napi()
        {
            $this->db->select('p.id_tahanan, p.nik_napi, p.nama_napi, j.ket, p.ruangan, p.kasus, p.foto_napi ');
            $this->db->from('napi p');
            $this->db->join('jenis_kelamin j', 'j.id_jk = p.id_jk','left');
            $query = $this->db->get();
            return $query->result_array();        
        }


    public function dt_napi_detil($id)
    {
        $this->db->select('p.id_tahanan, p.nik_napi, p.nama_napi, j.ket, p.tgl_masuk, p.tgl_keluar, p.ruangan, p.kasus, p.foto_napi ');
            $this->db->from('napi p');
            $this->db->join('jenis_kelamin j', 'j.id_jk = p.id_jk','left');
        $this->db->where('id_tahanan',$id);
        $query = $this->db->get();
        return $query->row_array();           
    }

    public function dt_napi_tambah($foto_napi)
{
    $data = array(
        'nik_napi' => $this->input->post('nik_napi'),
        'nama_napi' => $this->input->post('nama_napi'),
        'id_jk' => $this->input->post('id_jk'),
        'tgl_masuk' => $this->input->post('tgl_masuk'),
        'tgl_keluar' => $this->input->post('tgl_keluar'),
        'ruangan' => $this->input->post('ruangan'),
        'kasus' => $this->input->post('kasus'),
        'foto_napi' => $foto_napi
    );
    return $this->db->insert('napi', $data);
}


    public function dt_napi_edit($id)
    {
        $config['upload_path'] = './assets/foto/napi/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // in kilobytes

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_napi')) {

            $data = array(
                'nik_napi' => $this->input->post('nik_napi'),
                'nama_napi' => $this->input->post('nama_napi'),
                'id_jk' => $this->input->post('id_jk'),
                'tgl_masuk' => $this->input->post('tgl_masuk'),
                'tgl_keluar' => $this->input->post('tgl_keluar'),
                'ruangan' => $this->input->post('ruangan'),
                'kasus' => $this->input->post('kasus'),
                'foto_napi' => $this->upload->data('file_name')
            );
            $this->db->where('id_tahanan', $id);
            return $this->db->update('napi', $data);
        } else {
            $error = $this->upload->display_errors();
            // Handle error
        }
    }


//=============================== PEGAWAI ===============================
    public function dt_pegawai()
    {
        $this->db->select('p.id_pegawai, p.nama_pgw, p.jabatan, j.ket, p.alamat_pgw, p.email_pgw, p.username, p.telp_pgw, r.nama_role, p.foto ');
        $this->db->from('pegawai p');
        $this->db->join('role r', 'r.id_role = p.id_role','left');
        $this->db->join('jenis_kelamin j', 'j.id_jk = p.id_jk','left');
        $query = $this->db->get();
        return $query->result_array();        
    }

    public function dt_pegawai_detil($id)
    {
        $this->db->select('p.id_pegawai, p.nama_pgw, p.jabatan, j.ket, p.alamat_pgw, p.email_pgw, p.username, p.password, p.telp_pgw, r.nama_role, p.foto');
        $this->db->from('pegawai p');
        $this->db->join('role r', 'r.id_role = p.id_role','left');
        $this->db->join('jenis_kelamin j', 'j.id_jk = p.id_jk','left');
        $this->db->where('id_pegawai',$id);
        $query = $this->db->get();
        return $query->row_array();           
    }

    public function dt_pegawai_tambah($foto_path)
    {
        $data = array(
            'nama_pgw' => $this->input->post('nama_pgw'),
            'jabatan' => $this->input->post('jabatan'),
            'id_jk' => $this->input->post('id_jk'),
            'alamat_pgw' => $this->input->post('alamat_pgw'),
            'email_pgw' => $this->input->post('email_pgw'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'telp_pgw' => $this->input->post('telp_pgw'),
            'id_role' => $this->input->post('id_role'),
            'foto' => $foto_path
        );
        return $this->db->insert('pegawai', $data);
    }


    public function dt_pegawai_edit($id, $foto)
    {
        $data = array(
            'nama_pgw' => $this->input->post('nama_pgw'),
            'jabatan' => $this->input->post('jabatan'),
            'id_jk' => $this->input->post('id_jk'),
            'alamat_pgw' => $this->input->post('alamat_pgw'),
            'email_pgw' => $this->input->post('email_pgw'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'telp_pgw' => $this->input->post('telp_pgw'),
            'id_role' => $this->input->post('id_role'),
            'foto' => $foto
        );
        $this->db->where('id_pegawai', $id);
        return $this->db->update('pegawai', $data);
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

        public function dt_pengunjung_tambah()
        {
          $data = array(
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

          return $this->db->insert('pengunjung', $data);
        }


         public function dt_pengunjung_edit($id)
        {
            $config['upload_path'] = './assets/foto/kk/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // in kilobytes

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('kk')) {
                $data['kk'] = 'assets/foto/kk/' . $this->upload->data('file_name');
            }

            $vaksin_config['upload_path'] = './assets/foto/vaksin/';
            $vaksin_config['allowed_types'] = 'jpg|jpeg|png';
            $vaksin_config['max_size'] = 2048; // in kilobytes

            $this->upload->initialize($vaksin_config);

            if ($this->upload->do_upload('vaksin')) {
                $data['vaksin'] = 'assets/foto/vaksin/' . $this->upload->data('file_name');
            }

            $data['nama_pjg'] = $this->input->post('nama_pjg');
            $data['nik_pjg'] = $this->input->post('nik_pjg');
            $data['id_tahanan'] = $this->input->post('id_tahanan');
            $data['id_jk'] = $this->input->post('id_jk');
            $data['alamat_pjg'] = $this->input->post('alamat_pjg');
            $data['id_relasi'] = $this->input->post('id_relasi');
            $data['pengikut'] = $this->input->post('pengikut');
            $data['kk'] = 'kk'.$id.'.jpg';
            $data['vaksin'] = 'vaksin'.$id.'.jpg';

            $this->db->where('id_pengunjung', $id);
            return $this->db->update('pengunjung', $data);
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

    public function dt_barang_tambah()
    {
        $data = array(
            'id_tahanan' => $this->input->post('id_tahanan'),
            'id_pengunjung' => $this->input->post('id_pengunjung'),
            'jenis_barang' => $this->input->post('jenis_barang'),
            'keterangan' => $this->input->post('keterangan'),
            'jumlah' => $this->input->post('jumlah')
        );
        return $this->db->insert('barang', $data);
    }

    public function dt_barang_edit($id)
    {
        $data = array(
            'id_tahanan' => $this->input->post('id_tahanan'),
            'id_pengunjung' => $this->input->post('id_pengunjung'),
            'jenis_barang' => $this->input->post('jenis_barang'),
            'keterangan' => $this->input->post('keterangan'),
            'jumlah' => $this->input->post('jumlah')
        );
        $this->db->where('id_barang', $id);
        return $this->db->update('barang', $data);
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

    public function dt_sesi_tambah($id)
    {
        $data = array(
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_selesai' => $this->input->post('jam_selesai')
        );
            return $this->db->insert('sesi', $data);
    }

    public function dt_sesi_edit($id)
    {
        $data = array(
            'jam_mulai' => $this->input->post('jam_mulai'),
            'jam_selesai' => $this->input->post('jam_selesai')
        );
        $this->db->where('id_sesi', $id);
        return $this->db->update('sesi', $data);
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

    public function dt_kunjungan_tambah($tanggal, $no_antrian)
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

    public function getAutocompleteData($search) 
    {
        $this->db->select('id_tahanan, nama_napi');
        $this->db->like('nama_napi', $search, 'both');
        $query = $this->db->get('napi');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
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

    public function dt_kunjungan_edit($id)
    {
            $data = array(
                'id_sesi' => $this->input->post('id_sesi'),
                'id_status' => $this->input->post('id_status'),
                'id_pengunjung' => $this->input->post('id_pengunjung'),
                'no_antrian' => $this->input->post('no_antrian'),
                'tgl_kunjungan' => $this->input->post('tgl_kunjungan'),
                'jam_mulai' => $this->input->post('jam_mulai'),
                'jam_selesai' => $this->input->post('jam_selesai')
            );
                $this->db->where('id_kunjungan', $id);
                return $this->db->update('kunjungan', $data);
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

//=============================== DROPDOWN ===============================
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

    public function dropdown_role()
    {
        $query = $this->db->get('role');
        $result = $query->result();

        $id_role = array('-Pilih-');
        $nama_role = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_role, $result[$i]->id_role);
            array_push($nama_role, $result[$i]->nama_role);
        }
        return array_combine($id_role, $nama_role);
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

    public function dropdown_status()
    {
        $query = $this->db->get('status_kunjungan');
        $result = $query->result();

        $id_status = array('-Pilih-');
        $status = array('-Pilih-');

        for ($i = 0; $i < count($result); $i++) {
            array_push($id_status, $result[$i]->id_status);
            array_push($status, $result[$i]->status);
      }
        return array_combine($id_status, $status);
    }

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
}