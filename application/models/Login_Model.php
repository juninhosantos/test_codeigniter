<?php

class Login_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function check_login($args)
	{
		$this->db->select('cd_user,nm_user')
		         ->from('users')
		         ->where(array('nm_login'=>$args['login'],'nm_pass'=>$args['senha']));

		$result = $this->db->get();

		if($result->num_rows() > 0){

			return $result->row();
		}

		return false;

	}
}