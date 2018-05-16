<?php

/**
 * Description of PersonaBLL
 *
 * @author jmacb
 */
class PersonaBLL {

    private $tableName = "persona";

    public function selectAll() {
        $listaPersonas = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query("CALL sp_persona_selectAll()");
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objPersona = $this->rowToDto($row);
                $listaPersonas[] = $objPersona;
            }
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer selectAll con tabla $this->tableName", $e);
        }
        return $listaPersonas;
    }

    public function selectById($id) {
        $objPersona = null;
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("CALL sp_persona_selectById(:varId)",
                    array(":varId" => $id));
            if ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objPersona = $this->rowToDto($row);
            }
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer selectById con tabla $this->tableName", $e);
        }
        return $objPersona;
    }

    public function insert($nombres, $apellidos, $ciudad, $edad, $fechaNacimiento) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL sp_persona_insert(:varNombres,:varApellidos,:varCiudad,:varEdad,:varFechaNacimiento)"
                    , array(
                ":varNombres" => $nombres,
                ":varApellidos" => $apellidos,
                ":varCiudad" => $ciudad,
                ":varEdad" => $edad,
                ":varFechaNacimiento" => $fechaNacimiento
            ));
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer insert con tabla $this->tableName", $e);
        }
    }

    public function update($nombres, $apellidos, $ciudad, $edad, $fechaNacimiento, $id) {
        try {
            $objConexion = new Connection();
            $objConexion->queryWithParams("CALL sp_persona_update(:varNombres,:varApellidos,:varCiudad,:varEdad,:varFechaNacimiento,:varId)"
                    , array(
                ":varNombres" => $nombres,
                ":varApellidos" => $apellidos,
                ":varCiudad" => $ciudad,
                ":varEdad" => $edad,
                ":varFechaNacimiento" => $fechaNacimiento,
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
            $objConexion->queryWithParams("CALL sp_persona_delete(:varId)"
                    , array(
                ":varId" => $id
            ));
        } catch (Exception $e) {
//            print_r($e);
            $log->error("Error al hacer delete con tabla $this->tableName", $e);
        }
    }

    function rowToDto($row) {
        $objPersona = new Persona();
        $objPersona->setNombres($row["nombres"]);
        $objPersona->setApellidos($row["apellidos"]);
        $objPersona->setCiudad($row["ciudad"]);
        $objPersona->setEdad($row["edad"]);
        $objPersona->setFechaNacimiento($row["fechaNacimiento"]);
        $objPersona->setId($row["id"]);
        return $objPersona;
    }

}
