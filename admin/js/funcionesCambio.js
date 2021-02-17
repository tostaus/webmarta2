$(document).ready(function() {
    $('#passwordanterior').focus()
        // Usuario logeado
    var $usuario = $('#usuario').val();
    alertify.alert('Atención su nueva Contraseña', 'Debe tener 8 caracteres o más ,una mayúscula y un número');

    $('#formulario').submit(e => {
        e.preventDefault();
        var upperCase = new RegExp("[A-Z]");
        var lowerCase = new RegExp("[a-z]");
        var numbers = new RegExp("[0-9]");

        if ($('#passwordnuevo').val() != $('#passwordrepite').val()) {
            alertify.error('Password no coinciden');
            $('#passwordnuevo').focus()
        } else if ($('#passwordnuevo').val().length < 7) {
            alertify.error('Password debe ser mayor de 8 caracteres');
            $('#passwordnuevo').focus()

        } else if (!$('#passwordnuevo').val().match(upperCase)) {
            alertify.error('Password debe tener al menos una mayúscula');;
            $('#passwordnuevo').focus()

        } else if (!$('#passwordnuevo').val().match(numbers)) {
            alertify.error('Password debe tener al menos una número');;
            $('#passwordnuevo').focus()

        } else {
            const postData = {
                usuario: $('#usuario').val(),
                password: $('#passwordanterior').val(),



            };
            $.ajax({
                url: 'comprueba.php',
                type: 'post',
                data: postData,


                success: function(response) {
                    console.log(response);
                    console.log('Hola');
                    if (response == 1) {
                        const postData = {
                            usuario: $('#usuario').val(),
                            password: $('#passwordnuevo').val(),



                        };
                        $.ajax({
                            url: 'cambiaPass.php',
                            type: 'post',
                            data: postData,


                            success: function(response) {

                                if (response == 0) {


                                    alertify.success('Password Cambiado con éxito')
                                    $('#formulario').trigger('reset');
                                } else {
                                    alertify.error('Error en BBDD');
                                    $('#passwordanterior').focus()
                                }
                                // Quitamos form y botón guardar

                            }
                        });
                        $('#formulario').trigger('reset');
                    } else {
                        alertify.error('Password actual no es correcto');
                        $('#passwordanterior').focus()
                    }
                    // Quitamos form y botón guardar

                }
            });


        }


    });

});