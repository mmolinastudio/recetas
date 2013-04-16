<?php

class Recetas_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_num_recetas() {
        return $this->db->count_all('receta');
    }

    public function get_recetas($limit,$start) {

        $this->db->limit($limit,$start);
        $query = $this->db->get('receta');

        return $query->result();
        //return $query->row_array();
    }

    public function get_receta_slug($slug = FALSE) {
        if ($slug === FALSE) {
            $query = $this->db->get('receta');
            return $query->result_array();
        }

        $query = $this->db->get_where('receta', array('slug' => $slug));
        return $query->row_array();
    }

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
