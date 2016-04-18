<?php

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('admin/login');
	}

	public function auth()
	{
		$this->load->model("Login_Model","login");

		$result = $this->login->check_login($_POST);

		if(!$result) {
			$this->session->set_flashdata('erro','Login e/ou senha inválido(s)');
			redirect(site_url("admin/login"));
		}

		$this->session->set_userdata("admin",$result);

		redirect(site_url("admin"));
	}

	public function logout()
	{
		$this->session->unset_userdata('admin');
		$this->session->sess_destroy();

		redirect(site_url("admin/login"));
	}
}