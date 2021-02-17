// Inicio
$(document).ready(function() {
    //alert($('#leido').val());
    // Enseñamos listado de Registros
    fetchLista();
    // Variable para comprobar si estamos editando o dando de alta
    let edit = false;

    //Ocultamos formulario de Registro
    $('#formulario').hide();
    // Función para lista de Registro
    function fetchLista() {


        $.ajax({
            url: './listaFaq.php', // **** Cambiarlo en cada tabla 
            type: 'POST',
            success: function(response) {
                const registros = JSON.parse(response);
                let template = '';
                console.log(registros);
                registros.forEach(registro => {
                    // Creamos Tabla
                    template += `
                    <tr codigo="${registro.id}">
                    <td>${registro.pregunta}</td>
                    <td>${registro.respuesta}</td>
                   
                    <td>
                      <button class="leerFaq btn btn-info">
                      <i class="fas fa-book-open"></i>

                      Leer
                      </button>
                      <button class="modificarFaq btn btn-success">
                      <i class="fas fa-edit"></i>

                      Modificar
                      </button>
                      <button class="borrarFaq btn btn-danger">
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
    $(document).on('click', '.leerFaq', (e) => {
        CKEDITOR.instances.respuesta.destroy();

        // Hacemos visible el formulario para mostrar el registro
        $('#formulario').show();



        ponreadonly('true');
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const cod = $(element).attr('codigo');
        //console.log(cod);
        // Nos devuelve el Registro y lo ponemos en el formulario
        $.post('./devuelveFaq.php', { cod }, (response) => {
            console.log(response);
            const registro = JSON.parse(response);
            $('#codigoformulario').val(registro.id);
            $('#pregunta').val(registro.pregunta);

            $('#respuesta').val(registro.respuesta);
            CKEDITOR.replace("respuesta", {
                uiColor: '#f3f3f3',
                language: 'es'
            });


            $('.publicar').hide();


        });

        e.preventDefault();
    });


    // Marcar leido
    $(document).on('click', '.addFaq', (e) => {
        e.preventDefault();
        CKEDITOR.instances.respuesta.destroy();

        ponreadonly(false);


        $('#formulario').show();

        $('#pregunta').val("");
        $('#respuesta').val("");
        CKEDITOR.replace("respuesta", {
            uiColor: '#f3f3f3',
            language: 'es'
        });

        $('#pregunta').focus();
        $('.publicar').show();
        // Ponemos a false edit para sumar registro
        edit = false;




    });
    // Función para poner 2 digitos a la fecha y hora
    function dosdigitos(n) {
        return (n < 10 ? '0' : '') + n;
    }

    // Botón Publicar
    $('#formulario').submit(e => {
        e.preventDefault();
        //const cod = $('#codigoformulario').val()
        // Comrpuebo se es un comentario o una entrada nueva de Blog
        const postData = {
            cod: $('#codigoformulario').val(),
            pregunta: $('#pregunta').val(),
            respuesta: $('#respuesta').val(),


        };

        // Comprobamos si estamos editando o añadiendo Registro para llamar a uno o a otro
        const url = edit === false ? 'addFaq.php' : 'updateFaq.php';
        console.log(postData, url);
        $.ajax({
            url: url,
            type: 'post',
            data: postData,


            success: function(response) {
                console.log(response);
                if (response == 0) {
                    alertify.success('Faq introducido en Blog')
                } else if (response == 1) {
                    alertify.error('Ha ocurrido en un error en BBDD');
                }
                $('#formulario').trigger('reset');
                // Quitamos form y botón guardar
                $('publicar').hide();
                $('#formulario').hide();
                fetchLista();
            }
        });




    });
    //Mostrar Registro seleccionado de tabla
    $(document).on('click', '.modificarFaq', (e) => {

        CKEDITOR.instances.respuesta.destroy();
        // Hacemos visible el formulario para mostrar el registro
        $('#formulario').show();
        $('#hora').show();
        $('#labelhora').show();

        edit = 'true';
        comenta = false;
        ponreadonly(false);
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const cod = $(element).attr('codigo');
        //console.log(cod);
        let template = ``;
        // Nos devuelve el Registro y lo ponemos en el formulario
        $.post('./devuelveFaq.php', { cod }, (response) => {
            console.log(response);
            const registro = JSON.parse(response);
            $('#codigoformulario').val(registro.id);
            $('#pregunta').val(registro.pregunta);

            $('#respuesta').val(registro.respuesta);
            CKEDITOR.replace("respuesta", {
                uiColor: '#f3f3f3',
                language: 'es'
            });


            $('.publicar').show();


        });

        e.preventDefault();
    });

    // Borrar Correo
    $(document).on('click', '.borrarFaq', (e) => {
        $('#formulario').hide();
        e.preventDefault();
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const cod = $(element).attr('codigo');
        console.log(cod);

        alertify.confirm('AdminWeb', '¿Está seguro que quiere borrar este registro?',
            function() {
                // Solicitamos confirmación para borrar Registro
                $.post('./borrarFaq.php', { cod }, (response) => {
                    {
                        if (response == 1) {
                            fetchLista();

                            alertify.success('Entrada Borrada');
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

    // Cerrar formulario
    $(document).on('click', '.cerrar', (e) => {
        e.preventDefault();


        $('#formulario').hide();
        // Ocultamos botón guardar



    });


    function ponreadonly(no) {
        $('#pregunta').attr('readonly', no);
        $('#respuesta').attr('readonly', no);

    }





});