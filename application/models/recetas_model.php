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

    //esta funcion devuelve una receta o la lista de todas las recetas (usar con precaucion)
    public function get_receta_slug($slug = FALSE) {
        if ($slug === FALSE) {
            $query = $this->db->get('receta');
            return $query->result_array();
        }

        $query = $this->db->get_where('receta', array('slug' => $slug));
        return $query->row_array();
    }

    /*public function set_recetas() {

        $slug = url_title($this->input->post('nombre'), 'dash', TRUE);

        $data = array(
            'nombre' => $this->input->post('nombre'),
            'slug' => $slug,
            'desc_corta' => $this->input->post('desc_corta')
        );

        return $this->db->insert('receta', $data);
    }*/

    /**
    * Inserta la ruta de la imagen de receta en la tabla receta de la BD
    * @param $imagen string - nombre y extension de la imagen
    * @param $tabla string - 'user' or 'receta'
    * @return ok/error
    */
    /*function set_foto_receta($id, $img)
    {
        $data = array(
            'foto' => $img
        );

        $this->db->where('id', $id);
        return $this->db->update('receta', $data);
    }*/

    //devuelve los nombres de los ingredientes de una receta
    public function get_ingredientes_by_receta_id($id = NULL) {
        if (!isset($id))
        {
            return FALSE;
        }

        /*
        SELECT ingrediente.nombre 
        FROM ingrediente
        INNER JOIN receta_ingrediente ON ingrediente.id = receta_ingrediente.ingrediente_id
        INNER JOIN receta ON receta_ingrediente.receta_id = receta.id
        WHERE receta.id = '2'
        */
        $this->db->select('ingrediente.nombre');
        $this->db->from('ingrediente');
        $this->db->join('receta_ingrediente','ingrediente.id = receta_ingrediente.ingrediente_id','inner');
        $this->db->join('receta','receta_ingrediente.receta_id = receta.id','inner');
        $this->db->where('receta.id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

}
