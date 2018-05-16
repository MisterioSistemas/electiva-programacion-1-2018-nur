<?php
include_once './header.php';

include_once './DAL/Connection.php';
include_once './DTO/Persona.php';
include_once './BLL/PersonaBLL.php';
include_once './DTO/Materia.php';
include_once './BLL/MateriaBLL.php';

$personaBLL = new PersonaBLL();
$materiaBLL = new MateriaBLL();
$task = "list";
if (isset($_REQUEST["task"])) {
    $task = $_REQUEST["task"];
}
$objPersona = null;
if (isset($_REQUEST["id"])) {
    $objPersona = $personaBLL->selectById($_REQUEST["id"]);
}
$listaMaterias = $materiaBLL->selectAll();
?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <form action="index.php" method="GET">
                <h1>
                    Seleccione las materias:
                </h1>
                <input type="hidden" value="<?php echo $objPersona->getId(); ?>" name="idPersona"/>
                <input type="hidden" value="inscribir" name="task"/>
                <?php
                foreach ($listaMaterias as $objMateria) {
                    ?>
                    <div class="checkbox">
                        <label>
                            <input name="idMateria-<?php echo $objMateria->getId();?>" type="checkbox" value="<?php echo $objMateria->getId(); ?>"> <?php echo $objMateria->getNombre(); ?>
                        </label>
                    </div>
                    <?php
                }
                ?>
                 <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-primary"/>
                    <a href="index.php">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>



<?php include_once './footer.php'; ?>