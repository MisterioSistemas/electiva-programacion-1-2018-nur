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

$objVideo = null;
$objCategoria = null;
$listaVideoCategoria = null;


$task = "insert";
if (isset($_REQUEST["id"])) {
    $objVideo = $videoBLL->selectById($_REQUEST["id"]);
    $task = "update";
}

if (isset($_REQUEST["catId"])) {
    $categoriaId = $_REQUEST["catId"];
    $objCategoria = $categoriaBLL->delete($categoriaId);
}
?>

<div class="container">
    <div class="formContainer">
        <div class="form">
            <form action="<?php
            if ($objVideo != null) {
                echo "formulario.php?id=" . $objVideo->getId();
            } else {
                echo "formulario.php";
            }
            ?>" method="POST" enctype="multipart/form-data">
                <?php
                if ($objVideo != null) {
                          ?>
                    <input type="hidden" name="id"  value="<?php
                    echo $objVideo->getId();
                    ?>"/>
                    <input type="hidden" name="task" value="<?php echo $task; ?>"/>
                    <?php
                }
                ?>
                <div class="formNombre formDiv">
                    <label>Nombre: </label>

                    <input type="text" class="formInputNombre formInput" name="nombreCategoria" value=""/>
                </div>


                <div class="formBtn formDiv">
                    <input type="submit" value="Aceptar" class="formInputButtom"/>
                    <a href="formulario.php">Cancelar</a>
                </div>
            </form>
        </div>
        <div class="checksDiv">
            <div class="checksContainer">

                <?php
                $listaCategorias = $categoriaBLL->selectAll();
                foreach ($listaCategorias as $objCategoria) {
                    ?>                        
                    <div class="categoriasChecks deleteCat">
                        <a href="
                        <?php
                        if ($objVideo != null) {
                            echo "addCategoria.php?id=" . $objVideo->getId() . "&catId=" . $objCategoria->getId();
                        } else {
                            echo "addCategoria.php?catId=" . $objCategoria->getId();
                        }
                        ?>" class="delCategorias">
                            <label class="txtCategorias lblCategorias"><?php echo $objCategoria->getNombre() ?></label><i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include_once './footer.php'; ?>
