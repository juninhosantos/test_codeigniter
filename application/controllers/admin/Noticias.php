<?php 

class Noticias extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->is_logged();

		$this->load->model("News_Model","news");
	}

	public function index()
	{

		$dados['news'] = $this->news->get();

		$this->load->view("admin/header");
		$this->load->view("admin/index",$dados);
		$this->load->view("admin/footer");
	}

	public function insert()
	{
		$this->load->helper('ckeditor');

        // Array com as configurações pra essa instância do CKEditor ( você pode ter mais de uma )
		$dados['ckeditor_texto1'] = array
		(
            //id da textarea a ser substituída pelo CKEditor
			'id'   => 'description',

            // caminho da pasta do CKEditor relativo a pasta raiz do CodeIgniter
			'path' => 'ckeditor',

            // configurações opcionais
			'config' => array(
				'toolbar' => "Basic",
				'filebrowserBrowseUrl'      => base_url().'ckeditor/ckfinder/ckfinder.html',
				'filebrowserImageBrowseUrl' => base_url().'ckeditor/ckfinder/ckfinder.html?Type=Images',
				'filebrowserFlashBrowseUrl' => base_url().'ckeditor/ckfinder/ckfinder.html?Type=Flash',
				'filebrowserUploadUrl'      => base_url().'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				'filebrowserImageUploadUrl' => base_url().'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				'filebrowserFlashUploadUrl' => base_url().'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
				)
			);

		$this->load->view("admin/header");
		$this->load->view("admin/newNoticia",$dados);
		$this->load->view("admin/footer");
	}

	public function save()
	{
		$foto = "";

		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload("picture")) {

			echo $this->upload->display_errors();

		} else {

			$foto_array = $this->upload->data();
			$foto = $foto_array['file_name'];			

			$config['image_library'] = 'gd2';
			$config['source_image']	= 'uploads/'.$foto;
			$config['new_image'] = 'uploads/thumbs/'.$foto;
			$config['quality'] = "100%";
			$config['maintain_ratio'] = FALSE;
			$config['width'] = 250;
			$config['height'] = 160;
			$config['x_axis'] = '0';
			$config['y_axis'] = '0';

			$this->load->library('image_lib', $config); 

			if ( ! $this->image_lib->resize())
			{
				echo $this->image_lib->display_errors();
			}

		}

		$data_hora = explode(" ",$_POST['data']);
		$data = implode("-",array_reverse(explode("/",$data_hora[0])));
		$data_hora = $data." ".$data_hora[1];

		$args = array(
			"nm_titulo" => $_POST['title'],
			"nm_slug" => $this->slugify($_POST['title']),
			"nm_resumo" => $_POST['resumo'],
			"ds_texto" => $_POST['description'],
			"dt_postagem" => $data_hora,
			"nm_foto" => $foto
			);


		$id = $this->news->save($args);

		redirect(site_url("admin/noticias/edit/".$id));
	}

	public function remove($id)
	{
		$this->news->remove($id);

		$this->session->set_flashdata('status','Deletado com sucesso!');

		redirect(site_url('admin'));
	}

	public function edit($id)
	{
		$dados['news'] = $this->news->get($id);

		$this->load->helper('ckeditor');

        // Array com as configurações pra essa instância do CKEditor ( você pode ter mais de uma )
		$dados['ckeditor_texto1'] = array
		(
            //id da textarea a ser substituída pelo CKEditor
			'id'   => 'description',

            // caminho da pasta do CKEditor relativo a pasta raiz do CodeIgniter
			'path' => 'ckeditor',

            // configurações opcionais
			'config' => array(
				'toolbar' => "Basic",
				'filebrowserBrowseUrl'      => base_url().'ckeditor/ckfinder/ckfinder.html',
				'filebrowserImageBrowseUrl' => base_url().'ckeditor/ckfinder/ckfinder.html?Type=Images',
				'filebrowserFlashBrowseUrl' => base_url().'ckeditor/ckfinder/ckfinder.html?Type=Flash',
				'filebrowserUploadUrl'      => base_url().'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
				'filebrowserImageUploadUrl' => base_url().'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				'filebrowserFlashUploadUrl' => base_url().'ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
				)
			);

		$this->load->view("admin/header");
		$this->load->view("admin/editNoticia",$dados);
		$this->load->view("admin/footer");
	}

	public function update($id)
	{
		$foto = "";

		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload("picture")) {

			echo $this->upload->display_errors();

		} else {

			$foto_array = $this->upload->data();
			$foto = $foto_array['file_name'];			

			$config['image_library'] = 'gd2';
			$config['source_image']	= 'uploads/'.$foto;
			$config['new_image'] = 'uploads/thumbs/'.$foto;
			$config['quality'] = "100%";
			$config['maintain_ratio'] = FALSE;
			$config['width'] = 250;
			$config['height'] = 160;
			$config['x_axis'] = '0';
			$config['y_axis'] = '0';

			$this->load->library('image_lib', $config); 

			if ( ! $this->image_lib->resize())
			{
				echo $this->image_lib->display_errors();
			}

		}

		$data_hora = explode(" ",$_POST['data']);
		$data = implode("-",array_reverse(explode("/",$data_hora[0])));
		$data_hora = $data." ".$data_hora[1];

		$args = array(
			"nm_titulo" => $_POST['title'],
			"nm_slug" => $this->slugify($_POST['title']),
			"nm_resumo" => $_POST['resumo'],
			"ds_texto" => $_POST['description'],
			"dt_postagem" => $data_hora
			);

		if(!empty($foto)) {
			$args['nm_foto'] = $foto;
		}

		$this->news->update($args,$id);

		redirect(site_url("admin/noticias/edit/".$id));
	}



	private function slugify( $string, $separator = '-' )
	{
		$accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
		$special_cases = array( '&' => 'and', "'" => '');
		$string = mb_strtolower( trim( $string ), 'UTF-8' );
		$string = str_replace( array_keys($special_cases), array_values( $special_cases), $string );
		$string = preg_replace( $accents_regex, '$1', htmlentities( $string, ENT_QUOTES, 'UTF-8' ) );
		$string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
		$string = preg_replace("/[$separator]+/u", "$separator", $string);

		return $string;
	}



}