<?php

class News_Model extends CI_Model
{

	private $count;

	public function __construct()
	{
		parent::__construct();
	}

	public function get($id=NULL,$slug=NULL,$filter=NULL,$search=NULL,$limit=NULL)
	{
		$this->db->select("*")
		->from('news');

		if(!empty($id)) {
			$this->db->where('cd_news',$id);
		}

		if(!empty($slug)) {
			$this->db->where('nm_slug LIKE "%'.$slug.'%"');
		}

		if(!empty($search)) {
			$this->db->where('nm_titulo LIKE "%'.$search.'%" or nm_resumo LIKE "%'.$search.'%" or ds_texto LIKE "%'.$search.'%"');
		}

		if(empty($filter)) {
			$filter = array("dt_postagem","desc");
		}
		
		$this->db->order_by($filter[0],$filter[1]);	

		$this->count = $this->db;


		if(!empty($limit)) {
			if($limit[1] == 0) {
				$this->db->limit($limit[0]);
			}else{
				$this->db->limit($limit[1],$limit[0]);
			}
		}

		$result = $this->db->get();




		if(!empty($id) && $result->num_rows() > 0 || !empty($slug) && $result->num_rows() > 0) {
			return $result->row();
		}else if($result->num_rows() > 0) {
			return $result->result();
		}

		return false;
	}

	public function total($filter=NULL,$search=NULL)
	{
		$this->db->select("*")
		         ->from('news');


		if(!empty($search)) {
			$this->db->where('nm_titulo LIKE "%'.$search.'%" or nm_resumo LIKE "%'.$search.'%" or ds_texto LIKE "%'.$search.'%"');
		}

		if(empty($filter)) {
			$filter = array("dt_postagem","desc");
		}
		
		$this->db->order_by($filter[0],$filter[1]);	

		$result = $this->db->get();

		return $result->num_rows();
	}


	public function update($args,$id)
	{
		$this->db->where("cd_news",$id);
		$this->db->update("news",$args);
	}

	public function save($args)
	{	
		$this->db->insert("news",$args);

		return $this->db->insert_id();
	}

	public function remove($id)
	{
		$this->db->where("cd_news",$id);
		$this->db->delete("news");
	}


}