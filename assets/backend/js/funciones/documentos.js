//registro de documentos
$(document).on('submit', '#formulario-registro-documento', function(event) {
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
			$('#btn-registro-documento').attr('disabled', true);
			$('#btn-registro-documento').text('Registrando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
		            title: 'Error', 
		            text: resp.message, 
		            type: 'error'
		        });

		        $('#btn-registro-documento').attr('disabled', false);
			    $('#btn-registro-documento').text('Registrar documento');
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

			$('#btn-registro-documento').attr('disabled', false);
			$('#btn-registro-documento').text('Registrar documento');
		}
	});
});

//edición de documentos
$(document).on('submit', '#formulario-edicion-documento', function(event) {
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
			$('#btn-edicion-documento').attr('disabled', true);
			$('#btn-edicion-documento').text('Editando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
		            title: 'Error', 
		            text: resp.message, 
		            type: 'error'
		        });

		        $('#btn-edicion-documento').attr('disabled', false);
			    $('#btn-edicion-documento').text('Editar documento');
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

			$('#btn-edicion-documento').attr('disabled', false);
			$('#btn-edicion-documento').text('Editar documento');
		}
	});
});

//eliminar documento
$(document).on('click', '.btn-eliminar-documento', function(event) {
	event.preventDefault();

    var idDocumento = $(this).attr('data-id-documento');
    var action = base_url + 'backend/documento/eliminarDocumento/' + idDocumento;
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
			$('.btn-eliminar-documento').attr('disabled', true);
			$('.btn-eliminar-documento').text('Eliminando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
	               title: 'Error', 
	               text: resp.message, 
	               type: 'error'
	            });

	            $('.btn-eliminar-documento').attr('disabled', false);
			    $('.btn-eliminar-documento').text('Eliminar');
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
            $('.btn-eliminar-documento').attr('disabled', false);
			$('.btn-eliminar-documento').text('Eliminar');
		}
	});
});

//eliminar archivo documento
$(document).on('click', '.btn-eliminar-archivo-documento', function() {
    var idArchivo = $(this).attr('data-id-archivo-documento');

    swal({
        title: 'Está seguro que quiere eliminar este archivo?',
        text: 'Al eliminarlo no será posible recuperarlo', 
        type: 'warning',
        showCancelButton: true,
        confirmButtonClass: 'btn-success',
        confirmButtonText: 'Si, eliminar!',
        cancelButtonText: 'No!',
    }).then(function(isConfirm) {
        if (isConfirm.value) {
            $.ajax({
                url: base_url + 'backend/documento/eliminarArchivoDocumento/' + idArchivo,
                type: 'post',
                data: null,
                dataType: 'json',
                success: function(resp) {
                    if (typeof(resp) !== 'undefined') {
                        if (resp.success) {
                            location.reload();
                        }
                    }
                }
            });
        }
    });  
});