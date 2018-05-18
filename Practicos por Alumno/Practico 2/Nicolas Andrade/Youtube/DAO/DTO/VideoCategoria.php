<?php
/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 14/5/2018
 * Time: 21:49
 */

class VideoCategoria
{
    public $codigo_id;
    public $video_id;
    public $categoria_id;

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
    public function getVideoId()
    {
        return $this->video_id;
    }

    /**
     * @param mixed $video_id
     */
    public function setVideoId($video_id)
    {
        $this->video_id = $video_id;
    }

    /**
     * @return mixed
     */
    public function getCategoriaId()
    {
        return $this->categoria_id;
    }

    /**
     * @param mixed $categoria_id
     */
    public function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }
}