<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Materia
 *
 * @author jmacb
 */
class Materia {

    public $id;
    public $nombre;
    public $creditos;

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

    function getCreditos() {
        return $this->creditos;
    }

    function setCreditos($creditos) {
        $this->creditos = $creditos;
    }

}
