$(document).ready(function() {
    //alert($('#leido').val());
    // Enseñamos listado de Registros
    fetchLista();
    //Ocultamos formulario de Registro
    $('#formulario').hide();
    // Función para lista de Registro
    function fetchLista() {

         //Variable que enviamos para que nos devuelva los no leidos
        $.ajax({
            url: './listaPortadaBlog.php', // **** Cambiarlo en cada tabla 
            type: 'POST',
            success: function(response) {
                const registros = JSON.parse(response);
                let template = '';
                console.log(registros);
                registros.forEach(registro => {
                    var res = registro.comentario.substring(0, 100) + " ...";
                    // Creamos Tabla
                    template += `
                    <tbody>
          
                    <th scope="row" hidden></th>
                    <td><img src="./admin/blog/imagenes/${registro.imagen}" alt="" width="150"></td>
                    <td>${registro.fecha}${" "}${registro.hora}</td>
                    <td>${registro.titulo}</td>
                    
                    <td><a href="blogDetalle.php?cod=${registro.id}" class="btn btn-ttc" role="button"">Leer</a></td>
                  </tr>
                  
                </tbody>
                  `
                });
                $('#tabla').html(template);
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