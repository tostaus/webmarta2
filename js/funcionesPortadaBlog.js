// Inicio
$(document).ready(function() {

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
                    <div class="col-md-4" >
                    
                        <div class="card-content" codigo="${registro.id}">
                        <div class="card-img">
                        <img src="./admin/blog/imagenes/${registro.imagen}" alt="">
                        
                    </div>
                    <div class="card-desc">
                    <small class="text-muted">${registro.fecha}${" "}${registro.hora}</small>
                        <h3>${registro.titulo}</h3>
                        <p class="justifica">${res}</p>
                        <button class="read btn btn-ttc">
                        Leer más 
                       </button>
                    </div>
                            </div>
                        </div>
                    </div>
                  `

                });
                $('#blog' + n).html(template);
            }
        });

    }

    // Borrar Correo
    $(document).on('click', '.read', (e) => {

        const element = $(this)[0].activeElement.parentElement.parentElement;
        const cod = $(element).attr('codigo');
        console.log(cod);
        url = "blogDetalle.php?cod=" + cod

        $(location).attr('href', url);



    });

});