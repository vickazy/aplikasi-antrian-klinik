<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('M_login');
		date_default_timezone_set("Asia/Bangkok");
	}


	public function index() {

		$this->load->view("V_Login");
	}

	public function authlogin(){
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
	
		$password = md5(md5(md5(strrev($password))));

		if($hasil = $this->M_login->checkUser($username)){
			if($data = $this->M_login->checkPassword($username,$password)){
				$this->session->set_userdata($data[0]);
				redirect('Dashboard');
			}else{
				$this->session->set_flashdata('error','Maaf, Password Anda Salah!');
				redirect('Login');
			}
		}else{
			$this->session->set_flashdata('error','Maaf, Username Belum Terdaftar!');
			redirect('Login');	
		}
	}
}
