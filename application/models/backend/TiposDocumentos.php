<?php  

    Class TiposDocumentos extends CI_Model {
    	public function __construct() {
    		parent::__construct();
    	}

    	//funciones generales
    	public function tiposDocumentos() {
    		$this->db->select('*');
	        $this->db->from('gm_tipos_documentos');
	        $this->db->order_by('tipo_documento', 'asc');
	        $result = $this->db->get();
	        return $result->result();
    	}

    	//listado de tipos de documentos
	     public function listadoTiposDocumentos($parametros = array()) {
	        $this->db->select('*');
	        $this->db->from('gm_tipos_documentos');

	        if (isset($parametros['src'])) {
	              $this->db->like('tipo_documento', $parametros['src']);
	        }

	        if (isset($parametros['ps']) && isset($parametros['pl'])) {
	              $this->db->limit($parametros['ps'], $parametros['pl']);
	        }

	        $this->db->order_by('id_tipo_documento', 'desc');
	        $result = $this->db->get();
	        return $result->result();
	    }

	    //registro de tipos de documentos
	    public function registrarTipoDocumento($datos) {
	        $this->db->insert('gm_tipos_documentos', $datos);
	        return true;
	    }

	    //edición de tipos de documentos
	    public function verificarIdTipoDocumento($idTipoDocumento) {
	        $this->db->select('*');
	        $this->db->from('gm_tipos_documentos');
	        $this->db->where('id_tipo_documento', $idTipoDocumento);
	        $result = $this->db->get();

	        if ($result->num_rows() > 0) {
	            return $result->row();
	        } else {
	            return null;
	        }
	    }

	      public function editarTipoDocumento($idTipoDocumento, $datos) {
	          $this->db->where('id_tipo_documento', $idTipoDocumento);
	          $this->db->update('gm_tipos_documentos', $datos);
	          return true;
	      }

	      //eliminar tipo de documento
	      public function eliminarCargo($idTipoDocumento) {
	          $this->db->where('id_tipo_documento', $idTipoDocumento);
	          $this->db->set('id_tipo_documento', null);
	          $this->db->update('gm_tipos_documentos');

	          $this->db->delete('gm_tipos_documentos', array('id_tipo_documento' => $idTipoDocumento)); 
	          return true;
	      }
    }

?>