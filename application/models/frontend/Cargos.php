<?php

Class Cargos extends CI_Model {
      public function __construct() {
        parent::__construct();
      }

      //funciones generales
      public function listadoCargosSelect() {
          $this->db->select('*');
          $this->db->from('gm_cargos');
          $this->db->order_by('cargo', 'asc');
          $result = $this->db->get();
          return $result->result();
      }

      //listado de cargos
      public function listadoCargos($parametros = array()) {
          $this->db->select('*');
          $this->db->from('gm_cargos');

          if (isset($parametros['src'])) {
              $this->db->like('cargo', $parametros['src']);
          }

          if (isset($parametros['ps']) && isset($parametros['pl'])) {
              $this->db->limit($parametros['ps'], $parametros['pl']);
          }

          $this->db->order_by('id_cargo', 'desc');
          $result = $this->db->get();
          return $result->result();
      }

      //registro de cargos
      public function registrarCargo($datos) {
          $this->db->insert('gm_cargos', $datos);
          return true;
      }

      //edición de cargos
      public function verificarIdCargo($idCargo) {
          $this->db->select('*');
          $this->db->from('gm_cargos');
          $this->db->where('id_cargo', $idCargo);
          $result = $this->db->get();

          if ($result->num_rows() > 0) {
              return $result->row();
          } else {
              return null;
          }
      }

      public function editarCargo($idCargo, $datos) {
          $this->db->where('id_cargo', $idCargo);
          $this->db->update('gm_cargos', $datos);
          return true;
      }

      //eliminar cargo
      public function eliminarCargo($idCargo) {
          $this->db->where('id_cargo', $idCargo);
          $this->db->set('id_cargo', null);
          $this->db->update('gm_cargos');

          $this->db->delete('gm_cargos', array('id_cargo' => $idCargo)); 
          return true;
      }
}
