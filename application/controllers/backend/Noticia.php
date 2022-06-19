<?php

require 'vendor/autoload.php';

use Intervention\Image\ImageManager;

    Class Noticia extends CI_Controller {
    	public function __construct() {
    		parent::__construct();

    		if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                redirect(base_url() . 'login-administracion');
                die;
            }

            $this->load->model('backend/Noticias');
            //helpers
            $this->load->helper('text');
    	}

        public function listado() {

            $data['titulo'] = 'Noticias | Listado';
            $data['busqueda'] = array(
                'action' => 'listado-noticias'
            );

            $config["base_url"] = base_url() . 'listado-noticias';
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

            $filtros = $this->Noticias->listadoNoticias($parametros);
            $contador = count($filtros);

            $parametros['ps'] = $config['per_page'];
            $parametros['pl'] = $page;
            $resultado = $this->Noticias->listadoNoticias($parametros);

            $config['total_rows'] = $contador;

            $this->pagination->initialize($config);

            $data['pagination'] = $this->pagination->create_links();
            $data['resultado'] = $resultado;

            $archivosNoticias = [];

            foreach ($resultado as $documento) {
              $archivosNoticias[$documento->id_noticia] = $this->Noticias->archivosNoticias($documento->id_noticia);
            }

            $data['archivosNoticias'] = $archivosNoticias;


            $data['scripts'] = array('noticias.js');

    		$this->load->view('backend/layouts/header', $data);
    		$this->load->view('backend/noticias/listado', $data);
    		$this->load->view('backend/layouts/footer', $data);
    	}

    	public function registro() {

            $data['titulo'] = 'Noticias | Registro';

            $data['scripts'] = array('noticias.js');

    		$this->load->view('backend/layouts/header', $data);
    		$this->load->view('backend/noticias/registro', $data);
    		$this->load->view('backend/layouts/footer', $data);
    	}


      public function edicion($idNoticia) {

    		$data['titulo'] = 'Noticias | Edición';

    		$data['datosNoticia'] = $this->Noticias->verificarIdNoticia($idNoticia);

    		if (!$data['datosNoticia']) {
    			redirect(base_url() . 'listado-noticias');
    			die;
    		}

    		$data['archivosNoticias'] = $this->Noticias->archivosNoticias($idNoticia);

            $data['scripts'] = array('noticias.js');

    		$this->load->view('backend/layouts/header', $data);
    		$this->load->view('backend/noticias/edicion', $data);
    		$this->load->view('backend/layouts/footer', $data);
    	}

    	public function registrarNoticia() {
            $errores = array();
            $mensaje = null;

            $titulo = trim($this->input->post('titulo'));
            $subtitulo = trim($this->input->post('subtitulo'));
            $descripcion = trim($this->input->post('descripcion1'));
            $descripcion2 = trim($this->input->post('descripcion2'));
            $descripcion3 = trim($this->input->post('descripcion3'));
            $descripcion4 = trim($this->input->post('descripcion4'));
            $descripcion5 = trim($this->input->post('descripcion5'));
            $fecha = trim($this->input->post('fecha'));
            $archivo = $_FILES['archivo']['name'];
            $imagenNoticia1 = $_FILES['file1']['name'];
            $imagenNoticia2 = $_FILES['file2']['name'];
            $imagenNoticia3 = $_FILES['file3']['name'];
            $imagenNoticia4 = $_FILES['file4']['name'];
            $imagenNoticia5 = $_FILES['file5']['name'];


            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
            }

            if (empty($titulo)) {
                $errores[] = 'Debes ingresar el título del noticia';
            }

            if ($titulo && strlen($titulo) > 100) {
                $errores[] = 'El título del noticia debe contener menos de 100 caracteres';
            }

            if ($subtitulo && strlen($subtitulo) > 40) {
                $errores[] = 'El subtitulo del noticia debe contener menos de 40 caracteres';
            }

            if (empty($descripcion)) {
                $errores[] = 'Debes ingresar la descripción del noticia';
            }

            if (empty($fecha)) {
                $errores[] = 'Debes ingresar la fecha del noticia';
            }

            if ($archivo) {
            	$extension = pathinfo($archivo, PATHINFO_EXTENSION);
            	$extensionesValidas = array('pdf', 'doc', 'docx');

            	if (!in_array($extension, $extensionesValidas)) {
            		$errores[] = 'Extensión de archivo inválido';
            	}
            }

            if (empty($imagenNoticia1)) {
              $errores[] = 'Debes subir una foto ilustrativa de la noticia';
            }

            if ($imagenNoticia1) {
              $extension = pathinfo($imagenNoticia1, PATHINFO_EXTENSION);
              $extensionesValidas = array('jpg', 'jpeg', 'png');

              if (!in_array($extension, $extensionesValidas)) {
                $errores[] = 'Extensión de imagen inválida';
              }
            }

            if (count($errores) <= 0) {

                $datos = array(
                    'titulo' => $titulo,
                    'subtitulo' => $subtitulo,
                    'descripcion' => $descripcion,
                    'descripcion2' => $descripcion2,
                    'descripcion3' => $descripcion3,
                    'descripcion4' => $descripcion4,
                    'descripcion5' => $descripcion5,
                    'fecha_publicacion' => $fecha,
                    'slug_noticia' => $this->slugifyNoticia(0, $titulo)
                );

                if (isset($imagenNoticia1) && !empty($imagenNoticia1)) {
                      $filename =  time() . '-' . $_FILES['file1']['name'];
                      $manager = new ImageManager(array('driver' => 'gd'));
                      $img = $manager->make($_FILES['file1']['tmp_name']);
                      $img->fit(850, 1100);
                      $img->save('assets/backend/images/noticias/' . $filename);
                      $datos['foto'] = $filename;
                } else {
                    $datos['foto'] = null;
                }

                if (isset($imagenNoticia2) && !empty($imagenNoticia2)) {
                      $filename =  time() . '-' . $_FILES['file2']['name'];
                      $manager = new ImageManager(array('driver' => 'gd'));
                      $img = $manager->make($_FILES['file2']['tmp_name']);
                      $img->fit(850, 1100);
                      $img->save('assets/backend/images/noticias/' . $filename);
                      $datos['foto2'] = $filename;
                } else {
                    $datos['foto2'] = null;
                }

                if (isset($imagenNoticia3) && !empty($imagenNoticia3)) {

                      $filename =  time() . '-' . $_FILES['file3']['name'];
                      $manager = new ImageManager(array('driver' => 'gd'));
                      $img = $manager->make($_FILES['file3']['tmp_name']);
                      $img->fit(850, 1100);
                      $img->save('assets/backend/images/noticias/' . $filename);
                      $datos['foto3'] = $filename;
                } else {
                    $datos['foto3'] = null;
                }

                if (isset($imagenNoticia4) && !empty($imagenNoticia4)) {
                      $filename =  time() . '-' . $_FILES['file4']['name'];
                      $manager = new ImageManager(array('driver' => 'gd'));

                      $img = $manager->make($_FILES['file4']['tmp_name']);

                      $img->fit(850, 1100);
                      $img->save('assets/backend/images/noticias/' . $filename);
                      $datos['foto4'] = $filename;
                } else {
                    $datos['foto4'] = null;
                }

                if (isset($imagenNoticia5) && !empty($imagenNoticia5)) {

                      $filename =  time() . '-' . $_FILES['file5']['name'];
                      $manager = new ImageManager(array('driver' => 'gd'));

                      $img = $manager->make($_FILES['file5']['tmp_name']);

                      $img->fit(850, 1100);
                      $img->save('assets/backend/images/noticias/' . $filename);

                      $datos['foto5'] = $filename;
                } else {
                    $datos['foto5'] = null;
                }

                $idNoticia = $this->Noticias->registrarNoticia($datos);

                if (isset($archivo) && !empty($archivo)) {
                    $config['upload_path'] = 'assets/backend/images/noticias';
                    $config['allowed_types'] = 'pdf|doc|docx';

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('archivo')) {
                        $fileData = $this->upload->data();

                        $uploadData['file_name'] = $fileData['file_name'];

                        $archivosNoticias = array(
                            'id_noticia' => $idNoticia,
                            'archivo_noticia' => $uploadData['file_name']
                        );

                        $this->Noticias->registrarArchivosNoticia($archivosNoticias);
                    }
                }

                $mensaje = array(
                    'success' => true,
                    'message' => 'Noticia registrada con éxito'
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



        public function editarNoticia($idNoticia) {
            $errores = array();
            $mensaje = null;


            $titulo = trim($this->input->post('titulo'));
            $subtitulo = trim($this->input->post('subtitulo'));
            $descripcion = trim($this->input->post('descripcion1'));
            $descripcion2 = trim($this->input->post('descripcion2'));
            $descripcion3 = trim($this->input->post('descripcion3'));
            $descripcion4 = trim($this->input->post('descripcion4'));
            $descripcion5 = trim($this->input->post('descripcion5'));
            $fecha = trim($this->input->post('fecha'));
            $archivo = $_FILES['archivo']['name'];
            $imagenNoticia1 = $_FILES['file1']['name'];
            $imagenNoticia2 = $_FILES['file2']['name'];
            $imagenNoticia3 = $_FILES['file3']['name'];
            $imagenNoticia4 = $_FILES['file4']['name'];
            $imagenNoticia5 = $_FILES['file5']['name'];

            $verificarIdNoticia = $this->Noticias->verificarIdNoticia($idNoticia);

            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
            }

            if (!isset($idNoticia)) {
                $errores[] = 'El ID del noticia no existe';
            }

            if (empty($titulo)) {
                $errores[] = 'Debes ingresar el título del noticia';
            }

            if ($titulo && strlen($titulo) > 100) {
                $errores[] = 'El título del noticia debe contener menos de 100 caracteres';
            }

            if ($subtitulo && strlen($subtitulo) > 40) {
                $errores[] = 'El subtitulo del noticia debe contener menos de 40 caracteres';
            }

            if (empty($descripcion)) {
                $errores[] = 'Debes ingresar la descripción del noticia';
            }

            if (empty($fecha)) {
                $errores[] = 'Debes ingresar la fecha del noticia';
            }

            if ($archivo) {
            	$extension = pathinfo($archivo, PATHINFO_EXTENSION);
            	$extensionesValidas = array('pdf', 'doc', 'docx');

            	if (!in_array($extension, $extensionesValidas)) {
            		$errores[] = 'Extensión de archivo inválido';
            	}
            }

            if ($imagenNoticia1) {
              $extension = pathinfo($imagenNoticia1, PATHINFO_EXTENSION);
              $extensionesValidas = array('jpg', 'jpeg', 'png');

              if (!in_array($extension, $extensionesValidas)) {
                $errores[] = 'Extensión de imagen inválida';
              }
            }

            if (count($errores) <= 0) {

              $datos = array(
                  'titulo' => $titulo,
                  'subtitulo' => $subtitulo,
                  'descripcion' => $descripcion,
                  'descripcion2' => $descripcion2,
                  'descripcion3' => $descripcion3,
                  'descripcion4' => $descripcion4,
                  'descripcion5' => $descripcion5,
                  'fecha_publicacion' => $fecha,
                  'slug_noticia' => $this->slugifyNoticia($idNoticia, $titulo)
              );

                if (isset($imagenNoticia1) && !empty($imagenNoticia1)) {
                      $filename =  time() . '-' . $_FILES['file1']['name'];
                      $manager = new ImageManager(array('driver' => 'gd'));
                      $img = $manager->make($_FILES['file1']['tmp_name']);
                      $img->fit(850, 1100);
                      $img->save('assets/backend/images/noticias/' . $filename);
                      $datos['foto'] = $filename;
                } else {
                    $datos['foto'] = null;
                }

                if (isset($imagenNoticia2) && !empty($imagenNoticia2)) {
                      $filename =  time() . '-' . $_FILES['file2']['name'];
                      $manager = new ImageManager(array('driver' => 'gd'));
                      $img = $manager->make($_FILES['file2']['tmp_name']);
                      $img->fit(850, 1100);
                      $img->save('assets/backend/images/noticias/' . $filename);
                      $datos['foto2'] = $filename;
                } else {
                    $datos['foto2'] = null;
                }

                if (isset($imagenNoticia3) && !empty($imagenNoticia3)) {

                      $filename =  time() . '-' . $_FILES['file3']['name'];
                      $manager = new ImageManager(array('driver' => 'gd'));
                      $img = $manager->make($_FILES['file3']['tmp_name']);
                      $img->fit(850, 1100);
                      $img->save('assets/backend/images/noticias/' . $filename);
                      $datos['foto3'] = $filename;
                } else {
                    $datos['foto3'] = null;
                }

                if (isset($imagenNoticia4) && !empty($imagenNoticia4)) {
                      $filename =  time() . '-' . $_FILES['file4']['name'];
                      $manager = new ImageManager(array('driver' => 'gd'));

                      $img = $manager->make($_FILES['file4']['tmp_name']);

                      $img->fit(850, 1100);
                      $img->save('assets/backend/images/noticias/' . $filename);
                      $datos['foto4'] = $filename;
                } else {
                    $datos['foto4'] = null;
                }

                if (isset($imagenNoticia5) && !empty($imagenNoticia5)) {

                      $filename =  time() . '-' . $_FILES['file5']['name'];
                      $manager = new ImageManager(array('driver' => 'gd'));

                      $img = $manager->make($_FILES['file5']['tmp_name']);

                      $img->fit(850, 1100);
                      $img->save('assets/backend/images/noticias/' . $filename);

                      $datos['foto5'] = $filename;
                } else {
                    $datos['foto5'] = null;
                }

                $this->Noticias->editarNoticia($idNoticia, $datos);

                if (isset($archivo) && !empty($archivo)) {

                	$this->Noticias->eliminarArchivosNoticias($idNoticia);

                    $config['upload_path'] = 'assets/backend/images/noticias';
                    $config['allowed_types'] = 'pdf|doc|docx';

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('archivo')) {
                        $fileData = $this->upload->data();

                        $uploadData['file_name'] = $fileData['file_name'];

                        $archivosNoticias = array(
                            'id_noticia' => $idNoticia,
                            'archivo_noticia' => $uploadData['file_name']
                        );

                        $this->Noticias->registrarArchivosNoticia($archivosNoticias);
                    }
                }

                $mensaje = array(
                    'success' => true,
                    'message' => 'Noticia editado con éxito'
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

        public function eliminarNoticia($idNoticia) {
            $errores = array();
            $mensaje = null;

            $verificarIdNoticia = $this->Noticias->verificarIdNoticia($idNoticia);

            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
            }

            if (!isset($idNoticia)) {
                $errores[] = 'El ID del noticia no existe';
            }

            if ($idNoticia && !$verificarIdNoticia) {
                $errores[] = 'El ID del noticia es inválido';
            }

            if (count($errores) <= 0) {

                $eliminado = $this->Noticias->eliminarNoticia($idNoticia);

                if (!$eliminado) {
                    $mensaje = array(
                        'success' => false,
                        'message' => 'No se ha podido eliminar este noticia'
                    );
                } else {
                    $mensaje = array(
                        'success' => true,
                        'message' => 'Noticia eliminado con éxito'
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

        public function eliminarArchivoNoticia($idArchivoNoticia) {
        	$errores = array();
            $mensaje = null;

            if (!isset($this->session->userdata['administrador']['id_administrador'])) {
                $errores[] = 'Debes iniciar sesión para ejecutar esta acción';
            }

            if (!isset($idArchivoNoticia)) {
                $errores[] = 'El ID del archivo del noticia no existe';
            }

            if (count($errores) <= 0) {

                $eliminado = $this->Noticias->eliminarArchivoNoticia($idArchivoNoticia);

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

        public function slugifyNoticia($idNoticia, $tituloNoticia) {
            $contador = 0;
            $tituloNoticia = url_title(convert_accented_characters($tituloNoticia), 'dash', true);
            $slug = $tituloNoticia;

            if ($idNoticia == 0) {
                while (true) {
                    $verificarSlug = $this->Noticias->verificarSlug($slug);

                    if (count($verificarSlug) == 0) break;
                    $slug = $tituloNoticia . '-' . (++$contador);
                }
            } else {
                while (true) {
                    $verificarSlug = $this->Noticias->verificarSlugEdicion($idNoticia, $slug);

                    if (count($verificarSlug) == 0) break;
                    $slug = $tituloNoticia . '-' . (++$contador);
                }
            }

            return $slug;
      }
    }

?>
