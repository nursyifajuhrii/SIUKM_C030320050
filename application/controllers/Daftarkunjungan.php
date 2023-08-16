<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftarkunjungan extends CI_Controller {
	function index(){
		$data['pesan']="";
		$this->load->model('m_daftar');
		$tanggal = date('Y-m-d', strtotime('+1 day'));
		$no_antrian = $this->m_daftar->getNoAntrian($this->input->post('id_sesi'));

		$data['ddjenis_kelamin'] = $this->m_daftar->dropdown_jk();
		$data['ddnapi'] = $this->m_daftar->dropdown_napi();
		$data['ddrelasi'] = $this->m_daftar->dropdown_relasi();
		$data['ddsesi'] = $this->m_daftar->dropdown_sesi();
		$data['d'] = $this->m_daftar->getLatestKunjunganData();
		
		$napiId = $this->input->post('id_tahanan');
        $isNapiDikunjungiMingguIni = $this->m_daftar->isNapiDikunjungiMingguIni($napiId);
        if ($isNapiDikunjungiMingguIni) {
            echo "<script>alert('NAPI Sudah Dikunjungi Minggu Ini, Coba Minggu Depan');</script>";
            $this->load->view('daftarkunjungan', $data);
            return;
        }

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
        $this->form_validation->set_rules('id_jk', 'Pilih Jenis Kelamin', 'callback_dd_cek');
        $this->form_validation->set_rules(
		    'id_tahanan',
		    'Nama NAPI',
		    'required',
		    array('required' => 'Nama NAPI Harus Diisi')
		);

		// Atur aturan validasi untuk kolom 'Alamat'
		$this->form_validation->set_rules(
		    'alamat_pjg',
		    'Alamat',
		    'required',
		    array('required' => 'Alamat Harus Diisi')
		);
		
		$this->form_validation->set_rules('id_relasi', 'Relasi', 'callback_dd_cek');
		$this->form_validation->set_rules('vaksin', 'Kartu Vaksin', 'callback_check_upload');
		$this->form_validation->set_rules('kk', 'KK/SK', 'callback_check_upload');
		$this->form_validation->set_rules('id_sesi', 'Pilih Sesi', 'callback_dd_cek');
	
		if ($this->form_validation->run() === FALSE) {
			$this->load->view("daftarkunjungan",$data);
		} else {
	        
			if ($no_antrian === false) {
				echo "<script>alert('Antrian Sudah Penuh, Silahkan Mendaftar di Sesi Lain atau Coba Lagi Besok');</script>";
	            $this->load->view('daftarkunjungan', $data);
	   
	        } else {
	            echo "<script>alert('Pendaftaran Kunjungan Berhasil');</script>";
	            $this->m_daftar->dt_daftar_kunjungan($tanggal, $no_antrian);
	            $surat_data = $this->m_daftar->getLatestKunjunganData();
        		$this->surat($surat_data);
	           
	        }
		}
	}

	public function get_autocomplete_data() {
    $this->load->model('m_daftar'); // Memuat model m_daftar
    $search = $this->input->get('term'); // Ambil data 'term' dari request
    $data = $this->m_daftar->getAutocompleteData($search);
    echo json_encode($data);
	}


	public function surat($surat_data)
    {

        $this->load->model('m_daftar');
        $data['d'] = $surat_data;
        // Memuat view surat_kunjungan dengan data kunjungan terbaru
        $this->load->view('surat_kunjungan', $data);
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

}
