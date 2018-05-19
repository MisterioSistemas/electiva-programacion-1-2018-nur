<?php
/**
 * Description of VideoBLL
 *
 * @author Marcelo_Castaño
 */
class VideoBLL {
    public function insert($titulo,$descripcion, $fecha,$autor ) {
        $objConexion = new Connection();
        $objConexion->queryWithParams("call sp_tblvideo_Insert(:pTitulo,:pDescripcion, :pFecha, :pAutor)", array(
           ":pTitulo"=> $titulo,
            ":pDescripcion"=> $descripcion,
            ":pFecha"=> $fecha,
            ":pAutor"=> $autor
        ));
    }
    public function update($titulo,$descripcion, $fecha,$autor, $id) {
        $objConexion = new Connection();
        $objConexion->queryWithParams("call sp_tblvideo_Update(:pTitulo,:pDescripcion, :pFecha, :pAutor, :pId)", array(
            ":pTitulo"=> $titulo,
            ":pDescripcion"=> $descripcion,
            ":pFecha"=> $fecha,
            ":pAutor"=> $autor,
            ":pId" => $id
        ));
    }
    public function delete($id) {
        $objConexion = new Connection();
        $objConexion->queryWithParams("
               call sp_tblvideo_Delete(:pId)", array(
            ":pId" => $id
        ));
    }

    public function deletevideoCategoria($id) {
        $objConexion = new Connection();
        $objConexion->queryWithParams("
               call sp_tblvideocategoria_Delete(:pId)", array(
            ":pId" => $id
        ));
    }

    public function selectAll() {
        $listaVideos = array();
        $objConexion = new Connection();
        $res = $objConexion->query("
                call sp_tblvideo_SelectAll()");
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $objVideo = $this->rowToDto($row);
            $listaVideos[] = $objVideo;
        }
        return $listaVideos;
    }
    public function selectById($id) {
        $objConexion = new Connection();
        $res = $objConexion->queryWithParams("
               call sp_tblvideo_SelectById(:pId)", array(
            ":pId" => $id
        ));
        if ($res->rowCount() == 0) {
            return null;
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        return $this->rowToDto($row);
    }

    public function selectByIdVideoCategoria($id) {
        $listaVideos = array();
        $objConexion = new Connection();
        $res = $objConexion->queryWithParams("
               call sp_tblcategorias_SelectByVideos(:pId)", array(
            ":pId" => $id
        ));
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $objCategoria = $this->rowToDtoCategoriaVideo($row);
            $listaVideos[] = $objCategoria;
        }
        return $listaVideos;
    }

    public function selectByTitulo($titulo) {
        $listaVideos = array();
        $objConexion = new Connection();
        $res = $objConexion->queryWithParams("
               call sp_tblvideo_BuscarTitulo(:ptitulo)", array(
            ":ptitulo" => $titulo
        ));
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $objCategoria = $this->rowToDtoCategoriaVideo($row);
            $listaVideos[] = $objCategoria;
        }
        return $listaVideos;
    }

    function rowToDto($row) {
        $objVideo = new Video();
        $objVideo->setId($row["video_id"]);
        $objVideo->setTitulo($row["titulo"]);
        $objVideo->setDescripcion($row["descripcion"]);
        $objVideo->setFechasubida($row["fecha_subida"]);
        $objVideo->setAutor($row["autor"]);

        return $objVideo;
    }
    function rowToDtoByCategoria($row) {
        $objVideo = new Video();
        $objVideo->setId($row["v.video_id"]);
        $objVideo->setTitulo($row["v.titulo"]);
        $objVideo->setDescripcion($row["v.descripcion"]);
        $objVideo->setFechasubida($row["v.fecha_subida"]);
        $objVideo->setAutor($row["v.autor"]);
        $objVideo->setCategoria($row["c.nombre"]);
        return $objVideo;
    }
    function rowToDtoCategoriaVideo($row) {
        $objVideo = new Video();
        $objVideo->setId($row["video_id"]);
        $objVideo->setTitulo($row["titulo"]);
        $objVideo->setAutor($row["autor"]);
        $objVideo->setFechasubida($row["fecha_subida"]);
        return $objVideo;
    }

}