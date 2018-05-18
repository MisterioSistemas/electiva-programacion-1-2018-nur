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
?>

<div class="greatContainer">
    <div class="categorias">
        <a href="index.php" class="linkCategoria">
            Todo <?php ?>
        </a>
        <?php
        $listaCategorias = $categoriaBLL->selectAll();
        foreach ($listaCategorias as $objCategoria) {
            ?>
            <a href="index.php?categoriaId=<?php echo $objCategoria->getId() ?>" class="linkCategoria">
                <?php echo $objCategoria->getNombre() ?> <label class="id" id="id"><?php echo $objCategoria->getId() ?></label>
            </a>
            <?php
        }
        ?> 
    </div>


    <div class="contenedorPeliculas">
        <?php
        if (isset($_REQUEST["buscar"])) {
            $nombre = $_REQUEST["buscar"];
            $listaVideos = $videoBLL->search($nombre);
            ?><label class="respuesta">Resultados para <?php echo $nombre?>...</label><?php
        } else if (isset($_REQUEST["categoriaId"])) {
            $categoriaId = $_REQUEST["categoriaId"];
            $listaVideos = $videoCategoriaBLL->selectByCategoria($categoriaId);
            ?><label class="respuesta">Resultados para <?php echo $categoriaBLL->selectById($categoriaId)->getNombre()?>...
            </label><?php
        } else {
            $listaVideos = $videoBLL->selectAllByName();
        }
        foreach ($listaVideos as $objVideo) {
            ?>
            <div class="video">

                <label class="id" id="id"><?php echo $objVideo->getId() ?></label>

                <div class="divPortada">
                    <a href="descVideo.php?id=<?php echo $objVideo->getId() ?>">
                        <img class="imgPortada" src="css/img/<?php echo $objVideo->getId() ?>.jpg" alt="portada<?php echo $objVideo->getId() ?>"/>

                        <h3 class="nombreVideo">
                            <?php echo $objVideo->getNombre() ?>
                        </h3>
                    </a>
                </div>
                <a href="descVideo.php?id=<?php echo $objVideo->getId() ?>" class="linkIcon iconPlay">
                    <i class="far fa-play-circle"></i>
                </a>
                <div class="divTexto">

                    <label class="autorVideo">
                        <a href="#" class="link"><?php echo $objVideo->getAutor() ?></a>
                    </label>
                    <label class="fechaVideo">
                        <a href="#" class="link"><?php echo $objVideo->getFechaSubida() ?></a>
                    </label>
                </div>
            </div>
            <?php
        }
        ?>

    </div>
    <?php
// put your code here
    ?>
</div>

<?php include_once './footer.php'; ?>