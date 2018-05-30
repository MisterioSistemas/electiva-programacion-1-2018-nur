<?php
class CategoriaBLL {

    public function selectAll() {
        $listaCategorias = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->query("CALL allCategorias()");
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objCategoria = $this->rowToDto($row);
                $listaCategorias[] = $objCategoria;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $listaCategorias;
    }
    
    public function selectCatVideo($id) {
        $listaCategorias = array();
        try {
            $objConexion = new Connection();
            $res = $objConexion->queryWithParams("CALL getCategorias(:varId)", array (":varId" => $id));
            while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                $objCategoria = $this->rowToDto($row);
                $listaCategorias[] = $objCategoria;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $listaCategorias;
    }

    function rowToDto($row) {
        $objCategoria = new Categoria();
        $objCategoria->setId_categoria($row["id_categoria"]);
        $objCategoria->setNombre($row["nombre"]);
        return $objCategoria;
    }

}
