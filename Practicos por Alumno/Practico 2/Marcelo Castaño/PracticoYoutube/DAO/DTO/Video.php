<?php
/**
 * Description of Video
 *
 * @author ANDREA_ORTIZ
 */
class Video {
    private $id;
    private $titulo;
    private $descripcion;
    private $fechasubida;
    private $autor;
    private $categoria;

    function getId() {
        return $this->id;
    }
    function getTitulo() {
        return $this->titulo;
    }
    function getDescripcion() {
        return $this->descripcion;
    }
    function getFechasubida() {
        return $this->fechasubida;
    }
    function getAutor() {
        return $this->autor;
    }
    function getCategoria() {
        return $this->categoria;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    function setFechasubida($fechasubida) {
        $this->fechasubida = $fechasubida;
    }
    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
}