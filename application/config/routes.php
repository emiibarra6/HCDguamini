<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'frontend/pagina';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//rutas del backend

$route['registro-documento'] = 'backend/documento/registro';
$route['listado-documentos'] = 'backend/documento/listado';
$route['listado-documentos/(:num)'] = 'backend/documento/listado/$1';
$route['edicion-documento/(:num)'] = 'backend/documento/edicion/$1';

$route['registro-noticia'] = 'backend/noticia/registro';
$route['listado-noticias'] = 'backend/noticia/listado';
$route['listado-noticias/(:num)'] = 'backend/noticia/listado/$1';
$route['edicion-noticia/(:num)'] = 'backend/noticia/edicion/$1';

$route['registro-persona'] = 'backend/persona/registro';
$route['listado-personas'] = 'backend/persona/listado';
$route['listado-personas/(:num)'] = 'backend/persona/listado/$1';
$route['edicion-persona/(:num)'] = 'backend/persona/edicion/$1';

$route['registro-autoridades'] = 'backend/autoridades/registro';
$route['listado-autoridades'] = 'backend/autoridades/listado';
$route['listado-autoridades/(:num)'] = 'backend/autoridades/listado/$1';
$route['edicion-autoridades/(:num)'] = 'backend/autoridades/edicion/$1';

$route['listado-bloques'] = 'backend/bloque/listado';
$route['listado-bloques/(:num)'] = 'backend/bloque/listado/$1';
$route['registro-bloque'] = 'backend/bloque/registro';
$route['edicion-bloque/(:num)'] = 'backend/bloque/edicion/$1';

$route['listado-cargos'] = 'backend/cargo/listado';
$route['listado-cargos/(:num)'] = 'backend/cargo/listado/$1';
$route['registro-cargo'] = 'backend/cargo/registro';
$route['edicion-cargo/(:num)'] = 'backend/cargo/edicion/$1';

$route['listado-tipos-documentos'] = 'backend/tipoDocumento/listado';
$route['listado-tipos-documentos/(:num)'] = 'backend/tipoDocumento/listado/$1';
$route['registro-tipo-documento'] = 'backend/tipoDocumento/registro';
$route['edicion-tipo-documento/(:num)'] = 'backend/tipoDocumento/edicion/$1';

$route['login-administracion'] = 'backend/administrador/login';
$route['listado-administradores'] = 'backend/administrador/listado';
$route['listado-administradores/(:num)'] = 'backend/administrador/listado/$1';
$route['registro-administrador'] = 'backend/administrador/registro';
$route['perfil-administrador'] = 'backend/administrador/perfil';

//rutas del frontend
$route['autoridades'] = 'frontend/pagina/autoridades';
$route['comisiones'] = 'frontend/pagina/comisiones';
$route['contacto'] = 'frontend/pagina/contacto';
$route['institucional'] = 'frontend/pagina/institucional';
$route['salamone'] = 'frontend/pagina/salamone';
$route['bloque/(:any)'] = 'frontend/pagina/bloque/$1';
$route['documentos'] = 'frontend/pagina/documentos';
$route['documentos/(:num)'] = 'frontend/pagina/documentos/$1';
$route['documento/(:any)'] = 'frontend/pagina/documento/$1';
$route['noticias'] = 'frontend/pagina/noticias';
$route['noticias/(:num)'] = 'frontend/pagina/noticias/$1';
$route['noticia/(:any)'] = 'frontend/pagina/noticia/$1';
$route['ordenes-del-dia'] = 'frontend/pagina/ordenesDia';
$route['ordenes-del-dia/(:num)'] = 'frontend/pagina/ordenesDia/$1';
