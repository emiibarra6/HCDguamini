<?php  

    Class Personas extends CI_Model {
    	public function __construct() {
    		parent::__construct();
    	}

    	//listado de personas
    	public function listadoPersonas($parametros = array()) {
    		$this->db->select('*');
            $this->db->from('gm_personas');
            $this->db->join('gm_cargos', 'gm_cargos.id_cargo = gm_personas.id_cargo');
            $this->db->join('gm_bloque_politico', 'gm_bloque_politico.id_bloque_politico = gm_personas.id_bloque_politico');

            if (isset($parametros['src'])) {
                $this->db->like('gm_personas.nombre', $parametros['src']);
                $this->db->or_like('gm_personas.apellido', $parametros['src']);
            }

            if (isset($parametros['ps']) && isset($parametros['pl'])) {
                $this->db->limit($parametros['ps'], $parametros['pl']);
            }

            $this->db->order_by('gm_personas.id_persona', 'desc');
            $result = $this->db->get();
            return $result->result();
    	}

        //registro de personas
    	public function registrarPersona($datos) {
            $this->db->insert('gm_personas', $datos);
            return true;
    	}

    	//edición de personas
    	public function editarPersona($idPersona, $datos) {
    		$this->db->where('id_persona', $idPersona);
    		$this->db->update('gm_personas', $datos);
    		return true;
    	}

    	//eliminar personas
    	public function verificarIdPersona($idPersona) {
    		$this->db->select('*');
            $this->db->from('gm_personas');
            $this->db->where('id_persona', $idPersona);
            $result = $this->db->get();

            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return null;
            }
    	}

    	public function eliminarPersona($idPersona) {
    		$this->db->delete('gm_personas', array('id_persona' => $idPersona)); 
            return true;
    	}
    }

?>