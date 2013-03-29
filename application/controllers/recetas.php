<?php

class Recetas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('recetas_model');
    }

    public function index() {
        $data['recetas'] = $this->recetas_model->get_recetas();
        $data['title'] = 'Listado de recetas';

        $this->load->view('templates/header', $data);
        $this->load->view('recetas/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug) {
        $data['recetas_item'] = $this->recetas_model->get_recetas($slug);

        if (empty($data['recetas_item'])) {
            show_404();
        }

        $data['nombre'] = $data['recetas_item']['nombre'];
        $data['nombre'] = $data['recetas_item']['desc_corta'];

        $this->load->view('templates/header', $data);
        $this->load->view('recetas/view', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['nombre'] = 'Create a recetas item';

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
