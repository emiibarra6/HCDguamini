<?php

    Class Documentos extends CI_Model {
    	public function __construct() {
    		parent::__construct();
    	}

    	//últimos 3 documentos (Sesion del dia que es otro tipo de documento) de la sección de inicio
    	public function ultimosDocumentosSesionDeldia() {
    		$this->db->select('titulo, descripcion, fecha_documento, slug_documento');
    		$this->db->from('gm_documentos');
            $this->db->where('id_tipo_documento', 3);
            $this->db->order_by('fecha_documento', 'desc');
            $result = $this->db->get();
            return $result->result();
    	}

        //últimas órdenes del día
        public function ordenesDia() {
            $this->db->select('titulo, descripcion, fecha_documento, slug_documento');
            $this->db->from('gm_documentos');

            if (isset($parametros['ps']) && isset($parametros['pl'])) {
                $this->db->limit($parametros['ps'], $parametros['pl']);
            }

            $this->db->where('id_tipo_documento', 3);
            $this->db->order_by('fecha_documento', 'desc');
            $result = $this->db->get();
            return $result->result();
        }

        public function listadoDocumentos($parametros = array()) {
            $this->db->select('titulo, descripcion, fecha_documento, slug_documento');
            $this->db->from('gm_documentos');

            if (isset($parametros['tipo_documento'])) {
                $this->db->where('id_tipo_documento', $parametros['tipo_documento']);
            }

            if (isset($parametros['nro_documento'])) {
                $this->db->where('numero_documento', $parametros['nro_documento']);
            }

            if (isset($parametros['src'])) {
                $this->db->like('titulo', $parametros['src']);
            }

            if (isset($parametros['f_desde'], $parametros['f_hasta'])) {
                $this->db->where('fecha_documento >=', $parametros['f_desde']);
                $this->db->where('fecha_documento <=', $parametros['f_hasta']);
            }

            if (isset($parametros['ps']) && isset($parametros['pl'])) {
                $this->db->limit($parametros['ps'], $parametros['pl']);
            }

            $this->db->order_by('fecha_documento', 'desc');
            $result = $this->db->get();
            return $result->result();
        }

        public function datosDocumento($slugDocumento) {
            $this->db->select('*');
            $this->db->from('gm_documentos');
            $this->db->join('gm_tipos_documentos', 'gm_tipos_documentos.id_tipo_documento = gm_documentos.id_tipo_documento');
            $this->db->where('gm_documentos.slug_documento', $slugDocumento);
            $result = $this->db->get();

            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return null;
            }
        }

        public function archivosDocumento($idDocumento) {
            $this->db->select('*');
            $this->db->from('gm_archivos_documento');
            $this->db->where('id_documento', $idDocumento);
            $result = $this->db->get();
            return $result->result();
        }

      /*  public function documentosRelacionados($idDocumento, $idTipoDocumento) {
            $this->db->select('titulo, descripcion, fecha_documento, slug_documento');
            $this->db->from('gm_documentos');
            $this->db->where('id_documento !=', $idDocumento);
            $this->db->where('id_tipo_documento', $idTipoDocumento);
            $this->db->order_by('fecha_documento', 'desc');
            $this->db->limit(3);
            $result = $this->db->get();
            return $result->result();
        }*/
    }

?>