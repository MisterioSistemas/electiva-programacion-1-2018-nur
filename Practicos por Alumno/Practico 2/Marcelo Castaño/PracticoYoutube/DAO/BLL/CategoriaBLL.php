<?php
/**
 * Created by PhpStorm.
 * User: Marcelo
 * Date: 12/05/2018
 * Time: 22:50
 */

class CategoriaBLL
{
    public function insert($nombre ) {
    $objConexion = new Connection();
    $objConexion->queryWithParams("call sp_tblcategorias_Insert(:pNombre)", array(
        ":pNombre"=> $nombre
    ));
}
    public function insertCategoriaVideo($categoriaId,$videoId) {
        $objConexion = new Connection();
        $objConexion->queryWithParams("call sp_tblcategoriasvideos_Update(:pcategoriaId,:pvideoId)", array(
            ":pcategoriaId"=> $categoriaId,
            ":pvideoId" =>$videoId
        ));
    }
    public function update($nombre, $id) {
        $objConexion = new Connection();
        $objConexion->queryWithParams("call sp_tblcategorias_Update(:pNombre, :pId)", array(
            ":pNombre"=> $nombre,
            ":pId" => $id
        ));
    }
    public function delete($id) {
        $objConexion = new Connection();
        $objConexion->queryWithParams("
               call sp_tblcategorias_Delete(:pId)", array(
            ":pId" => $id
        ));
    }
    public function selectAll() {
        $listaCategorias= array();
        $objConexion = new Connection();
        $res = $objConexion->query("
                call sp_tblcategorias_SelectAll()");
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $objCategoria = $this->rowToDto($row);
            $listaCategorias[] = $objCategoria;
        }
        return $listaCategorias;
    }
    public function selectById($id) {
        $objConexion = new Connection();
        $res = $objConexion->queryWithParams("
               call sp_tblcategorias_SelectById(:pId)", array(
            ":pId" => $id
        ));
        if ($res->rowCount() == 0) {
            return null;
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        return $this->rowToDto($row);
    }
    function rowToDto($row) {
        $objCategoria = new Categoria();
        $objCategoria->setId($row["categoriaId"]);
        $objCategoria->setNombre($row["nombre"]);
        return $objCategoria;
    }

    public function selectByIdVideoCategoria($id) {
        $listaCategorias = array();
        $objConexion = new Connection();
        $res = $objConexion->queryWithParams("
               call sp_tblcategoriasVideos_SelectById(:pId)", array(
            ":pId" => $id
        ));
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $objCategoria = $this->rowToDtoVideo($row);
            $listaCategorias[] = $objCategoria;
        }
        return $listaCategorias;
    }

    function rowToDtoVideo($row) {
        $objCategoria = new Categoria();
        $objCategoria->setNombre($row["nombre"]);
        return $objCategoria;
    }

}