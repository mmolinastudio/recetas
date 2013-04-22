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

    //esta funcion devuelve una receta o la lista de todas las recetas
    public function get_receta_by_slug($slug = FALSE) {
        if ($slug === FALSE) {
            $query = $this->db->get('receta');
            return $query->result_array();
        }

        $query = $this->db->get_where('receta', array('slug' => $slug));
        return $query->row_array();
    }

    //esta funcion devuelve una receta o la lista de todas las recetas
    public function get_receta_by_id($id = FALSE) {
        if ($id === FALSE) {
            //si no le pasamos argumentos, devuelve todas las recetas
            $query = $this->db->get('receta');
            return $query->result_array();
        }

        $query = $this->db->get_where('receta', array('id' => $id));
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

        $this->db->select('*');
        $this->db->from('ingredientes');
        $this->db->where('receta_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * create_receta
     * Añade una nueva receta a la BD
     * @author Miguel Molina
     * @param user_id
     * @param nombre string - nombre de la receta
     * @param additional_data - ¿slug?, desc_corta, desc_larga, ¿foto?, t_preparacion, t_coccion, i_refrigeracion, num_raciones, consejos, criticas, dificultad
     * @return bool
     **/
    public function crear_receta($usuario_id, $nombre, $additional_data = array())
    {
        # code...
    }

}
