<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once './DAL/Connection.php';
        include_once './BLL/CategoriaBLL.php';
        include_once './BLL/VideoBLL.php';
        include_once './BLL/CategoriaVideoBLL.php';
        include_once './DTO/Categoria.php';
        include_once './DTO/CategoriaVideo.php';
        include_once './DTO/Video.php';

        $CategoriaBLL = new CategoriaBLL();
        $VideoBLL = new VideoBLL();
        $CategoriaVideoBLL = new CategoriaVideoBLL();

        $titulo = $_REQUEST["txtTitulo"];
        $descripcion = $_REQUEST["txtDescripcion"];
        $fecha = $_REQUEST["txtFecha"];
        $autor = $_REQUEST["txtAutor"];

        $VideoBLL->insert($titulo, $descripcion, $fecha, 'video', 'imagen', $autor);
        
        $lastId = $VideoBLL->obtenerUltimo();
        
        $carpetaDestino = 'Image/Video/';
        $archivo = $_FILES["txtVideo"]["name"];
        $extension = explode(".", $archivo);
        $ext = $extension[1];
        echo '<p>Esto es la extension ' . $ext . $archivo . '</p>';
        $destino = $carpetaDestino .$lastId. "video.". $ext;
        echo '<p>Esto es la DESTINO ' . $destino . '</p>';


        $carpetaDestino1 = 'Image/Portada/';
        $archivo1 = $_FILES["txtPortada"]["name"];
        $extension1 = explode(".", $archivo1);
        $ext1 = $extension1[1];
        echo '<p>Esto es la extension ' . $ext1 . $archivo1 . '</p>';
        $destino1 = $carpetaDestino1.$lastId."portada.".$ext1;
        echo '<p>Esto es la DESTINO ' . $destino1 . '</p>';

        if (move_uploaded_file($_FILES['txtVideo']['tmp_name'], $destino) && move_uploaded_file($_FILES['txtPortada']['tmp_name'], $destino1)) {
//            $urlDestinoPortada = substr($destino, 3, strlen($destino));
//            $urlDestinoLogo = substr($destino2, 3, strlen($destino2));
            echo 'Esto lo que se dirige' . $destino . ' - ' . $destino1;
            $VideoBLL->updateImage($destino, $destino1, $lastId);
            echo 'Guardado exitoso.';
            //header('Location: ../Principal.php');
        } else {
            echo 'No se pudo guardar';
        }
        
        $VideoCategorias = array();
        for ($index = 1; $index < 14; $index++) {
            if (isset($_REQUEST['Categoria'.$index])){
                $VideoCategorias[] = $index;
            }
        }
        
        for ($index1 = 0; $index1 < count($VideoCategorias); $index1++) {
            $cat = $VideoCategorias[$index1];
            print_r($cat);
            $CategoriaVideoBLL->insert($cat, $lastId);
        } 
        
        header('Location: index.php');
        
        ?>
    </body>
</html>
