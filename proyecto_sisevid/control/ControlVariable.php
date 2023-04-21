<?php
class ControlVariable
{
    var $objVariable;
    function __construct($objVariable)
    {
        $this->objVariable = $objVariable;
    }


    function guardar()
    {
        $id = $this->objVariable->getId();
        $nom = $this->objVariable->getNombre();
        $fechaCreacion = $this->objVariable->getfechaCreacion();
        $fkEmailUsuario = $this->objVariable->getfkEmailUsuario();

        $comandoSql = "INSERT INTO variable(id,nombre,fechaCreacion,fkEmailUsuario) VALUES ('$id', '$nom','$fechaCreacion','$fkEmailUsuario')";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function consultar()
    {
        $id = $this->objVariable->getId();
        $comandoSql = "SELECT * FROM variable WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
            $this->objVariable->setNombre($row['nombre']);
            $this->objVariable->setFechaCreacion($row['fechacreacion']);
            $this->objVariable->setfkEmailUsuario($row['fkemailusuario']);
        }
        $objControlConexion->cerrarBd();
        return $this->objVariable;
    }

    function modificar()
    {
        $id = $this->objVariable->getId();
        $nom = $this->objVariable->getNombre();
        $fechaCreacion = $this->objVariable->getfechaCreacion();
        $fkEmailUsuario = $this->objVariable->getfkEmailUsuario();

        $comandoSql = "UPDATE variable SET nombre='$nom',fechacreacion='$fechaCreacion',fkemailusuario='$fkEmailUsuario' WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function borrar()
    {
        $id = $this->objVariable->getId();
        $comandoSql = "DELETE FROM variable WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function listar()
    {
        $comandoSql = "SELECT * FROM variable";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if (mysqli_num_rows($recordSet) > 0) {
            $arregloVariable = array();
            $i = 0;
            while ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
                $objVariable = new Variable("", "","","");
                $objVariable->setId($row['id']);
                $objVariable->setNombre($row['nombre']);
                $objVariable->setfechaCreacion($row['fechacreacion']);
                $objVariable->setfkEmailUsuario($row['fkemailusuario']);
                $arregloVariable[$i] = $objVariable;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloVariable;
    }
}
?>
