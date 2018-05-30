<?php
include_once "DAO/DAL/Connection.php";
include_once "DAO/DTO/Video.php";
include_once "DAO/BLL/VideoBLL.php";

$objVideoBLL = new VideoBLL();
$objVideo = null;
$task = "insert";
if (isset($_REQUEST["id"])) {
    $objVideo = $objVideoBLL->selectById($_REQUEST["id"]);
    $task = "update";
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>YUTUV Registro de videos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-12 offset-4">
            <h1><a href="index.php">YUTUV</a></h1>
            <h3>Registro De Videos</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-3">
            <form action="VideosABM.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="task" value="<?php echo $task ?>"/>
                <input type="hidden" name="id" value="<?php
                if ($objVideo != null) {
                    echo $objVideo->getCodigoId();
                }
                ?>"/>

                <div class="form-group">
                    <label>Titulo: </label>
                    <input type="text" name="titulo" class="form-control" value="<?php
                    if ($objVideo != null) {
                        echo $objVideo->getTitulo();
                    }
                    ?>"/>
                </div>

                <div class="form-group">
                    <label>Autor: </label>
                    <input type="text" name="autor" class="form-control" value="<?php
                    if ($objVideo != null) {
                        echo $objVideo->getAutor();
                    }
                    ?>"/>
                </div>

                <div class="form-group">
                    <label>Descripcion: </label>
                    <textarea name="descripcion" cols="10" rows="5" class="form-control"><?php
                        if ($objVideo != null) {
                            echo $objVideo->getDescripcion();
                        }
                        ?></textarea>
                </div>

                <div class="form-group">
                    <label>Video: </label>
                    <input type="file" name="videoName" accept=".mp4, .ogg" class="form-control"/>
                </div>

                <div class="form-group">
                    <label>Miniatura del Video: </label>
                    <input type="file" name="imgVideo" accept=".jpg, .jpeg, .png, .gif" class="form-control"/>
                </div>

                <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-primary"/>
                    <a class="btn btn-danger" href="VideosABM.php">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</div>


</body>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</html>