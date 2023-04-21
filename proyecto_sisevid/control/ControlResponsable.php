<?php
class ControlResponsable
{
    var $objResponsable;
    function __construct($objResponsable)
    {
        $this->objResponsable = $objResponsable;
    }


    function guardar()
    {
        $cedula = $this->objResponsable->getCedula();
        $nom = $this->objResponsable->getNombre();
        $email= $this->objResponsable->getEmail();
      
        $comandoSql = "INSERT INTO responsable(cedula,nombre, email) VALUES ('$cedula', '$nom', '$email')";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function consultar()
    {
        $cedula = $this->objResponsable->getCedula();
        $comandoSql = "SELECT * FROM responsable WHERE cedula = '$cedula'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
            $this->objResponsable->setNombre($row['nombre']);
            $this->objResponsable->setEmail($row['email']);
        }
        $objControlConexion->cerrarBd();
        return $this->objResponsable;
    }

    function modificar()
    {
        $cedula = $this->objResponsable->getCedula();
        $nom = $this->objResponsable->getNombre();
        $email = $this->objResponsable->getEmail();


        $comandoSql = "UPDATE responsable SET nombre='$nom', email='$email' WHERE cedula = '$cedula'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function borrar()
    {
        $cedula = $this->objResponsable->getCedula();
        $comandoSql = "DELETE FROM responsable WHERE cedula = '$cedula'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function listar()
    {
        $comandoSql = "SELECT * FROM responsable";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if (mysqli_num_rows($recordSet) > 0) {
            $arregloResponsable = array();
            $i = 0;
            while ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
                $objResponsable = new Responsable("", "","");
                $objResponsable->setCedula($row['cedula']);
                $objResponsable->setNombre($row['nombre']);
                $objResponsable->setEmail($row['email']);

                $arregloResponsable[$i] = $objResponsable;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloResponsable;
    }
}
?>
