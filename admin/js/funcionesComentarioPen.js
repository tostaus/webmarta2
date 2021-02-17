// Inicio
$(document).ready(function() {
    //alert($('#leido').val());
    // Enseñamos listado de Registros
    fetchLista();
    // Variable para comprobar si estamos editando o dando de alta
    let edit = false;
    let cambiofoto = false;
    let foto = "";
    let puesto = false;
    let comenta = false;
    //Ocultamos formulario de Registro
    $('#formulario').hide();
    // Función para lista de Registro
    function fetchLista() {


        $.post('./listaComentarioPen.php', (response) => {
            const registros = JSON.parse(response);
            let template = '';
            console.log(registros);
            registros.forEach(registro => {
                // Creamos Tabla
                template += `
                <tr>
                <td><b>${registro.titulo}</b></td>
                </tr>
                    <tr codigoComentario="${registro.id}">
                    <td>${registro.nombre}</td>
                    <td>${registro.email}</td>
                    <td>${registro.mensaje}</td>
                    <td>${registro.fecha}</td>
                   
                    <td>
                    <button class="leerComentario btn btn-info">
                    <i class="fas fa-book-open"></i>

                      Leer
                     </button>
                     
                      
                    </td>
                    </tr>
                    
                  `
            });
            $('#tabla').html(template);


        });

    }
    //Mostrar Registro seleccionado de tabla
    $(document).on('click', '.leerComentario', (e) => {
        // Hacemos visible el formulario para mostrar el registro a modificar
        $('#formulario').show();
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const cod = $(element).attr('codigoComentario');
        // Nos devuelve el Usuario a borrar y lo ponemos en el formulario
        $.post('devuelveComentarioPen.php', { cod }, (response) => {
            const registro = JSON.parse(response);
            $('#codigoformulario').val(registro.id);
            $('#nombre').val(registro.nombre);

            $('#email').val(registro.email);
            $('#mensaje').val(registro.mensaje);
            $('#fecha').val(registro.fecha);

            //Hacemos visible el botón guardar
            $('guardar').show();
        });
        e.preventDefault();
    });



    // Borrar Correo
    $(document).on('click', '.borrar', (e) => {
        e.preventDefault();
        const cod = $('#codigoformulario').val();
        console.log(cod);

        alertify.confirm('AdminWeb', '¿Está seguro que quiere borrar este registro?',
            function() {
                // Solicitamos confirmación para borrar Registro
                $.post('./borrarComentario.php', { cod }, (response) => {
                    {
                        if (response == 1) {
                            fetchLista();

                            alertify.success('Entrada Borrada');
                            $('#formulario').hide();
                        } else {

                            alertify.error('Error conexión BBDD');
                            $('#formulario').hide();
                        }
                    }
                });
            },
            function() {
                alertify.message('Operación Cancelada')

            });


    });

    $(document).on('click', '.publicar', (e) => {
        e.preventDefault();
        const cod = $('#codigoformulario').val();
        console.log(cod);
        $.post('publicaComentarioPen.php', { cod }, (response) => {
            fetchLista();

            alertify.success('Comentario Publicado');
            $('#formulario').hide();
        });

    });

    // Cerrar formulario
    $(document).on('click', '.cerrar', (e) => {
        e.preventDefault();


        $('#formulario').hide();
        // Ocultamos botón guardar



    });

});