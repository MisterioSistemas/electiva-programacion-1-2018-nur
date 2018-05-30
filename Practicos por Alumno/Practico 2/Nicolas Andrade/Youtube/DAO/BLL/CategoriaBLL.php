<?php
/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 21/4/2018
 * Time: 01:17
 */

class CategoriaBLL
{
    private $tableName = "tblCategorias";

    public function insert($nombre)
    {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
            CALL mk_$this->tableName(:pNombre)", array(
                ":pNombre" => $nombre
            ));
        } catch (Exception $e) {
            print_r($e);
        }
    }

    public function VideoCategoria($videoId, $categoriaId){
        try{
            $objConexion = new Connection();
            $objConexion->queryWithParams("
            CALL mk_tblVideosCategorias(:pVideoId, :pCategoriaId)", array(
                ":pVideoId" => $videoId,
                ":pCategoriaId" => $categoriaId
            ));
        } catch(Exception $e){
            print_r($e);
        }
    }

    public function getCategoriasVideo($videoId){
        $lsitaCategorias = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("
            CALL get_tblCategoriasById(:pVideoId)", array(
                ":pVideoId" => $videoId
            ));

            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objCategoria = $this->rowToDto($row);
                $lsitaCategorias[] = $objCategoria;
            }
        } catch (Exception $e) {
            //TODO: aumentar log4php
            print_r($e);
        }

        return $lsitaCategorias;
    }

    public function update($nombre, $id)
    {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("
            CALL upd_$this->tableName(:pNombre, :pId)", array(
                ":pNombre" => $nombre,
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

    public function sellectAll()
    {
        $lsitaCategorias = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query("CALL get_$this->tableName");

            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objCategoria = $this->rowToDto($row);
                $lsitaCategorias[] = $objCategoria;
            }
        } catch (Exception $e) {
            //TODO: aumentar log4php
            print_r($e);
        }

        return $lsitaCategorias;
    }

    public function selectById($codigo_id)
    {
        $objCategoria = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("
            CALL get_tblCategoriasById(:pId)", array(
                ":pId" => $codigo_id
            ));

            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objCategoria = $this->rowToDto($row);
            }

        } catch (Exception $e) {
            //TODO: aumentar log4php
            print_t($e);
        }
        return $objCategoria;
    }

    function rowToDto($row)
    {
        $objCategoria = new Categoria();

        $objCategoria->setCodigoId($row["codigo_id"]);
        $objCategoria->setNombre($row["nombre"]);

        return $objCategoria;
    }
}