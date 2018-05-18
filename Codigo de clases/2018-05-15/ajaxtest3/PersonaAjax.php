<?php

include_once './DAL/Connection.php';
include_once './DTO/Persona.php';
include_once './BLL/PersonaBLL.php';

$task = $_REQUEST["task"];
$personaBLL = new PersonaBLL();
switch ($task) {
    case "get":
        $id = $_REQUEST["id"];
        $objPersona = $personaBLL->selectById($id);
        echo json_encode($objPersona);
        break;
    case "insertar":
        $nombres = $_REQUEST["nombres"];
        $apellidos = $_REQUEST["apellidos"];
        $edad = $_REQUEST["edad"];
        $fechaNacimiento = $_REQUEST["fechaNacimiento"];
        $ciudad = $_REQUEST["ciudad"];

        $idInsertado = $personaBLL->insert($nombres, $apellidos, $ciudad, $edad, $fechaNacimiento);
        $objPersona = $personaBLL->selectById($idInsertado);
        echo json_encode($objPersona);
        break;
    case "actualizar":
        $id = $_REQUEST["id"];
        $nombres = $_REQUEST["nombres"];
        $apellidos = $_REQUEST["apellidos"];
        $edad = $_REQUEST["edad"];
        $fechaNacimiento = $_REQUEST["fechaNacimiento"];
        $ciudad = $_REQUEST["ciudad"];

        $personaBLL->update($nombres, $apellidos, $ciudad, $edad, $fechaNacimiento, $id);
        $objPersona = $personaBLL->selectById($id);
        echo json_encode($objPersona);
        break;
    case "eliminar":
        $id = $_REQUEST["id"];
        $personaBLL->delete($id);
        echo $id;
        break;
}
?>