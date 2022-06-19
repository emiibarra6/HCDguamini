<?php

    require 'vendor/autoload.php';

    use Intervention\Image\ImageManager;

    Class Autoridades extends CI_Controller {

      public function __construct() {
    		parent::__construct();

    		if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                redirect(base_url() . 'login-administracion');
                die;
            }

    		//modelos
    		$this->load->model('backend/autoridad');
    	}

    	public function listado() {

            $data['titulo'] = 'Autoridades | Listado';
            $data['busqueda'] = array(
                'action' => 'listado-autoridades'
            );

            $config["base_url"] = base_url() . 'listado-autoridades';
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

            $filtros = $this->autoridad->listadoAutoridades($parametros);
            $contador = count($filtros);

            $parametros['ps'] = $config['per_page'];
            $parametros['pl'] = $page;
            $resultado = $this->autoridad->listadoAutoridades($parametros);

            $config['total_rows'] = $contador;

            $this->pagination->initialize($config);

            $data['pagination'] = $this->pagination->create_links();
            $data['resultado'] = $resultado;

            $data['scripts'] = array('autoridades.js');

    		$this->load->view('backend/layouts/header', $data);
    		$this->load->view('backend/autoridades/listado', $data);
    		$this->load->view('backend/layouts/footer', $data);
    	}

    	public function registro() {

            $data['titulo'] = 'Autoridades | Registro';

            $data['scripts'] = array('autoridades.js');

    		$this->load->view('backend/layouts/header', $data);
    		$this->load->view('backend/autoridades/registro', $data);
    		$this->load->view('backend/layouts/footer', $data);
    	}

    	public function edicion($idPersona) {

    		$data['titulo'] = 'Autoridades | Edición';

    		$data['datosPersona'] = $this->autoridad->verificarIdPersona($idPersona);

    		if (!$data['datosPersona']) {
    			redirect(base_url() . 'listado-autoridades');
    			die;
    		}

            $data['scripts'] = array('autoridades.js');

    		$this->load->view('backend/layouts/header', $data);
    		$this->load->view('backend/autoridades/edicion', $data);
    		$this->load->view('backend/layouts/footer', $data);
    	}

    	public function registrarPersona() {
            $errores = array();
            $mensaje = null;

            $nombre = trim($this->input->post('nombre'));
            $apellido = trim($this->input->post('apellido'));
            $email = trim($this->input->post('email'));
            $cargo = $this->input->post('cargo');
            $localidad = $this->input->post('localidad');
            $imagenPersona = $_FILES['file']['name'];

            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
            }

            if (empty($nombre)) {
                $errores[] = 'Debes ingresar el nombre de la persona';
            }

            if ($nombre && strlen($nombre) > 20) {
                $errores[] = 'El nombre de la persona debe contener menos de 20 caracteres';
            }

            if ($nombre && strlen($nombre) < 3) {
                $errores[] = 'El nombre de la persona debe contener al menos 3 caracteres';
            }

            if ($nombre && !preg_match("/^[A-Za-z ']*$/", $nombre)) {
                $errores[] = 'El nombre de la persona debe contener únicamente letras';
            }

            if (empty($apellido)) {
                $errores[] = 'Debes ingresar el apellido de la persona';
            }

            if ($apellido && strlen($apellido) > 20) {
                $errores[] = 'El apellido de la persona debe contener menos de 20 caracteres';
            }

            if ($apellido && strlen($apellido) < 3) {
                $errores[] = 'El apellido de la persona debe contener al menos 3 caracteres';
            }

            if ($apellido && !preg_match("/^[A-Za-z ']*$/", $apellido)) {
                $errores[] = 'El apellido de la persona debe contener únicamente letras';
            }

            if (empty($email)) {
                $errores[] = 'Debes ingresar el e-mail de la persona';
            }

            if ($email && strlen($email) > 150) {
                $errores[] = 'El email de la persona debe contener menos de 150 caracteres';
            }

            if ($email && strlen($email) < 3) {
                $errores[] = 'El email de la persona debe contener al menos 3 caracteres';
            }

            if ($email && !preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $email)) {
                $errores[] = 'El email de la persona debe ser válido';
            }

            if (empty($imagenPersona)) {
            	$errores[] = 'Debes subir una foto ilustrativa de la persona';
            }

            if ($imagenPersona) {
            	$extension = pathinfo($imagenPersona, PATHINFO_EXTENSION);
            	$extensionesValidas = array('jpg', 'jpeg', 'png');

            	if (!in_array($extension, $extensionesValidas)) {
            		$errores[] = 'Extensión de imagen inválida';
            	}
            }

            if (empty($localidad)) {
                $errores[] = 'Debes ingresar la localidad de la persona';
            }

            if ($localidad && strlen($localidad) > 30) {
                $errores[] = 'La localidad de la persona debe contener menos de 30 caracteres';
            }


            if (count($errores) <= 0) {

                $datos = array(
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'cargo' => $cargo,
                    'email' => $email,
                    'localidad' => $localidad,
                );

                if (isset($imagenPersona) && !empty($imagenPersona)) {

                    $filename =  time() . '-' . $_FILES['file']['name'];
                    $manager = new ImageManager(array('driver' => 'gd'));

                    $img = $manager->make($_FILES['file']['tmp_name']);

                    $img->fit(850, 1100);
                    $img->save('assets/backend/images/personas/' . $filename);

                    $datos['foto'] = $filename;
                } else {
                    $datos['foto'] = null;
                }

                $registro = $this->autoridad->registrarAutoridad($datos);

                if (!$registro) {
                    $mensaje = array(
                        'success' => false,
                        'message' => 'No se ha podido registrar la persona, intente más tarde'
                    );
                } else {
                    $mensaje = array(
                        'success' => true,
                        'message' => 'Persona registrada con éxito'
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


        public function editarPersona($idPersona) {
            $errores = array();
            $mensaje = null;

            $nombre = trim($this->input->post('nombre'));
            $apellido = trim($this->input->post('apellido'));
            $email = trim($this->input->post('email'));
            $localidad = trim($this->input->post('localidad'));
            $cargo = $this->input->post('cargo');
            $imagenPersona = $_FILES['file']['name'];

            $verificarIdPersona = $this->autoridad->verificarIdPersona($idPersona);

            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
            }

            if (!isset($idPersona)) {
                $errores[] = 'El ID de la persona no existe';
            }

            if ($idPersona && !$verificarIdPersona) {
                $errores[] = 'El ID de la persona es inválido';
            }

            if (empty($nombre)) {
                $errores[] = 'Debes ingresar el nombre de la persona';
            }

            if ($nombre && strlen($nombre) > 20) {
                $errores[] = 'El nombre de la persona debe contener menos de 20 caracteres';
            }

            if ($nombre && strlen($nombre) < 3) {
                $errores[] = 'El nombre de la persona debe contener al menos 3 caracteres';
            }

            if ($nombre && !preg_match("/^[A-Za-z ']*$/", $nombre)) {
                $errores[] = 'El nombre de la persona debe contener únicamente letras';
            }

            if (empty($apellido)) {
                $errores[] = 'Debes ingresar el apellido de la persona';
            }

            if ($apellido && strlen($apellido) > 20) {
                $errores[] = 'El apellido de la persona debe contener menos de 20 caracteres';
            }

            if ($apellido && strlen($apellido) < 3) {
                $errores[] = 'El apellido de la persona debe contener al menos 3 caracteres';
            }

            if ($apellido && !preg_match("/^[A-Za-z ']*$/", $apellido)) {
                $errores[] = 'El apellido de la persona debe contener únicamente letras';
            }

            if (empty($email)) {
                $errores[] = 'Debes ingresar el email de la persona';
            }

            if ($email && strlen($email) > 150) {
                $errores[] = 'El email de la persona debe contener menos de 150 caracteres';
            }

            if ($email && strlen($email) < 3) {
                $errores[] = 'El email de la persona debe contener al menos 3 caracteres';
            }

            if ($email && !preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $email)) {
                $errores[] = 'El email de la persona debe ser válido';
            }

            if (empty($cargo)) {
                $errores[] = 'Debes seleccionar el cargo de la persona';
            }

            if ($imagenPersona) {
            	$extension = pathinfo($imagenPersona, PATHINFO_EXTENSION);
            	$extensionesValidas = array('jpg', 'jpeg', 'png');

            	if (!in_array($extension, $extensionesValidas)) {
            		$errores[] = 'Extensión de imagen inválida';
            	}
            }
            if (empty($localidad)) {
                $errores[] = 'Debes ingresar la localidad de la persona';
            }

            if ($localidad && strlen($localidad) > 30) {
                $errores[] = 'La localidad de la persona debe contener menos de 30 caracteres';
            }

            if (count($errores) <= 0) {

                $datos = array(
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'email' => $email,
                    'localidad' => $localidad,
                    'cargo' => $cargo
                );

                if (isset($imagenPersona) && !empty($imagenPersona)) {

                    $filename =  time() . '-' . $_FILES['file']['name'];
                    $manager = new ImageManager(array('driver' => 'gd'));

                    $img = $manager->make($_FILES['file']['tmp_name']);

                    $img->fit(850, 1100);
                    $img->save('assets/backend/images/personas/' . $filename);

                    $datos['foto'] = $filename;
                }

                $edicion = $this->autoridad->editarPersona($idPersona, $datos);

                if (!$edicion) {
                    $mensaje = array(
                        'success' => false,
                        'message' => 'No se ha podido editar esta persona, intente más tarde'
                    );
                } else {
                    $mensaje = array(
                        'success' => true,
                        'message' => 'Persona editada con éxito'
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

        public function eliminarPersona($idPersona) {
            $errores = array();
            $mensaje = null;

            $verificarIdPersona = $this->autoridad->verificarIdPersona($idPersona);

            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
            }

            if (!isset($idPersona)) {
                $errores[] = 'El ID de la persona no existe';
            }

            if ($idPersona && !$verificarIdPersona) {
                $errores[] = 'El ID de la persona es inválido';
            }

            if (count($errores) <= 0) {

                $eliminado = $this->autoridad->eliminarPersona($idPersona);

                if (!$eliminado) {
                    $mensaje = array(
                        'success' => false,
                        'message' => 'No se ha podido eliminar a esta persona'
                    );
                } else {
                    $mensaje = array(
                        'success' => true,
                        'message' => 'Persona eliminada con éxito'
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
