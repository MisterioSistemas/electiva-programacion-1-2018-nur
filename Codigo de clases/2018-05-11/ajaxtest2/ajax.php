<?php

$c = 0;
while ($c < 99999999) {
    $c++;
}
$nombre = $_REQUEST['nombre'];
$apellido = $_REQUEST['apellido'];
echo "Hola $nombre $apellido!";
?>

