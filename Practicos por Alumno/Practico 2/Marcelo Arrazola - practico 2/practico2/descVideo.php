<?php
include_once './header.php';

include_once './DAL/Connection.php';
include_once './DTO/Videos.php';
include_once './BLL/VideoBLL.php';

include_once './DTO/Categoria.php';
include_once './BLL/CategoriaBLL.php';

include_once './DTO/VideoCategoria.php';
include_once './BLL/VideoCategoriaBLL.php';

$categoriaBLL = new CategoriaBLL();
$videoCategoriaBLL = new VideoCategoriaBLL();

$objVideo = null;
$videoBLL = new VideoBLL();

if (isset($_REQUEST["id"])) {
    $objVideo = $videoBLL->selectById($_REQUEST["id"]);
}
?>
<div>
    <div class="divAtras">
        <a href="index.php" class="link linkDesc"><i class="far fa-arrow-alt-circle-left"></i>Atras</a>
    </div>
    <div class="divVideo">
        <video class="descVideo" controls>
            <source src="css/video/<?php echo $objVideo->getId() ?>.mp4" type="video/mp4">
            Your browser does not support the <code>video</code> tag.
        </video>
    </div>
    <div class="info">
        <div class="contenido">
            <div class="divNombre">
                <label class="tituloDesc">
                    <?php
                    echo $objVideo->getNombre();
                    ?>
                </label>
            </div>
            <div class="divAutor">
                <label class="textoDesc txtAutor">
                    <?php
                    if ($objVideo != null) {
                        echo $objVideo->getAutor();
                    }
                    ?>
                </label>
                <label class="textoDesc txtFecha">
                    <?php
                    if ($objVideo != null) {
                        echo $objVideo->getFechaSubida();
                    }
                    ?>
                </label>
            </div>

            <div class="divDescricion">
                <label class="textoDesc">
                    <?php
                    if ($objVideo != null) {
                        echo $objVideo->getDescripcion();
                    }
                    ?>
                </label>
            </div>


        </div>
        <div class="rightConten">
            <div class="divSubIconsDesc">
                <a href="#" class="linkIconDesc subIconsDesc">
                    <i class="far fa-thumbs-up"></i>
                </a>
                <a href="#" class="linkIconDesc subIconsDesc">
                    <i class="far fa-thumbs-down"></i>
                </a>
            </div>

            <div class="categoriasVideo">
                <label class="textoDesc">Categorias: <br><br>
                </label>
                <?php
                $listaVideoCategoria = $videoCategoriaBLL->selectByVideo($objVideo->getId());
                foreach ($listaVideoCategoria as $objCategoriaVideo) {
                    ?>
                    <a href="index.php?categoriaId=<?php echo $objCategoriaVideo->getId() ?>" class="linkEtiquetas">
                        <?php
                        echo $objCategoriaVideo->getNombre();
                        ?>
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
include_once './footer.php';
?>