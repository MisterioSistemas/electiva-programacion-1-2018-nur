<?php
include_once './DAO/DAL/Connection.php';
include_once './DAO/DTO/Categoria.php';
include_once './DAO/BLL/CategoriaBLL.php';
include_once './DAO/DTO/Video.php';
include_once './DAO/BLL/VideoBLL.php';
$categoriaBLL = new CategoriaBLL();
$videoBLL = new VideoBLL();
$objVideo = null;
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
    $objVideo = $videoBLL->selectById($id);
}
$listaCategoria = $categoriaBLL->selectAll();
?>
<?php
include_once 'Header.php';
?>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Datos de Categorias</h2>
            <form action="ListaVideos.php" method="Get">
                <input  type="hidden" value="categoriaxvideo" name="tarea" />
                <input type="hidden" value="<?php echo $objVideo->getId();  ?>" name="idVideo"/>
                <?php
                foreach($listaCategoria as $objCate){
                    ?>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="idcategoria-<?php echo $objCate->getId(); ?>" value="<?php echo $objCate->getId(); ?>" > <?php echo $objCate->getNombre(); ?> </input>
                        </label>
                    </div>
                <?php } ?>

                <div>

                    <input class="btn btn-primary" type="submit" value="Guardar Datos">
                    <a href="FrmCategorias.php" class="btn btn-danger" >Cancelar</a>
                </div>

            </form>
        </div>
    </div>


</div>

<?php
include_once 'Footer.php';
?>