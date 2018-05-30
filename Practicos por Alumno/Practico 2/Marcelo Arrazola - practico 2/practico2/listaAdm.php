<?php
include_once './header.php';

include_once './DAL/Connection.php';
include_once './DTO/Videos.php';
include_once './BLL/VideoBLL.php';

include_once './DTO/Categoria.php';
include_once './BLL/CategoriaBLL.php';

include_once './DTO/VideoCategoria.php';
include_once './BLL/VideoCategoriaBLL.php';

$videoBLL = new VideoBLL();
$categoriaBLL = new CategoriaBLL();
$videoCategoriaBLL = new VideoCategoriaBLL();

$task = "list";


if (isset($_REQUEST["task"])) {
    $task = $_REQUEST["task"];
}



switch ($task) {
    case "insert":

        if (isset($_REQUEST["nombre"]) && isset($_REQUEST["autor"]) && isset($_REQUEST["descripcion"]) && isset($_FILES["image"]["name"]) && isset($_FILES["video"]["name"]) && isset($_REQUEST["categoriasCheck"])) {

            $nombre = $_REQUEST["nombre"];
            $autor = $_REQUEST["autor"];
            $descripcion = $_REQUEST["descripcion"];

            $videoBLL->insert($nombre, $descripcion, $autor);

            $listaChecks = $_REQUEST["categoriasCheck"];
            foreach ($listaChecks as $objCat) {
                $videoCategoriaBLL->insert((int) $objCat, $videoBLL->selectLastIndex()->getId());
            }
        }
        if (isset($_FILES["image"]["name"])) {
            $objVideoAux = $videoBLL->selectLastIndex();
            $imagenN = $_FILES["image"]["name"];
            $imagenT = $_FILES["image"]["type"];
            $carpeta = $_SERVER["DOCUMENT_ROOT"] . "/practico2/css/img/";

            $a = move_uploaded_file($_FILES["image"]["tmp_name"], $carpeta . $objVideoAux->getId() . ".jpg");
        }

        if (isset($_FILES["video"]["name"])) {

            $objVideoAux = $videoBLL->selectLastIndex();
            $videoN = $_FILES["video"]["name"];
            $videoT = $_FILES["video"]["type"];

            $carpetaVideo = $_SERVER["DOCUMENT_ROOT"] . "/practico2/css/video/";

            $a = move_uploaded_file($_FILES["video"]["tmp_name"], $carpetaVideo . $objVideoAux->getId() . ".mp4");
//            echo $a;
        }

        break;
    case "update":
        if (isset($_REQUEST["nombre"]) && isset($_REQUEST["autor"]) && isset($_REQUEST["fechaSubido"]) && isset($_REQUEST["descripcion"]) && isset($_FILES["image"]["name"]) && isset($_FILES["video"]["name"]) && isset($_REQUEST["categoriasCheck"]) && isset($_REQUEST["id"])) {

            $nombre = $_REQUEST["nombre"];
            $autor = $_REQUEST["autor"];
            $fechaSubido = $_REQUEST["fechaSubido"];
            $descripcion = $_REQUEST["descripcion"];

            $id = $_REQUEST["id"];

            $videoBLL->update($nombre, $descripcion, $fechaSubido, $autor, $id);
            $videoCategoriaBLL->deleteByVideo($id);
            $listaChecks = $_REQUEST["categoriasCheck"];
            foreach ($listaChecks as $objCat) {
                $videoCategoriaBLL->insert((int) $objCat, $id);
            }
        }
        if (isset($_FILES["image"]["name"])) {
            $objVideoAux = $videoBLL->selectLastIndex();
            $imagenN = $_FILES["image"]["name"];
            $imagenT = $_FILES["image"]["type"];
            $carpeta = $_SERVER["DOCUMENT_ROOT"] . "/practico2/css/img/";

            $a = move_uploaded_file($_FILES["image"]["tmp_name"], $carpeta . $id . ".jpg");
        }

        if (isset($_FILES["video"]["name"])) {

            $objVideoAux = $videoBLL->selectLastIndex();
            $videoN = $_FILES["video"]["name"];
            $videoT = $_FILES["video"]["type"];

            $carpetaVideo = $_SERVER["DOCUMENT_ROOT"] . "/practico2/css/video/";

            $a = move_uploaded_file($_FILES["video"]["tmp_name"], $carpetaVideo . $id . ".mp4");
//            echo $a;
        }
        
        break;
    case "delete":

        if (isset($_REQUEST["id"])) {

            $id = $_REQUEST["id"];
            $videoCategoriaBLL->deleteByVideo($id);
            $videoBLL->delete($id);
        }
        break;
}
?>


<div class="containerList">
    <div class="">
        <div class="DivTable">
            <table class="tableList">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Fecha Subida</th>
                        <th>Autor</th>
                        <th>Categorias</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $listaVideos = $videoBLL->selectAll();
                    foreach ($listaVideos as $objVideo) {
                        ?>
                        <tr>
                            <td><?php echo $objVideo->getId(); ?></td>
                            <td><?php echo $objVideo->getNombre(); ?></td>
                            <td><?php echo $objVideo->getDescripcion(); ?></td>
                            <td><?php echo $objVideo->getFechaSubida(); ?></td>
                            <td><?php echo $objVideo->getAutor(); ?></td>
                            <td>
                                <a class="btnCategoria btnStandar" href="addCategoria.php?id=<?php echo $objVideo->getId(); ?>">Categoria</a>
                            </td>
                            <td>
                                <a class="btnEditar btnStandar" href="formulario.php?id=<?php echo $objVideo->getId(); ?>">Editar</a>
                            </td>
                            <td>
                                <a class="btnEliminar btnStandar" href="listaAdm.php?id=<?php echo $objVideo->getId(); ?>&task=delete">Eliminar</a>
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

<?php include_once './footer.php'; ?>
