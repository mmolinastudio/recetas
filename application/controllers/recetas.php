<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recetas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('recetas_model'); ////cargada en autoload.php
        
        //$this->load->library('twig'); //cargada en autoload.php
        $this->twig->ci_function_init();
        //$this->twig->register_function('anchor', new Twig_Function_Function('anchor'));
    }

    public function index() {
        $data['recetas'] = $this->recetas_model->get_recetas();
        
        $data['title'] = 'Lista de recetas';
        
        //para saber qué boton del menú principal está activo...
        $data['controller'] = get_instance()->router->fetch_class(); //tb existe fetch_method()

        if ($this->ion_auth->logged_in()) {
            $data['logged_in'] = true;
            $user = $this->ion_auth->user()->row();
            $data['username'] = $user->username;
        }

        // Usando twig: (header y footer se incluyen en el archivo twig "recetas/index.twig")
        $this->twig->display('recetas/index.twig', $data);
    }

    public function view($slug) {
        $data['recetas_item'] = $this->recetas_model->get_recetas($slug);

        if (empty($data['recetas_item'])) {
            show_404();
        }

        $data['title'] = $data['recetas_item']['nombre'];

        //para saber qué boton del menú principal está activo...
        $data['controller'] = get_instance()->router->fetch_class();

        if ($this->ion_auth->logged_in()) {
            $data['logged_in'] = true;
            $user = $this->ion_auth->user()->row();
            $data['username'] = $user->username;
        }

        $this->twig->display('recetas/view.twig', $data);
        
    }

    /*
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
    */

}
