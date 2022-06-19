//registro de cargos
$(document).on('submit', '#formulario-registro-cargo', function(event) {
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
			$('#btn-registro-cargo').attr('disabled', true);
			$('#btn-registro-cargo').text('Registrando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
		            title: 'Error', 
		            text: resp.message, 
		            type: 'error'
		        });

		        $('#btn-registro-cargo').attr('disabled', false);
			    $('#btn-registro-cargo').text('Registrar cargo');
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

			$('#btn-registro-cargo').attr('disabled', false);
			$('#btn-registro-cargo').text('Registrar cargo');
		}
	});
});

//edición de cargos
$(document).on('submit', '#formulario-edicion-cargo', function(event) {
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
			$('#btn-edicion-cargo').attr('disabled', true);
			$('#btn-edicion-cargo').text('Editando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
		            title: 'Error', 
		            text: resp.message, 
		            type: 'error'
		        });

		        $('#btn-edicion-cargo').attr('disabled', false);
			    $('#btn-edicion-cargo').text('Editar cargo');
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

			$('#btn-edicion-cargo').attr('disabled', false);
			$('#btn-edicion-cargo').text('Editar cargo');
		}
	});
});

//eliminar cargo
$(document).on('click', '.btn-eliminar-cargo', function(event) {
	event.preventDefault();

    var idCargo = $(this).attr('data-id-cargo');
    var action = base_url + 'backend/cargo/eliminarCargo/' + idCargo;
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
			$('.btn-eliminar-cargo').attr('disabled', true);
			$('.btn-eliminar-cargo').text('Eliminando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
	               title: 'Error', 
	               text: resp.message, 
	               type: 'error'
	            });

	            $('.btn-eliminar-cargo').attr('disabled', false);
			    $('.btn-eliminar-cargo').text('Eliminar');
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
            $('.btn-eliminar-cargo').attr('disabled', false);
			$('.btn-eliminar-cargo').text('Eliminar');
		}
	});
});