<?php

class Site extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("News_Model","news");
	}

	public function index()
	{
		$filter = NULL;
		$getfilter = "";
		$search = NULL;
		$paged = 0;
		$data['itens'] = 10;

		if(isset($_GET['filter'])) {
			$getfilter = $_GET['filter'];

			if($getfilter == "data") {
				$filter = array("dt_postagem","desc");
			}else if($getfilter == "alfabetico") {
				$filter = array("nm_titulo","asc");
			}

		}

		if(isset($_GET['search'])) {
			$search = $_GET['search'];
		}

		if(isset($_GET['itens'])) {
			$data['itens'] = $_GET['itens'];
		}

		if(isset($_GET['p'])) {
			$paged = $_GET['p']-1;
			$paged = $paged*$data['itens'];
		}
		$size = $this->news->total($filter,$search);
		$size = ceil($size/$data['itens']);
		
		$data['news'] = $this->news->get(NULL,NULL,$filter,$search,array($paged,$data['itens']));

		$data['pagination'] = $this->pagination($size,$paged,$data['itens'],$getfilter,$search);

		$this->load->view("index",$data);
	}

	public function news($slug)
	{
		$data['news'] = $this->news->get(NULL,$slug);
		$this->load->view("interna",$data);
	}

	public function pagination($size,$paged,$itens,$filter,$search)
	{
		$html = "";


		for ($i=0; $i < $size ; $i++) { 
			if(($paged/$itens) == $i ) {
				$html .= "<li class='active'><a>".($i+1)."</a></li>";
			} else {
				$html .= "<li><a href='".site_url()."?itens=".$itens."&filter=".$filter."&search=".$search."&p=".($i+1)."'>".($i+1)."</a></li>";
			}


		}

		return $html;
	}
}