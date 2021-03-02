$(document).ready(function() {

    fetchLista();

    function fetchLista() {

        var n = 1;
        $.ajax({
            url: './listaFaq.php', // **** Cambiarlo en cada tabla 
            type: 'POST',
            success: function(response) {
                const registros = JSON.parse(response);
                let template = '';
                console.log(registros);
                registros.forEach(registro => {
                    n += 1;


                    // Creamos Tabla

                    template += `
                    <div class="card">


                        <div class="card-header ">
                            <h4 class="card-header micolorfaq">
                                <a class="nav-link micolorfaq" data-toggle="collapse" data-parent="#accordion" href="#collapse${n}">${registro.pregunta}</a>
                            </h4>
                        </div>
                        <div id="collapse${n}" class="panel-collapse collapse in">
                            <div class="card-block  m-3">
                                ${registro.respuesta}
                            </div>
                        </div>
                    </div>
                  `

                });
                $('#preguntas').html(template);
            }
        });

    }



});
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