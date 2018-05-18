<?php
/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 14/5/2018
 * Time: 21:48
 */

class Categoria
{
    public $codigo_id;
    public $nombre;

    /**
     * @return mixed
     */
    public function getCodigoId()
    {
        return $this->codigo_id;
    }

    /**
     * @param mixed $codigo_id
     */
    public function setCodigoId($codigo_id)
    {
        $this->codigo_id = $codigo_id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}