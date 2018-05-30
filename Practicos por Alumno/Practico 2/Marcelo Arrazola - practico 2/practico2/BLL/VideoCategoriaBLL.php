<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of videoCategoriaBLL
 *
 * @author HP
 */
class VideoCategoriaBLL {

    private $tableName = "videocategoria";

    public function selectAll() {
        $listaVideoCategorias = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query("CALL getVideoCategoria()");
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objVideoCategoria = $this->rowToDto($row);
                $listaVideoCategorias[] = $objVideoCategoria;
            }
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer selectAll con tabla $this->tableName", $e);
        }
        return $listaVideoCategorias;
    }

    public function selectByCategoria($id) {
        $listaVideoByCategoria = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("CALL getVideoByCategoria(:varID)", array(
                ":varID" => $id));
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objVideo = $this->rowToDtoVideo($row);
                $listaVideoByCategoria[] = $objVideo;
            }
        } catch (Exception $e) {
            $log->error("Error al hacer selectAll con tabla $this->tableName", $e);
        }
        return $listaVideoByCategoria;
    }

    public function selectByVideo($id) {
        $listaCategoriasByvideo = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("CALL getCategoriaByVideo(:varID)", array(
                ":varID" => $id));

            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objCategoria = $this->rowToDtoCategoria($row);
                $listaCategoriasByvideo[] = $objCategoria;
            }
        } catch (Exception $e) {
            $log->error("Error al hacer selectAll con tabla $this->tableName", $e);
        }
        return $listaCategoriasByvideo;
    }

    public function insert($idCategoria, $idVideo) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL insertVideoCategoria(:varIdVideo, :varIdCategoria)"
                    , array(
                ":varIdCategoria" => $idCategoria,
                ":varIdVideo" => $idVideo
            ));
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer insert con tabla $this->tableName", $e);
        }
    }

    public function update($idCategoria, $idVideo, $id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL updateVideoCategoria(:varIdCategoria,:varIdVideo,:varId)"
                    , array(
                ":varIdCategoria" => $idCategoria,
                ":varIdVideo" => $idVideo,
                ":varId" => $id
            ));
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer update con tabla $this->tableName", $e);
        }
    }

    public function delete($id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL deleteVideoCategoria(:varId)"
                    , array(
                ":varId" => $id
            ));
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer delete con tabla $this->tableName", $e);
        }
    }

    public function deleteByVideo($id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL deleteVideoCategoriaByVideo(:varId)"
                    , array(
                ":varId" => $id
            ));
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer delete con tabla $this->tableName", $e);
        }
    }

    function rowToDto($row) {
        $objVideoCategoria = new VideoCategoria();
        $objVideoCategoria->setCategoriaId($row["categoriaid"]);
        $objVideoCategoria->setVideoId($row["videoid"]);
        $objVideo->setId($row["id"]);

        return $objVideoCategoria;
    }

    function rowToDtoVideo($row) {
        $objVideo = new Videos();
        $objVideo->setNombre($row["nombre"]);
        $objVideo->setDescripcion($row["descripcion"]);
        $objVideo->setFechaSubida($row["fechaSubida"]);
        $objVideo->setAutor($row["autor"]);
        $objVideo->setId($row["id"]);

        return $objVideo;
    }

    function rowToDtoCategoria($row) {
        $objCategoria = new Categoria();
        $objCategoria->setNombre($row["nombre"]);
        $objCategoria->setId($row["id"]);

        return $objCategoria;
    }

}
