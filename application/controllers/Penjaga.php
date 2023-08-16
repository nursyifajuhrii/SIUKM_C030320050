<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjaga extends CI_Controller {

	public function __construct()
	    {
	        parent::__construct();
	        $this->load->model('m_penjaga');
	        if ($this->session->userdata('id_role') !='2') {
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
		if ( $this->session->has_userdata('username') && $this->session->userdata('id_role')==2 )
			return TRUE; 
		else
		  	redirect(base_url('login/logout'));    
	}

	public function index()
	{
		$data['judul']	='Selamat Datang di Sistem Informasi Kunjungan dan Pengaturan Tatap Muka Banjarbaru';
		$data['page']	='home';
		$data['jml_kunjungan']	=$this->m_umum->jumlah_record_tabel('kunjungan');
		$data['jml_pjg']	=$this->m_umum->jumlah_record_tabel('pengunjung');
		$this->tampil($data);
	}
//============================== BARANG ==============================
	public function barang()
	{
		$data['judul']	='Data Barang Lapas Banjarbaru';
		$data['page']	='barang';
		$this->load->model('m_penjaga');
		$data['barang']	=$this->m_penjaga->dt_barang();
		$this->tampil($data);
	}

	public function barang_detil($id)
	{
		$data['judul']='Detil Barang Narapidana Lapas Banjarbaru';
		$data['page']='barang_detil';
		$this->load->model('m_penjaga');
		$data['d']=$this->m_penjaga->dt_barang_detil($id);
		$this->tampil($data);
	}

//============================== PENGUNJUNG ==============================
	public function pengunjung()
	{
		$data['judul']='Data Pengunjung Lapas Banjarbaru';
		$data['page']='pengunjung';
		$this->load->model('m_penjaga');
		$data['pengunjung']=$this->m_penjaga->dt_pengunjung();
		$this->tampil($data);
	}

	public function pengunjung_detil($id)
	{
		$data['judul']='Detil Pengunjung Narapidana Lapas Banjarbaru';
		$data['page']='pengunjung_detil';
		$this->load->model('m_penjaga');
		$data['d']=$this->m_penjaga->dt_pengunjung_detil($id);
		$this->tampil($data);
	}
	
	//============================== SESI ==============================
	public function sesi()
	{
		$data['judul']='Sesi Kunjungan Lapas Banjarbaru';
		$data['page']='sesi';
		$this->load->model('m_penjaga');
		$data['sesi']=$this->m_penjaga->dt_sesi();
		$this->tampil($data);
	}

	public function sesi_detil($id)
	{
		$data['judul']='Detil Sesi Kunjungan Lapas Banjarbaru';
		$data['page']='sesi_detil';
		$this->load->model('m_penjaga');
		$data['d']=$this->m_penjaga->dt_sesi_detil($id);
		$this->tampil($data);
	}

	//============================== KUNJUNGAN ==============================
	public function kunjungan()
	{
		$data['judul']='Data Kunjungan Lapas Banjarbaru';
		$data['page']='kunjungan';
		$this->load->model('m_penjaga');
		$data['kunjungan']=$this->m_penjaga->dt_kunjungan();
		$this->tampil($data);
	}

	public function kunjungan_detil($id)
	{
		$data['judul']='Detil Data Kunjungan Lapas Banjarbaru';
		$data['page']='kunjungan_detil';
		$this->load->model('m_penjaga');
		$data['d']=$this->m_penjaga->dt_kunjungan_detil($id);
		$this->tampil($data);
	}

//============================== ANTRIAN ==============================
	public function antrian()
	{
		$data['judul']='Antrian Kunjungan Lapas Banjarbaru';
		$data['page']='antrian';
		$this->load->model('m_penjaga');
		$data['antrian']=$this->m_penjaga->dt_antrian();
		$this->tampil($data);
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
		$this->load->view('penjaga/header',$data);
		$this->load->view('penjaga/isi');
		$this->load->view('penjaga/footer');
	}

}        