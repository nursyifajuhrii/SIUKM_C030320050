<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_landing');
    }

	public function index()
	{
		$data['judul']	='Selamat Datang di Sistem Informasi Kunjungan dan Pengaturan Tatap Muka Lapas Banjarbaru';
		$data['page']	='home';
        
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// die();
		$this->tampil($data);
	}

	function tampil($data)
	{
		$this->load->view('landing/header',$data);
		$this->load->view('landing/isi');
		$this->load->view('landing/footer');
	}
}



