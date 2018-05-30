<?php
include_once './header.php';

include_once './DAL/Connection.php';
include_once './DTO/Videos.php';
include_once './BLL/VideoBLL.php';

include_once './DTO/Categoria.php';
include_once './BLL/CategoriaBLL.php';

include_once './DTO/VideoCategoria.php';
include_once './BLL/VideoCategoriaBLL.php';

$objVideo = null;
$objCategoria = null;
$listaVideoCategoria = null;

$videoBLL = new VideoBLL();
$categoriaBLL = new CategoriaBLL();
$videoCategoriaBLL = new VideoCategoriaBLL();

$task = "insert";
if (isset($_REQUEST["id"])) {
    $objVideo = $videoBLL->selectById($_REQUEST["id"]);
    $task = "update";

    $listaVideoCategoria = $videoCategoriaBLL->selectByVideo($objVideo->getId());
}

if (isset($_REQUEST["nombreCategoria"])) {
    $nombreCategoria = $_REQUEST["nombreCategoria"];
    $categoriaBLL->insert($nombreCategoria);
}
?>

<div class="container">
    <div class="formContainer">
        <div class="form">
            <form action="listaAdm.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id"  value="<?php
                if ($objVideo != null) {
                    echo $objVideo->getId();
                }
                ?>"/>
                <input type="hidden" name="task" value="<?php echo $task; ?>"/>
                <div class="formNombre formDiv">
                    <label>Nombre: </label>

                    <input type="text" class="formInputNombre formInput" name="nombre" value="<?php
                    if ($objVideo != null) {
                        echo $objVideo->getNombre();
                    }
                    ?>"/>
                </div>

                <div class="formDirector formDiv">
                    <label>Autor:</label>
                    <input type="text" class="formInputDirector formInput" name="autor" value="<?php
                    if ($objVideo != null) {
                        echo $objVideo->getAutor();
                    }
                    ?>"/>
                </div>
                <?php if ($objVideo != null) { ?>
                    <div class = "formAño formDiv">
                        <label>Subido:</label>
                        <input type = "hidden" class = "formInputAño formInput" name = "fechaSubido" value = "<?php
                        if ($objVideo != null) {
                            echo $objVideo->getFechaSubida();
                        }
                        ?>"/>
                        <label><?php
                            if ($objVideo != null) {
                                echo $objVideo->getFechaSubida();
                            }
                            ?></label>
                    </div><?php
                }
                ?>

                <div class = "formSinopsis formDiv">
                    <label>Descripcion:</label>
                    <textarea class = "formInputSinopsis" name = "descripcion"><?php
                        if ($objVideo != null) {
                            echo $objVideo->getDescripcion();
                        }
                        ?></textarea>

                </div>
                <div class="checks">
                    <h3>Categorias: 
                        <a class="nuevo" href="
                        <?php
                        if ($objVideo != null) {
                            echo "addCategoria.php?id=".$objVideo->getId();
                        }else{
                            echo "addCategoria.php";
                        }
                        ?>"> <i class="iconoMenu fas fa-plus-circle"></i></a></h3>
                    <br>
                    <div class="checksContainer">
                        <?php
                        $listaCategorias = $categoriaBLL->selectAll();
                        foreach ($listaCategorias as $objCategoria) {
                            ?>                        
                            <div class="categoriasChecks">
                                <input type='checkbox' name='categoriasCheck[<?php echo $objCategoria->getId() ?>]' value='<?php echo $objCategoria->getId() ?>'
                                <?php
                                if ($objVideo != null) {
                                    $listaVidCat = $videoCategoriaBLL->selectByVideo($objVideo->getId());
                                    foreach ($listaVidCat as $objCatVid) {
                                        if ($objCategoria->getId() == $objCatVid->getId()) {
                                            echo "checked";
                                        }
                                    }
                                }
                                ?>/><?php echo $objCategoria->getNombre() ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div><br>

                <div class="formURLImg formDiv">
                    <label>Imagen:</label>
                    <div>
                        <label for="image"><?php
                            if ($objVideo != null) {
                                echo $objVideo->getId() . '.jpg';
                            }
                            ?> </label>
                        <br>
                        <input type="file" class="formInputURL" name="image" 
                               id="image" accept=".jpg" />

                    </div>
                </div>
                <div class="formURLVideo formDiv">
                    <label>Video:</label>
                    <div>
                        <label for="video"><?php
                            if ($objVideo != null) {
                                echo $objVideo->getId() . '.mp4';
                            }
                            ?> </label>
                        <br>
                        <input type="file" class="formInputURL" name="video" 
                               id="video" accept=".mp4" required="required"/>

                    </div>
                </div>

                <div class="formBtn formDiv">
                    <input type="submit" value="Aceptar" class="formInputButtom" />
                    <a href="index.php" class="linkCancelar">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once './footer.php'; ?>
