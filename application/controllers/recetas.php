<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recetas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('recetas_model');
        $this->load->library('twig');
    }

    public function index() {
        $data['recetas'] = $this->recetas_model->get_recetas();
        
        $data['title'] = 'Lista de recetas';

        // Sin usar twig:
        //$this->load->view('templates/header.php', $data);
        //$this->load->view('recetas/index', $data);
        //$this->load->view('templates/footer.php');
        
        // Usando twig: (header y footer se incluyen en el archivo twig "recetas/index.twig")
        $this->twig->display('recetas/index.twig', $data);
    }

    public function view($slug) {
        $data['recetas_item'] = $this->recetas_model->get_recetas($slug);

        if (empty($data['recetas_item'])) {
            show_404();
        }

        $data['title'] = $data['recetas_item']['nombre'];

        //$this->load->view('templates/header', $data);
        //$this->load->view('recetas/view', $data);
        //$this->load->view('templates/footer');
        $this->twig->display('recetas/view.twig', $data);
        
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Nueva receta';

        $this->form_validation->set_rules('nombre', 'nombre', 'required');
        $this->form_validation->set_rules('desc_corta', 'desc_corta', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('recetas/create');
            $this->load->view('templates/footer');
        } else {
            $this->recetas_model->set_recetas();
            $this->load->view('recetas/success');
        }
    }

}
