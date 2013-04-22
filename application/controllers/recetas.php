<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Este Archivo contiene la clase Recetas, encargada de listar las recetas (todas o un
* subconjunto de ellas, filtradas u ordenadas de diferentes formas).
* @package    nav_active - recetas.php
* @license    http://opensource.org/licenses/gpl-license.php  GNU Public License
* @author     Miguel Molina <miguelmolina.tk@gmail.com>
*/
class Recetas extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('recetas_model');
        //$this->lang->load('web');
        
        //$this->load->library('twig');
        //$this->twig->ci_function_init();
        //$this->twig->register_function('anchor', new Twig_Function_Function('anchor'));

        //$this->output->enable_profiler(TRUE);

        //$this->lang->load('recetas'); // language/spanish/recetas_lang.php - para las reglas de validación (mensajes de error)
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
        $data['nav_active'] = get_instance()->router->fetch_class(); //tb existe fetch_method()
        
        $data['logged_in'] = $this->ion_auth->logged_in();
        if ($data['logged_in']) {
            $user = $this->ion_auth->user()->row();
            $data['real_username'] = $user->username;
        }

        // Usando twig: (header y footer se incluyen en el archivo twig "recetas/index.twig")
        //$this->twig->display('recetas/index.twig', $data);
        $this->load->view('templates/header', $data);
        $this->load->view('recetas/index', $data);
        $this->load->view('templates/footer', $data);
    }

    /**
    * Carga la vista de una receta
    * basado en el método news/view del tutorial "Introduccion a codeigniter"
    * @param string (int) $id -> Id de la receta
    * @param string $slug -> Title slug de la receta
    * @return Carga la plantilla de una receta
    */
    public function view($id, $slug = NULL) {

        $data['recetas_item'] = $this->recetas_model->get_receta_by_id($id);

        if (empty($data['recetas_item'])) {
            show_404();
        }

        $data['ingredientes'] = $this->recetas_model->get_ingredientes_by_receta_id($data['recetas_item']['id']);
        //$data['categorias'] = $this->recetas_model->get_categoria_by_receta_id($data['recetas_item']['id']);

        //Para saber el username del creador de la receta...
        if (($data['recetas_item']['usuario_id'] == '0')
            || ($data['recetas_item']['usuario_id'] == NULL)
            || ($data['recetas_item']['usuario_id'] == '')
            || ($this->ion_auth->check_user_id($data['recetas_item']['usuario_id']) == FALSE)
                //si no hacemos esto, en caso de que el id no exista, la funcion user() devuelve el usuario logueado
            ) {
            $data['receta_username'] = "nadie";
        }else{
            $data['receta_username'] = $this->ion_auth->user($data['recetas_item']['usuario_id'])->row()->username;
        }

        $data['title'] = $data['recetas_item']['nombre'];
        $data['nav_active'] = get_instance()->router->fetch_class();

        $data['logged_in'] = $this->ion_auth->logged_in();
        if ($data['logged_in']) {
            $user = $this->ion_auth->user()->row();
            $data['real_username'] = $user->username;
        }

        $this->load->view('templates/header', $data);
        $this->load->view('recetas/view', $data);
        $this->load->view('templates/footer', $data);
        
    }

    public function nueva_receta() {

        //hay que estar logueado para crear una receta...
        $data['logged_in'] = $this->ion_auth->logged_in();
        if (! $data['logged_in']) {
            redirect('/', 'refresh');
        }
        //else...

        $user = $this->ion_auth->user()->row();
        $data['real_username'] = $user->username;
        $data['usuario_id'] = $user->id;

        //validate form input
        //usuario_id, nombre
        //¿slug?, desc_corta, desc_larga, foto, t_preparacion, t_coccion, t_refrigeracion, num_raciones, consejos, criticas, dificultad
        $this->form_validation->set_rules('nombre', 'Nombre de la receta', 'required|xss_clean');
        $this->form_validation->set_rules('desc_corta', 'Introducción', 'xss_clean');
        $this->form_validation->set_rules('desc_larga', 'Descripción','xss_clean');
        $this->form_validation->set_rules('t_preparacion', 'Tiempo de preparación', 'required|xss_clean');
        $this->form_validation->set_rules('t_coccion', 'Tiempo de cocción', 'required|xss_clean');
        $this->form_validation->set_rules('t_refrigeracion', 'Tiempo de refrigeración', 'required|xss_clean');
        $this->form_validation->set_rules('num_raciones', 'Tiempo de raciones', 'required|xss_clean');
        $this->form_validation->set_rules('consejos', 'consejos', 'xss_clean');
        //$this->form_validation->set_rules('foto', $this->lang->line('create_receta_validation_foto_label'), 'required|xss_clean');

        if ($this->form_validation->run() == true)
        {

            $usuario_id = $data['usuario_id'];
            $nombre = $this->input->post('nombre'); //nombre de la receta

            //creamos el slug
            $additional_data['slug'] = $this->slugify($nombre);
            //$additional_data['slug'] = (string)date('Y-m-d H.i:s');

            $additional_data['t_preparacion'] = $this->input->post('t_preparacion');
            $additional_data['t_coccion'] = $this->input->post('t_coccion');
            $additional_data['t_refrigeracion'] = $this->input->post('t_refrigeracion');
            //$additional_data['num_raciones'] = $this->input->post('num_raciones');

            $fname = $this->input->post('desc_corta');
            if(!empty($fname)){
                $additional_data['desc_corta'] = $this->input->post('desc_corta');
            }

            $fname = $this->input->post('desc_larga');
            if(!empty($fname)){
                $additional_data['desc_larga'] = $this->input->post('desc_larga');
            }

            $fname = $this->input->post('num_raciones');
            if(!empty($fname)){
                $additional_data['num_raciones'] = $this->input->post('num_raciones');
            }

            $fname = $this->input->post('consejos');
            if(!empty($fname)){
                $additional_data['consejos'] = $this->input->post('consejos');
            }

        }

        if (($this->form_validation->run() == true) && ($this->recetas->crear_receta($usuario_id, $nombre, $additional_data)) ){
            //checkea si estamos creando la receta
            //redirect them back to the admin page
            $this->session->set_flashdata('message', $this->ion_auth->messages());

            $this->ion_auth->login($email, $password);
            redirect("/", 'refresh');
        }
        else
        {
            //muestra de nuevo el formulario nueva_receta
            //set the flash data error message if there is one
            $data['message'] = (validation_errors() ? validation_errors() : NULL);

            $data['nombre'] = array(
                'name'  => 'nombre',
                'id'    => 'nombre',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('nombre'),
            );
            $data['desc_corta'] = array(
                'name'  => 'desc_corta',
                'id'    => 'desc_corta',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('desc_corta'),
            );
            $data['desc_larga'] = array(
                'name'  => 'desc_larga',
                'id'    => 'desc_larga',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('desc_larga'),
            );
            $data['t_preparacion'] = array(
                'name'  => 't_preparacion',
                'id'    => 't_preparacion',
                'type'  => 't_preparacion',
                'value' => $this->form_validation->set_value('t_preparacion'),
            );
            $data['t_coccion'] = array(
                'name'  => 't_coccion',
                'id'    => 't_coccion',
                'type'  => 't_coccion',
                'value' => $this->form_validation->set_value('t_coccion'),
            );
            $data['t_refrigeracion'] = array(
                'name'  => 't_refrigeracion',
                'id'    => 't_refrigeracion',
                'type'  => 't_refrigeracion',
                'value' => $this->form_validation->set_value('t_refrigeracion'),
            );
            $data['password_confirm'] = array(
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('password_confirm'),
            );
            $data['num_raciones'] = array(
                'name'  => 'num_raciones',
                'id'    => 'num_raciones',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('num_raciones'),
            );
            $data['consejos'] = array(
                'name'  => 'consejos',
                'id'    => 'consejos',
                'type'  => 'password',
                'value' => $this->form_validation->set_value('consejos'),
            );

            $data['title'] = "Nueva receta";
            $data['nav_active'] = "mi_perfil";


            $this->load->view('templates/header', $data);
            $this->load->view('recetas/nueva_receta', $data);
            $this->load->view('templates/footer', $data);
        }
    }


    static public function slugify($text){ 
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        if (empty($text))
        {
            return 'n-a';
        }

        return $text;
    }

}
