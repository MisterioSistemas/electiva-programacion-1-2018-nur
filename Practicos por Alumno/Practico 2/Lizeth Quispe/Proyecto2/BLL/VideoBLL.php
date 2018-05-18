<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VideoBLL
 *
 * @author Liz
 */
class VideoBLL {
    
//    private $tabla = "tbl_video";
    
    public function selectAll(){
        $listaVideos = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query("CALL allVideos()");
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objVideo = $this->rowToDto($row);
                $listaVideos[] = $objVideo;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $listaVideos;
    }

    public function Buscar($palabra){
        $listaVideos = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("CALL videoBusqueda(:varPalabra)",array(":varPalabra" => $palabra));
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objVideo = $this->rowToDto($row);
                $listaVideos[] = $objVideo;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $listaVideos;
    }

    public function selectById($id) {
        $objVideo = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("CALL getVideoById (:varId)", array(":varId" => $id));
            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objVideo = $this->rowToDto($row);
            }
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
        return $objVideo;
    }

    public function insert($titulo, $descripcion, $fecha, $video, $imagen, $autor) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL crearVideo(:varTitulo, :varDescripcion, :varFecha, :varVideo, :varImagen, :varAutor)", array(
                ":varTitulo" => $titulo,
                ":varDescripcion" => $descripcion,
                ":varFecha" => $fecha,
                ":varVideo" => $video,
                ":varImagen" => $imagen,
                ":varAutor" => $autor
            ));
                        
        } catch (Exception $e) {
            print_r($e."Este error garrafal");
            //TODO: Aumentar log4php
        }
    }

    public function update($titulo, $descripcion, $fecha, $video, $imagen, $autor, $id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL update(:varId, :varTitulo, :varDescripcion, :varFecha, :varVideo, :varImagen, :varAutor)"
                    , array(
                ":varId" => $id,        
                ":varTitulo" => $titulo,
                ":varDescripcion" => $descripcion,
                ":varFecha" => $fecha,
                ":varVideo" => $video,
                ":varImagen" => $imagen,
                ":varAutor" => $autor
            ));
        } catch (Exception $e) {
            print_r($e);
            //TODO: Aumentar log4php
        }
    }
    
    public function updateImage($video, $image,$id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
                CALL addVideoImage( :varVideo, :varImage, :varId)"
                    , array(
                ":varVideo" => $video,
                ":varImage" => $image,
                ":varId" => $id
            ));
            //echo '_________Hizo los cambios - '.$poster.$logo.$portada.$id;
        } catch (Exception $e) {
            print_r($e." ________Error en Update");
            //TODO: Aumentar log4php
        }
    }
    
    public function obtenerUltimo(){
        
        $objConexion = new Connection();
        $res = $objConexion->query(
                "CALL sp_MaximoVideo()");
        $row = $res->fetch(PDO::FETCH_NUM);
        //echo 'esto es id'.$row[0];
        $id = $row[0];        
        return $id;
    }
    
    public function selectVideosCategoria($id){
        $listaVideos = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("CALL VideosCategoria(:varId)",array(":varId" => $id));
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objVideo = $this->rowToDto($row);
                $listaVideos[] = $objVideo;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $listaVideos;
    }

//    public function delete($id) {
//        try {
//            $objConexion = new Connection();
//            $objConexion->queryWithParams("
//                DELETE FROM $this->tableName
//                WHERE Id_serie = :varId"
//                    , array(
//                ":varId" => $id
//            ));
//        } catch (Exception $e) {
//            print_r($e);
//            //TODO: Aumentar log4php
//        }
//    }
    
    function rowToDto($row) {
        $objVideo = new Video();
        $objVideo->setId_video($row["id_video"]);
        $objVideo->setTitulo($row["titulo"]);
        $objVideo->setDescripcion($row["descripcion"]);
        $objVideo->setFecha($row["fecha"]);
        $objVideo->setVideo($row["video"]);
        $objVideo->setImagen($row["imagen"]);
        $objVideo->setAutor($row["autor"]);
        return $objVideo;
    }
    
}
