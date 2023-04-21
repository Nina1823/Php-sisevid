<?php
class ControlAutor
{
    var $objAutor;
    function __construct($objAutor)
    {
        $this->objAutor = $objAutor;
    }


    function guardar()
    {
        $id = $this->objAutor->getId();
        $nom = $this->objAutor->getNombre();

        $comandoSql = "INSERT INTO tblautor(id,nombre) VALUES ('$id', '$nom')";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function consultar()
    {
        
        $id = $this->objAutor->getId();
        $comandoSql = "SELECT * FROM tblautor WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
            $this->objAutor->setNombre($row['nombre']);
        }
        $objControlConexion->cerrarBd();
        return $this->objAutor;
    }

    function modificar()
    {
        $id = $this->objAutor->getId();
        $nom = $this->objAutor->getNombre();

        $comandoSql = "UPDATE tblautor SET nombre='$nom' WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function borrar()
    {
        $id = $this->objAutor->getId();
        $comandoSql = "DELETE FROM tblautor WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function listar()
    {
        $comandoSql = "SELECT * FROM tblautor";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if (mysqli_num_rows($recordSet) > 0) {
            $arregloAutor = array();
            $i = 0;
            while ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
                $objAutor = new Autor("", "");
                $objAutor->setId($row['id']);
                $objAutor->setNombre($row['nombre']);
                $arregloAutor[$i] = $objAutor;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloAutor;
    }
}
?>
