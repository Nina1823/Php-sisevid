<?php
class ControlTipoEvidencia
{
    var $objTipoEvidencia;
    function __construct($objTipoEvidencia)
    {
        $this->objTipoEvidencia = $objTipoEvidencia;
    }
    function guardar()
    {
        $nom = $this->objTipoEvidencia->getNombre();
        
        $comandoSql = "INSERT INTO tbltipoevidencia(nombre) VALUES ('$nom')";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function consultar()
    {
        $id = $this->objTipoEvidencia->getId();

        $comandoSql = "SELECT nombre FROM tbltipoevidencia WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
            $this->objTipoEvidencia->setNombre($row['nombre']);
        }
        $objControlConexion->cerrarBd();
        //     echo'<script type="text/javascript">
        // alert("Entró meth save");
        // </script>';
        return $this->objTipoEvidencia;
    }


    function modificar()
    {
        $id = $this->objTipoEvidencia->getId();
        $nom = $this->objTipoEvidencia->getNombre();
       

        $comandoSql = "UPDATE tbltipoevidencia SET nombre='$nom' WHERE id = '$id'";

        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function borrar()
    {
        $id = $this->objTipoEvidencia->getId();
        $comandoSql = "DELETE FROM tbltipoevidencia WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }


    function listar()
    {
        $comandoSql = "SELECT * FROM tbltipoevidencia";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if (mysqli_num_rows($recordSet) > 0) {
            $arregloTipoEvidencia = array();
            $i = 0;
            while ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
                $objTipoEvidencia = new TipoEvidencia("", "");
                $objTipoEvidencia->setId($row['id']);
                $objTipoEvidencia->setNombre($row['nombre']);
                $arregloTipoEvidencia[$i] = $objTipoEvidencia;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloTipoEvidencia;
    }
}
