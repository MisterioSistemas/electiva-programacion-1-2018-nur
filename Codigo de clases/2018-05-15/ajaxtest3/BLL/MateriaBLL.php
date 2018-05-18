<?php

/**
 * Description of MateriaBLL
 *
 * @author jmacb
 */
class MateriaBLL {

    private $tableName = "materia";

    public function selectAll() {
        $listaMaterias = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query("CALL sp_materia_selectAll()");
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objMateria = $this->rowToDto($row);
                $listaMaterias[] = $objMateria;
            }
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer selectAll con tabla $this->tableName", $e);
        }
        return $listaMaterias;
    }

    public function selectById($id) {
        $objMateria = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("CALL sp_materia_selectById(:varId)",
                    array(":varId" => $id));
            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objMateria = $this->rowToDto($row);
            }
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer selectById con tabla $this->tableName", $e);
        }
        return $objMateria;
    }

    public function insert($nombre, $creditos) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL sp_materia_insert(:varNombre,:varCreditos)"
                    , array(
                ":varNombre" => $nombre,
                ":varCreditos" => $creditos
            ));
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer insert con tabla $this->tableName", $e);
        }
    }
     public function insertMateriaPersona($idMateria, $idPersona) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL sp_materiaxpersona_insert(:varIdMateria,:varIdPersona)"
                    , array(
                ":varIdMateria" => $idMateria,
                ":varIdPersona" => $idPersona
            ));
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer insert con tabla $this->tableName", $e);
        }
    }

    public function update($nombre, $creditos, $id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL sp_materia_update(:varNombre,:varCreditos,:varId)"
                    , array(
                ":varNombre" => $nombre,
                ":varCreditos" => $creditos,
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
            $objConexion->queryWithParams("CALL sp_materia_delete(:varId)"
                    , array(
                ":varId" => $id
            ));
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer delete con tabla $this->tableName", $e);
        }
    }

    function rowToDto($row) {
        $objMateria = new Materia();
        $objMateria->setNombre($row["nombre"]);
        $objMateria->setCreditos($row["creditos"]);
        $objMateria->setId($row["id"]);
        return $objMateria;
    }

}
