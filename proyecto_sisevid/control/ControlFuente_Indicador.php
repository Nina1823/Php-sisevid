<?php
class ControlRepresentVisual_Indicador
{
    var $objRepresentVisual_Indicador;
    function __construct($objRepresentVisual_Indicador)
    {
        $this->objRepresentVisual_Indicador = $objRepresentVisual_Indicador;
    }

|
    function guardar()
    {
        $fkidindicador = this->objRepresentVisual_Indicador->getFkindicador();
        $fkidrepresentacionvisual; = this->objRepresentVisual_Indicador->getFkidrepresentacionvisual();

        $comandoSql = "INSERT INTO representvisual_indicador(fkidindicador,fkidrepresentacionvisual) VALUES ('$fkidindicador', '$fkidrepresentacionvisual')";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function consultar()
    {
        $fkidindicador = $this->objfkidrepresentacionvisual->getfkidindicador();
        $comandoSql = "SELECT * FROM representvisual_indicador WHERE fkidindicador = '$fkidindicador'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
            $this->objRepresentVisual_Indicador->setfkidindicador($row['indicador']);
        }
        $objControlConexion->cerrarBd();
        return $this->objRepresentVisual_Indicador;
    }

    function modificar()
    {
        $fkidindicador = this->objRepresentVisual_Indicador->getFkindicador();
        $fkidrepresentacionvisual; = this->objRepresentVisual_Indicador->getFkidrepresentacionvisual();

        $comandoSql = "UPDATE variable SET fkidindicador='$fkidindicador',fkidrepresentacionvisual='$fkidrepresentacionvisual' WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function borrar()
    {
        $fkidindicador = this->objRepresentVisual_Indicador->getFkindicador();
        $comandoSql = "DELETE FROM representvisual_indicador WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function listar()
    {
        $comandoSql = "SELECT * FROM representvisual_indicador";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        
        $arregloRepresentVisual_Indicador = array();
        
        if (mysqli_num_rows($recordSet) > 0) {
            $i = 0;
            while ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
                $objRepresentVisual_Indicador = new RepresentVisual_Indicador("", "");
                $objRepresentVisual_Indicador->setFkidindicador($row['fkidindicador']);
                $objRepresentVisual_Indicador->setFkidrepresentacionvisual($row['fkidrepresentacionvisual']);
                $arregloRepresentVisual_Indicador[$i] = $objRepresentVisual_Indicador;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloRepresentVisual_Indicador;
    }
}
?>
