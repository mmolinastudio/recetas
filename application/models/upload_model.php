<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Upload_model extends CI_Model {
 
    public function construct() {
        parent::__construct();
    }

    /**
    * Inserta la ruta de la imagen de usuario en la tabla user de la BD
    * @param $imagen string - nombre y extension de la imagen
    * @param $tabla string - 'user' or 'receta'
    * @return ok/error
    */
    function set_user_foto($id, $img)
    {
        $data = array(
            'foto' => $img
        );

        $this->db->where('id', $id);
        return $this->db->update('receta', $data);
    }

    /**
    * Inserta la ruta de la imagen de receta en la tabla receta de la BD
    * @param $imagen string - nombre y extension de la imagen
    * @param $tabla string - 'user' or 'receta'
    * @return ok/error
    */
    function set_foto_receta($id, $img)
    {
        $data = array(
            'foto' => $img
        );

        $this->db->where('id', $id);
        return $this->db->update('receta', $data);
    }
}