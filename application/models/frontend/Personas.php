<?php

Class Personas extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function cantidadConcejales($idBloquePolitico) {
        $this->db->select('id_persona');
        $this->db->from('gm_personas');
        $this->db->where('id_bloque_politico', $idBloquePolitico);
        $result = $this->db->get();
        return $result->result();
    }

    public function traeConcejales(){
      $this->db->select('*');
      $this->db->from('gm_personas');
      $this->db->order_by('nombre', 'asc');
      $result = $this->db->get();
      return $result->result();
    }
}

?>
