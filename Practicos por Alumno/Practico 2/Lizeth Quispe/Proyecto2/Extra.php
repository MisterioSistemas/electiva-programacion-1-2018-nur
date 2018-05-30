<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Extra</title>
    </head>
    <body>
        <?php
        include_once './DAL/Connection.php';
        include_once './BLL/CategoriaBLL.php';
        include_once './DTO/Categoria.php';
        
        $CategoriaBLL = new CategoriaBLL();
        
        ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $listaCategorias = $CategoriaBLL->selectAll();
                foreach ($listaCategorias as $objCategoria) {
                    ?>
                    <tr>
                        <td><?php echo $objCategoria->getId_Categoria() ?></td>
                        <td><?php echo $objCategoria->getNombre(); ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
