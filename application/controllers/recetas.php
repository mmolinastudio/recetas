<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Este Archivo contiene la clase Recetas, encargada de listar las recetas (todas o un
* subconjunto de ellas, filtradas u ordenadas de diferentes formas).
* @package    Controller - recetas.php
* @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
* @author     Miguel Molina <miguelmolina.tk@gmail.com>
*/
class Recetas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('recetas_model'); ////cargada en autoload.php
        
        //$this->load->library('twig'); //cargada en autoload.php
        $this->twig->ci_function_init();
        //$this->twig->register_function('anchor', new Twig_Function_Function('anchor'));

        //$this->output->enable_profiler(TRUE);
    }

    private function _my_config_pagination(){
        //configuración de la paginación (atributos: system/libraries/Pagination.php)
        //$this->load->library('pagination'); //cargada en autoload.php
        $config = array();

        $config['base_url'] = base_url()."recetas/page/";
        $config['first_url'] = base_url()."recetas/";
        $config['total_rows'] = $this->recetas_model->get_num_recetas();
        $config['per_page'] = "10";
        $config['use_page_numbers'] = TRUE;
        //$config['uri_segment'] = 3;
        $config['num_links'] = 3;
        $config['first_link'] = 'primera';
        $config['last_link'] = 'última';
        //$config['next_link'] = '&gt;';
        //$config['prev_link'] = '&lt;';
        $config['full_tag_open'] = '<div class="pagination pagination-right"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="disabled"><span>';
        $config['cur_tag_close'] = '</span></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        
        return $config;
    }

    /**
    * Carga la vista del listado de recetas
    * Usa la librería pagination
    *
    * @param string "/page/$numpage" -> puede recibir este parametro, pero se lee con "$this->uri->segment(3)"
    * @return Carga la plantilla de una receta
    */
    public function index() {

        $opciones = $this->_my_config_pagination();
        $this->pagination->initialize($opciones);
        $data['paginacion'] = $this->pagination->create_links();

        $desde = ($this->uri->segment(3)) ? (string)((int)$opciones['per_page'] * ((int)$this->uri->segment(3) - 1)) : 0;
        $data['recetas'] = $this->recetas_model->get_recetas($opciones['per_page'],$desde);
        
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

    /**
    * Carga la vista de una receta
    * basado en el método news/view del tutorial "Introduccion a codeigniter"
    *
    * @param string $slug -> Url de la receta
    * @return Carga la plantilla de una receta
    */
    public function view($slug) {
        $data['recetas_item'] = $this->recetas_model->get_receta_slug($slug);

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
