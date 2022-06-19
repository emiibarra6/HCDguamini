<?php

    Class Noticias extends CI_Model {
    	public function __construct() {
    		parent::__construct();
    	}

        public function listadoNoticias($parametros = array()) {
            $this->db->select('*');
            $this->db->from('gm_noticias');

            if (isset($parametros['src'])) {
                $this->db->like('titulo', $parametros['src']);
            }

            if (isset($parametros['ps']) && isset($parametros['pl'])) {
                $this->db->limit($parametros['ps'], $parametros['pl']);
            }

            $this->db->order_by('fecha_publicacion', 'desc');
            $result = $this->db->get();
            return $result->result();
        }

        public function traeUltimasNoticias(){
          $this->db->select('*');
          $this->db->from('gm_noticias');
          $this->db->limit(3);
          $this->db->order_by('fecha_publicacion', 'desc');
          $result = $this->db->get();
          return $result->result();
        }

        public function datosNoticia($slugNoticia) {
            $this->db->select('*');
            $this->db->from('gm_noticias');
            $this->db->where('slug_noticia', $slugNoticia);
            $result = $this->db->get();

            if ($result->num_rows() > 0) {
                return $result->row();
            } else {
                return null;
            }
        }

        public function archivosNoticia($idNoticia) {
            $this->db->select('*');
            $this->db->from('gm_archivos_noticias');
            $this->db->where('id_noticia', $idNoticia);
            $result = $this->db->get();
            return $result->result();
        }

      /*  public function noticiasRelacionados($idNoticia, $idTipoNoticia) {
            $this->db->select('titulo, descripcion, fecha_documento, slug_documento');
            $this->db->from('gm_noticias');
            $this->db->where('id_documento !=', $idNoticia);
            $this->db->where('id_tipo_documento', $idTipoNoticia);
            $this->db->order_by('fecha_documento', 'desc');
            $this->db->limit(3);
            $result = $this->db->get();
            return $result->result();
        }*/
    }

?>
