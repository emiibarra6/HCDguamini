<?php

    Class Documento extends CI_Controller {
    	public function __construct() {
    		parent::__construct();

    		if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                redirect(base_url() . 'login-administracion');
                die;
            }

            //modelos
            $this->load->model('backend/documentos');
            $this->load->model('backend/tiposDocumentos');

            //helpers
            $this->load->helper('text');
    	}

        public function listado() {

            $data['titulo'] = 'Documentos | Listado';
            $data['busqueda'] = array(
                'action' => 'listado-documentos'
            );

            $config["base_url"] = base_url() . 'listado-documentos';
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

            $filtros = $this->documentos->listadoDocumentos($parametros);
            $contador = count($filtros);

            $parametros['ps'] = $config['per_page'];
            $parametros['pl'] = $page;
            $resultado = $this->documentos->listadoDocumentos($parametros);

            $config['total_rows'] = $contador;

            $this->pagination->initialize($config);

            $data['pagination'] = $this->pagination->create_links();
            $data['resultado'] = $resultado;

            $archivosDocumentos = [];

            foreach ($resultado as $documento) {
            	$archivosDocumentos[$documento->id_documento] = $this->documentos->archivosDocumentos($documento->id_documento);
            }

            $data['archivosDocumentos'] = $archivosDocumentos;

            $data['scripts'] = array('documentos.js');

    		$this->load->view('backend/layouts/header', $data);
    		$this->load->view('backend/documentos/listado', $data);
    		$this->load->view('backend/layouts/footer', $data);
    	}

    	public function registro() {

            $data['titulo'] = 'Documentos | Registro';

            $data['listadoTiposDocumentos'] = $this->tiposDocumentos->tiposDocumentos();

            $data['scripts'] = array('documentos.js');

    		$this->load->view('backend/layouts/header', $data);
    		$this->load->view('backend/documentos/registro', $data);
    		$this->load->view('backend/layouts/footer', $data);
    	}

    	public function edicion($idDocumento) {

    		$data['titulo'] = 'Documentos | Edición';

    		$data['datosDocumento'] = $this->documentos->verificarIdDocumento($idDocumento);

    		if (!$data['datosDocumento']) {
    			redirect(base_url() . 'listado-documentos');
    			die;
    		}

    		$data['archivosDocumentos'] = $this->documentos->archivosDocumentos($idDocumento);

            $data['listadoTiposDocumentos'] = $this->tiposDocumentos->tiposDocumentos();

            $data['scripts'] = array('documentos.js');

    		$this->load->view('backend/layouts/header', $data);
    		$this->load->view('backend/documentos/edicion', $data);
    		$this->load->view('backend/layouts/footer', $data);
    	}

    	public function registrarDocumento() {
            $errores = array();
            $mensaje = null;

            $tipoDocumento = $this->input->post('tipo_documento');
            $titulo = trim($this->input->post('titulo'));
            $descripcion = trim($this->input->post('descripcion'));
            $numero = trim($this->input->post('numero'));
            $fecha = trim($this->input->post('fecha'));
            $archivo = $_FILES['archivo']['name'];

            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
            }

            if (empty($tipoDocumento)) {
                $errores[] = 'Debes seleccionar un tipo de documento';
            }

            if (empty($titulo)) {
                $errores[] = 'Debes ingresar el título del documento';
            }

            if ($titulo && strlen($titulo) > 200) {
                $errores[] = 'El título del documento debe contener menos de 40 caracteres';
            }

            if (empty($descripcion)) {
                $errores[] = 'Debes ingresar la descripción del documento';
            }

            if (empty($fecha)) {
                $errores[] = 'Debes ingresar la fecha del documento';
            }

            if (empty($numero)) {
                $errores[] = 'Debes ingresar el número del documento';
            }

            if ($archivo) {
            	$extension = pathinfo($archivo, PATHINFO_EXTENSION);
            	$extensionesValidas = array('pdf', 'doc', 'docx');

            	if (!in_array($extension, $extensionesValidas)) {
            		$errores[] = 'Extensión de archivo inválido';
            	}
            }

            if (count($errores) <= 0) {

                $datos = array(
                    'id_tipo_documento' => $tipoDocumento,
                    'titulo' => $titulo,
                    'descripcion' => $descripcion,
                    'fecha_registro' => date('Y-m-d'),
                    'fecha_documento' => $fecha,
                    'numero_documento' => $numero,
                    'slug_documento' => $this->slugifyDocumento(0, $titulo)
                );

                $idDocumento = $this->documentos->registrarDocumento($datos);

                if (isset($archivo) && !empty($archivo)) {
                    $config['upload_path'] = 'assets/backend/images/documentos';
                    $config['allowed_types'] = 'pdf|doc|docx';

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('archivo')) {
                        $fileData = $this->upload->data();

                        $uploadData['file_name'] = $fileData['file_name'];

                        $archivosDocumentos = array(
                            'id_documento' => $idDocumento,
                            'archivo' => $uploadData['file_name']
                        );

                        $this->documentos->registrarArchivosDocumento($archivosDocumentos);
                    }
                }

                $mensaje = array(
                    'success' => true,
                    'message' => 'Documento registrado con éxito'
                );

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

        public function editarDocumento($idDocumento) {
            $errores = array();
            $mensaje = null;

            $tipoDocumento = $this->input->post('tipo_documento');
            $titulo = trim($this->input->post('titulo'));
            $descripcion = trim($this->input->post('descripcion'));
            $fecha = trim($this->input->post('fecha'));
            $numero = trim($this->input->post('numero'));
            $archivo = $_FILES['archivo']['name'];

            $verificarIdDocumento = $this->documentos->verificarIdDocumento($idDocumento);

            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
            }

            if (!isset($idDocumento)) {
                $errores[] = 'El ID del documento no existe';
            }

            if ($idDocumento && !$verificarIdDocumento) {
                $errores[] = 'El ID del documento es inválido';
            }

            if (empty($tipoDocumento)) {
                $errores[] = 'Debes seleccionar un tipo de documento';
            }

            if (empty($titulo)) {
                $errores[] = 'Debes ingresar el título del documento';
            }

            if ($titulo && strlen($titulo) > 200) {
                $errores[] = 'El título del documento debe contener menos de 40 caracteres';
            }

            if (empty($descripcion)) {
                $errores[] = 'Debes ingresar la descripción del documento';
            }

            if (empty($fecha)) {
                $errores[] = 'Debes ingresar la fecha del documento';
            }

            if (empty($numero)) {
                $errores[] = 'Debes ingresar el número del documento';
            }

            if ($archivo) {
            	$extension = pathinfo($archivo, PATHINFO_EXTENSION);
            	$extensionesValidas = array('pdf', 'doc', 'docx');

            	if (!in_array($extension, $extensionesValidas)) {
            		$errores[] = 'Extensión de archivo inválido';
            	}
            }

            if (count($errores) <= 0) {

                $datos = array(
                    'id_tipo_documento' => $tipoDocumento,
                    'titulo' => $titulo,
                    'descripcion' => $descripcion,
                    'fecha_documento' => $fecha,
                    'numero_documento' => $numero,
                    'slug_documento' => $this->slugifyDocumento($idDocumento, $titulo)
                );

                $this->documentos->editarDocumento($idDocumento, $datos);

                if (isset($archivo) && !empty($archivo)) {

                	$this->documentos->eliminarArchivosDocumentos($idDocumento);

                    $config['upload_path'] = 'assets/backend/images/documentos';
                    $config['allowed_types'] = 'pdf|doc|docx';

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('archivo')) {
                        $fileData = $this->upload->data();

                        $uploadData['file_name'] = $fileData['file_name'];

                        $archivosDocumentos = array(
                            'id_documento' => $idDocumento,
                            'archivo' => $uploadData['file_name']
                        );

                        $this->documentos->registrarArchivosDocumento($archivosDocumentos);
                    }
                }

                $mensaje = array(
                    'success' => true,
                    'message' => 'Documento editado con éxito'
                );

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

        public function eliminarDocumento($idDocumento) {
            $errores = array();
            $mensaje = null;

            $verificarIdDocumento = $this->documentos->verificarIdDocumento($idDocumento);

            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
            }

            if (!isset($idDocumento)) {
                $errores[] = 'El ID del documento no existe';
            }

            if ($idDocumento && !$verificarIdDocumento) {
                $errores[] = 'El ID del documento es inválido';
            }

            if (count($errores) <= 0) {

                $eliminado = $this->documentos->eliminarDocumento($idDocumento);

                if (!$eliminado) {
                    $mensaje = array(
                        'success' => false,
                        'message' => 'No se ha podido eliminar este documento'
                    );
                } else {
                    $mensaje = array(
                        'success' => true,
                        'message' => 'Documento eliminado con éxito'
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

        public function eliminarArchivoDocumento($idArchivoDocumento) {
        	$errores = array();
            $mensaje = null;

            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
            }

            if (!isset($idArchivoDocumento)) {
                $errores[] = 'El ID del archivo del documento no existe';
            }

            if (count($errores) <= 0) {

                $eliminado = $this->documentos->eliminarArchivoDocumento($idArchivoDocumento);

                if (!$eliminado) {
                    $mensaje = array(
                        'success' => false,
                        'message' => 'No se ha podido eliminar este archivo'
                    );
                } else {
                    $mensaje = array(
                        'success' => true,
                        'message' => 'Archivo eliminado con éxito'
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

        public function slugifyDocumento($idDocumento, $tituloDocumento) {
            $contador = 0;
            $tituloDocumento = url_title(convert_accented_characters($tituloDocumento), 'dash', true);
            $slug = $tituloDocumento;

            if ($idDocumento == 0) {
                while (true) {
                    $verificarSlug = $this->documentos->verificarSlug($slug);

                    if (count($verificarSlug) == 0) break;
                    $slug = $tituloDocumento . '-' . (++$contador);
                }
            } else {
                while (true) {
                    $verificarSlug = $this->documentos->verificarSlugEdicion($idDocumento, $slug);

                    if (count($verificarSlug) == 0) break;
                    $slug = $tituloDocumento . '-' . (++$contador);
                }
            }

            return $slug;
      }
    }

?>
