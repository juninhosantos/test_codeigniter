<?php

class MY_Controller extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Sao_Paulo');
	}

	public function is_logged(){
		if(!$this->session->userdata('admin')) {
			$this->session->set_flashdata('erro',"Você foi deslogado.");
			redirect(site_url("admin/login"));
		}
	}

}