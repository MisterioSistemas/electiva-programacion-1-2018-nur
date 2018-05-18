<?php

include_once "DAO/DAL/Connection.php";
include_once "DAO/DTO/Video.php";
include_once "DAO/DTO/Categoria.php";
include_once "DAO/BLL/VideoBLL.php";
include_once "DAO/BLL/CategoriaBLL.php";

$objVideoBLL = new VideoBLL();
$objCategoriaBLL = new CategoriaBLL();

$task = "list";
if (isset($_REQUEST["task"])) {
    $task = $_REQUEST["task"];
}

$objVideo = null;
if (isset($_REQUEST["id"])) {
    $objVideo = $objVideoBLL->selectById($_REQUEST["id"]);
}

$listaCategorias = $objCategoriaBLL->sellectAll();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <form action="VideosABM.php" method="psot">
                <h1>Seleccione las Categorias</h1>

                <input type="hidden" value="<?php echo $objVideo->getCodigoId(); ?>" name="idVideo"/>
                <input type="hidden" value="categorias" name="task"/>

                <?php
                foreach ($listaCategorias as $categoria) {
                    ?>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="idCategoria-<?php echo $categoria->getCodigoId(); ?>"
                                   value="<?php echo $objVideo->getCodigoId(); ?>"><?php echo $categoria->getNombre() ?>
                        </label>
                    </div>

                    <?php
                }
                ?>
                <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-primary"/>
                    <a href="VideosABM.php">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
