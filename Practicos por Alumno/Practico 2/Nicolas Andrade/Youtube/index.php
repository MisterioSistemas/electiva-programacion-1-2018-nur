<?php
include_once "DAO/DAL/Connection.php";
include_once "DAO/DTO/Video.php";
include_once "DAO/DTO/Categoria.php";
include_once "DAO/BLL/VideoBLL.php";
include_once "DAO/BLL/CategoriaBLL.php";

$objVideoBLL = new VideoBLL();
$objCategoriaBLL = new CategoriaBLL();

if (isset($_REQUEST["id"])) {
    $listaVideos = $objVideoBLL->sellectByCategoria($_REQUEST["id"]);
} else {
    $listaVideos = $objVideoBLL->sellectAll();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="12">
            <a href="VideosABM.php" class="btn btn-link">Administrar Videos</a>
            <?php
            $listaCategorias = $objCategoriaBLL->sellectAll();
            foreach ($listaCategorias as $objCategoria) {
                ?>
                <a class="btn btn-primary" href="index.php?id=<?php echo $objCategoria->getCodigoId() ?>">
                    <?php echo $objCategoria->getNombre(); ?>
                </a>
                <?php
            }
            ?>
            <a class="btn btn-primary" href="index.php">Todos</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 video">
            <br>
            <div>
                <?php
                foreach ($listaVideos as $objVideo) {
                    ?>

                    <a href="verVideo.php?id=<?php echo $objVideo->getCodigoId() ?>">
                        <img src="archivos/imgs/<?php echo $objVideo->getImagen(); ?>" alt="img">
                    </a>


                    <h5><?php echo $objVideo->getTitulo(); ?></h5>
                    <h6><?php echo $objVideo->getFecha(); ?></h6>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</html>
