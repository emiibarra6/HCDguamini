<?php  

    Class TipoDocumento extends CI_Controller {
    	public function __construct() {
    		parent::__construct();

    		if (!isset($this->session->userdata['administrador']['id_administrador'])) {
	            redirect(base_url() . 'login-administracion');
	            die;
	        }

            //modelos
            $this->load->model('backend/tiposDocumentos');
    	}

    	public function listado() {

          $data['titulo'] = 'Tipos de Documentos | Listado';
          $data['busqueda'] = array(
              'action' => 'listado-tipos-documentos'
          );

          $config["base_url"] = base_url() . 'listado-tipos-documentos';
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

          $filtros = $this->tiposDocumentos->listadoTiposDocumentos($parametros);
          $contador = count($filtros);

          $parametros['ps'] = $config['per_page'];
          $parametros['pl'] = $page;
          $resultado = $this->tiposDocumentos->listadoTiposDocumentos($parametros);


          $config['total_rows'] = $contador;

          $this->pagination->initialize($config);

          $data['pagination'] = $this->pagination->create_links();
          $data['resultado'] = $resultado;

          $data['scripts'] = array('tipos-documentos.js');

          $this->load->view('backend/layouts/header', $data);
          $this->load->view('backend/tiposDocumentos/listado', $data);
          $this->load->view('backend/layouts/footer', $data);
      }

      public function registro() {
        
          $data['titulo'] = 'Tipos de Documentos | Registro';

          $data['scripts'] = array('tipos-documentos.js');

          $this->load->view('backend/layouts/header', $data);
          $this->load->view('backend/tiposDocumentos/registro');
          $this->load->view('backend/layouts/footer', $data);
      }

      public function edicion($idTipoDocumento) {

          $data['titulo'] = 'Tipos de Documentos | Edición';

          $data['datosTipoDocumento'] = $this->tiposDocumentos->verificarIdTipoDocumento($idTipoDocumento);

          if (!$data['datosTipoDocumento']) {
              redirect(base_url() . 'listado-tipos-documentos');
              die;
          }

          $data['scripts'] = array('tipos-documentos.js');

          $this->load->view('backend/layouts/header', $data);
          $this->load->view('backend/tiposDocumentos/edicion', $data);
          $this->load->view('backend/layouts/footer', $data);
      }

      public function registrarTipoDocumento() {
          $errores = array();
          $mensaje = null;

          $tipo = trim($this->input->post('tipo'));

          if (!isset($this->session->userdata['administrador']['id_administrador'])) {
              $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
          }

          if (empty($tipo)) {
              $errores[] = 'Debes ingresar el nombre del tipo de documento';
          }

          if ($tipo && strlen($tipo) > 150) {
              $errores[] = 'El nombre del tipo de documento debe contener menos de 150 caracteres';
          }

          if (count($errores) <= 0) {

              $datos = array(
                  'tipo_documento' => $tipo,
                  'fecha_registro' => date('Y-m-d')
              );

              $registro = $this->tiposDocumentos->registrarTipoDocumento($datos);

              if (!$registro) {
                  $mensaje = array(
                      'success' => false,
                      'message' => 'No se ha podido registrar el tipo de documento, intente más tarde'
                  );
              } else {
                  $mensaje = array(
                      'success' => true,
                      'message' => 'Tipo de documento registrado con éxito'
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

      public function editarTipoDocumento($idTipoDocumento) {
          $errores = array();
          $mensaje = null;

          $tipo = trim($this->input->post('tipo'));

          $verificarIdTipoDocumento = $this->tiposDocumentos->verificarIdTipoDocumento($idTipoDocumento);

          if (!isset($this->session->userdata['administrador']['id_administrador'])) {
              $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
          }

          if (!isset($idTipoDocumento)) {
              $errores[] = 'El ID del tipo de documento no existe';
          }

          if ($idTipoDocumento && !$verificarIdTipoDocumento) {
              $errores[] = 'El ID del tipo de documento es inválido';
          }

          if (empty($tipo)) {
              $errores[] = 'Debes ingresar el nombre del tipo de documento';
          }

          if ($tipo && strlen($tipo) > 150) {
              $errores[] = 'El nombre del tipo de documento debe contener menos de 150 caracteres';
          }

          if (count($errores) <= 0) {

              $datos = array(
                  'tipo_documento' => $tipo
              );

              $edicion = $this->tiposDocumentos->editarTipoDocumento($idTipoDocumento, $datos);

              if (!$edicion) {
                  $mensaje = array(
                      'success' => false,
                      'message' => 'No se ha podido este tipo de documento, intente más tarde'
                  );
              } else {
                  $mensaje = array(
                      'success' => true,
                      'message' => 'Tipo de documento editado con éxito'
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

      public function eliminarTipoDocumento($idTipoDocumento) {
            $errores = array();
            $mensaje = null;

            $verificarIdTipoDocumento = $this->tiposDocumentos->verificarIdTipoDocumento($idTipoDocumento);

            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
            }

            if (!isset($idTipoDocumento)) {
                $errores[] = 'El ID del tipo de documento no existe';
            }

            if ($idTipoDocumento && !$verificarIdTipoDocumento) {
                $errores[] = 'El ID del tipo de documento es inválido';
            }

            if (count($errores) <= 0) {

                $eliminado = $this->tiposDocumentos->eliminarTipoDocumento($idTipoDocumento);

                if (!$eliminado) {
                    $mensaje = array(
                        'success' => false,
                        'message' => 'No se ha podido eliminar este tipo de documento'
                    );
                } else {
                    $mensaje = array(
                        'success' => true,
                        'message' => 'Tipo de documento eliminado con éxito'
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

?>