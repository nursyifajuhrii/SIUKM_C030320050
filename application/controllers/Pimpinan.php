<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pimpinan extends CI_Controller {

	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('m_pimpinan');
	        if ($this->session->userdata('id_role') !='3') {
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
		if ( $this->session->has_userdata('username') && $this->session->userdata('id_level')==1 )
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
		    $this->m_pimpinan->dt_cetlap($bulantahun);
		    $data['cetaklaporan'] = $this->m_pimpinan->dt_cetlap($bulantahun);
		    $this->load->view('pimpinan/header',$data);
			$this->load->view('pimpinan/isi');
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

	function tampil($data)
	{
		$this->load->view('pimpinan/header',$data);
		$this->load->view('pimpinan/isi');
		$this->load->view('pimpinan/footer');
	}
}        