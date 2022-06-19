//registro de personas
$(document).on('submit', '#formulario-registro-persona', function(event) {
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
			$('#btn-registro-persona').attr('disabled', true);
			$('#btn-registro-persona').text('Registrando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
		            title: 'Error',
		            text: resp.message,
		            type: 'error'
		        });

		        $('#btn-registro-persona').attr('disabled', false);
			    $('#btn-registro-persona').text('Registrar autoridad');
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

			$('#btn-registro-persona').attr('disabled', false);
			$('#btn-registro-persona').text('Registrar autoridad');
		}
	});
});

//edición de personas
$(document).on('submit', '#formulario-edicion-persona', function(event) {
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
			$('#btn-edicion-persona').attr('disabled', true);
			$('#btn-edicion-persona').text('Editando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
		            title: 'Error',
		            text: resp.message,
		            type: 'error'
		        });

		        $('#btn-edicion-persona').attr('disabled', false);
			    $('#btn-edicion-persona').text('Editar autoridad');
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

			$('#btn-edicion-persona').attr('disabled', false);
			$('#btn-edicion-persona').text('Editar autoridad');
		}
	});
});

//preview de imagen de la persona
$(document).on('change', '.input-imagen-persona', function() {
    var imagen = new FileReader();
    imagen.readAsDataURL(this.files[0]);
    imagen.onload = function(e) {
        $('.uploadpreview-persona').css('background-image', 'url(' + e.target.result + ')' );
    }
});

//eliminar persona
$(document).on('click', '.btn-eliminar-persona', function(event) {
	event.preventDefault();

    var idPersona = $(this).attr('data-id-persona');
    var action = base_url + 'backend/autoridades/eliminarPersona/' + idPersona;
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
			$('.btn-eliminar-persona').attr('disabled', true);
			$('.btn-eliminar-persona').text('Eliminando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
	               title: 'Error',
	               text: resp.message,
	               type: 'error'
	            });

	            $('.btn-eliminar-persona').attr('disabled', false);
			    $('.btn-eliminar-persona').text('Eliminar');
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
            $('.btn-eliminar-persona').attr('disabled', false);
			$('.btn-eliminar-persona').text('Eliminar');
		}
	});
});
