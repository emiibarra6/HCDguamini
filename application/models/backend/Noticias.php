<?php

    Class Noticias extends CI_Model {
    	public function __construct() {
    		parent::__construct();
    	}

        //funciones generales
        public function verificarSlug($tituloNoticia) {
            $this->db->select('slug_noticia');
            $this->db->from('gm_noticias');
            $this->db->where('titulo', $tituloNoticia);
            $result = $this->db->get();
            return $result->result();
        }

        public function verificarSlugEdicion($idNoticia, $tituloNoticia) {
            $this->db->select('slug_noticia');
            $this->db->from('gm_noticias');
            $this->db->where('id_noticia !=', $idNoticia);
            $this->db->where('titulo', $tituloNoticia);
            $result = $this->db->get();
            return $result->result();
        }

    	//listado de noticias
    	public function listadoNoticias($parametros = array()) {
    		$this->db->select('*');
            $this->db->from('gm_noticias');

            if (isset($parametros['src'])) {
                $this->db->like('titulo', $parametros['src']);
            }

            if (isset($parametros['ps']) && isset($parametros['pl'])) {
                $this->db->limit($parametros['ps'], $parametros['pl']);
            }

            $this->db->order_by('id_noticia', 'desc');
            $result = $this->db->get();
            return $result->result();
    	}

    	//registro de noticias
    	public function registrarNoticia($datos) {
    		$this->db->insert('gm_noticias', $datos);
    		return $this->db->insert_id();
    	}

    	public function registrarArchivosNoticia($archivosNoticias) {
    		$this->db->insert('gm_archivos_noticias', $archivosNoticias);
    	}

    	//edición de noticias
    	public function verificarIdNoticia($idNoticia) {
    		$this->db->select('*');
            $this->db->from('gm_noticias');
            $this->db->where('id_noticia', $idNoticia);
            $result = $this->db->get();

            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return null;
            }
    	}

    	public function archivosNoticias($idNoticia) {
    		$this->db->select('*');
    		$this->db->from('gm_archivos_noticias');
    		$this->db->where('id_noticia', $idNoticia);
    		$result = $this->db->get();
    		return $result->result();
    	}

    	public function editarNoticia($idNoticia, $datos) {
    		$this->db->where('id_noticia', $idNoticia);
    		$this->db->update('gm_noticias', $datos);
    	}

    	public function eliminarArchivosNoticias($idNoticia) {
    		$this->db->delete('gm_archivos_noticias', array('id_noticia' => $idNoticia));
    	}

    	//eliminar noticias
    	public function eliminarNoticia($idNoticia) {
    		$this->db->delete('gm_noticias', array('id_noticia' => $idNoticia));
    		$this->db->delete('gm_archivos_noticias', array('id_noticia' => $idNoticia));
            return true;
    	}

    	//eliminar archivo de noticia
    	public function eliminarArchivoNoticia($idArchivoNoticia) {
    		$this->db->delete('gm_archivos_noticias', array('id_archivo_noticia' => $idArchivoNoticia));
            return true;
    	}
    }

?>
