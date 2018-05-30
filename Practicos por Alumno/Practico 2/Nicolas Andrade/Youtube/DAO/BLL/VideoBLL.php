<?php

class VideoBLL
{
    private $tableName = "tblVideos";

    public function insert($titulo, $autor, $descripcion, $video, $imagen)
    {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
            CALL mk_$this->tableName(
                :pTitulo, :pAutor, :pDescripcion, :pVideo, :pImagen
            )",
                array(
                    ":pTitulo" => $titulo,
                    ":pAutor" => $autor,
                    ":pDescripcion" => $descripcion,
                    ":pVideo" => $video,
                    ":pImagen" => $imagen
                ));
        } catch (Exception $e) {
            print_r($e);
        }
    }

    public function update($titulo, $autor, $descripcion, $video, $imagen, $id)
    {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
            CALL upd_$this->tableName(
                :pTitulo, :pAutor, :pDescripcion, :pVideo, :pImagen,:pId
            )",
                array(
                    ":pTitulo" => $titulo,
                    ":pAutor" => $autor,
                    ":pDescripcion" => $descripcion,
                    ":pVideo" => $video,
                    ":pImagen" => $imagen,
                    ":pId" => $id
                ));
        } catch (Exception $e) {
            print_r($e);
        }
    }

    public function delete($codigo_id)
    {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
            CALL del_$this->tableName(:pId)",
                array(
                    ":pId" => $codigo_id
                ));
        } catch (Exception $e) {

        }
    }

    public function sellectAll()
    {
        $listaVideos = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query("CALL get_$this->tableName");

            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objVideo = $this->rowToDto($row);
                $listaVideos[] = $objVideo;
            }
        } catch (Exception $e) {
            //TODO: aumentar log4php
            print_r($e);
        }

        return $listaVideos;
    }

    public function sellectByCategoria($categoriaId)
    {
        $listaVideos = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("
            CALL get_tblVideosByCategoria(:pVideoId)", array(
                ":pVideoId" => $categoriaId
            ));

            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objVideo = $this->rowToDto($row);
                $listaVideos[] = $objVideo;
            }
        } catch (Exception $e) {
            //TODO: aumentar log4php
            print_r($e);
        }

        return $listaVideos;
    }

    public function selectById($codigo_id)
    {
        $objVideo = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("
            CALL get_tblVideosById(:pId)", array(
                ":pId" => $codigo_id
            ));

            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objVideo = $this->rowToDto($row);
            }

        } catch (Exception $e) {
            //TODO: aumentar log4php
            print_t($e);
        }
        return $objVideo;
    }

    function rowToDto($row)
    {
        $objVideo = new Video();

        $objVideo->setCodigoId($row["codigo_id"]);
        $objVideo->setTitulo($row["titulo"]);
        $objVideo->setAutor($row["autor"]);
        $objVideo->setDescripcion($row["descripcion"]);
        $objVideo->setFecha($row["fecha"]);
        $objVideo->setVideo($row["video"]);
        $objVideo->setImagen($row["imagen"]);

        return $objVideo;
    }
}