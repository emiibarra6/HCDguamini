<?php

    Class Bloques extends CI_Model {
    	public function __construct() {
    		parent::__construct();
    	}

    	public function listadoBloques() {
    		$this->db->select('id_bloque_politico, nombre_bloque, color_representativo, slug_bloque');
            $this->db->from('gm_bloque_politico');
            $this->db->order_by('nombre_bloque', 'asc');
            $result = $this->db->get();
        	return $result->result();
    	}

        public function datosBloque($slugBloque) {
            $this->db->select('*');
            $this->db->from('gm_bloque_politico');
            $this->db->where('slug_bloque', $slugBloque);
            $result = $this->db->get();

            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return null;
            }
        }

        public function datosPersona($idBloque) {
            $this->db->select('*');
            $this->db->from('gm_personas');
            $this->db->join('gm_cargos', 'gm_cargos.id_cargo = gm_personas.id_cargo');
            $this->db->where('gm_personas.id_bloque_politico', $idBloque);
            $this->db->where('gm_cargos.id_cargo', 7);
            $result = $this->db->get();
            return $result->row();
        }

        public function equipoBloque($idBloque, $idPersona) {
            $this->db->select('*');
            $this->db->from('gm_personas');
            $this->db->join('gm_cargos', 'gm_cargos.id_cargo = gm_personas.id_cargo');
            $this->db->where('gm_personas.id_bloque_politico', $idBloque);
            $this->db->where('gm_personas.id_persona !=', $idPersona);
            $result = $this->db->get();
            return $result->result();
        }
    }

?>