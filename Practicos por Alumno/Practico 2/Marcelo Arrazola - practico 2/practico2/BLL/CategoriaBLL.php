<?php

/**
 * Description of categoriaBLL
 *
 * @author HP
 */
class CategoriaBLL {

    private $tableName = "categoria";

    public function selectAll() {
        $listaCategorias = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query("CALL getCategorias()");
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objCategoria = $this->rowToDto($row);
                $listaCategorias[] = $objCategoria;
            }
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer selectAll con tabla $this->tableName", $e);
        }
        return $listaCategorias;
    }

    public function selectById($id) {
        $objCategoria = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("CALL getCategoriaById(:varId)", array(":varId" => $id));
            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objCategoria = $this->rowToDto($row);
            }
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer selectById con tabla $this->tableName", $e);
        }
        return $objCategoria;
    }

    public function insert($nombre) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL insertCategoria(:varNombre)"
                    , array(
                ":varNombre" => $nombre
            ));
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer insert con tabla $this->tableName", $e);
        }
    }

    public function update($nombre, $id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL updateCategoria(:varNombre,:varId)"
                    , array(
                ":varNombre" => $nombre,
                ":varId" => $id
            ));
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer update con tabla $this->tableName", $e);
        }
    }

    public function delete($id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL deleteCategoria(:varId)"
                    , array(
                ":varId" => $id
            ));
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer delete con tabla $this->tableName", $e);
        }
    }

    function rowToDto($row) {
        $objCategoria = new Categoria();
        $objCategoria->setNombre($row["nombre"]);
        $objCategoria->setId($row["id"]);
        return $objCategoria;
    }

}
