<?php
    Class Administrador extends CI_Controller {
    	public function __construct() {
    		parent::__construct();

    		//modelos
    		$this->load->model('backend/administradores');
    	}

    	public function login() {

            if (isset($this->session->userdata['administrador']['id_administrador'])) {
                redirect(base_url() . 'listado-documentos');
                die;
            }

    		$this->load->view('backend/administradores/login');
    	}

    	public function listado() {

    		if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                redirect(base_url() . 'login-administracion');
                die;
            }

            $data['titulo'] = 'Administradores | Listado';
            $data['busqueda'] = array(
                'action' => 'listado-administradores'
            );

            $config["base_url"] = base_url() . 'listado-administradores';
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

            $filtros = $this->administradores->listadoAdministradores($parametros);
            $contador = count($filtros);

            $parametros['ps'] = $config['per_page'];
            $parametros['pl'] = $page;
            $resultado = $this->administradores->listadoAdministradores($parametros);

            $config['total_rows'] = $contador;

            $this->pagination->initialize($config);

            $data['pagination'] = $this->pagination->create_links();
            $data['resultado'] = $resultado;


            $data['scripts'] = array(
                'administradores.js'
            );

    		$this->load->view('backend/layouts/header', $data);
    		$this->load->view('backend/administradores/listado', $data);
    		$this->load->view('backend/layouts/footer', $data);
    	}

    	public function registro() {

    		if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                redirect(base_url() . 'login-administracion');
                die;
            }

            $data['titulo'] = 'Administradores | Registro';

            $data['scripts'] = array('administradores.js');

    		$this->load->view('backend/layouts/header', $data);
    		$this->load->view('backend/administradores/registro');
    		$this->load->view('backend/layouts/footer', $data);
    	}

    	public function perfil() {

            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                redirect(base_url() . 'login-administracion');
                die;
            }

            $data['titulo'] = 'Administradores | Perfil';

            $data['scripts'] = array('administradores.js');

    		$this->load->view('backend/layouts/header', $data);
    		$this->load->view('backend/administradores/perfil');
    		$this->load->view('backend/layouts/footer', $data);
    	}

    	public function loginAdministrador() {
            $errores = array();
            $mensaje = null;

            $email = trim($this->input->post('email'));

            $clave = trim($this->input->post('clave'));
            $claveEncriptada = crypt($clave, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $verificarDatos = $this->administradores->loginAdministrador($email, $claveEncriptada);

            if (empty($email)) {
                $errores[] = 'Debes ingresar tu e-mail';
            }

            if (empty($clave)) {
                $errores[] = 'Debes ingresar tu contraseña';
            }

            if (!$verificarDatos) {
                $errores[] = 'Datos incorrectos, intente nuevamente';
            }

            if (count($errores) <= 0) {

                $datos['administrador'] = array(
                    'id_administrador' => $verificarDatos->id_administrador,
                    'nombre' => $verificarDatos->nombre,
                    'apellido' => $verificarDatos->apellido
                );

                $this->session->set_userdata($datos);

                $mensaje = array(
                    'success' => true
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

    	public function registrarAdministrador() {
            $errores = array();
            $mensaje = null;

            $nombre = trim($this->input->post('nombre'));
            $apellido = trim($this->input->post('apellido'));
            $email = trim($this->input->post('email'));
            $clave = trim($this->input->post('clave'));
            $repetirClave = trim($this->input->post('repetirClave'));

            $verificarEmail = $this->administradores->verificarEmail($email);

            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
            }

            if (empty($nombre)) {
                $errores[] = 'Debes ingresar el nombre del administrador';
            }

            if ($nombre && strlen($nombre) > 20) {
                $errores[] = 'El nombre del administrador debe contener menos de 20 caracteres';
            }

            if ($nombre && strlen($nombre) < 3) {
                $errores[] = 'El nombre del administrador debe contener al menos 3 caracteres';
            }

            if ($nombre && !preg_match("/^[A-Za-z ']*$/", $nombre)) {
                $errores[] = 'El nombre del administrador debe contener únicamente letras';
            }

            if (empty($apellido)) {
                $errores[] = 'Debes ingresar el apellido del administrador';
            }

            if ($apellido && strlen($apellido) > 20) {
                $errores[] = 'El apellido del administrador debe contener menos de 20 caracteres';
            }

            if ($apellido && strlen($apellido) < 3) {
                $errores[] = 'El apellido del administrador debe contener al menos 3 caracteres';
            }

            if ($apellido && !preg_match("/^[A-Za-z ']*$/", $apellido)) {
                $errores[] = 'El apellido del administrador debe contener únicamente letras';
            }

            if (empty($email)) {
                $errores[] = 'Debes ingresar el e-mail del administrador';
            }

            if ($email && strlen($email) > 40) {
                $errores[] = 'El e-mail del administrador debe contener menos de 40 caracteres';
            }

            if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errores[] = 'El e-mail introducido es inválido';
            }

            if ($email && $verificarEmail) {
                $errores[] = 'Ya existe administrador registrado con dicho e-mail';
            }

            if (empty($clave)) {
                $errores[] = 'Debes ingresar la clave del administrador';
            }

            if ($clave && strlen($clave) < 5) {
                $errores[] = 'La clave del administrador debe contener al menos 5 caracteres';
            }

            if (empty($repetirClave)) {
                $errores[] = 'Debes repetir la clave del administrador';
            }

            if ($clave != $repetirClave) {
                $errores[] = 'Las claves ingresadas no coinciden';
            }

            if (count($errores) <= 0) {

                $datos = array(
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'email' => $email,
                    'clave' => crypt($clave, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'),
                    'fecha_registro' => date('Y-m-d')
                );

                $registro = $this->administradores->registrarAdministrador($datos);

                if (!$registro) {
                    $mensaje = array(
                        'success' => false,
                        'message' => 'No se ha podido registrar al administrador, intente más tarde'
                    );
                } else {
                    $mensaje = array(
                        'success' => true,
                        'message' => 'Administrador registrado con éxito'
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

        public function actualizarPerfil() {
            $errores = array();
            $mensaje = null;

            $claveActual = trim($this->input->post('claveActual'));
            $claveActualEncriptada = crypt($claveActual, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $claveNueva = trim($this->input->post('claveNueva'));

            $idAdministrador = $this->session->userdata['administrador']['id_administrador'];

            $verificarClaveActual = $this->administradores->verificarClaveActual($idAdministrador, $claveActualEncriptada);

            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                $errores[] = 'Debes iniciar sesión para cambiar tu contraseña';
            }

            if (empty($claveActual)) {
                $errores[] = 'Debes ingresar tu clave actual';
            }

            if (empty($claveNueva)) {
                $errores[] = 'Debes ingresar tu clave nueva';
            }

            if ($claveActual && !$verificarClaveActual) {
                $errores[] = 'La clave actual es inválida';
            }

            if (count($errores) <= 0) {

                $claveNuevaEncriptada = crypt($claveNueva, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $editado = $this->administradores->editarClave($idAdministrador, $claveNuevaEncriptada);

                if (!$editado) {
                    $mensaje = array(
                        'success' => false,
                        'message' => 'No se ha podido actualizar tu clave, intente más tarde'
                    );
                } else {
                    $mensaje = array(
                        'success' => true,
                        'message' => 'Clave editada con éxito'
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

        public function eliminarAdministrador($idAdministrador) {
            $errores = array();
            $mensaje = null;

            $verificarIdAdministrador = $this->administradores->verificarIdAdministrador($idAdministrador);

            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
            }

            if (!isset($idAdministrador)) {
                $errores[] = 'El ID de administrador no existe';
            }

            if ($idAdministrador && !$verificarIdAdministrador) {
                $errores[] = 'El ID del administrador es inválido';
            }

            if ($idAdministrador == $this->session->userdata['administrador']['id_administrador']) {
                $errores[] = 'No puedes eliminarte a ti mismo';
            }

            if (count($errores) <= 0) {

                $eliminado = $this->administradores->eliminarAdministrador($idAdministrador);

                if (!$eliminado) {
                    $mensaje = array(
                        'success' => false,
                        'message' => 'No se ha podido eliminar a este administrador'
                    );
                } else {
                    $mensaje = array(
                        'success' => true,
                        'message' => 'Administrador eliminado con éxito'
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

        public function cerrarSesion() {
            $this->session->sess_destroy();

            redirect(base_url() . 'login-administracion');
            die();
        }
    }

?>
