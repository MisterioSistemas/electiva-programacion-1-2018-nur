<?php
include_once "DAO/DAL/Connection.php";
include_once "DAO/DTO/Video.php";
include_once "DAO/DTO/Categoria.php";
include_once "DAO/BLL/VideoBLL.php";
include_once "DAO/BLL/CategoriaBLL.php";

$objVideoBLL = new VideoBLL();
$task = "";
if (isset($_REQUEST["task"])) {
    $task = $_REQUEST["task"];
}

if (isset($_FILES["videoName"]["name"])&& isset($_FILES["imgVideo"]["name"])) {

    $videoNombre = $_FILES["videoName"]["name"];
    $videoTipo = $_FILES["videoName"]["type"];

    $imagenNombre = $_FILES["imgVideo"]["name"];
    $imagenTipo = $_FILES["imgVideo"]["type"];

    $carpetaVideo = $_SERVER["DOCUMENT_ROOT"] . "/Youtube/archivos/videos/";
    $carpetaImg = $_SERVER["DOCUMENT_ROOT"] . "/Youtube/archivos/imgs/";

    $a = move_uploaded_file($_FILES["videoName"]["tmp_name"], $carpetaVideo . $videoNombre);
    $b = move_uploaded_file($_FILES["imgVideo"]["tmp_name"], $carpetaImg . $imagenNombre);
}

switch ($task) {
    case "insert":
        if (isset($_REQUEST["titulo"]) && isset($_REQUEST["autor"]) &&
            isset($_REQUEST["descripcion"]) && isset($_FILES["videoName"]["name"])&& isset($_FILES["imgVideo"]["name"])) {
            $titulo = $_REQUEST["titulo"];
            $autor = $_REQUEST["autor"];
            $descripcion = $_REQUEST["descripcion"];
            $video = $_FILES["videoName"]["name"];
            $imagen = $_FILES["imgVideo"]["name"];
            $objVideoBLL->insert($titulo, $autor, $descripcion, $video, $imagen);

        }
        break;

    case "update":
        if (isset($_REQUEST["titulo"]) && isset($_REQUEST["autor"]) &&
            isset($_REQUEST["descripcion"]) && isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
            $titulo = $_REQUEST["titulo"];
            $autor = $_REQUEST["autor"];
            $descripcion = $_REQUEST["descripcion"];
            $video = $_FILES["videoName"]["name"];
            $imagen = $_FILES["imgVideo"]["name"];
            $objVideoBLL->update($titulo, $autor, $descripcion, $video, $imagen, $id);
        }
        break;

    case "delete":
        if (isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
            $objVideoBLL->delete($id);
        }
        break;

    case "categorias":
        $objCategoriaBLL = new CategoriaBLL();
        $listaCategorias = $objCategoriaBLL->sellectAll();
        $idVideo = $_REQUEST["idVideo"];
        foreach ($listaCategorias as $objCategoria) {
            if(isset($_REQUEST["idCategoria-" . $objCategoria->getCodigoId()])){
                $objCategoriaBLL->VideoCategoria($idVideo, $objCategoria->getCodigoId());
            }
        }
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>YUTUV</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="container">
    <a href="index.php" style="font-size: 40px">YUTUV</a>
    <div class="row">
        <div class="col-12">
            <h1>Administrar Videos</h1>
            <a href="FormVideo.php" class="btn btn-info">Nuevo Video</a>
            <a href="FormCategoria.php" class="btn btn-info">Nuevo Categoria</a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div>

            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Video</th>
                    <th>Miniatura</th>
                    <th>Editar</th>
                    <th>Categorias</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $listaVideos = $objVideoBLL->sellectAll();
                foreach ($listaVideos as $video) {
                    ?>

                    <tr>
                        <td><?php echo $video->getCodigoId() ?></td>
                        <td><?php echo $video->getTitulo() ?></td>
                        <td><?php echo $video->getAutor() ?></td>
                        <td><?php echo $video->getDescripcion() ?></td>
                        <td><?php echo $video->getFecha() ?></td>
                        <td><?php echo $video->getVideo() ?></td>
                        <td><?php echo $video->getImagen() ?></td>
                        <td>
                            <a class="btn btn-primary"
                               href="FormVideo.php?id=<?php echo $video->getCodigoId(); ?>">Editar</a>
                        </td>
                        <td>
                            <a class="btn btn-info"
                               href="VideoCategorias.php?id=<?php echo $video->getCodigoId(); ?>">Categorias</a>
                        </td>
                        <td>
                            <a class="btn btn-danger"
                               href="VideosABM.php?id=<?php echo $video->getCodigoId(); ?>&task=delete">Eliminar</a>
                        </td>
                    </tr>

                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</html>
