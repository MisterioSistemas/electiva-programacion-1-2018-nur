<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Video
 *
 * @author Liz
 */
class Video {
    private $id_video;
    private $titulo;
    private $descripcion;
    private $fecha;
    private $video;
    private $imagen;
    private $autor;
    
    function getId_video() {
        return $this->id_video;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getVideo() {
        return $this->video;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getAutor() {
        return $this->autor;
    }

    function setId_video($id_video) {
        $this->id_video = $id_video;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setVideo($video) {
        $this->video = $video;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

}
