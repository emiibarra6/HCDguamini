//registro de noticias
$(document).on('submit', '#formulario-registro-noticia', function(event) {
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
			$('#btn-registro-noticia').attr('disabled', true);
			$('#btn-registro-noticia').text('Registrando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
		            title: 'Error',
		            text: resp.message,
		            type: 'error'
		        });

		        $('#btn-registro-noticia').attr('disabled', false);
			    $('#btn-registro-noticia').text('Registrar noticia');
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

			$('#btn-registro-noticia').attr('disabled', false);
			$('#btn-registro-noticia').text('Registrar noticia');
		}
	});
});

//edición de noticias
$(document).on('submit', '#formulario-edicion-noticia', function(event) {
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
			$('#btn-edicion-noticia').attr('disabled', true);
			$('#btn-edicion-noticia').text('Editando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
		            title: 'Error',
		            text: resp.message,
		            type: 'error'
		        });

		        $('#btn-edicion-noticia').attr('disabled', false);
			    $('#btn-edicion-noticia').text('Editar noticia');
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

			$('#btn-edicion-noticia').attr('disabled', false);
			$('#btn-edicion-noticia').text('Editar noticia');
		}
	});
});


//preview de imagen de la noticia
$(document).on('change', '.input-imagen-noticia', function() {
    var imagen = new FileReader();
    imagen.readAsDataURL(this.files[0]);
    imagen.onload = function(e) {
        $('.uploadpreview-noticia').css('background-image', 'url(' + e.target.result + ')' );
    }
});

//preview de imagen de la noticia
$(document).on('change', '.input-imagen-noticia2', function() {
    var imagen = new FileReader();
    imagen.readAsDataURL(this.files[0]);
    imagen.onload = function(e) {
        $('.uploadpreview-noticia2').css('background-image', 'url(' + e.target.result + ')' );
    }
});

//preview de imagen de la noticia
$(document).on('change', '.input-imagen-noticia3', function() {
    var imagen = new FileReader();
    imagen.readAsDataURL(this.files[0]);
    imagen.onload = function(e) {
        $('.uploadpreview-noticia3').css('background-image', 'url(' + e.target.result + ')' );
    }
});

//preview de imagen de la noticia
$(document).on('change', '.input-imagen-noticia4', function() {
    var imagen = new FileReader();
    imagen.readAsDataURL(this.files[0]);
    imagen.onload = function(e) {
        $('.uploadpreview-noticia4').css('background-image', 'url(' + e.target.result + ')' );
    }
});

//preview de imagen de la noticia
$(document).on('change', '.input-imagen-noticia5', function() {
    var imagen = new FileReader();
    imagen.readAsDataURL(this.files[0]);
    imagen.onload = function(e) {
        $('.uploadpreview-noticia5').css('background-image', 'url(' + e.target.result + ')' );
    }
});


//eliminar noticia
$(document).on('click', '.btn-eliminar-noticia', function(event) {
	event.preventDefault();

    var idDocumento = $(this).attr('data-id-noticia');
    var action = base_url + 'backend/noticia/eliminarNoticia/' + idDocumento;
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
			$('.btn-eliminar-noticia').attr('disabled', true);
			$('.btn-eliminar-noticia').text('Eliminando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
	               title: 'Error',
	               text: resp.message,
	               type: 'error'
	            });

	            $('.btn-eliminar-noticia').attr('disabled', false);
			    $('.btn-eliminar-noticia').text('Eliminar');
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
            $('.btn-eliminar-noticia').attr('disabled', false);
			$('.btn-eliminar-noticia').text('Eliminar');
		}
	});
});

//eliminar archivo noticia
$(document).on('click', '.btn-eliminar-archivo-noticia', function() {
    var idArchivo = $(this).attr('data-id-archivo-noticia');

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
                url: base_url + 'backend/noticia/eliminarArchivoNoticia/' + idArchivo,
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
