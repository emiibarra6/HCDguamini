//login de administradores
$(document).on('submit', '#formulario-login-administrador', function(event) {
	event.preventDefault();

	var action = $(this).attr('action');
	var method = $(this).attr('method');
	var data = new FormData(this);

	$.ajax({
		url: action,
		type: method,
		data: data,
		dataType: 'json',
		cache: false,
		contentType: false,
		processData: false,
		beforeSend: function() {
			$('#btn-login-administrador').attr('disabled', true);
			$('#btn-login-administrador').text('Verificando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
	               title: 'Error', 
	               text: resp.message, 
	               type: 'error'
	            });

	            $('#btn-login-administrador').attr('disabled', false);
			    $('#btn-login-administrador').text('Ingresar');
			} else {
                window.location.href = base_url + 'listado-documentos';
			}
		},
		error: function(xhr) {
			swal({
               title: 'Error', 
               text: xhr.responseText, 
               type: 'error'
            });
            $('#btn-login-administrador').attr('disabled', false);
			$('#btn-login-administrador').text('Ingresar');
		}
	});
});

//registro de administradores
$(document).on('submit', '#formulario-registro-administrador', function(event) {
    event.preventDefault();

    var action = $(this).attr('action');
    var method = $(this).attr('method');
    var data = new FormData(this);

    $.ajax({
		url: action,
		type: method,
		data: data,
		dataType: 'json',
		cache: false,
		contentType: false,
		processData: false,
		beforeSend: function() {
			$('#btn-registro-administrador').attr('disabled', true);
			$('#btn-registro-administrador').text('Registrando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
		            title: 'Error', 
		            text: resp.message, 
		            type: 'error'
		        });

		        $('#btn-registro-administrador').attr('disabled', false);
			    $('#btn-registro-administrador').text('Registrar administrador');
			} else {
				swal({
		            title: 'Mensaje', 
		            text: resp.message, 
		            type: 'success'
		        }).then(function() {
		        	location.reload();
		        });
			}
		},
		error: function(xhr) {
            swal({
	            title: 'Error', 
	            text: xhr.responseText, 
	            type: 'error'
	        });

			$('#btn-registro-administrador').attr('disabled', false);
			$('#btn-registro-administrador').text('Registrar administrador');
		}
	});
});

//perfil del administrador
$(document).on('submit', '#formulario-actualizar-perfil', function(event) {
    event.preventDefault();

    var action = $(this).attr('action');
	var method = $(this).attr('method');
	var data = new FormData(this);

	$.ajax({
		url: action,
		type: method,
		data: data,
		dataType: 'json',
		cache: false,
		contentType: false,
		processData: false,
		beforeSend: function() {
			$('#btn-actualizar-perfil').attr('disabled', true);
			$('#btn-actualizar-perfil').text('Editando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
	               title: 'Error', 
	               text: resp.message, 
	               type: 'error'
	            });

	            $('#btn-actualizar-perfil').attr('disabled', false);
			    $('#btn-actualizar-perfil').text('Editar clave');
			} else {
                swal({
	               title: 'Mensaje', 
	               text: resp.message, 
	               type: 'success'
	            }).then(function() {
	            	location.reload();
	            });
			}
		},
		error: function(xhr) {
			swal({
               title: 'Error', 
               text: xhr.responseText, 
               type: 'error'
            });
            $('#btn-actualizar-perfil').attr('disabled', false);
			$('#btn-actualizar-perfil').text('Editar clave');
		}
	});
});

//eliminar administrador
$(document).on('click', '.btn-eliminar-administrador', function(event) {
	event.preventDefault();

    var idAdministrador = $(this).attr('data');
    var action = base_url + 'backend/administrador/eliminarAdministrador/' + idAdministrador;
    var method = 'post';
    var data = null;

    $.ajax({
		url: action,
		type: method,
		data: data,
		dataType: 'json',
		cache: false,
		contentType: false,
		processData: false,
		beforeSend: function() {
			$('.btn-eliminar-administrador').attr('disabled', true);
			$('.btn-eliminar-administrador').text('Eliminando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
	               title: 'Error', 
	               text: resp.message, 
	               type: 'error'
	            });

	            $('.btn-eliminar-administrador').attr('disabled', false);
			    $('.btn-eliminar-administrador').text('Eliminar');
			} else {
                swal({
	               title: 'Mensaje', 
	               text: resp.message, 
	               type: 'success'
	            }).then(function() {
	            	location.reload();
	            });
			}
		},
		error: function(xhr) {
			swal({
               title: 'Error', 
               text: xhr.responseText, 
               type: 'error'
            });
            $('.btn-eliminar-administrador').attr('disabled', false);
			$('.btn-eliminar-administrador').text('Eliminar');
		}
	});
});