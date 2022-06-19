<?php

    Class Cargo extends CI_Controller {
    	public function __construct() {
    		  parent::__construct();

          if (!isset($this->session->userdata['administrador']['id_administrador'])) {
              redirect(base_url() . 'login-administracion');
              die;
          }

          //modelos
          $this->load->model('backend/cargos');
    	}

      public function listado() {

          $data['titulo'] = 'Cargos | Listado';
          $data['busqueda'] = array(
              'action' => 'listado-cargos'
          );

          $config["base_url"] = base_url() . 'listado-cargos';
          $config["uri_segment"] = 2;
          $config["use_page_numbers"] = true;
          $config['reuse_query_string'] = true;
          $config["per_page"] = 10;

          $config['full_tag_open'] = '<ul class="pagination justify-content-center">';
          $config['full_tag_close'] = '</ul>';
          $config['attributes'] = ['class' => 'page-link'];
          $config['first_tag_open'] = '<li class="page-item">';
          $config['first_tag_close'] = '</li>';
          $config['prev_link'] = '<';
          $config['prev_tag_open'] = '<li class="page-item">';
          $config['prev_tag_close'] = '</li>';
          $config['next_link'] = '>';
          $config['next_tag_open'] = '<li class="page-item">';
          $config['next_tag_close'] = '</li>';
          $config['last_tag_open'] = '<li class="page-item">';
          $config['last_tag_close'] = '</li>';
          $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
          $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
          $config['num_tag_open'] = '<li class="page-item">';
          $config['num_tag_close'] = '</li>';
          $config['first_link'] = '<<';
          $config['last_link'] = '>>';

          $page = (intval($this->uri->segment(2, 1)) - 1) * $config["per_page"];

          $parametros = array();

          if (isset($_GET['src'])) {
              $parametros['src'] = $_GET['src'];
          }

          $filtros = $this->cargos->listadoCargos($parametros);
          $contador = count($filtros);

          $parametros['ps'] = $config['per_page'];
          $parametros['pl'] = $page;
          $resultado = $this->cargos->listadoCargos($parametros);


          $config['total_rows'] = $contador;

          $this->pagination->initialize($config);

          $data['pagination'] = $this->pagination->create_links();
          $data['resultado'] = $resultado;

          $data['scripts'] = array('cargos.js');

          $this->load->view('backend/layouts/header', $data);
          $this->load->view('backend/cargos/listado', $data);
          $this->load->view('backend/layouts/footer', $data);
      }

      public function registro() {
        
          $data['titulo'] = 'Cargos | Registro';

          $data['scripts'] = array('cargos.js');

          $this->load->view('backend/layouts/header', $data);
          $this->load->view('backend/cargos/registro');
          $this->load->view('backend/layouts/footer', $data);
      }

      public function edicion($idCargo) {

          $data['titulo'] = 'Cargos | Edición';

          $data['datosCargo'] = $this->cargos->verificarIdCargo($idCargo);

          if (!$data['datosCargo']) {
              redirect(base_url() . 'listado-cargos');
              die;
          }

          if ($idCargo == 8) {
              redirect(base_url() . 'listado-cargos');
              die;
          }

          $data['scripts'] = array('cargos.js');

          $this->load->view('backend/layouts/header', $data);
          $this->load->view('backend/cargos/edicion', $data);
          $this->load->view('backend/layouts/footer', $data);
      }

      public function registrarCargo() {
          $errores = array();
          $mensaje = null;

          $cargo = trim($this->input->post('cargo'));

          if (!isset($this->session->userdata['administrador']['id_administrador'])) {
              $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
          }

          if (empty($cargo)) {
              $errores[] = 'Debes ingresar el nombre del cargo';
          }

          if ($cargo && strlen($cargo) > 150) {
              $errores[] = 'El nombre del cargo debe contener menos de 150 caracteres';
          }

          if (count($errores) <= 0) {

              $datos = array(
                  'cargo' => $cargo,
                  'fecha_registro' => date('Y-m-d')
              );

              $registro = $this->cargos->registrarCargo($datos);

              if (!$registro) {
                  $mensaje = array(
                      'success' => false,
                      'message' => 'No se ha podido registrar el cargo, intente más tarde'
                  );
              } else {
                  $mensaje = array(
                      'success' => true,
                      'message' => 'Cargo registrado con éxito'
                  );
              }

          } else {
              foreach (array_reverse($errores) as $key => $error) {
                  $err = $error;
              }

              echo $err;
          }

          if ($mensaje) {
              echo json_encode($mensaje);
          }
      }

      public function editarCargo($idCargo) {
          $errores = array();
          $mensaje = null;

          $cargo = trim($this->input->post('cargo'));

          $verificarIdCargo = $this->cargos->verificarIdCargo($idCargo);

          if (!isset($this->session->userdata['administrador']['id_administrador'])) {
              $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
          }

          if (!isset($idCargo)) {
              $errores[] = 'El ID del cargo no existe';
          }

          if ($idCargo == 8) {
              $errores[] = 'No puede editar este cargo';
          }

          if ($idCargo && !$verificarIdCargo) {
              $errores[] = 'El ID del cargo es inválido';
          }

          if (empty($cargo)) {
              $errores[] = 'Debes ingresar el nombre del cargo';
          }

          if ($cargo && strlen($cargo) > 150) {
              $errores[] = 'El nombre del cargo debe contener menos de 150 caracteres';
          }

          if (count($errores) <= 0) {

              $datos = array(
                  'cargo' => $cargo
              );

              $edicion = $this->cargos->editarCargo($idCargo, $datos);

              if (!$edicion) {
                  $mensaje = array(
                      'success' => false,
                      'message' => 'No se ha podido este cargo, intente más tarde'
                  );
              } else {
                  $mensaje = array(
                      'success' => true,
                      'message' => 'Cargo editado con éxito'
                  );
              }

          } else {
              foreach (array_reverse($errores) as $key => $error) {
                  $err = $error;
              }

              echo $err;
          }

          if ($mensaje) {
              echo json_encode($mensaje);
          }
      }

      public function eliminarCargo($idCargo) {
            $errores = array();
            $mensaje = null;

            $verificarIdCargo = $this->cargos->verificarIdCargo($idCargo);

            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
            }

            if (!isset($idCargo)) {
                $errores[] = 'El ID del cargo no existe';
            }

            if ($idCargo == 8) {
                $errores[] = 'No puede eliminar este cargo';
            }

            if ($idCargo && !$verificarIdCargo) {
                $errores[] = 'El ID del cargo es inválido';
            }

            if (count($errores) <= 0) {

                $eliminado = $this->cargos->eliminarCargo($idCargo);

                if (!$eliminado) {
                    $mensaje = array(
                        'success' => false,
                        'message' => 'No se ha podido eliminar este cargo'
                    );
                } else {
                    $mensaje = array(
                        'success' => true,
                        'message' => 'Cargo eliminado con éxito'
                    );
                }

            } else {
                foreach (array_reverse($errores) as $key => $error) {
                    $err = $error;
                }

                echo $err;
            }

            if ($mensaje) {
                echo json_encode($mensaje);
            }
        }
}
