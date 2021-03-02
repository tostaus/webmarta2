// Inicio
$(document).ready(function() {




    // Pulsar en guardar -  submit
    $('#registro-form').submit(e => {
        e.preventDefault();
        // Datos a enviar
        if (!$('#privacidad').prop('checked')) {
            alertify.alert("Psicología y Bienestar", "Por favor, acepte la política de privacidad.");
            $('#privacidad').focus();

        } else {
            const postData = {
                nombre: $('#nombre').val(),
                email: $('#email').val(),
                asunto: $('#asunto').val(),
                mensaje: $('#mensaje').val(),

            };

            const url = 'enviarContacto.php';
            console.log(postData, url);
            // Enviamos datos y url
            $.ajax({
                url: url,
                type: 'post',
                data: postData,
                dataType: 'json',
                success: function(response) {
                    console.log(response)



                }


            });

            $('#registro-form').trigger('reset');
            alertify.success('Su consulta ha sido enviada');
        }

    });

});

function aos_init() {

    AOS.init({

        duration: 1000,

        once: true

    });

}

$(window).on('load', function() { // lo metemos al cargar web

    aos_init();

});

$(window).on('load', function() {
    if ($('#preloader').length) {
        $('#preloader').delay(100).fadeOut('slow', function() {
            $(this).remove();
        });
    }
});