<?php

Class Bloques extends CI_Model {
      public function __construct() {
        parent::__construct();
      }

      //funciones generales
      public function listadoBloquesSelect() {
          $this->db->select('*');
          $this->db->from('gm_bloque_politico');
          $this->db->order_by('nombre_bloque', 'asc');
          $result = $this->db->get();
          return $result->result();
      }

      public function verificarSlug($nombreBloque) {
            $this->db->select('slug_bloque');
            $this->db->from('gm_bloque_politico');
            $this->db->where('nombre_bloque', $nombreBloque);
            $result = $this->db->get();
            return $result->result();
        }

        public function verificarSlugEdicion($idBloque, $nombreBloque) {
            $this->db->select('slug_bloque');
            $this->db->from('gm_bloque_politico');
            $this->db->where('id_bloque_politico !=', $idBloque);
            $this->db->where('nombre_bloque', $nombreBloque);
            $result = $this->db->get();
            return $result->result();
        }

      //listado de bloques
      public function listadoBloques($parametros = array()) {
          $this->db->select('*');
          $this->db->from('gm_bloque_politico');

          if (isset($parametros['src'])) {
              $this->db->like('nombre_bloque', $parametros['src']);
          }

          if (isset($parametros['ps']) && isset($parametros['pl'])) {
              $this->db->limit($parametros['ps'], $parametros['pl']);
          }

          $this->db->order_by('id_bloque_politico', 'desc');
          $result = $this->db->get();
          return $result->result();
      }

      //registro de bloques
      public function registrarBloque($datos) {
          $this->db->insert('gm_bloque_politico', $datos);
          return true;
      }

      //edición de bloques
      public function verificarIdBloque($idBloque) {
          $this->db->select('*');
          $this->db->from('gm_bloque_politico');
          $this->db->where('id_bloque_politico', $idBloque);
          $result = $this->db->get();

          if ($result->num_rows() > 0) {
              return $result->row();
          } else {
              return null;
          }
      }

      public function editarBloque($idBloque, $datos) {
          $this->db->where('id_bloque_politico', $idBloque);
          $this->db->update('gm_bloque_politico', $datos);
          return true;
      }

      //eliminar bloque político
      public function eliminarBloque($idBloque) {
          $this->db->where('id_bloque_politico', $idBloque);
          $this->db->set('id_bloque_politico', null);
          $this->db->update('gm_personas');

          $this->db->delete('gm_bloque_politico', array('id_bloque_politico' => $idBloque));
          return true;
      }
}
