<?php

    Class Bloque extends CI_Controller {
    	public function __construct() {
    		  parent::__construct();

          if (!isset($this->session->userdata['administrador']['id_administrador'])) {
              redirect(base_url() . 'login-administracion');
              die;
          }

          //modelos
          $this->load->model('backend/bloques');

          //helpers
          $this->load->helper('text');
    	}

      public function listado() {

          $data['titulo'] = 'Bloques Políticos | Listado';
          $data['busqueda'] = array(
              'action' => 'listado-bloques'
          );

          $config["base_url"] = base_url() . 'listado-bloques';
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

          $filtros = $this->bloques->listadoBloques($parametros);
          $contador = count($filtros);

          $parametros['ps'] = $config['per_page'];
          $parametros['pl'] = $page;
          $resultado = $this->bloques->listadoBloques($parametros);


          $config['total_rows'] = $contador;

          $this->pagination->initialize($config);

          $data['pagination'] = $this->pagination->create_links();
          $data['resultado'] = $resultado;

          $data['scripts'] = array('bloques.js');

          $this->load->view('backend/layouts/header', $data);
          $this->load->view('backend/bloques/listado', $data);
          $this->load->view('backend/layouts/footer', $data);
      }

      public function registro() {
        
          $data['titulo'] = 'Bloques Políticos | Registro';

          $data['scripts'] = array('bloques.js');

          $this->load->view('backend/layouts/header', $data);
          $this->load->view('backend/bloques/registro');
          $this->load->view('backend/layouts/footer', $data);
      }

      public function edicion($idBloque) {

          $data['titulo'] = 'Bloques Políticos | Edición';

          $data['datosBloque'] = $this->bloques->verificarIdBloque($idBloque);

          if (!$data['datosBloque']) {
              redirect(base_url() . 'listado-bloques');
              die;
          }

          $data['scripts'] = array('bloques.js');

          $this->load->view('backend/layouts/header', $data);
          $this->load->view('backend/bloques/edicion', $data);
          $this->load->view('backend/layouts/footer', $data);
      }

      public function registrarBloque() {
          $errores = array();
          $mensaje = null;

          $nombre = trim($this->input->post('nombre'));
          $bloqueRepresentativo = $this->input->post('color_representativo');

          if (!isset($this->session->userdata['administrador']['id_administrador'])) {
              $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
          }

          if (empty($nombre)) {
              $errores[] = 'Debes ingresar el nombre del bloque';
          }

          if ($nombre && strlen($nombre) > 50) {
              $errores[] = 'El nombre del bloque debe contener menos de 50 caracteres';
          }

          if ($nombre && strlen($nombre) < 3) {
              $errores[] = 'El nombre del bloque debe contener al menos 3 caracteres';
          }

          if (count($errores) <= 0) {

              $datos = array(
                  'nombre_bloque' => $nombre,
                  'color_representativo' => $bloqueRepresentativo,
                  'slug_bloque' => $this->slugifyBloque(0, $nombre),
                  'fecha_registro' => date('Y-m-d')
              );

              $registro = $this->bloques->registrarBloque($datos);

              if (!$registro) {
                  $mensaje = array(
                      'success' => false,
                      'message' => 'No se ha podido registrar al bloque, intente más tarde'
                  );
              } else {
                  $mensaje = array(
                      'success' => true,
                      'message' => 'Bloque registrado con éxito'
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

      public function editarBloque($idBloque) {
          $errores = array();
          $mensaje = null;

          $nombre = trim($this->input->post('nombre'));
          $bloqueRepresentativo = $this->input->post('color_representativo');

          $verificarIdBloque = $this->bloques->verificarIdBloque($idBloque);

          if (!isset($this->session->userdata['administrador']['id_administrador'])) {
              $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
          }

          if (!isset($idBloque)) {
              $errores[] = 'El ID del bloque político no existe';
          }

          if ($idBloque && !$verificarIdBloque) {
              $errores[] = 'El ID del bloque político es inválido';
          }

          if (empty($nombre)) {
              $errores[] = 'Debes ingresar el nombre del bloque';
          }

          if ($nombre && strlen($nombre) > 50) {
              $errores[] = 'El nombre del bloque debe contener menos de 50 caracteres';
          }

          if ($nombre && strlen($nombre) < 3) {
              $errores[] = 'El nombre del bloque debe contener al menos 3 caracteres';
          }

          if (count($errores) <= 0) {

              $datos = array(
                  'nombre_bloque' => $nombre,
                  'color_representativo' => $bloqueRepresentativo,
                  'slug_bloque' => $this->slugifyBloque($idBloque, $nombre)
              );

              $edicion = $this->bloques->editarBloque($idBloque, $datos);

              if (!$edicion) {
                  $mensaje = array(
                      'success' => false,
                      'message' => 'No se ha podido este bloque, intente más tarde'
                  );
              } else {
                  $mensaje = array(
                      'success' => true,
                      'message' => 'Bloque editado con éxito'
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

      public function eliminarBloque($idBloque) {
            $errores = array();
            $mensaje = null;

            $verificarIdBloque = $this->bloques->verificarIdBloque($idBloque);

            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
            }

            if (!isset($idBloque)) {
                $errores[] = 'El ID del bloque político no existe';
            }

            if ($idBloque && !$verificarIdBloque) {
                $errores[] = 'El ID del bloque político es inválido';
            }

            if (count($errores) <= 0) {

                $eliminado = $this->bloques->eliminarBloque($idBloque);

                if (!$eliminado) {
                    $mensaje = array(
                        'success' => false,
                        'message' => 'No se ha podido eliminar este bloque político'
                    );
                } else {
                    $mensaje = array(
                        'success' => true,
                        'message' => 'Bloque político eliminado con éxito'
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

      public function slugifyBloque($idBloque, $nombreBloque) {
            $contador = 0;
            $nombreBloque = url_title(convert_accented_characters($nombreBloque), 'dash', true);
            $slug = $nombreBloque;
            
            if ($idBloque == 0) {
                while (true) {
                    $verificarSlug = $this->bloques->verificarSlug($nombreBloque);

                    if (count($verificarSlug) == 0) break;
                    $slug = $nombreBloque . '-' . (++$contador);
                }
            } else {
                while (true) {
                    $verificarSlug = $this->bloques->verificarSlugEdicion($idBloque, $nombreBloque);

                    if (count($verificarSlug) == 0) break;
                    $slug = $nombreBloque . '-' . (++$contador);
                }
            }

            return $slug;
      }
}