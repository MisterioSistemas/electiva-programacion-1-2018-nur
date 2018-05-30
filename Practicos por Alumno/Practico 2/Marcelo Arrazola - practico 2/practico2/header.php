<?php
// Insert the path where you unpacked log4php
require_once ('log4php/Logger.php');

// Tell log4php to use our configuration file.
Logger::configure('config.xml');

// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('Capa Datos:');

//include_once './DAL/Connection.php';
//include_once './DTO/Videos.php';
//include_once './BLL/VideoBLL.php';
//
//include_once './DTO/Categoria.php';
//include_once './BLL/CategoriaBLL.php';
//
//include_once './DTO/VideoCategoria.php';
//include_once './BLL/VideoCategoriaBLL.php';
//
//$videoBLL = new VideoBLL();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>YoTUVE</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/fontawesome/css/fontawesome-all.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/fontawesome/css/fontawesome.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="menuContainer">
            <div class="menu">
                <a href="index.php" class="tituloPag">YoTUVE</a>
                <div class="divBuscar">
                    <form action="index.php" method="POST">
                        <input type="text" placeholder="Buscar" id="buscar" name="buscar" class="buscar"/>
                        <a class="nuevo" href="index.php">
                            <i class="fas fa-search"></i>
                        </a>
                    </form>
                </div>

                <div class="sub-menu">
                    <a class="nuevo" href="formulario.php">
                        <i class="far fa-plus-square"></i>
                    </a>
                    <a href = "listaAdm.php" class = "link linkADM"><i class="far fa-user"></i>Admin</a>
                </div>

            </div>
        </div>