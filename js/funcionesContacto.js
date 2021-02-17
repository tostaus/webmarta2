// Inicio
$(document).ready(function() {




    // Pulsar en guardar -  submit
    $('#registro-form').submit(e => {
        e.preventDefault();
        // Datos a enviar
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
    });

});