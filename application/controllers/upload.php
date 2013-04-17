<?php /*if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Clase Upload
* Encargada de mostrar formulario de carga de imagenes (de usuario y receta), guardar en la BD, renombrar, resimensionar, recortar,...
* @package    Controller - recetas.php
* @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
* @author     Miguel Molina <miguelmolina.tk@gmail.com>
*/
/*class Upload extends CI_Controller {
	
	/*function Upload()
	{
		parent::Controller();
		$this->load->helper(array('form', 'url'));
	}*/

	/*function __construct() {
        parent::__construct();
        $this->load->model('upload_model');
    }
	
	public function index()
	{	
		$this->load->view('upload', array('error' => ' ' ));
	}

	public function do_upload()
	{
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '2000';
		$config['max_width'] = '2024';
		$config['max_height'] = '2008';
		
		$this->load->library('upload', $config);

		//Si la imagen falla, mostramos el error
		if (!$this->upload->do_upload()) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_form', $error);
		} else {
		//si no, subimos la imagen, creamos la miniatura e Insertamos los datos en la BD
			$file_info = $this->upload->data();
			$this->_create_thumbnail($file_info['file_name']);
			$data = array('upload_data' => $this->upload->data());
			$titulo = $this->input->post('titulo');
			$imagen = $file_info['file_name'];

			//TODO ¿Cual es el id?
			$subir = $this->upload_model->subir_foto_usuario($id,$imagen);

			$data['titulo'] = $titulo;
			$data['imagen'] = $imagen;

			$this->load->view('upload_success', $data);
		}
	}

	private function _create_thumbnail($filename){
		$config['image_library'] = 'gd2';
		$config['source_image'] = 'images/'.$filename; //carpeta en la que guardamos la imagen grande
		$config['new_image']='images/thumbs/'; //Carpeta en la que guardamos la minuatura
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 200;
		$config['height'] = 200;
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}
}
