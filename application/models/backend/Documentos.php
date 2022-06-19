<?php  

    Class Documentos extends CI_Model {
    	public function __construct() {
    		parent::__construct();
    	}

        //funciones generales
        public function verificarSlug($tituloDocumento) {
            $this->db->select('slug_documento');
            $this->db->from('gm_documentos');
            $this->db->where('titulo', $tituloDocumento);
            $result = $this->db->get();
            return $result->result();
        }

        public function verificarSlugEdicion($idDocumento, $tituloDocumento) {
            $this->db->select('slug_documento');
            $this->db->from('gm_documentos');
            $this->db->where('id_documento !=', $idDocumento);
            $this->db->where('titulo', $tituloDocumento);
            $result = $this->db->get();
            return $result->result();
        }

    	//listado de documentos
    	public function listadoDocumentos($parametros = array()) {
    		$this->db->select('*');
            $this->db->from('gm_documentos');

            if (isset($parametros['src'])) {
                $this->db->like('titulo', $parametros['src']);
            }

            if (isset($parametros['ps']) && isset($parametros['pl'])) {
                $this->db->limit($parametros['ps'], $parametros['pl']);
            }

            $this->db->order_by('id_documento', 'desc');
            $result = $this->db->get();
            return $result->result();
    	}

    	//registro de documentos
    	public function registrarDocumento($datos) {
    		$this->db->insert('gm_documentos', $datos);
    		return $this->db->insert_id();
    	}

    	public function registrarArchivosDocumento($archivosDocumentos) {
    		$this->db->insert('gm_archivos_documento', $archivosDocumentos);
    	}

    	//edición de documentos
    	public function verificarIdDocumento($idDocumento) {
    		$this->db->select('*');
            $this->db->from('gm_documentos');
            $this->db->where('id_documento', $idDocumento);
            $result = $this->db->get();

            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return null;
            }
    	}

    	public function archivosDocumentos($idDocumento) {
    		$this->db->select('*');
    		$this->db->from('gm_archivos_documento');
    		$this->db->where('id_documento', $idDocumento);
    		$result = $this->db->get();
    		return $result->result();
    	}

    	public function editarDocumento($idDocumento, $datos) {
    		$this->db->where('id_documento', $idDocumento);
    		$this->db->update('gm_documentos', $datos);
    	}

    	public function eliminarArchivosDocumentos($idDocumento) {
    		$this->db->delete('gm_archivos_documento', array('id_documento' => $idDocumento));
    	}

    	//eliminar documentos
    	public function eliminarDocumento($idDocumento) {
    		$this->db->delete('gm_documentos', array('id_documento' => $idDocumento)); 
    		$this->db->delete('gm_archivos_documento', array('id_documento' => $idDocumento)); 
            return true;
    	}

    	//eliminar archivo de documento
    	public function eliminarArchivoDocumento($idArchivoDocumento) {
    		$this->db->delete('gm_archivos_documento', array('id_archivo_documento' => $idArchivoDocumento)); 
            return true;
    	}
    }

?>