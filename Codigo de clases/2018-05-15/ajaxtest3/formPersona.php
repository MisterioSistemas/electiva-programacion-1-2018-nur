
<?php
include_once './header.php';

include_once './DAL/Connection.php';
include_once './DTO/Persona.php';
include_once './BLL/PersonaBLL.php';

$objPersona = null;
$personaBLL = new PersonaBLL();
$task = "insert";
if (isset($_REQUEST["id"])) {
    $objPersona = $personaBLL->selectById($_REQUEST["id"]);
    $task = "update";
}
?>
<div class="container">
    <div class="row">
        <div class="col-6 offset-3">
            <form action="index.php" method="POST">
                <input type="hidden" name="id"  value="<?php
                if ($objPersona != null) {
                    echo $objPersona->getId();
                }
                ?>"/>
                <input type="hidden" name="task" value="<?php echo $task; ?>"/>
                <div class="form-group">
                    <label>Nombres:</label>

                    <input type="text" class="form-control" name="nombres" value="<?php
                    if ($objPersona != null) {
                        echo $objPersona->getNombres();
                    }
                    ?>"/>
                </div>
                <div class="form-group">
                    <label>Apellidos:</label>

                    <input type="text" class="form-control" name="apellidos" value="<?php
                    if ($objPersona != null) {
                        echo $objPersona->getApellidos();
                    }
                    ?>"/>
                </div>
                <div class="form-group">
                    <label>Ciudad:</label>

                    <select name="ciudad" class="form-control">
                        <option value="Santa Cruz" <?php echo ($objPersona != null && $objPersona->getCiudad() == "Santa Cruz") ? " selected " : ""; ?>>Santa Cruz</option>
                        <option value="La Paz" <?php echo ($objPersona != null && $objPersona->getCiudad() == "La Paz") ? " selected " : ""; ?>>La Paz</option>
                        <option value="Cochabamba" <?php echo ($objPersona != null && $objPersona->getCiudad() == "Cochabamba") ? " selected " : ""; ?>>Cochabamba</option>
                        <option value="Beni"  <?php echo ($objPersona != null && $objPersona->getCiudad() == "Beni") ? " selected " : ""; ?>>Beni</option>
                        <option value="Chuquisaca" <?php echo ($objPersona != null && $objPersona->getCiudad() == "Chuquisaca") ? " selected " : ""; ?>>Chuquisaca</option>
                        <option value="Potosí" <?php echo ($objPersona != null && $objPersona->getCiudad() == "Potosí") ? " selected " : ""; ?>>Potosí</option>
                        <option value="Pando" <?php echo ($objPersona != null && $objPersona->getCiudad() == "Pando") ? " selected " : ""; ?>>Pando</option>
                        <option value="Oruro" <?php echo ($objPersona != null && $objPersona->getCiudad() == "Oruro") ? " selected " : ""; ?>>Oruro</option>
                        <option value="Tarija" <?php echo ($objPersona != null && $objPersona->getCiudad() == "Tarija") ? " selected " : ""; ?>>Tarija</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Edad:</label>
                    <input type="number" class="form-control" min="1" max="100" name="edad" value="<?php
                    if ($objPersona != null) {
                        echo $objPersona->getEdad();
                    }
                    ?>"/>
                </div>

                <div class="form-group">
                    <label>Fecha Nacimiento:</label>


                    <input type="date" class="form-control" name="fechaNacimiento" value="<?php
                    if ($objPersona != null) {
                        echo $objPersona->getFechaNacimiento();
                    }
                    ?>"/>
                </div>
                <div class="form-group">
                    <input type="submit" value="Guardar" class="btn btn-primary"/>
                    <a href="index.php">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once './footer.php'; ?>