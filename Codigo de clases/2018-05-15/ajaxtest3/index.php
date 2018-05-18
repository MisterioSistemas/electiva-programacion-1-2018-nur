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
            <a class="btn btn-info" data-toggle="modal" data-target="#modalFormulario" href="formPersona.php">Insertar Persona</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table" id='tblPersona'>
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
                        <tr id='tr<?php echo $objPersona->getId(); ?>'>
                            <td><?php echo $objPersona->getId(); ?></td>
                            <td><?php echo $objPersona->getNombres(); ?></td>
                            <td><?php echo $objPersona->getApellidos(); ?></td>
                            <td><?php echo $objPersona->getEdad(); ?></td>
                            <td><?php echo $objPersona->getFechaNacimiento(); ?></td>
                            <td><?php echo $objPersona->getCiudad(); ?></td>
                            <td>
                                <a class="btn btn-primary btnEditar" data-id='<?php echo $objPersona->getId(); ?>' href="javascript:void(0)">Editar</a>
                            </td>
                            <td>
                                <a class="btn btn-info" href="inscribir.php?id=<?php echo $objPersona->getId(); ?>">Inscribir</a>
                            </td>
                            <td>
                                <a class="btn btn-danger btnEliminar" data-id='<?php echo $objPersona->getId(); ?>' href="javascript:void(0)">Eliminar</a>
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

<div id="modalFormulario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class='modal-title'>Formulario Persona</h5>
                <button class='close' type='button' data-dismiss='modal'>
                    <span aria-hidden='true'>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php" method="POST">
                    <input type="hidden" id="hdnId" />
                    <div class="form-group">
                        <label>Nombres:</label>
                        <input type="text" class="form-control" id="txtNombres"/>
                    </div>
                    <div class="form-group">
                        <label>Apellidos:</label>

                        <input type="text" class="form-control" id="txtApellidos"/>
                    </div>
                    <div class="form-group">
                        <label>Ciudad:</label>

                        <select id="lstCiudad" class="form-control">
                            <option value="Santa Cruz">Santa Cruz</option>
                            <option value="La Paz" >La Paz</option>
                            <option value="Cochabamba">Cochabamba</option>
                            <option value="Tarija">Tarija</option>
                            <option value="Sucre">Sucre</option>
                            <option value="Potosí">Potosí</option>
                            <option value="Pando">Pando</option>
                            <option value="Beni">Beni</option>
                            <option value="Oruro">Oruro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Edad:</label>
                        <input type="number" class="form-control" min="1" max="100" id="txtEdad"/>
                    </div>

                    <div class="form-group">
                        <label>Fecha Nacimiento:</label>
                        <input type="date" class="form-control" id="txtFechaNacimiento" />
                    </div>
            </div>
            <div class='modal-footer'>
                <div class="form-group">
                    <input type="submit" value="Guardar" id='btnGuardar' class="btn btn-primary"/>
                    <a href="#" data-dismiss='modal'>Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once './footer.php'; ?>