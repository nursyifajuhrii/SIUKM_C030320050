<!-- Contoh Sistem Informasi Sederhana -->
<!-- By Agus SBN - Matakuliah Pemrograman WEB -->
<!-- Politeknik Negeri Banjarmasin -->
<!-- Fitur: -->
<!-- - CodeIgniter -->
<!-- - CRUD Multitable -->
<!-- - Admin LTE -->
<!-- - datatable (paging, sort and cari) -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function index(){
		$data['pesan']="";		
	    $this->form_validation->set_rules('username','username', 'required', array('required'=>'Username tidak boleh kosong'));
	    $this->form_validation->set_rules('password','password', 'required', array('required'=>'Password tidak boleh kosong'));
		if ($this->form_validation->run() == FALSE) 
			$this->load->view("login",$data);
	    else
	    {
	    	$username = $this->input->post('username');
	    	$password = $this->input->post('password');
	    	$cek = $this->m_umum->cek_login($username, $password);

	    	if ($cek == FALSE) {
	    		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert"> 
	    			<strong>Username atau Password Salah!</strong>
	    			<button type="button" class="close" data-dismiss-"alert" aria-label="Close">
	    			<span aria-hidden="true">&times;</span>
	    				</button>
	    			</div>');
	    		redirect('login');
	    	}else{
	    		$this->session->set_userdata('id_role', $cek->id_role);
	    		$this->session->set_userdata('nama_pgw', $cek->nama_pgw);
	    		$this->session->set_userdata('foto', $cek->foto);
	    		switch ($cek->id_role) {
	    			case 1 : redirect(base_url("admin"));
	    				break;
	    			case 2 : redirect(base_url("penjaga"));
	    				break;
	    			case 3 : redirect(base_url("pimpinan"));
	    				break;
	    			default:
	    				break;
	    		}
	    	}
	    }	
	}

	function logout(){
        unset(
            $_SESSION['username'],
            $_SESSION['id_level']
        );  
		$data['pesan']='Logout Sukses';
		$this->load->view("login",$data);			
	}

}
