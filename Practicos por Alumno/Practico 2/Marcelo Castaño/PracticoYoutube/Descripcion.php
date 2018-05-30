<?php
include_once './DAO/DAL/Connection.php';
include_once './DAO/DTO/Video.php';
include_once './DAO/BLL/VideoBLL.php';
include_once './DAO/DTO/Categoria.php';
include_once './DAO/BLL/CategoriaBLL.php';

$videoBLL = new VideoBLL();
$categoriaBLL = new CategoriaBLL();
$id = 0;
$listaCategoria = null;
$objVideos = null;
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];
    $objVideos = $videoBLL->selectById($id);
    $listaCategoria = $categoriaBLL->selectByIdVideoCategoria($id);

}

?>

<?php
include_once 'Header.php';
?>


<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 style="font-size: 80px; color:#bd081c;">Videos</h2>
            <form action="ListaVideos.php" method="post">

                <div class="form-group">
                    <video width="620" height="340" controls>
                        <source src="video/<?php echo $id; ?>.mp4"" type="video/mp4">
                        <source src="video/<?php echo $id; ?>.mp4"" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="form-group">
                    <label style="font-size: 25px; color:#bd081c;">
                        Titulo:
                    </label>
                    <br>
                    <label style="font-style: italic; font-size: 30px; ">
                        <?php
                        if ($objVideos != null) {
                            echo $objVideos->getTitulo();
                        }
                        ?>
                    </label>
                </div>
                <div class="form-group">
                    <label style="font-size: 25px; color:#bd081c;">
                        Descripcion:
                    </label><br>
                    <label style="font-style: italic; font-size: 30px; ">
                        <?php
                        if ($objVideos != null) {
                            echo $objVideos->getDescripcion();
                        }
                        ?>
                    </label>
                </div>
                <div class="form-group">
                    <label style="font-size: 25px; color:#bd081c;">
                        Autor:
                    </label><br>
                    <label style="font-style: italic; font-size: 30px;">
                        <?php
                        if ($objVideos != null) {
                            echo $objVideos->getAutor();
                        }
                        ?>
                    </label>
                </div>
                <div class="form-group">
                    <label style="font-size: 25px; color:#bd081c;">
                        Fecha de Publicacion:
                    </label><br>
                    <label style="font-style: italic; font-size: 30px;">
                        <?php
                        if ($objVideos != null) {
                            echo $objVideos->getFechasubida();
                        }
                        ?>
                    </label>
                </div>
                <div class="form-group">
                    <label style="font-size: 25px; color:#bd081c;">
                        Categorias:
                    </label><br>
                    <?php
                    foreach($listaCategoria as $objCate){
                    ?>
                    <label style="font-style: italic; font-size: 30px;">
                        <?php
                        if ($objCate != null) {
                            echo $objCate->getNombre();
                        }
                        ?>
                    </label><br/>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>


</div>
<?php
include_once 'Footer.php';
?>