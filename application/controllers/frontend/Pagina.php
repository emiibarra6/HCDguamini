<?php

    Class Pagina extends CI_Controller {

      public function __construct() {
          parent::__construct();

          //modelos
          $this->load->model('frontend/bloques');
          $this->load->model('frontend/documentos');
          $this->load->model('frontend/personas');
          $this->load->model('frontend/tiposDocumentos');
          $this->load->model('frontend/autoridad');
          $this->load->model('frontend/Noticias');
          //librerías
          $this->load->library('phpmailer_lib');
    	}

    	public function index() {

          //nombres de bloques para mostrar en el menú
          $data['listadoBloques'] = $this->bloques->listadoBloques();

          foreach ($data['listadoBloques'] as $bloque) {
              $bloque->cantidadConcejales = count($this->personas->cantidadConcejales($bloque->id_bloque_politico));
          }

          //últimos 3 documentos (sesion del dia que es otro tipo de documentos)
          $data['ultimosDocumentosSesionDeldia'] = $this->documentos->ultimosDocumentosSesionDeldia();

          //tipos de documentos
          $data['tiposDocumentos'] = $this->tiposDocumentos->tiposDocumentos();

          //concejales
          $data['concejales'] = $this->personas->traeConcejales();

          $data['menu'] = 'Inicio';

          $data['noticias'] = $this->Noticias->traeUltimasNoticias();

      		$this->load->view('frontend/layouts/header');
      		$this->load->view('frontend/layouts/menu', $data);
    			$this->load->view('frontend/paginas/inicio', $data);
    			$this->load->view('frontend/layouts/footer');
    	}

        public function ordenesDia() {
          //nombres de bloques para mostrar en el menú
          $data['listadoBloques'] = $this->bloques->listadoBloques();

          $config["base_url"] = base_url() . 'ordenes-del-dia';
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

          $parametros = [];

          $filtros = $this->documentos->ordenesDia($parametros);
          $contador = count($filtros);

          $parametros['ps'] = $config['per_page'];
          $parametros['pl'] = $page;
          $resultado = $this->documentos->ordenesDia($parametros);

          $config['total_rows'] = $contador;

          $this->pagination->initialize($config);

          $data['pagination'] = $this->pagination->create_links();

          $data['ordenesDia'] = $resultado;

          $data['menu'] = 'Ordenes del día';

          $this->load->view('frontend/layouts/header');
          $this->load->view('frontend/layouts/menu', $data);
          $this->load->view('frontend/paginas/ordenes-dia', $data);
          $this->load->view('frontend/layouts/footer');
      }

       public function contacto() {

          //nombres de bloques para mostrar en el menú
          $data['listadoBloques'] = $this->bloques->listadoBloques();

          $data['menu'] = 'Contacto';

          $data['scripts'] = array('contacto.js');

      		$this->load->view('frontend/layouts/header');
      		$this->load->view('frontend/layouts/menu', $data);
  			  $this->load->view('frontend/paginas/contacto');
  			  $this->load->view('frontend/layouts/footer', $data);
    	}

      public function autoridades() {
          //nombres de bloques para mostrar en el menú
          $data['listadoBloques'] = $this->bloques->listadoBloques();

          $data['listadoAutoridades'] = $this->autoridad->listadoAutoridad();

          $data['menu'] = 'Autoridades';

          $this->load->view('frontend/layouts/header');
      		$this->load->view('frontend/layouts/menu', $data);
    			$this->load->view('frontend/paginas/autoridades' , $data);
    			$this->load->view('frontend/layouts/footer');
    	}

      public function comisiones() {
          //nombres de bloques para mostrar en el menú
          $data['listadoBloques'] = $this->bloques->listadoBloques();

          //$data['listadoAutoridades'] = $this->autoridad->listadoAutoridad();

          $data['menu'] = 'Comisiones internas HCD';

          $this->load->view('frontend/layouts/header');
          $this->load->view('frontend/layouts/menu', $data);
          $this->load->view('frontend/paginas/comisiones');
          $this->load->view('frontend/layouts/footer');
      }

      public function institucional() {

          //nombres de bloques para mostrar en el menú
          $data['listadoBloques'] = $this->bloques->listadoBloques();

          $data['menu'] = 'Institucional';

          $this->load->view('frontend/layouts/header');
      		$this->load->view('frontend/layouts/menu', $data);
    			$this->load->view('frontend/paginas/institucional');
    			$this->load->view('frontend/layouts/footer');
    	}

      public function salamone() {

          //nombres de bloques para mostrar en el menú
          $data['listadoBloques'] = $this->bloques->listadoBloques();

          $data['menu'] = 'Salamone';

          $this->load->view('frontend/layouts/header');
      		$this->load->view('frontend/layouts/menu', $data);
    			$this->load->view('frontend/paginas/salamone');
    			$this->load->view('frontend/layouts/footer');
    	}

      public function bloque($slugBloque) {
          $data['datosBloque'] = $this->bloques->datosBloque($slugBloque);

          if (!$data['datosBloque']) {
              redirect(base_url());
              die;
          }

          $data['datosPersona'] = $this->bloques->datosPersona($data['datosBloque']->id_bloque_politico);

          if (!$data['datosPersona']) {
              redirect(base_url());
              die;
          }

          //nombres de bloques para mostrar en el menú
          $data['listadoBloques'] = $this->bloques->listadoBloques();

          //equipo del bloque político
          $data['equipoBloque'] = $this->bloques->equipoBloque($data['datosBloque']->id_bloque_politico, $data['datosPersona']->id_persona);

          $this->load->view('frontend/layouts/header');
          $this->load->view('frontend/layouts/menu', $data);
          $this->load->view('frontend/paginas/bloque', $data);
          $this->load->view('frontend/layouts/footer');
      }

      public function documentos() {
          //nombres de bloques para mostrar en el menú
          $data['listadoBloques'] = $this->bloques->listadoBloques();

          $config["base_url"] = base_url() . 'documentos';
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

          $parametros = [];

          if (isset($_GET['tipo_documento']) && $_GET['tipo_documento'] != '') {
              $parametros['tipo_documento'] = $_GET['tipo_documento'];
          }

          if (isset($_GET['nro_documento']) && $_GET['nro_documento'] != '') {
              $parametros['nro_documento'] = $_GET['nro_documento'];
          }

          if (isset($_GET['src']) && $_GET['src'] != '') {
              $parametros['src'] = $_GET['src'];
          }

          if (isset($_GET['f_desde']) && $_GET['f_desde'] != '') {
              $parametros['f_desde'] = $_GET['f_desde'];
          }

          if (isset($_GET['f_hasta']) && $_GET['f_hasta'] != '') {
              $parametros['f_hasta'] = $_GET['f_hasta'];
          }

          $filtros = $this->documentos->listadoDocumentos($parametros);
          $contador = count($filtros);

          $parametros['ps'] = $config['per_page'];
          $parametros['pl'] = $page;
          $resultado = $this->documentos->listadoDocumentos($parametros);

          $config['total_rows'] = $contador;

          $this->pagination->initialize($config);

          $data['pagination'] = $this->pagination->create_links();

          $data['listadoDocumentos'] = $resultado;

          $data['menu'] = 'Documentos';

          $this->load->view('frontend/layouts/header');
          $this->load->view('frontend/layouts/menu', $data);
          $this->load->view('frontend/paginas/documentos', $data);
          $this->load->view('frontend/layouts/footer');
      }

      public function documento($slugDocumento) {

          $data['datosDocumento'] = $this->documentos->datosDocumento($slugDocumento);

          if (!$data['datosDocumento']) {
              redirect(base_url());
              die;
          }

          //archivos del documento
          $data['archivosDocumento'] = $this->documentos->archivosDocumento($data['datosDocumento']->id_documento);

          //documentos relacionados
          //$data['documentosRelacionados'] = $this->documentos->documentosRelacionados($data['datosDocumento']->id_documento, $data['datosDocumento']->id_tipo_documento);

          //nombres de bloques para mostrar en el menú
          $data['listadoBloques'] = $this->bloques->listadoBloques();

          $this->load->view('frontend/layouts/header');
          $this->load->view('frontend/layouts/menu', $data);
          $this->load->view('frontend/paginas/documento', $data);
          $this->load->view('frontend/layouts/footer');
      }

      public function noticias() {
          //nombres de bloques para mostrar en el menú
          $data['listadoBloques'] = $this->bloques->listadoBloques();

          $config["base_url"] = base_url() . 'noticias';
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

          $parametros = [];

          if (isset($_GET['tipo_documento']) && $_GET['tipo_documento'] != '') {
              $parametros['tipo_documento'] = $_GET['tipo_documento'];
          }

          if (isset($_GET['nro_documento']) && $_GET['nro_documento'] != '') {
              $parametros['nro_documento'] = $_GET['nro_documento'];
          }

          if (isset($_GET['src']) && $_GET['src'] != '') {
              $parametros['src'] = $_GET['src'];
          }

          if (isset($_GET['f_desde']) && $_GET['f_desde'] != '') {
              $parametros['f_desde'] = $_GET['f_desde'];
          }

          if (isset($_GET['f_hasta']) && $_GET['f_hasta'] != '') {
              $parametros['f_hasta'] = $_GET['f_hasta'];
          }

          $filtros = $this->Noticias->listadoNoticias($parametros);
          $contador = count($filtros);

          $parametros['ps'] = $config['per_page'];
          $parametros['pl'] = $page;
          $resultado = $this->Noticias->listadoNoticias($parametros);

          $config['total_rows'] = $contador;

          $this->pagination->initialize($config);

          $data['pagination'] = $this->pagination->create_links();

          $data['listadoNoticias'] = $resultado;

          $data['menu'] = 'Noticias';

          $this->load->view('frontend/layouts/header');
          $this->load->view('frontend/layouts/menu', $data);
          $this->load->view('frontend/paginas/noticias', $data);
          $this->load->view('frontend/layouts/footer');
      }

      public function noticia($slugNoticia) {

          $data['datosNoticia'] = $this->Noticias->datosNoticia($slugNoticia);

          if (!$data['datosNoticia']) {
              redirect(base_url());
              die;
          }

          //archivos del documento
          $data['archivosNoticia'] = $this->Noticias->archivosNoticia($data['datosNoticia']->id_noticia);

          //documentos relacionados
          //$data['documentosRelacionados'] = $this->documentos->documentosRelacionados($data['datosDocumento']->id_documento, $data['datosDocumento']->id_tipo_documento);

          //nombres de bloques para mostrar en el menú
          $data['listadoBloques'] = $this->bloques->listadoBloques();
          $data['metaNoticia'] = $this->Noticias->datosNoticia($slugNoticia);

          $this->load->view('frontend/layouts/header', $data);
          $this->load->view('frontend/layouts/menu', $data);
          $this->load->view('frontend/paginas/noticia', $data);
          $this->load->view('frontend/layouts/footer');
      }


      public function enviarConsulta() {
          $errores = array();
          $mensaje = null;

          $nombre = trim($this->input->post('nombre'));
          $email = trim($this->input->post('email'));
          $telefono = trim($this->input->post('telefono'));
          $consulta = trim($this->input->post('consulta'));

          if (empty($nombre)) {
              $errores[] = 'Debes ingresar tu nombre';
          }

          if ($nombre && strlen($nombre) < 3) {
              $errores[] = 'El nombre debe contener al menos 3 caracteres';
          }

          if ($nombre && strlen($nombre) > 30) {
              $errores[] = 'El nombre debe contener menos de 30 caracteres';
          }

          if (empty($email)) {
              $errores[] = 'Debes ingresar tu e-mail';
          }

          if ($email && strlen($email) > 40) {
              $errores[] = 'El e-mail introducido debe contener menos de 40 caracteres';
          }

          if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $errores[] = 'El e-mail introducido es inválido';
          }

          if (empty($telefono)) {
              $errores[] = 'Debes ingresar tu número de teléfono';
          }

          if ($telefono && !ctype_digit($telefono)) {
              $errores[] = 'El número de teléfono debe contener únicamente dígitos numéricos';
          }

          if ($telefono && (strlen($telefono) < 6 || strlen($telefono) > 18)) {
              $errores[] = 'El número de teléfono debe contener entre 6 y 18 dígitos numéricos';
          }

          if (empty($consulta)) {
              $errores[] = 'Debes ingresar tu consulta';
          }

          if (count($errores) <= 0) {

              $mail = $this->phpmailer_lib->load();

              $mail->isSMTP();

              $mail->Host = 'c2370042.ferozo.com';

              $mail->SMTPAuth = true;

              $mail->Username = 'contacto@hcdguamini.com';
              $mail->Password = '2/*nQaO3aU';

              $mail->Port = 465;
              $mail->SMTPSecure = 'ssl';

              $mail->From = $email;
              $mail->FromName = $nombre;

              $mail->smtpConnect(
                  array(
                      "ssl" => array(
                          "verify_peer" => false,
                          "verify_peer_name" => false,
                          "allow_self_signed" => true
                      )
                  )
              );

              $mail->addAddress('secretaria@hcdguamini.com');

              $mail->isHTML(true);

              $datos = '<h3>Contacto desde la web</h3>';
              $datos .= '<b>Nombre: </b>' . $nombre . '<br>';
              $datos .= '<b>E-mail: </b>' . $email . '<br>';
              $datos .= '<b>Teléfono: </b>' . $telefono . '<br>';
              $datos .= '<b>Consulta: </b><br>';
              $datos .= '<p>'.$consulta.'</p>';

              $mail->Subject = 'Contacto desde la web';
              $mail->Body = $datos;

              if (!$mail->send()) {
                  $mensaje = array(
                      'success' => false,
                      'message' => 'Ha ocurrido un error en nuestro sistema, intente más tarde'
                  );
              } else {
                  $mensaje = array(
                      'success' => true,
                      'message' => 'Su consulta se ha enviado correctamente, nos pondremos en contacto a la brevedad'
                  );
              }

          } else {
              foreach (array_reverse($errores) as $error) {
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
