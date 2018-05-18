<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of videoBLL
 *
 * @author HP
 */
class VideoBLL {

    private $tableName = "videos";

    public function selectAll() {
        $listaVideos = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query("CALL getVideos()");
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objVideo = $this->rowToDto($row);
                $listaVideos[] = $objVideo;
            }
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer selectAll con tabla $this->tableName", $e);
        }
        return $listaVideos;
    }

    public function selectAllByName() {
        $listaVideos = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query("CALL getVideosOrderName()");
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objVideo = $this->rowToDto($row);
                $listaVideos[] = $objVideo;
            }
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer selectAll con tabla $this->tableName", $e);
        }
        return $listaVideos;
    }

    public function selectLastIndex() {
        $objVideo = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->query("CALL getVideoLastIndex()");
            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objVideo = $this->rowToDto($row);
            }
        } catch (Exception $e) {
            $log->error("Error al hacer selectById con tabla $this->tableName", $e);
        }
        return $objVideo;
    }

    public function selectById($id) {
        $objVideo = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("CALL getVideoById(:varId)", array(":varId" => $id));
            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objVideo = $this->rowToDto($row);
            }
        } catch (Exception $e) {
            $log->error("Error al hacer selectById con tabla $this->tableName", $e);
        }
        return $objVideo;
    }

    public function insert($nombres, $descripcion, $autor) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL insertVideo(:varNombre,:varDescripcion,:varFechaSubida, :varAutor)"
                    , array(
                ":varNombre" => $nombres,
                ":varDescripcion" => $descripcion,
                ":varFechaSubida" => $fecha=strftime( "%Y-%m-%d", time()),
                ":varAutor" => $autor
            ));
            
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer insert con tabla $this->tableName", $e);
        }
    }

    public function update($nombre, $descripcion, $fechaSubida, $autor, $id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL updateVideo(:varId,:varNombre,:varDescripcion,:varFechaSubida,:varAutor)"
                    , array(
                ":varId" => $id,
                ":varNombre" => $nombre,
                ":varDescripcion" => $descripcion,
                ":varFechaSubida" => $fechaSubida,
                ":varAutor" => $autor
            ));
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer update con tabla $this->tableName", $e);
        }
    }

    public function delete($id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL deleteVideo(:varId)"
                    , array(
                ":varId" => $id
            ));
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer delete con tabla $this->tableName", $e);
        }
    }

    public function search($nombre) {
        $listaVideos = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("CALL buscarVideo(:varNombre)"
                    , array(
                ":varNombre" => $nombre
            ));
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objVideo = $this->rowToDto($row);
                $listaVideos[] = $objVideo;
            }
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer selectAll con tabla $this->tableName", $e);
        }
        return $listaVideos;
    }

    function rowToDto($row) {
        $objVideo = new Videos();
        $objVideo->setNombre($row["nombre"]);
        $objVideo->setDescripcion($row["descripcion"]);
        $objVideo->setFechaSubida($row["fechaSubida"]);
        $objVideo->setAutor($row["autor"]);
        $objVideo->setId($row["id"]);

        return $objVideo;
    }

}
