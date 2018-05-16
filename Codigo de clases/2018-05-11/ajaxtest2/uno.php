<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <input type="text" id="nombre" placeholder="Nombre"/>
        </div>
        <div>
            <input type="text" id="apellido" placeholder="Apellido"/>
        </div>
        <a href="javascript:void(0)" id="traerDatosLink">
            Traer datos
        </a>
        <div id="cargando">
            <img src="img/loading.gif" alt=""/>
        </div>
        <div id="resultado">
        </div>
        <style>
            #cargando{
                position: fixed;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.8);
                text-align: center; 
                top:0;
                left:0;
                display: none;
            }
            #cargando img{
                margin-top:200px;
            }
        </style>
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#traerDatosLink').on('click', function (e) {
                    e.preventDefault();

                    var params = {
                        nombre: $('#nombre').val(),
                        apellido: $('#apellido').val()
                    };

                    $.ajax({
                        cache: false,
                        type: 'GET',
                        data: params,
                        url: 'ajax.php',
                        beforeSend: function (msg) {
                            $('#cargando').show();
                        },
                        success: function (msg) {
                            $('#resultado').html(msg);
                        },
                        error: function (msg) {
                            console.log(msg);
                        },
                        complete: function (msg) {
                            $('#cargando').hide();
                        }
                    });

//                    console.log('funciona!!!');
                });

            });
        </script>
    </body>
</html>
