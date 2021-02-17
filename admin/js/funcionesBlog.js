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


        $.ajax({
            url: './listaBlog.php', // **** Cambiarlo en cada tabla 
            type: 'POST',
            success: function(response) {
                const registros = JSON.parse(response);
                let template = '';
                console.log(registros);
                registros.forEach(registro => {
                    // Creamos Tabla
                    template += `
                    <tr codigo="${registro.id}">
                    <td><a href="#" onClick="window.open('blog/imagenes/${registro.imagen}','Foto','top=250,left=250,width=640,height=480')"><img src="blog/imagenes/${registro.imagen}" style="width: 150px; height: 100px"></a></td>
                    <td>${registro.titulo}</td>
                    <td>${registro.fecha}</td>
                    <td>${registro.hora}</td>
                   
                    <td>
                      <button class="leerBlog btn btn-info">
                      <i class="fas fa-book-open"></i>

                      Leer
                      </button>
                      <button class="modificarBlog btn btn-success">
                      <i class="fas fa-edit"></i>

                      Modificar
                      </button>
                      <button class="borrarBlog btn btn-danger">
                      <i class="fas fa-trash"></i>
                       Borrar 
                      </button>
                      <button class="comentarBlog btn btn-ttc">
                      <i class="fas fa-comments"></i>

                       Comentar 
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
    $(document).on('click', '.leerBlog', (e) => {
        CKEDITOR.instances.comentario.destroy();

        // Hacemos visible el formulario para mostrar el registro
        $('#formulario').show();
        $('#hora').show();
        $('#labelhora').show();


        ponreadonly('true');
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const cod = $(element).attr('codigo');
        //console.log(cod);
        let template = ``;
        // Nos devuelve el Registro y lo ponemos en el formulario
        $.post('./devuelveBlog.php', { cod }, (response) => {
            console.log(response);
            const registro = JSON.parse(response);
            $('#codigoformulario').val(registro.id);
            $('#titulo').val(registro.titulo);

            $('#fecha').val(registro.fecha);
            $('#hora').val(registro.hora);
            $('#comentario').val(registro.comentario);
            CKEDITOR.replace("comentario", {
                uiColor: '#f3f3f3',
                language: 'es'
            });

            $('#image').hide();
            $('#labelimage').hide();
            $('.publicar').hide();


        });

        e.preventDefault();
    });
    // Marcar leido
    $(document).on('click', '.addBlog', (e) => {
        e.preventDefault();
        CKEDITOR.instances.comentario.destroy();

        ponreadonly(false);
        $('#image').show();
        $('#labelimage').show();
        $('#hora').show();
        $('#labelhora').show();

        $('#formulario').show();

        $('#titulo').val("");
        $('#comentario').val("");
        CKEDITOR.replace("comentario", {
            uiColor: '#f3f3f3',
            language: 'es'
        });
        $('#fecha').val(fechaprint());
        $('#hora').val(horaprint());
        $('#image').val("");
        $('#titulo').focus();
        $('.publicar').show();
        // Ponemos a false edit para sumar registro
        edit = false;
        comenta = false;




    });
    // Función para poner 2 digitos a la fecha y hora
    function dosdigitos(n) {
        return (n < 10 ? '0' : '') + n;
    }

    // Botón Publicar
    $('#formulario').submit(e => {
        e.preventDefault();
        const cod = $('#codigoformulario').val()
            // Comrpuebo se es un comentario o una entrada nueva de Blog
        if (comenta) {
            console.log('he comentado');
            const postData = {
                blog_id: cod,
                nombre: 'Marta Rubio',
                email: 'ninguno',
                mensaje: $('#comentario').val(),
                fecha: $('#fecha').val(),

            };

            const url = '../enviarComentario.php';
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
            $('#formulario').hide();
            alertify.success('Su comentario ha sido enviado');
        } else {
            console.log(foto);
            //Comprobamos si esta introduciendo o ha cambiado la foto
            // para enviar o no la foto en el updateBlog.php
            if (!edit || cambiofoto) {
                var files = $('#image')[0].files[0];
            } else {
                files = foto;
            }
            var postData = new FormData();

            postData.append('file', files);
            postData.append('id', $('#codigoformulario').val());
            postData.append('titulo', $('#titulo').val());
            postData.append('comentario', $('#comentario').val());
            postData.append('fecha', $('#fecha').val());
            postData.append('hora', $('#hora').val());
            // Ponemos el interruptor otra vez a false
            cambiofoto = false;
            // Comprobamos si estamos editando o añadiendo Registro para llamar a uno o a otro
            const url = edit === false ? 'addBlog.php' : 'updateBlog.php';
            console.log($('#hora').val());
            console.log(postData, url);
            $.ajax({
                url: url,
                type: 'post',
                data: postData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    if (response == 0) {
                        alertify.success('Comentario introducido en Blog')
                    } else if (response == 1) {
                        alertify.error('Ha ocurrido en un error en BBDD');
                    } else if (response == 2) {
                        alertify.error('Error al subir la imagen');
                    }
                    $('#formulario').trigger('reset');
                    // Quitamos form y botón guardar
                    $('publicar').hide();
                    $('#formulario').hide();
                    $('.comenta').hide();
                    fetchLista();
                }
            });

        }


    });
    //Mostrar Registro seleccionado de tabla
    $(document).on('click', '.modificarBlog', (e) => {

        CKEDITOR.instances.comentario.destroy();
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
        $.post('./devuelveBlog.php', { cod }, (response) => {
            console.log(response);
            const registro = JSON.parse(response);
            $('#codigoformulario').val(registro.id);
            $('#titulo').val(registro.titulo);

            $('#fecha').val(registro.fecha);
            $('#hora').val(registro.hora);

            $('#comentario').val(registro.comentario);

            CKEDITOR.replace("comentario", {
                uiColor: '#f3f3f3',
                language: 'es'
            });
            //$('#image').val(registro.imagen);


            document.getElementById("image").value = "";
            //$('#image')[0].files[0].val(registro.imagen);
            foto = registro.imagen;
            $('#image').show();
            $('#labelimage').show();
            $('.publicar').show();

        });

        e.preventDefault();
    });

    // Borrar Correo
    $(document).on('click', '.borrarBlog', (e) => {
        $('#formulario').hide();
        e.preventDefault();
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const cod = $(element).attr('codigo');
        console.log(cod);

        alertify.confirm('AdminWeb', '¿Está seguro que quiere borrar este registro?',
            function() {
                // Solicitamos confirmación para borrar Registro
                $.post('./borrarBlog.php', { cod }, (response) => {
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
    // Buscador
    $('#search').keyup(function() {
        // Ocultamos form del articulo
        $('#formulario').hide();
        // Metemos en una variable lo que se va escribiendo en search
        let valor = $('#search').val();
        // Llamamos a buscarUsuarios.php por POST enviando lo que hay escrito en search
        let filtro = $('#filtro').val();

        console.log(valor, filtro)
        $.ajax({
            url: './buscaBlogs.php',
            data: { valor, filtro },
            type: 'POST',
            success: function(response) {
                const registros = JSON.parse(response);
                let template = '';
                console.log(registros);
                registros.forEach(registro => {
                    //Creamos tabla con los datos recibidos
                    template += `
                    <tr codigo="${registro.id}">
                    <td><a href="#" onClick="window.open('blog/imagenes/${registro.imagen}','Foto','top=250,left=250,width=640,height=480')"><img src="blog/imagenes/${registro.imagen}" style="width: 100px; height: 100px"></a></td>
                    <td>${registro.titulo}</td>
                    <td>${registro.fecha}</td>
                    <td>${registro.hora}</td>
                   
                    <td>
                      <button class="leerBlog btn btn-info">
                      <i class="fas fa-book-open"></i>

                      Leer
                      </button>
                      <button class="modificarBlog btn btn-success">
                      <i class="fas fa-edit"></i>

                      Modificar
                      </button>
                      <button class="borrarBlog btn btn-danger">
                      <i class="fas fa-trash"></i>
                       Borrar 
                      </button>
                      <button class="comentarBlog btn btn-ttc">
                      <i class="fas fa-comments"></i>

                       Comentar 
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
    // Comprobamos tamaño del fichero
    $(document).on('change', 'input[type="file"]', function() {
        // this.files[0].size recupera el tamaño del archivo
        // alert(this.files[0].size);
        cambiofoto = true;
        var fileName = this.files[0].name;
        var fileSize = this.files[0].size;

        if (fileSize > 600000) {
            alertify.error('El archivo no debe superar los 600Kb');
            this.value = '';
            this.files[0].name = '';
        }

    });

    function ponreadonly(no) {
        $('#titulo').attr('readonly', no);
        $('#fecha').attr('readonly', no);
        $('#hora').attr('readonly', no);
        $('#comentario').attr('readonly', no);
    }

    $(document).on('click', '.comentarBlog', (e) => {
        comenta = true;
        CKEDITOR.instances.comentario.destroy();
        // Hacemos visible el formulario para mostrar el registro
        $('#titulo').attr('readonly', true);
        $('#comentario').attr('readonly', false);
        $('#fecha').attr('readonly', false);
        $('#formulario').show();

        $('#image').hide()
            //edit = 'true';
            //ponreadonly(false);
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const cod = $(element).attr('codigo');
        //console.log(cod);
        let template = ``;
        // Nos devuelve el Registro y lo ponemos en el formulario
        $.post('./devuelveBlog.php', { cod }, (response) => {
            console.log(response);
            const registro = JSON.parse(response);
            $('#codigoformulario').val(registro.id);
            $('#titulo').val(registro.titulo);
            $('#fecha').val(fechaprint);

            $('#comentario').val("");

            CKEDITOR.replace("comentario", {
                uiColor: '#f3f3f3',
                language: 'es'
            });
            //$('#image').val(registro.imagen);



            $('#image').hide();
            $('#labelimage').hide();
            $('.comenta').show();
            $('.publicar').show();

            $('#hora').hide();
            $('#labelhora').hide();


        });

        e.preventDefault();
    });

    $(document).on('click', '.comenta', (e) => {
        e.preventDefault();
        var cod = $('#codigoformulario').val();
        var fecha = new Date(); //Fecha actual
        var mes = fecha.getMonth() + 1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año



        var fechaprint = ano + "-" + dosdigitos(mes) + "-" + dosdigitos(dia);

        const postData = {
            blog_id: cod,
            nombre: 'Marta Rubio',
            email: 'ninguno',
            mensaje: $('#comentario').val(),
            fecha: $('#fecha').val(),

        };

        const url = '../enviarComentario.php';
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
        alertify.success('Su comentario ha sido enviado');



    });

    function fechaprint() {

        var fecha = new Date(); //Fecha actual
        var mes = fecha.getMonth() + 1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        var hora = fecha.getHours()
        var minutos = fecha.getMinutes();


        return ano + "-" + dosdigitos(mes) + "-" + dosdigitos(dia);


    };

    function horaprint() {
        var fecha = new Date(); //Fecha actual
        var hora = fecha.getHours()
        var minutos = fecha.getMinutes();
        return dosdigitos(hora) + ':' + dosdigitos(minutos);
    };
});