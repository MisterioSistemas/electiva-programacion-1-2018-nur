<?php

include_once "DAO/DAL/Connection.php";
include_once "DAO/DTO/Video.php";
include_once "DAO/DTO/Categoria.php";
include_once "DAO/BLL/VideoBLL.php";
include_once "DAO/BLL/CategoriaBLL.php";

$objVideoBLL = new VideoBLL();
$objCategoriaBLL = new CategoriaBLL();
$objVideo = null;

if (isset($_REQUEST["id"])) {
    $objVideo = $objVideoBLL->selectById($_REQUEST["id"]);
    $objListaCate = $objCategoriaBLL->getCategoriasVideo($objVideo->getCodigoId());
}

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title><?php $objVideo->getTitulo() ?></title>
</head>
<body>
<div class="container">
    <a href="index.php">YOUTUV</a>
    <div class="row">
        <div class="col-12">
            <div>
                <video width="700px" height="700px" controls>
                    <source src="archivos/videos/<?php echo $objVideo->getVideo() ?>" type="video/mp4">
                </video>
            </div>
            <div>
               <h2><?php echo $objVideo->getTitulo() ?></h2>
            </div>
            <div>
                <p><?php echo $objVideo->getDescripcion(); ?></p>
            </div>
            <div>
                <h5>Categorias:</h5>
                <h6>
                    <?php
                    foreach ($objListaCate as $categoria) {
                        echo $categoria->getNombre();
                    }
                    ?>
                </h6>
            </div>
        </div>

    </div>
</div>

</body>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</html>
