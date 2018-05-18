<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of videoCategoria
 *
 * @author HP
 */
class VideoCategoria {
    public $id;
    public $videoId;
    public $categoriaId;
    
    function getId() {
        return $this->id;
    }

    function getVideoId() {
        return $this->videoId;
    }

    function getCategoriaId() {
        return $this->categoriaId;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setVideoId($videoId) {
        $this->videoId = $videoId;
    }

    function setCategoriaId($categoriaId) {
        $this->categoriaId = $categoriaId;
    }


}
