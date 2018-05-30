<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaVideo
 *
 * @author Liz
 */
class CategoriaVideo {
    private $id_cat_vid;
    private $id_video;
    private $id_categoria;
    function getId_cat_vid() {
        return $this->id_cat_vid;
    }

    function getId_video() {
        return $this->id_video;
    }

    function getId_categoria() {
        return $this->id_categoria;
    }

    function setId_cat_vid($id_cat_vid) {
        $this->id_cat_vid = $id_cat_vid;
    }

    function setId_video($id_video) {
        $this->id_video = $id_video;
    }

    function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }


}
