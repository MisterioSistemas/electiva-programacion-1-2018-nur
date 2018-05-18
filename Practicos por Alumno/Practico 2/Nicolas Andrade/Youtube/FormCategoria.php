<?php
include_once "DAO/DAL/Connection.php";
include_once "DAO/DTO/Categoria.php";
include_once "DAO/BLL/CategoriaBLL.php";

$objCategoriaBLL = new CategoriaBLL();
$objCategoria = null;
$task = "insert";
if (isset($_REQUEST["id"])) {
    $objCategoria = $objCategoriaBLL->selectById($_REQUEST["id"]);
    $task = "update";
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>YUTUV Registro de categorias</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-12 offset-4">
            <h1>YUTUV</h1>
            <h3>Registro De Categorias</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-6 offset-3">
            <form action="CategoriasABM.php" method="POST">

                <input type="hidden" name="task" value="<?php echo $task ?>"/>
                <input type="hidden" name="id" value="<?php
                if ($objCategoria != null) {
                    echo $objCategoria->getCodigoId();
                }
                ?>"/>

                <div class="form-group">
                    <label>Nombre: </label>
                    <input type="text" name="nombre" class="form-control" value="<?php
                    if ($objCategoria != null) {
                        echo $objCategoria->getNombre();
                    }
                    ?>"/>
                </div>

                <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-primary"/>
                    <a class="btn btn-danger" href="CategoriasABM.php">Cancelar</a>
                </div>

            </form>
        </div>
    </div>
</div>


</body>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
</html>
