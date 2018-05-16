<?php
include_once './header.php';

include_once './DAL/Connection.php';
include_once './DTO/Persona.php';
include_once './BLL/PersonaBLL.php';
include_once './DTO/Materia.php';
include_once './BLL/MateriaBLL.php';

$personaBLL = new PersonaBLL();
$task = "list";
if (isset($_REQUEST["task"])) {
    $task = $_REQUEST["task"];
}


switch ($task) {
    case "insert":

        if (isset($_REQUEST["nombres"]) && isset($_REQUEST["apellidos"]) && isset($_REQUEST["ciudad"]) && isset($_REQUEST["edad"]) && isset($_REQUEST["fechaNacimiento"])) {

            $nombres = $_REQUEST["nombres"];
            $apellidos = $_REQUEST["apellidos"];
            $ciudad = $_REQUEST["ciudad"];
            $edad = $_REQUEST["edad"];
            $fechaNacimiento = $_REQUEST["fechaNacimiento"];


            $personaBLL->insert($nombres, $apellidos, $ciudad, $edad, $fechaNacimiento);
        }

        break;
    case "update":
        if (isset($_REQUEST["nombres"]) && isset($_REQUEST["apellidos"]) && isset($_REQUEST["ciudad"]) && isset($_REQUEST["edad"]) && isset($_REQUEST["fechaNacimiento"]) && isset($_REQUEST["id"])) {

            $nombres = $_REQUEST["nombres"];
            $apellidos = $_REQUEST["apellidos"];
            $ciudad = $_REQUEST["ciudad"];
            $edad = $_REQUEST["edad"];
            $fechaNacimiento = $_REQUEST["fechaNacimiento"];

            $id = $_REQUEST["id"];
            $personaBLL->update($nombres, $apellidos, $ciudad, $edad, $fechaNacimiento, $id);
        }
        break;
    case "delete":
        if (isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
            $personaBLL->delete($id);
        }
        break;
    case "inscribir":
        $materiaBLL = new MateriaBLL();
        $listaMaterias = $materiaBLL->selectAll();
        $idPersona = $_REQUEST["idPersona"];
        foreach ($listaMaterias as $objMateria) {
            if (isset($_REQUEST["idMateria-" . $objMateria->getId()])) {
                $materiaBLL->insertMateriaPersona($objMateria->getId(), $idPersona);
            }
        }
        break;
}
?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <a class="btn btn-info" href="formPersona.php">Insertar Persona</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Edad</th>
                        <th>Fecha Nacimiento</th>
                        <th>Ciudad</th>
                        <th>Editar</th>
                        <th>Inscribir</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $listaPersonas = $personaBLL->selectAll();
                    foreach ($listaPersonas as $objPersona) {
                        ?>
                        <tr>
                            <td><?php echo $objPersona->getId(); ?></td>
                            <td><?php echo $objPersona->getNombres(); ?></td>
                            <td><?php echo $objPersona->getApellidos(); ?></td>
                            <td><?php echo $objPersona->getEdad(); ?></td>
                            <td><?php echo $objPersona->getFechaNacimiento(); ?></td>
                            <td><?php echo $objPersona->getCiudad(); ?></td>
                            <td>
                                <a class="btn btn-primary" href="formPersona.php?id=<?php echo $objPersona->getId(); ?>">Editar</a>
                            </td>
                            <td>
                                <a class="btn btn-info" href="inscribir.php?id=<?php echo $objPersona->getId(); ?>">Inscribir</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="index.php?id=<?php echo $objPersona->getId(); ?>&task=delete">Eliminar</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once './footer.php'; ?>