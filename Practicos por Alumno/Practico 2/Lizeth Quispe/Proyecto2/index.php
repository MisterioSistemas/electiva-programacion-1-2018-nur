<?php
include_once './Header.php';
include_once './DAL/Connection.php';
include_once './DTO/Video.php';
include_once './BLL/VideoBLL.php';

$VideoBLL = new VideoBLL();

$Tipo = '';
$ID = 0;
error_reporting(E_ALL ^ E_NOTICE);
if ($_GET["cat"] == NULL) {
    $Tipo = 'Todos';
} else {
    $Tipo = $_GET["cat"];
    $ID = $_GET["id"];
}
?>

<title>Home</title>
</head>
<body data-color="red">
    <nav class="navbar navbar-absolute">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" id="titulo"><span id="Rojito">VID</span>EOS</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="SubirVideo.php" class="" data-toggle="">
                            <i class="material-icons">video_call</i>
                            <p class="hidden-lg hidden-md">Subir Video</p>
                        </a>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search" action="Buscar.php" method="POST">
                    <div class="form-group  is-empty">
                        <input type="text" class="form-control" placeholder="Buscar"name="txtBusqueda">
                        <span class="material-input"></span>
                    </div>
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <div class="sidebar" data-color="red" data-image="../assets/img/sidebar-1.jpg">
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="<?php
                    if ($Tipo == 'Juegos') {
                        echo 'active';
                    }
                    ?>">
                        <a href="index.php?cat=Juegos&id=1">
                            <i class="material-icons">videogame_asset</i>
                            <p>Juegos</p>
                        </a>
                    </li>
                    <li class="<?php
                    if ($Tipo == 'Música') {
                        echo 'active';
                    }
                    ?>">
                        <a href="index.php?cat=Música&id=5">
                            <i class="material-icons">music_video</i>
                            <p>Música</p>
                        </a>
                    </li>

                    <li class="<?php
                    if ($Tipo == 'Trailers') {
                        echo 'active';
                    }
                    ?>">
                        <a href="index.php?cat=Trailers&id=4">
                            <i class="material-icons">movie</i>
                            <p>Trailers</p>
                        </a>
                    </li>

                    <li class="<?php
                    if ($Tipo == 'Ocio') {
                        echo 'active';
                    }
                    ?>">
                        <a href="index.php?cat=Ocio&id=2">
                            <i class="material-icons">free_breakfast</i>
                            <p>Ocio</p>
                        </a>
                    </li>
                    <li class="<?php
                    if ($Tipo == 'Curiosidades') {
                        echo 'active';
                    }
                    ?>">
                        <a href="index.php?cat=Curiosidades&id=9">
                            <i class="material-icons">remove_red_eye</i>
                            <p>Curiosidades</p>
                        </a>
                    </li>
                    <li class="<?php
                    if ($Tipo == 'TV') {
                        echo 'active';
                    }
                    ?>">
                        <a href="index.php?cat=TV&id=6">
                            <i class="material-icons">tv</i>
                            <p>TV</p>
                        </a>
                    </li>
                    <li class="<?php
                    if ($Tipo == 'Animación') {
                        echo 'active';
                    }
                    ?>">
                        <a href="index.php?cat=Animación&id=7">
                            <i class="material-icons">face</i>
                            <p>Animación</p>
                        </a>
                    </li>
                    <li class="<?php
                    if ($Tipo == 'Entrevistas') {
                        echo 'active';
                    }
                    ?>">
                        <a href="index.php?cat=Entrevistas&id=8">
                            <i class="material-icons">record_voice_over</i>
                            <p>Entrevistas</p>
                        </a>
                    </li>
                    <li class="<?php
                    if ($Tipo == 'Random') {
                        echo 'active';
                    }
                    ?>">
                        <a href="index.php?cat=Random&id=10">
                            <i class="material-icons">extension</i>
                            <p>Random</p>
                        </a>
                    </li>
                    <li class="<?php
                    if ($Tipo == 'Naturaleza') {
                        echo 'active';
                    }
                    ?>">
                        <a href="index.php?cat=Naturaleza&id=11">
                            <i class="material-icons">nature</i>
                            <p>Naturaleza</p>
                        </a>
                    </li>
                    <li class="<?php
                    if ($Tipo == 'Noticias') {
                        echo 'active';
                    }
                    ?>">
                        <a href="index.php?cat=Noticias&id=3">
                            <i class="material-icons text-gray">vpn_lock</i>
                            <p>Noticias</p>
                        </a>
                    </li>
                    <li class="<?php
                    if ($Tipo == 'Animales') {
                        echo 'active';
                    }
                    ?>">
                        <a href="index.php?cat=Animales&id=12">
                            <i class="material-icons text-gray">pets</i>
                            <p>Animales</p>
                        </a>
                    </li>
                    <li class="<?php
                    if ($Tipo == 'Peliculas') {
                        echo 'active';
                    }
                    ?>">
                        <a href="index.php?cat=Peliculas&id=13">
                            <i class="material-icons text-gray">movie</i>
                            <p>Peliculas</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel" style="background-color: white;">
            <div class="content">
                <div class="container-fluid" >
                    <?php
                    if ($Tipo == 'Todos') {
                        ?>
                        <span class="titleVideo"><?php echo $Tipo; ?></span>  
                        <div class="row contenedor">
                            <?php
                            $listaVideos = $VideoBLL->selectAll();
                            foreach ($listaVideos as $objVideo) {
                                ?>
                                <div class="card">
                                    <a href="Individual.php?id=<?php echo $objVideo->getId_video(); ?>" style="color: black">
                                        <img class="card-img-top" style="height: 133px;" src="<?php echo $objVideo->getImagen(); ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-title"><?php echo $objVideo->getTitulo(); ?></p>
                                            <p class="card-text" style="font-weight: bold;"><?php echo $objVideo->getAutor(); ?></p>
                                            <p class="card-text"><?php echo $objVideo->getFecha(); ?></p>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    } else {
                        ?>
                        <span class="titleVideo"><?php echo $Tipo; ?></span>  
                        <div class="row contenedor">
                            <?php
                            $listaVideos = $VideoBLL->selectVideosCategoria(intval($ID));
                            foreach ($listaVideos as $objVideo) {
                                ?>
                                <div class="card">
                                    <a href="Individual.php?id=<?php echo $objVideo->getId_video(); ?>" style="color: black">
                                        <img class="card-img-top"  style="height: 133px;" src="<?php echo $objVideo->getImagen(); ?>" alt="Card image cap">
                                        <div class="card-body">
                                            <p class="card-title"><?php echo $objVideo->getTitulo(); ?></p>
                                            <p class="card-text" style="font-weight: bold;"><?php echo $objVideo->getAutor(); ?></p>
                                            <p class="card-text"><?php echo $objVideo->getFecha(); ?></p>
                                        </div>
                                    </a>
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>

</body>
<?php
include_once './Footer.php';
?>