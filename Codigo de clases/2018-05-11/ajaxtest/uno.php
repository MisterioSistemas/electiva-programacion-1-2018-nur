<!DOCTYPE html>


<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="javascript:void(0)" id="traerDatosLink">
            Traer datos
        </a>
        <div id="resultado">
            
        </div>
        
        <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#traerDatosLink').on('click',function(e){
                    e.preventDefault();
                   
                    $.ajax({
                        url:'ajax.php',
                        success:function(msg){
                            $('#resultado').html(msg);
                        },
                        error:function (msg){
                            console.log(msg);
                        }
                    });
                    
//                    console.log('funciona!!!');
                });
                
            });
        </script>
    </body>
</html>
