<?php

Class Autoridad extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function listadoAutoridad() {
        $this->db->select('*');
        $this->db->from('gm_autoridades');
        $result = $this->db->get();
        return $result->result();
    }
}

?>
