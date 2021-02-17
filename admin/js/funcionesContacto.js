// Inicio
$(document).ready(function() {
    //alert($('#leido').val());
    // Enseñamos listado de Registros
    fetchLista();
    //Ocultamos formulario de Registro
    $('#formulario').hide();
    // Función para lista de Registro
    function fetchLista() {

        leido = $('#leido').val(); //Variable que enviamos para que nos devuelva los no leidos
        $.ajax({
            url: './listaCorreo.php', // **** Cambiarlo en cada tabla 
            data: { leido },
            type: 'POST',
            success: function(response) {
                const registros = JSON.parse(response);
                let template = '';
                console.log(registros);
                registros.forEach(registro => {
                    // Creamos Tabla
                    template += `
                    <tr codigo="${registro.id}">
                    <td>${registro.nombre}</td>
                    <td>${registro.email}</td>
                    <td>${registro.asunto}</td>
                    <td>${registro.fecha}</td>
                    <td>
                      <button class="leerCorreo btn btn-info">
                      <i class="fas fa-book-open"></i>
                      Leer
                      </button>
                      <button class="borrarCorreo btn btn-danger">
                      <i class="fas fa-trash"></i>
                       Borrar 
                      </button>
                    </td>
                    </tr>
                  `
                });
                $('#tabla').html(template);
            }
        });

    }
    //Mostrar Registro seleccionado de tabla
    $(document).on('click', '.leerCorreo', (e) => {
        // Hacemos visible el formulario para mostrar el registro
        $('#formulario').show();
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const cod = $(element).attr('codigo');
        //console.log(cod);
        let template = ``;
        // Nos devuelve el Registro y lo ponemos en el formulario
        $.post('./devuelveCorreo.php', { cod }, (response) => {
            const registro = JSON.parse(response);
            $('#codigoformulario').val(registro.id);
            $('#nombre').val(registro.nombre);

            $('#email').val(registro.email);
            $('#asunto').val(registro.asunto);
            $('#mensaje').val(registro.mensaje);

        });

        e.preventDefault();
    });
    // Marcar leido
    $(document).on('click', '.leido', (e) => {
        e.preventDefault();
        // Comprobamos si el valor es 0 o 1 para poner el contrario al marcar el registro
        let leido = 0;
        const cod = $('#codigoformulario').val();
        if ($('#leido').val() == 0) {
            leido = 1;
        }

        console.log(cod, leido, $('#leido').val());
        let template = ``;
        // Nos devuelve el Registro y lo ponemos en el formulario
        $.post('./marcaCorreo.php', { cod, leido }, (response) => {
            const registro = JSON.parse(response);


            if (registro == 1) {
                fetchLista();
                alertify.success('Correo cambiado de carpeta');
            } else {
                alertify.danger('Error conexión BBDD');
            }

            $('#formulario').hide();
            // Ocultamos botón guardar

        });


    });
    // Borrar Correo
    $(document).on('click', '.borrarCorreo', (e) => {
        $('#formulario').hide();
        e.preventDefault();
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const cod = $(element).attr('codigo');
        console.log(cod);

        alertify.confirm('AdminWeb', '¿Está seguro que quiere borrar este registro?',
            function() {
                // Solicitamos confirmación para borrar Registro
                $.post('./borraCorreo.php', { cod }, (response) => {
                    {
                        if (response == 1) {
                            fetchLista();

                            alertify.success('Correo Borrado');
                        } else {

                            alertify.error('Error conexión BBDD');
                        }
                    }
                });
            },
            function() {
                alertify.message('Operación Cancelada')

            });


    });
    // Buscador
    $('#search').keyup(function() {
        // Ocultamos form del articulo
        $('#formulario').hide();
        // Metemos en una variable lo que se va escribiendo en search
        let valor = $('#search').val();
        // Llamamos a buscarUsuarios.php por POST enviando lo que hay escrito en search
        let filtro = $('#filtro').val();
        let leido = $('#leido').val();
        console.log(valor, filtro)
        $.ajax({
            url: './buscaCorreos.php',
            data: { valor, filtro, leido },
            type: 'POST',
            success: function(response) {
                const registros = JSON.parse(response);
                let template = '';
                console.log(registros);
                registros.forEach(registro => {
                    //Creamos tabla con los datos recibidos
                    template += `
                        <tr codigo="${registro.id}">
                        <td>${registro.nombre}</td>
                        <td>${registro.email}</td>
                        <td>${registro.asunto}</td>
                        <td>${registro.fecha}</td>
                        <td>
                        <button class="leerCorreo btn btn-info">
                      <i class="fas fa-book-open"></i>
                      Leer
                      </button>
                      <button class="borrarCorreo btn btn-danger">
                      <i class="fas fa-trash"></i>
                       Borrar 
                      </button>
                        </td>
                        </tr>
                  `
                });
                $('#tabla').html(template);
            }
        });
    });
    // Cerrar formulario
    $(document).on('click', '.cerrar', (e) => {
        e.preventDefault();


        $('#formulario').hide();
        // Ocultamos botón guardar



    });




});