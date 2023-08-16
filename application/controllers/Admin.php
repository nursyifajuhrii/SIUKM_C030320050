<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('m_admin');
	        if ($this->session->userdata('id_role') !='1') {
	        	$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
	    			<strong>Anda Belum Login !</strong>
	    			<button type="button" class="close" data-dismiss-"alert" aria-label="Close">
	    			<span aria-hidden="true">&times;</span>
	    				</button>
	    			</div>');
	        		redirect('login');
	        }
	        
	    }


	public function login_kah()
	{
		if ( $this->session->has_userdata('username') && $this->session->userdata('id_role')==1 )
			return TRUE; 
		else
		  	redirect(base_url('login/logout'));    
	}

	public function index()
	{
		$data['judul']	='Selamat Datang di Sistem Informasi Kunjungan dan Pengaturan Tatap Muka Banjarbaru';
		$data['page']	='home';
		$data['jml_napi']	=$this->m_umum->jumlah_record_tabel('napi');
		$data['jml_pjg']	=$this->m_umum->jumlah_record_tabel('pengunjung');
		$data['jml_kunjungan']	=$this->m_umum->jumlah_record_tabel('kunjungan');
		$data['jml_pgw']	=$this->m_umum->jumlah_record_tabel('pegawai');
		$this->tampil($data);
	}


//============================== MAHASISWA  ==============================
	public function mahasiswa()
	{
		$data['judul']='Data Mahasiswa Poliban';
		$data['page']='mahasiswa';
		$data['mahasiswa']=$this->m_admin->dt_mahasiswa();
		$this->tampil($data);
	}

	public function mahasiswa_detil($id)
	{
		$data['judul']='Detil Data Mahasiswa Poliban';
		$data['page']='mahasiswa_detil';
		$data['d'] = $this->m_admin->dt_mahasiswa_detil($id);
		$this->tampil($data);
	}

	public function mahasiswa_tambah()
	{
		$data['judul'] = 'Tambah Mahasiswa';
		$data['page'] = 'mahasiswa_tambah';

		$this->form_validation->set_rules('nim', 'NIM', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_mahasiswa_tambah($data);
			redirect(base_url('admin/mahasiswa'));
		}
	}

	public function mahasiswa_edit($id = FALSE)
	{
		$data['judul']='Edit mahasiswa Poliban';
		$data['page']='mahasiswa_edit';
		$data['d'] = $this->m_umum->cari_data('mahasiswa_nursyifa', 'id', $id);

		$this->form_validation->set_rules('nim', 'NIM', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_mahasiswa_edit($id);
			redirect(base_url('admin/mahasiswa'));
		}
	}

	public function mahasiswa_hapus($id)
	{
		$this->m_umum->hapus_data('mahasiswa_nursyifa', 'id', $id);
		redirect(base_url('admin/mahasiswa'));
	}

	//============================== UKM  ==============================
	public function ukm()
	{
		$data['judul']='Data UKM Poliban';
		$data['page']='ukm';
		$data['ukm']=$this->m_admin->dt_ukm();
		$this->tampil($data);
	}

	public function ukm_detil($id)
	{
		$data['judul']='Detil Data UKM Poliban';
		$data['page']='ukm_detil';
		$data['d'] = $this->m_admin->dt_ukm_detil($id);
		$this->tampil($data);
	}

	public function ukm_tambah()
	{
		$data['judul'] = 'Tambah UKM';
		$data['page'] = 'ukm_tambah';

		$this->form_validation->set_rules('nama_ukm', 'Nama', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
	
		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_ukm_tambah($data);
			redirect(base_url('admin/ukm'));
		}
	}

	public function ukm_edit($id = FALSE)
	{
		$data['judul']='Edit ukm Poliban';
		$data['page']='ukm_edit';
		$data['d'] = $this->m_umum->cari_data('ukm_nursyifa', 'id_ukm', $id);


		$this->form_validation->set_rules('nama_ukm', 'Nama', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_ukm_edit($id);
			redirect(base_url('admin/ukm'));
		}
	}

	public function ukm_hapus($id)
	{
		$this->m_umum->hapus_data('ukm_nursyifa', 'id_ukm', $id);
		redirect(base_url('admin/ukm'));
	}

	//============================== ANGGOTA  ==============================
	public function anggota()
	{
		$data['judul']='Data Anggota UKM Poliban';
		$data['page']='anggota';
		$data['anggota']=$this->m_admin->dt_anggota();
		$this->tampil($data);
	}

	public function anggota_tambah()
	{
		$data['judul'] = 'Tambah Anggota UKM';
		$data['page'] = 'anggota_tambah';

		
        $this->form_validation->set_rules('id', 'Pilih Mahasiswa', 'callback_dd_cek');
        $this->form_validation->set_rules('id_ukm', 'Pilih UKM', 'callback_dd_cek');
		

		$data['ddmahasiswa'] = $this->m_admin->dropdown_mhs();
		$data['ddukm'] = $this->m_admin->dropdown_ukm();

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_anggota_tambah();
			redirect(base_url('admin/anggota'));
		}
	}

	public function anggota_hapus($id)
	{
		$this->m_umum->hapus_data('anggota_nursyifa', 'id_anggota', $id);
		redirect(base_url('admin/anggota'));
	}

//============================== PEGAWAI ==============================
	public function pegawai()
	{
		$data['judul']='Data Pegawai Lapas Banjarbaru';
		$data['page']='pegawai';
		$data['pegawai']=$this->m_admin->dt_pegawai();
		$this->tampil($data);
	}
	
	public function pegawai_detil($id)
	{
		$data['judul']='Detil Data Pegawai Lapas Banjarbaru';
		$data['page']='pegawai_detil';
		$data['d']=$this->m_admin->dt_pegawai_detil($id);
		$this->tampil($data);
	}

	public function pegawai_tambah()
{
    $data['judul'] = 'Tambah Data pegawai';
    $data['page'] = 'pegawai_tambah';

    $this->form_validation->set_rules(
        'nama_pgw',
        'Nama Pegawai',
        'required|min_length[3]|max_length[30]',
        array('required' => '%s harus diisi.')
    );
    $this->form_validation->set_rules('jabatan', 'Isikan Jabatan', 'required');
    $this->form_validation->set_rules('id_jk', 'Pilih Jenis Kelamin', 'callback_dd_cek');
    $this->form_validation->set_rules('alamat_pgw', 'Isikan Alamat', 'required');
    $this->form_validation->set_rules('email_pgw', 'Isikan Email', 'required');
    $this->form_validation->set_rules('username', 'Isikan Username', 'required');
    $this->form_validation->set_rules('password', 'Isikan password', 'required');
    $this->form_validation->set_rules('telp_pgw', 'Isikan Telepon', 'required');
    $this->form_validation->set_rules('id_role', 'Pilih Role', 'callback_dd_cek');
    $this->form_validation->set_rules('foto', 'Foto', 'callback_check_upload'); // Menggunakan callback check_upload untuk validasi foto

    $data['ddjenis_kelamin'] = $this->m_admin->dropdown_jk();
    $data['ddrole'] = $this->m_admin->dropdown_role();

    if ($this->form_validation->run() === FALSE) {
        $this->tampil($data);
    } else {
        $config['upload_path'] = './assets/foto';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
        $config['file_name'] = uniqid('foto_');

        $this->load->library('upload'); // Memuat library upload

        $this->upload->initialize($config); // Inisialisasi konfigurasi upload

        if (!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect(base_url('admin/pegawai_tambah'));
        } else {
            $foto_info = $this->upload->data();
            $foto_path = $foto_info['file_name'];

            $this->m_admin->dt_pegawai_tambah($foto_path);
            redirect(base_url('admin/pegawai'));
        }
    }
}


	public function pegawai_edit($id = FALSE)
{
    $data['judul'] = 'Edit Data Pegawai';
    $data['page'] = 'pegawai_edit';
    $this->form_validation->set_rules(
        'nama_pgw',
        'Nama pegawai',
        'required|min_length[3]|max_length[30]',
        array('required' => '%s harus diisi.')
    );
    $this->form_validation->set_rules('jabatan', 'Isikan Jabatan', 'required');
    $this->form_validation->set_rules('id_jk', 'Pilih Jenis Kelamin', 'callback_dd_cek');
    $this->form_validation->set_rules('alamat_pgw', 'Isikan Alamat', 'required');
    $this->form_validation->set_rules('email_pgw', 'Isikan Email', 'required');
    $this->form_validation->set_rules('username', 'Isikan Username', 'required');
    $this->form_validation->set_rules('password', 'Isikan password', 'required');
    $this->form_validation->set_rules('telp_pgw', 'Isikan Telepon', 'required');
    $this->form_validation->set_rules('id_role', 'Pilih Role', 'callback_dd_cek');

    $data['ddjenis_kelamin'] = $this->m_admin->dropdown_jk();
    $data['ddrole'] = $this->m_admin->dropdown_role();
    $data['d'] = $this->m_umum->cari_data('pegawai', 'id_pegawai', $id);

    if ($this->form_validation->run() === FALSE) {
        $this->tampil($data);
    } else {
        // Cek apakah ada file foto yang diupload
        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;
            $config['file_name'] = uniqid('foto_');

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                // Jika upload foto gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect(base_url('admin/pegawai_edit/'.$id));
            } else {
                // Jika upload foto berhasil
                $foto_info = $this->upload->data();
                $foto_path = $foto_info['file_name'];

                // Update data pegawai dengan foto baru
                $this->m_admin->dt_pegawai_edit($id, $foto_path);
                redirect(base_url('admin/pegawai'));
            }
        } else {
            // Update data pegawai tanpa mengubah foto
            $this->m_admin->dt_pegawai_edit($id, $this->input->post('foto'));
            redirect(base_url('admin/pegawai'));
        }
    }
}


	public function pegawai_hapus($id)
	{
		$this->m_umum->hapus_data('pegawai', 'id_pegawai', $id);
		redirect(base_url('admin/pegawai'));
	}

//=============================== NARAPIDANA ===============================
	public function napi()
	{
		$data['judul']='Data Narapidana Lapas Banjarbaru';
		$data['page']='napi';
		$data['napi']=$this->m_admin->dt_napi();
		$this->tampil($data);
	}

	public function napi_detil($id)
	{
		$data['judul']='Detil Data Narapidana Lapas Banjarbaru';
		$data['page']='napi_detil';
		$data['d']=$this->m_admin->dt_napi_detil($id);
		$this->tampil($data);
	}

	public function napi_tambah()
	{
	    $data['judul'] = 'Tambah Data Narapidana';
	    $data['page'] = 'napi_tambah';

	    $this->form_validation->set_rules(
	        'nama_napi',
	        'Nama Narapidana',
	        'required|min_length[3]|max_length[30]',
	        array('required' => '%s harus diisi.')
	    );

	    $this->form_validation->set_rules(
        'nik_napi',
        'NIK',
        'required|numeric|min_length[16]|max_length[16]',
        array(
            'required' => '%s harus diisi.',
            'numeric' => '%s harus berupa angka.',
            'min_length' => '%s harus memiliki 16 angka.',
            'max_length' => '%s harus memiliki 16 angka.'
        )
    );
	    $this->form_validation->set_rules('nama_napi', 'Isikan Nama', 'required');
	    $this->form_validation->set_rules('id_jk', 'Pilih Jenis Kelamin', 'callback_dd_cek');
	    $this->form_validation->set_rules('tgl_masuk', 'Isikan Tanggal Masuk', 'required');
	    $this->form_validation->set_rules('tgl_keluar', 'Isikan Tanggal Keluar', 'required');
	    $this->form_validation->set_rules('ruangan', 'Isikan Ruangan', 'required');
	    $this->form_validation->set_rules('kasus', 'Isikan Kasus', 'required');
	    $this->form_validation->set_rules('foto_napi', 'Isikan Foto', 'callback_check_upload');

	    $data['ddjenis_kelamin'] = $this->m_admin->dropdown_jk();

	    if ($this->form_validation->run() === FALSE) {
	        $this->tampil($data);
	    } else {
	        // Cek apakah ada file foto yang diupload
	        if (!empty($_FILES['foto_napi']['name'])) {
	            $config['upload_path'] = './assets/foto/napi';
	            $config['allowed_types'] = 'jpg|jpeg|png';
	            $config['max_size'] = 2048;
	            $config['file_name'] = uniqid('foto_napi_');

	            $this->load->library('upload', $config);

	            if (!$this->upload->do_upload('foto_napi')) {
	                // Jika upload foto gagal
	                $error = $this->upload->display_errors();
	                $this->session->set_flashdata('error', $error);
	                redirect(base_url('admin/napi_tambah'));
	            } else {
	                // Jika upload foto berhasil
	                $foto_info = $this->upload->data();
	                $foto_path = $foto_info['file_name'];

	                // Insert data napi dengan foto baru
	                $this->m_admin->dt_napi_tambah($foto_path);
	                redirect(base_url('admin/napi'));
	            }
	        } else {
	            // Insert data napi tanpa foto
	            $this->m_admin->dt_napi_tambah('');
	            redirect(base_url('admin/napi'));
	        }
	    }
	}


	public function napi_edit($id = FALSE)
	{
		$data['judul'] = 'Edit Data Narapidana';
		$data['page'] = 'napi_edit';
		$this->form_validation->set_rules(
			'nama_napi',
			'Nama Narapidana',
			'required|min_length[3]|max_length[30]',
			array('required' => '%s harus diisi.')
		);
		$this->form_validation->set_rules(
        'nik_napi',
        'NIK',
        'required|numeric|min_length[16]|max_length[16]',
        array(
            'required' => '%s harus diisi.',
            'numeric' => '%s harus berupa angka.',
            'min_length' => '%s harus memiliki 16 angka.',
            'max_length' => '%s harus memiliki 16 angka.'
        )
    );
		$this->form_validation->set_rules('nama_napi', 'Isikan Nama', 'required');
		$this->form_validation->set_rules('id_jk', 'Pilih Jenis Kelamin', 'callback_dd_cek');
		$this->form_validation->set_rules('tgl_masuk', 'Isikan Tanggal Masuk', 'required');
		$this->form_validation->set_rules('tgl_keluar', 'Isikan Tanggal Keluar', 'required');
		$this->form_validation->set_rules('ruangan', 'Isikan Ruangan', 'required');
		$this->form_validation->set_rules('kasus', 'Isikan Kasus', 'required');
		$this->form_validation->set_rules('foto_napi', 'Isikan Foto', 'callback_check_upload');


		$data['ddjenis_kelamin'] = $this->m_admin->dropdown_jk();
		$data['d'] = $this->m_umum->cari_data('napi', 'id_tahanan', $id);

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_napi_edit($id);
			redirect(base_url('admin/napi'));
		}
	}

	public function napi_hapus($id)
	{
		$this->m_umum->hapus_data('napi', 'id_tahanan', $id);
		redirect(base_url('admin/napi'));
	}

//============================== BARANG ==============================
	public function barang()
	{
		$data['judul']='Data Barang Lapas Banjarbaru';
		$data['page']='barang';
		$data['barang']=$this->m_admin->dt_barang();
		$this->tampil($data);
	}

	public function barang_detil($id)
	{
		$data['judul']='Detil Barang Narapidana Lapas Banjarbaru';
		$data['page']='barang_detil';
		$data['d']=$this->m_admin->dt_barang_detil($id);
		$this->tampil($data);
	}

	public function barang_tambah()
	{
		$data['judul'] = 'Tambah Barang Narapidana';
		$data['page'] = 'barang_tambah';

		$this->form_validation->set_rules(
			'jenis_barang',
			'Jenis Barang',
			'required|min_length[3]|max_length[30]',
			array('required' => '%s harus diisi.')
		);

        $this->form_validation->set_rules('id_tahanan', 'Pilih NAPI', 'callback_dd_cek');
        $this->form_validation->set_rules('id_pengunjung', 'Pilih Pengunjung', 'callback_dd_cek');
		$this->form_validation->set_rules('jenis_barang', 'Isikan Jenis Barang', 'required');
		$this->form_validation->set_rules('keterangan', 'Isikan Keterangan', 'required');
		$this->form_validation->set_rules('jumlah', 'Isikan Jumlah', 'required');


		$data['ddpjg'] = $this->m_admin->dropdown_pjg();
		$data['ddnapi'] = $this->m_admin->dropdown_napi();

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_barang_tambah();
			redirect(base_url('admin/barang'));
		}
	}

	public function barang_edit($id = FALSE)
	{
		$data['judul'] = 'Edit Data Barang Narapidana';
		$data['page'] = 'barang_edit';
		
		$this->form_validation->set_rules('id_tahanan', 'Pilih NAPI', 'callback_dd_cek');
		$this->form_validation->set_rules('id_pengunjung', 'Pilih Pengunjung', 'callback_dd_cek');
		$this->form_validation->set_rules('jenis_barang', 'Isikan Jenis Barang', 'required');
		$this->form_validation->set_rules('keterangan', 'Isikan Keterangan', 'required');
		$this->form_validation->set_rules('jumlah', 'Isikan Jumlah', 'required');

		$data['ddnapi'] = $this->m_admin->dropdown_napi();
		$data['ddpjg'] = $this->m_admin->dropdown_pjg();
		$data['d'] = $this->m_umum->cari_data('barang', 'id_barang', $id);

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_barang_edit($id);
			redirect(base_url('admin/barang'));
		}
	}

	public function barang_hapus($id)
	{
		$this->m_umum->hapus_data('barang', 'id_barang', $id);
		redirect(base_url('admin/barang'));
	}

//============================== PENGUNJUNG ==============================
	public function pengunjung()
	{
		$data['judul']='Data Pengunjung Lapas Banjarbaru';
		$data['page']='pengunjung';
		$data['pengunjung']=$this->m_admin->dt_pengunjung();
		$this->tampil($data);
	}

	public function pengunjung_detil($id)
	{
		$data['judul']='Detil Pengunjung Narapidana Lapas Banjarbaru';
		$data['page']='pengunjung_detil';
		$data['d']=$this->m_admin->dt_pengunjung_detil($id);
		$this->tampil($data);
	}

	public function pengunjung_tambah()
	{
	  $data['judul'] = 'Tambah Pengunjung';
	  $data['page'] = 'pengunjung_tambah';

	  $this->form_validation->set_rules(
	    'nama_pjg',
	    'Nama Pengunjung',
	    'required|min_length[3]|max_length[30]',
	    array('required' => '%s harus diisi.')
	  );
	  $this->form_validation->set_rules('nik_pjg', 'NIK', 'required');
	  $this->form_validation->set_rules('id_jk', 'Pilih Jenis Kelamin', 'required');
	  $this->form_validation->set_rules('id_tahanan', 'Pilih NAPI', 'required');
	  $this->form_validation->set_rules('alamat_pjg', 'Alamat', 'required');
	  $this->form_validation->set_rules('id_relasi', 'Relasi', 'required');
	  $this->form_validation->set_rules('pengikut', 'Pengikut', 'required');
	  $this->form_validation->set_rules('vaksin', 'Kartu Vaksin', 'callback_check_upload');
	  $this->form_validation->set_rules('kk', 'KK/SK', 'callback_check_upload');

	  $data['ddjenis_kelamin'] = $this->m_admin->dropdown_jk();
	  $data['ddnapi'] = $this->m_admin->dropdown_napi();
	  $data['ddrelasi'] = $this->m_admin->dropdown_relasi();

	  if ($this->form_validation->run() === FALSE) {
	    $this->tampil($data);
	  } else {
	    $this->m_admin->dt_pengunjung_tambah();
	    redirect(base_url('admin/pengunjung'));
	  }
	}


	public function pengunjung_edit($id = FALSE)
	{
		$data['judul'] = 'Edit Data Pengunjung';
		$data['page'] = 'pengunjung_edit';
		$this->form_validation->set_rules(
			'nama_pjg',
			'Nama Pengunjung',
			'required|min_length[3]|max_length[30]',
			array('required' => '%s harus diisi.')
		);
		$this->form_validation->set_rules('nik_pjg', 'NIK', 'required');
        $this->form_validation->set_rules('id_jk', 'Pilih Jenis Kelamin', 'callback_dd_cek');
        $this->form_validation->set_rules('id_tahanan', 'Pilih NAPI', 'callback_dd_cek');
		$this->form_validation->set_rules('alamat_pjg', 'Alamat', 'required');
		$this->form_validation->set_rules('id_relasi', 'Relasi', 'required');
		$this->form_validation->set_rules('pengikut', ' Pengikut', 'required');
		$this->form_validation->set_rules('vaksin', 'Kartu Vaksin', 'callback_check_upload');
		$this->form_validation->set_rules('kk', 'KK/SK', 'callback_check_upload');

		$data['ddjenis_kelamin'] = $this->m_admin->dropdown_jk();
		$data['ddnapi'] = $this->m_admin->dropdown_napi();
		$data['ddrelasi'] = $this->m_admin->dropdown_relasi();
		$data['d'] = $this->m_umum->cari_data('pengunjung', 'id_pengunjung', $id);

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_pengunjung_edit($id);
			redirect(base_url('admin/pengunjung'));
		}
	}

	public function pengunjung_hapus($id)
	{
		$this->m_umum->hapus_data('pengunjung', 'id_pengunjung', $id);
		redirect(base_url('admin/pengunjung'));
	}

//============================== SESI ==============================
	public function sesi()
	{
		$data['judul']='Sesi Kunjungan Lapas Banjarbaru';
		$data['page']='sesi';
		$data['sesi']=$this->m_admin->dt_sesi();
		$this->tampil($data);
	}

	public function sesi_detil($id)
	{
		$data['judul']='Detil Sesi Kunjungan Lapas Banjarbaru';
		$data['page']='sesi_detil';
		$data['d']=$this->m_admin->dt_sesi_detil($id);
		$this->tampil($data);
	}

	public function sesi_tambah()
	{
		$data['judul'] = 'Tambah Sesi';
		$data['page'] = 'sesi_tambah';

		$this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
		$this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_sesi_tambah($data);
			redirect(base_url('admin/sesi'));
		}
	}

	public function sesi_edit($id = FALSE)
	{
		$data['judul']='Edit Sesi Kunjungan Lapas Banjarbaru';
		$data['page']='sesi_edit';
		$data['d'] = $this->m_umum->cari_data('sesi', 'id_sesi', $id);

		$this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
		$this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_sesi_edit($id);
			redirect(base_url('admin/sesi'));
		}
	}

	public function sesi_hapus($id)
	{
		$this->m_umum->hapus_data('sesi', 'id_sesi', $id);
		redirect(base_url('admin/sesi'));
	}

//============================== KUNJUNGAN ==============================
	public function kunjungan()
	{
		$data['judul']='Data Kunjungan Lapas Banjarbaru';
		$data['page']='kunjungan';
		$data['kunjungan']=$this->m_admin->dt_kunjungan();
		$this->tampil($data);
	}

	public function kunjungan_detil($id)
	{
		$data['judul']='Detil Data Kunjungan Lapas Banjarbaru';
		$data['page']='kunjungan_detil';
		$data['d']=$this->m_admin->dt_kunjungan_detil($id);
		$this->tampil($data);
	}

	public function kunjungan_tambah()
	{
		$data['judul'] = 'Tambah Kunjungan';
		$data['page'] = 'kunjungan_tambah';
		
		$this->form_validation->set_rules(
			'nama_pjg',
			'Nama Pengunjung',
			'required|min_length[3]|max_length[30]',
			array('required' => '%s harus diisi.')
		);
		$this->form_validation->set_rules(
        'nik_pjg',
        'NIK',
        'required|numeric|min_length[16]|max_length[16]',
	        array(
	            'required' => '%s harus diisi.',
	            'numeric' => '%s harus berupa angka.',
	            'min_length' => '%s harus memiliki 16 angka.',
	            'max_length' => '%s harus memiliki 16 angka.'
	        )
    	);
		$this->form_validation->set_rules(
		    'alamat_pjg',
		    'Alamat',
		    'required',
		    array('required' => 'Alamat Harus Diisi')
		);

        $this->form_validation->set_rules('id_jk', 'Pilih Jenis Kelamin', 'callback_dd_cek');
        $this->form_validation->set_rules('id_tahanan', 'Pilih NAPI', 'callback_dd_cek');
		$this->form_validation->set_rules('id_relasi', 'Relasi', 'callback_dd_cek');
		$this->form_validation->set_rules('pengikut', ' Pengikut', 'required');
		$this->form_validation->set_rules('vaksin', 'Kartu Vaksin', 'callback_check_upload');
		$this->form_validation->set_rules('kk', 'KK/SK', 'callback_check_upload');
		$this->form_validation->set_rules('id_sesi', 'Pilih Sesi', 'callback_dd_cek');

		$data['ddpjg'] = $this->m_admin->dropdown_pjg();
		$data['ddstatus'] = $this->m_admin->dropdown_status();
		$data['ddsesi'] = $this->m_admin->dropdown_sesi();
		$data['ddjk'] = $this->m_admin->dropdown_jk();
		$data['ddnapi'] = $this->m_admin->dropdown_napi();
		$data['ddrelasi'] = $this->m_admin->dropdown_relasi();
		$data['d'] = $this->m_admin->getLatestKunjunganData();

		$this->load->model('m_admin');
		$tanggal = date('Y-m-d', strtotime('+1 day'));
		$no_antrian = $this->m_admin->getNoAntrian($this->input->post('id_sesi'));

			if ($this->form_validation->run() === FALSE) {
				$this->tampil($data);
			} else {
				if ($no_antrian === false) {
					echo "<script>alert('Antrian Sudah Penuh, Silahkan Coba Sesi Lain atau Coba Lagi Besok');</script>";
		            $this->tampil($data);
		   
		        } else {
		            echo "<script>alert('Pendaftaran Kunjungan Berhasil');</script>";
		            $this->m_admin->dt_kunjungan_tambah($tanggal, $no_antrian);
		            $surat_data = $this->m_admin->getLatestKunjunganData();
	        		$this->surat($surat_data);
			}
		}
	}

	public function kunjungan_edit($id = FALSE)
	{
		$data['judul']='Edit Kunjungan Lapas Banjarbaru';
		$data['page']='kunjungan_edit';
		$data['d'] = $this->m_umum->cari_data('kunjungan', 'id_kunjungan', $id);

		$this->form_validation->set_rules('id_pengunjung', 'Pilih Pengunjung', 'callback_dd_cek');
		$this->form_validation->set_rules('id_sesi', 'Pilih Sesi', 'callback_dd_cek');
		$this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
		$this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');
		$this->form_validation->set_rules('id_status', 'Pilih Status', 'callback_dd_cek');
		$this->form_validation->set_rules('no_antrian', 'Pilih Antrian', 'required');
		$this->form_validation->set_rules('tgl_kunjungan', 'Pilih Tanggal', 'required');


		$data['ddpjg'] = $this->m_admin->dropdown_pjg();
		$data['ddstatus'] = $this->m_admin->dropdown_status();
		$data['ddsesi'] = $this->m_admin->dropdown_sesi();


		if ($this->form_validation->run() === FALSE) {
			$this->tampil($data);
		} else {
			$this->m_admin->dt_kunjungan_edit($id);
			redirect(base_url('admin/kunjungan'));
		}
	}

	public function surat($surat_data)
    {

        $this->load->model('m_admin');

        // Mendapatkan data kunjungan terbaru dari model
        $data['d'] = $surat_data;

        // Memuat view surat_kunjungan_admin dengan data kunjungan terbaru
        $this->load->view('surat_kunjungan_admin', $data);
    }


	public function kunjungan_hapus($id)
	{
		$this->m_umum->hapus_data('kunjungan', 'id_kunjungan', $id);
		redirect(base_url('admin/kunjungan'));
	}

//============================== ANTRIAN ==============================
	public function antrian()
	{
		$data['judul']='Antrian Kunjungan Lapas Banjarbaru';
		$data['page']='antrian';
		$data['antrian']=$this->m_admin->dt_antrian();
		$this->tampil($data);
	}

//============================== LAPORAN ==============================
	public function laporan()
	{
		$data['judul']='Laporan Kunjungan Lapas Banjarbaru';
		$data['page']='laporan';

		$this->tampil($data);
	}

	public function cetaklaporan()
	{
		$data['judul']='Cetak Laporan Kunjungan Lapas Banjarbaru';
		$data['page']='cetaklaporan';

		if ((isset($_POST['bulan']) && $_POST['bulan'] != '') &&
    	(isset($_POST['tahun']) && $_POST['tahun'] != ''))
		{
		    $bulan = $_POST['bulan'];
		    $tahun = $_POST['tahun'];
		    $bulantahun = $bulan.$tahun;
		    $this->m_admin->dt_cetlap($bulantahun);
		    $data['cetaklaporan'] = $this->m_admin->dt_cetlap($bulantahun);
		    $this->load->view('admin/header',$data);
			$this->load->view('admin/isi');
		}
		else
		{  
		    // Menampilkan alert jika parameter kosong
		    echo "<script>alert('Filter Harus Diisi'); window.location.href = 'laporan';</script>";   
		}
	}

	//============ Tools ===============
	function dd_cek($str)    //Untuk Validasi DropDown jika tidak dipilih
	{
	    if ($str == '-Pilih-') {
	      $this->form_validation->set_message('dd_cek', 'Harus dipilih');
	      return FALSE;
	    } else
	      return TRUE;
	}

	// Callback function to validate the upload
	public function check_upload($str)
	{
	    if (empty($_FILES['foto']['name'])) {
	        // If no file is selected, it's considered valid (not required)
	        return true;
	    }

	    $config['upload_path'] = './assets/foto';
	    $config['allowed_types'] = 'jpg|jpeg|png';
	    $config['max_size'] = 2048;
	    $config['file_name'] = uniqid('foto_');

	    $this->load->library('upload'); // Memuat library upload

	    $this->upload->initialize($config); // Inisialisasi konfigurasi upload

	    if (!$this->upload->do_upload('foto')) {
	        $this->form_validation->set_message('check_upload', $this->upload->display_errors());
	        return false;
	    }

	    return true;
	}

	function tampil($data)
	{
		$this->load->view('admin/header',$data);
		$this->load->view('admin/isi');
		$this->load->view('admin/footer');
	}
}



