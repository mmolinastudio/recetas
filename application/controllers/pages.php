<?php

class Pages extends CI_Controller {

    public function view($page = 'home') {

        if (!file_exists('application/views/pages/' . $page . '.twig')) {
            //Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->twig->ci_function_init();
        $this->twig->register_function('anchor', new Twig_Function_Function('anchor'));

        //para saber qué boton del menú principal está activo...
        $data['controller'] = $page;

        if ($this->ion_auth->logged_in()) {
            $data['logged_in'] = true;
            $user = $this->ion_auth->user()->row();
            $data['username'] = $user->username;
        }

        $this->twig->display('pages/'.$page.'.twig', $data);
    }

}