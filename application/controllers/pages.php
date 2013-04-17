<?php

class Pages extends CI_Controller {

    /**
    * Carga las vistas de las páginas ¿estáticas? Home y About.
    * basado en el método Pages.view del tutorial "Introduccion a codeigniter" 
    *
    * @return Carga las vistas Home o About
    * @param string $slug
    */
    public function view($page = 'home') {

        if (!file_exists('application/views/pages/' . $page . '.twig')) {
            //Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        //para saber qué boton del menú principal está activo...
        $data['controller'] = $page;

        $data['logged_in'] = $this->ion_auth->logged_in();
        if ($data['logged_in']) {
            $user = $this->ion_auth->user()->row();
            $data['real_username'] = $user->username;
        }

        //$this->output->enable_profiler(TRUE);

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

}