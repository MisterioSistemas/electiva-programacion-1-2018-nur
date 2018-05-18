<?php

/**
 * Description of Persona
 *
 * @author jmacb
 */
class Persona {

    public $id;
    public $nombres;
    public $apellidos;
    public $ciudad;
    public $edad;
    public $fechaNacimiento;

    function getId() {
        return $this->id;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getEdad() {
        return $this->edad;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

}
