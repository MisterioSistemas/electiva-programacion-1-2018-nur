<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of videos
 *
 * @author HP
 */
class Videos {

    public $id;
    public $nombre;
    public $descripcion;
    public $fechaSubida;
    public $autor;

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFechaSubida() {
        return $this->fechaSubida;
    }

    function getAutor() {
        return $this->autor;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFechaSubida($fechaSubida) {
        $this->fechaSubida = $fechaSubida;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

}
