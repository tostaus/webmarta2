// Inicio
/*$(document).ready(function() {
    
    fetchLista();

    function fetchLista() {


        $.ajax({
            url: './listaPortadaBlog.php', // **** Cambiarlo en cada tabla 
            type: 'POST',
            success: function(response) {
                const registros = JSON.parse(response);
                let template = '';
                let n = 1;
                let cuenta = 1;
                console.log(registros);
                registros.forEach(registro => {



                    // Creamos Tabla
                    var res = registro.comentario.substring(0, 200) + " ...";

                    template += `
                    <div class="col-md-4">
                    
                        <div class="card-content" codigo="${registro.id}">
                            <div class="card-img">
                                <img src="./admin/blog/imagenes/${registro.imagen}" alt="">
                        
                            </div>
                            <div class="card-desc">
                                <small class="text-muted">${registro.fecha}${" "}${registro.hora}</small>
                                <h3>${registro.titulo}</h3>
                                <p class="justifica">${res}</p>
                       
                                <a href="blogDetalle.php?cod=${registro.id}" class="btn btn-ttc" role="button"">Leer más</a>
                            </div>
                        </div>
                        
                    </li>
                  `

                });
                $('#itemContainer').html(template);
            }
        });
        let template2=`                <div class="holder">
        </div>`;
        $('#contapagina').html(template2);

    }

    // Borrar Correo
   /* $(document).on('click', '.read', (e) => {

        

        const element = $(this)[0].activeElement.parentElement.parentElement;
        //const element = $('.elementor-active');
        const cod = $(element).attr('codigo');
        console.log (element);
        console.log(cod);
        url = "blogDetalle.php?cod=" + cod

        $(location).attr('href', url);



    });*/

//});
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
$(window).on('load', function() { // lo metemos al cargar web

    $(function(){
        /* initiate the plugin */
        $("div.holder").jPages({
            containerID  : "itemContainer",
            perPage      : 12,
            startPage    : 1,
            startRange   : 1,
            midRange     : 5,
            endRange     : 1,
            first       : "Primero",
            previous    : "Anterior",
            next        : "Próximo",
            last        : "Último"
        });
    });    

});
