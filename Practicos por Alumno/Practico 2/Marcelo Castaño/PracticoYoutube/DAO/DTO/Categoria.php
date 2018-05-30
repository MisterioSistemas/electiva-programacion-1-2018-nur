<?php
/**
 * Created by PhpStorm.
 * User: Marcelo
 * Date: 12/05/2018
 * Time: 22:51
 */

class Categoria
{

    private $id;
    private $nombre;


    function getId() {
        return $this->id;
    }
    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

}