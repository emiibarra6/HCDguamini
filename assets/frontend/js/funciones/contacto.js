//envío de contacto
$(document).on('submit', '#formulario-envio-mensaje', function(event) {
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
			$('#btn-envio-mensaje').attr('disabled', true);
			$('#btn-envio-mensaje').text('Enviando...');
		},
		success: function(resp) {
			if (!resp.success) {
				swal({
		            title: 'Error', 
		            text: resp.message, 
		            type: 'error'
		        });

		        $('#btn-envio-mensaje').attr('disabled', false);
			    $('#btn-envio-mensaje').text('Enviar Mensaje');
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

			$('#btn-envio-mensaje').attr('disabled', false);
			$('#btn-envio-mensaje').text('Enviar Mensaje');
		}
	});
});