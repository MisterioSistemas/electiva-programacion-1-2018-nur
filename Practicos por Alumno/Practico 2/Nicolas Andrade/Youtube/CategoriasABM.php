<?php
include_once "DAO/DAL/Connection.php";
include_once "DAO/DTO/Categoria.php";
include_once "DAO/BLL/CategoriaBLL.php";

$objCtegoriaBLL = new CategoriaBLL();
$task = "";

if (isset($_REQUEST["task"])) {
    $task = $_REQUEST["task"];
}

switch ($task) {
    case "insert":
        if (isset($_REQUEST["nombre"])) {
            $nombre = $_REQUEST["nombre"];
            $objCtegoriaBLL->insert($nombre);
        }
        break;

    case "update":
        if (isset($_REQUEST["nombre"]) && isset($_REQUEST["id"])) {
            $nombre = $_REQUEST["nombre"];
            $id = $_REQUEST["id"];
            $objCtegoriaBLL->insert($nombre, $id);
        }
        break;

    case "delete":
        if (isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
            $objCtegoriaBLL->delete($id);
        }
        break;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title>Categorias</title>
</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-6 offset-3">
            <h1>Administrar Categorias</h1>
            <a href="FormCategoria.php" class="btn btn-info">Nueva Categoria</a>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-6 offset-3">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $listaCategorias = $objCtegoriaBLL->sellectAll();
                foreach ($listaCategorias as $objCategoria) {
                    ?>

                    <tr>
                        <td><?php echo $objCategoria->getCodigoId(); ?></td>
                        <td><?php echo $objCategoria->getNombre(); ?></td>
                        <td>
                            <a class="btn btn-primary"
                               href="FormCategoria.php?id=<?php echo $objCategoria->getCodigoId(); ?>">Editar</a>
                        </td>
                        <td>
                            <a class="btn btn-danger"
                               href="CategoriasABM.php?id=<?php echo $objCategoria->getCodigoId(); ?>&task=delete">Eliminar</a>
                        </td>
                    </tr>

                    <?php
                }
                ?>
                </tbody>

            </table>
            <a href="VideosABM.php" class="btn btn-primary">Lista de Videos</a>
        </div>
    </div>
</div>

</body>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</html>
