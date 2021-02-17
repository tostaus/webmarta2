// Inicio
$(document).ready(function() {

    fetchLista();

    function fetchLista() {
        var cod = $('#cod').val();

        $.post('./admin/devuelveBlog.php', { cod }, (response) => {
            console.log(response);
            const registro = JSON.parse(response);

            var template = ``;

            template += `
            <h5 class="featurette-heading ">${registro.titulo}.</h5>

        <div class="col-md-7 " >
        <p class="lead justifica " > ${registro.comentario}<p>
        




        
    </div>
    <div class="col-md-5 ">
        <img src="./admin/blog/imagenes/${registro.imagen}" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto " width="500 " height="500 " />
    </div>
          `
            $('#blog').html(template);

        });

        $.ajax({
            url: './devuelveDetalleBlog.php', // **** Cambiarlo en cada tabla 
            data: { cod },
            type: 'POST',
            success: function(response) {
                const registros = JSON.parse(response);
                let template = '';
                console.log(registros);

                registros.forEach(registro => {
                    // Creamos Tabla
                    template += `
                    <div class="row">
            <div class="col">
            <img src="./img/${registro.foto} " class="img-fluid rounded-circle" alt=" " width="48 " height="48 " />
            <h5 class="font-weight-light">${registro.nombre}
                <small class="text-muted">Comentó el ${registro.fecha}</small>
                </h5>
            <p>
                ${registro.mensaje}
            </p>
            </div>
    
    
        </div>
                  `
                });
                $('#comentarios').html(template);
            }
        });

        // Pulsar en guardar -  submit
        $('#registro-form').submit(e => {
            e.preventDefault();
            // Datos a enviar
            const postData = {
                blog_id: cod,
                nombre: $('#nombre').val(),
                email: $('#email').val(),
                mensaje: $('#mensaje').val(),

            };

            const url = 'enviarComentario.php';
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




    }





});