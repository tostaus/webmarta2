
// Inicio
$(document).ready(function() {
    
    fetchLista();

    function fetchLista() {
        var cod = $('#cod').val();

        /*$.post('./admin/devuelveBlog.php', { cod }, (response) => {
            console.log(response);
            const registro = JSON.parse(response);

            var template = ``;
            // <h1 > $ { registro.titulo }. < /h1>
            //<h5 class = "featurette-heading " > $ { registro.titulo }. < /h5>

            template += `
            <h1>${registro.titulo }.</h1>
        <div class="col-md-7 " >
        <p class="lead justifica " > ${registro.comentario}<p>
        




        
    </div>
    <div class="col-md-5 ">
        <img src="./admin/blog/imagenes/${registro.imagen}" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto " width="500 " height="500 " />
    </div>
          `
            $('#blog').html(template);

        });*/

        $.ajax({
            url: './admin/devuelveBlog.php', // **** Cambiarlo en cada tabla 
            data: { cod },
            type: 'POST',
            success: function(response) {
                const registro = JSON.parse(response);
                let template = '';
                console.log(registro);

                
                    // Creamos Tabla
                    template += `

                    <h1 class="featurette-heading">${registro.titulo }</h1>
                    <br>
                    <div class="row featurette letrablog justifica" >
                    
                        <div class="col-md-7 " >
                             ${registro.comentario}
                        </div>
                        <div class="col-md-5 ">
                            <img src="./admin/blog/imagenes/${registro.imagen}" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto " width="500 " height="500 " />
                        </div>
                    </div>
                  `
               
                $('#blog').html(template);
            }
        });
        
        $.ajax({
            url: './devuelveDetalleBlog.php', // **** Cambiarlo en cada tabla 
            data: { cod },
            type: 'POST',
            success: function(response) {
                const registros = JSON.parse(response);
                let template = '';
                console.log(registros);
                let cabeceraComentario =` <div class="row" data-aos="fade-right" data-aos-delay="100">
                                    <div class="col">
                                        <h2 class="font-weight-light">Comentarios</h2>
                                        
                                    </div>
                                    </div>`;
                $('#cabeceraComentario').html(cabeceraComentario);

                registros.forEach(registro => {
                    // Creamos Tabla
                    template += `
                    <div class="row" data-aos="fade-right" data-aos-delay="100">
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
                  if(registro.contesta!=null && registro.fechacontesta!="1900-01-01" ){
                    template+= `<div class="contesta">
                        <img src="./img/fotomarta.jpg" class="img-fluid rounded-circle" alt=" " width="48 " height="48 " />
                         <h5 class="font-weight-light">Marta Rubio
                            <small class="text-muted">Contestó el ${registro.fechacontesta}</small>
                        </h5>
                    <p>
                        ${registro.contesta}
                    </p>
                    
                    </div>`;

                  }

                  template+='<hr>'
                });
                $('#comentarios').html(template);
                
            }
        });

        
        // Pulsar en guardar -  submit
        $('#registro-form').submit(e => {
            e.preventDefault();
            // Datos a enviar
            if (!$('#privacidad').prop('checked')) {
                alertify.alert("Psicología y Bienestar", "Por favor, acepte la política de privacidad.");
                $('#privacidad').focus();

            } else {

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

            }

        });




    }





});
//
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

