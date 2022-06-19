//registro de bloques políticos
$(document).on('submit', '#formulario-registro-bloque', function(event) {
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
			$('#btn-registro-bloque').attr('disabled', true);
			$('#btn-registro-bloque').text('Registrando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
		            title: 'Error', 
		            text: resp.message, 
		            type: 'error'
		        });

		        $('#btn-registro-bloque').attr('disabled', false);
			    $('#btn-registro-bloque').text('Registrar bloque político');
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

			$('#btn-registro-bloque').attr('disabled', false);
			$('#btn-registro-bloque').text('Registrar bloque político');
		}
	});
});

//edición de bloques de políticos
$(document).on('submit', '#formulario-edicion-bloque', function(event) {
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
			$('#btn-edicion-bloque').attr('disabled', true);
			$('#btn-edicion-bloque').text('Editando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
		            title: 'Error', 
		            text: resp.message, 
		            type: 'error'
		        });

		        $('#btn-edicion-bloque').attr('disabled', false);
			    $('#btn-edicion-bloque').text('Editar bloque político');
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

			$('#btn-edicion-bloque').attr('disabled', false);
			$('#btn-edicion-bloque').text('Editar bloque político');
		}
	});
});

//eliminar bloque político
$(document).on('click', '.btn-eliminar-bloque', function(event) {
	event.preventDefault();

    var idBloque = $(this).attr('data-id-bloque');
    var action = base_url + 'backend/bloque/eliminarBloque/' + idBloque;
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
			$('.btn-eliminar-bloque').attr('disabled', true);
			$('.btn-eliminar-bloque').text('Eliminando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
	               title: 'Error', 
	               text: resp.message, 
	               type: 'error'
	            });

	            $('.btn-eliminar-bloque').attr('disabled', false);
			    $('.btn-eliminar-bloque').text('Eliminar');
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
            $('.btn-eliminar-bloque').attr('disabled', false);
			$('.btn-eliminar-bloque').text('Eliminar');
		}
	});
});