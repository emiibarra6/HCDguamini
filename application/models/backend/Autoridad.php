<?php

    Class Autoridad extends CI_Model {
    	public function __construct() {
    		parent::__construct();
    	}

    	public function listadoAutoridades($parametros = array()) {
    		$this->db->select('*');
            $this->db->from('gm_autoridades');

            if (isset($parametros['src'])) {
                $this->db->like('gm_autoridades.nombre', $parametros['src']);
                $this->db->or_like('gm_autoridades.apellido', $parametros['src']);
            }

            if (isset($parametros['ps']) && isset($parametros['pl'])) {
                $this->db->limit($parametros['ps'], $parametros['pl']);
            }

            $this->db->order_by('gm_autoridades.id', 'desc');
            $result = $this->db->get();
            return $result->result();
    	}

        //registro de personas
    	public function registrarAutoridad($datos) {
            $this->db->insert('gm_autoridades', $datos);
            return true;
    	}

    	//edición de personas
    	public function editarPersona($idPersona, $datos) {
    		$this->db->where('id', $idPersona);
    		$this->db->update('gm_autoridades', $datos);
    		return true;
    	}


    	public function verificarIdPersona($idPersona) {
    		$this->db->select('*');
            $this->db->from('gm_autoridades');
            $this->db->where('id', $idPersona);
            $result = $this->db->get();

            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return null;
            }
    	}

    	public function eliminarPersona($idPersona) {
    		$this->db->delete('gm_autoridades', array('id' => $idPersona));
            return true;
    	}
    }

?>
