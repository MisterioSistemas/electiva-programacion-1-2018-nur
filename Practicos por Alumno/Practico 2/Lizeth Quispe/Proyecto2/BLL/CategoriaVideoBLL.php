<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaVideoBLL
 *
 * @author Liz
 */
class CategoriaVideoBLL {

    public function insert($categoria, $video) {
        print_r($categoria.' - '.$video);
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL agregarCategoria(:varVideo, :varCategoria)", array(
                ":varVideo" =>$video,
                ":varCategoria" => $categoria
            ));
                        
        } catch (Exception $e) {
            print_r($e."Este error garrafal");
            //TODO: Aumentar log4php
        }
    }
    
    function rowToDto($row) {
        $objCategoriaVideo = new CategoriaVideo();
        $objCategoriaVideo->setId_cat_vid($row["id_cat_vid"]);
        $objCategoriaVideo->setId_video($row["id_video"]);
        $objCategoriaVideo->setId_categoria($row["id_categoria"]);
        return $objCategoriaVideo;
    }
    
}
