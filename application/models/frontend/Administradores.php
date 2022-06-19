<?php  

    Class Administradores extends CI_Model {
    	public function __construct() {
    		parent::__construct();
    	}

    	//login de administradores
    	public function loginAdministrador($email, $claveEncriptada) {
        	$this->db->select('*');
    		$this->db->from('gm_administradores');
    		$this->db->where('email', $email);
    		$this->db->where('clave', $claveEncriptada);
    		$result = $this->db->get();

    		if ($result->num_rows() > 0) {
    			return $result->row();
    		} else {
    			return null;
    		}
        }

    	//listado de administradores
    	public function listadoAdministradores($parametros = array()) {
    		$this->db->select('*');
            $this->db->from('gm_administradores');

            if (isset($parametros['src'])) {
                $this->db->like('nombre', $parametros['src']);
                $this->db->or_like('apellido', $parametros['src']);
            }

            if (isset($parametros['ps']) && isset($parametros['pl'])) {
                $this->db->limit($parametros['ps'], $parametros['pl']);
            }

            $this->db->order_by('id_administrador', 'desc');
            $result = $this->db->get();
            return $result->result();
    	}

    	//registro de administradores
    	public function verificarEmail($email) {
    		$this->db->select('email');
    		$this->db->from('gm_administradores');
    		$this->db->where('email', $email);
    		$result = $this->db->get();

    		if ($result->num_rows() > 0) {
    			return $result->row();
    		} else {
    			return null;
    		}
    	}

    	public function registrarAdministrador($datos) {
    		$this->db->insert('gm_administradores', $datos);
    		return true;
    	}

    	//actualizar clave de administradores
    	public function verificarClaveActual($idAdministrador, $claveActualEncriptada) {
            $this->db->select('clave');
            $this->db->from('gm_administradores');
            $this->db->where('id_administrador', $idAdministrador);
            $this->db->where('clave', $claveActualEncriptada);
            $result = $this->db->get();

            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return null;
            }
        }

        public function editarClave($idAdministrador, $claveNuevaEncriptada) {
            $this->db->where('id_administrador', $idAdministrador);
            $this->db->set('clave', $claveNuevaEncriptada);
            $this->db->update('gm_administradores');
            return true;
        }

    	//eliminar administradores
    	public function verificarIdAdministrador($idAdministrador) {
            $this->db->select('id_administrador');
            $this->db->from('gm_administradores');
            $this->db->where('id_administrador', $idAdministrador);
            $result = $this->db->get();

            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return null;
            }
        }

        public function eliminarAdministrador($idAdministrador) {
            $this->db->delete('gm_administradores', array('id_administrador' => $idAdministrador)); 
            return true;
        }
    }

?>