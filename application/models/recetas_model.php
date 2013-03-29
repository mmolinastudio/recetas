<?php

class Recetas_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

//TODO hacer un select ordenado por...
    public function get_recetas($slug = FALSE) {
        if ($slug === FALSE) {
            $query = $this->db->get('receta');
            return $query->result_array();
        }

        $query = $this->db->get_where('receta', array('slug' => $slug));
        return $query->row_array();
    }

//TODO los campor de la bd estan mal
    public function set_recetas() {
        $this->load->helper('url');

        $slug = url_title($this->input->post('nombre'), 'dash', TRUE);

        $data = array(
            'nombre' => $this->input->post('nombre'),
            'slug' => $slug,
            'desc_corta' => $this->input->post('desc_corta')
        );

        return $this->db->insert('receta', $data);
    }

}
