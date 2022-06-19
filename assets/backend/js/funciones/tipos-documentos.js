//registro de tipos de documentos
$(document).on('submit', '#formulario-registro-tipo-documento', function(event) {
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
			$('#btn-registro-tipo-documento').attr('disabled', true);
			$('#btn-registro-tipo-documento').text('Registrando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
		            title: 'Error', 
		            text: resp.message, 
		            type: 'error'
		        });

		        $('#btn-registro-tipo-documento').attr('disabled', false);
			    $('#btn-registro-tipo-documento').text('Registrar tipo de documento');
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

			$('#btn-registro-tipo-documento').attr('disabled', false);
			$('#btn-registro-tipo-documento').text('Registrar tipo de documento');
		}
	});
});

//edición de tipos de documentos
$(document).on('submit', '#formulario-edicion-tipo-documento', function(event) {
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
			$('#btn-edicion-tipo-documento').attr('disabled', true);
			$('#btn-edicion-tipo-documento').text('Editando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
		            title: 'Error', 
		            text: resp.message, 
		            type: 'error'
		        });

		        $('#btn-edicion-tipo-documento').attr('disabled', false);
			    $('#btn-edicion-tipo-documento').text('Editar tipo de documento');
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

			$('#btn-edicion-tipo-documento').attr('disabled', false);
			$('#btn-edicion-tipo-documento').text('Editar tipo de documento');
		}
	});
});

//eliminar tipo de documento
$(document).on('click', '.btn-eliminar-tipo-documento', function(event) {
	event.preventDefault();

    var idTipoDocumento = $(this).attr('data-id-tipo-documento');
    var action = base_url + 'backend/tipoDocumento/eliminarTipoDocumento/' + idTipoDocumento;
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
			$('.btn-eliminar-tipo-documento').attr('disabled', true);
			$('.btn-eliminar-tipo-documento').text('Eliminando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
	               title: 'Error', 
	               text: resp.message, 
	               type: 'error'
	            });

	            $('.btn-eliminar-tipo-documento').attr('disabled', false);
			    $('.btn-eliminar-tipo-documento').text('Eliminar');
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
            $('.btn-eliminar-tipo-documento').attr('disabled', false);
			$('.btn-eliminar-tipo-documento').text('Eliminar');
		}
	});
});