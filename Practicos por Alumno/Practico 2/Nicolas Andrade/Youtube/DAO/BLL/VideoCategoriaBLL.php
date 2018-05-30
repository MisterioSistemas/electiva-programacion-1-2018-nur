<?php
/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 14/5/2018
 * Time: 22:59
 */

class VideoCategoriaBLL
{
    private $tableName = "tblVideoCategorias";

    public function insert($video_id, $categoria_id)
    {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
            CALL mk_$this->tableName(
                :pVideo_is, :pCategoria_id
            )",
                array(
                    ":pVideo_is" => $video_id,
                    ":pCategoria_id" => $categoria_id
                ));
        } catch (Exception $e) {
            print_r($e);
        }
    }

    public function update($video_id, $categoria_id, $id)
    {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
            CALL upd_$this->tableName(
                :pVideo_is, :pCategoria_id
            )",
                array(
                    ":pVideo_is" => $video_id,
                    ":pCategoria_id" => $categoria_id,
                    ":pId" => $id
                ));
        } catch (Exception $e) {
            print_r($e);
        }
    }

    public function delete($codigo_id)
    {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
            CALL del_$this->tableName(:pId)",
                array(
                    ":pId" => $codigo_id
                ));
        } catch (Exception $e) {

        }
    }

    public function selectById($codigo_id)
    {
        $objVideo = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("
            CALL get_$this->tableName(:pId)", array(
                ":pId" => $codigo_id
            ));

            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objVideo = $this->rowToDto($row);
            }

        } catch (Exception $e) {
            //TODO: aumentar log4php
            print_t($e);
        }
        return $objVideo;
    }

    function rowToDto($row)
    {
        $objVideoCategoria = new VideoCategoria();

        $objVideoCategoria->setCodigoId($row["codigo_id"]);
        $objVideoCategoria->setVideoId($row["video_id"]);
        $objVideoCategoria->setCategoriaId($row["categoria_id"]);

        return $objVideoCategoria;
    }
}