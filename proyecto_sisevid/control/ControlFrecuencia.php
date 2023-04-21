<?php
    class ControlFrecuencia{
        
	   var $objFrecuencia;
        function __construct($objFrecuencia){
         $this->objFrecuencia=$objFrecuencia;

        }

    function guardar() {

        $descripcion= $this->objFrecuencia->getDescripcion(); 
        
        $comandoSql = "INSERT INTO frecuencia(descripcion) VALUES ('$descripcion')";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }
    
    function consultar() {
        $id= $this->objFrecuencia->getId(); 
        echo("hoola");

        $comandoSql = "SELECT descripcion FROM frecuencia WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
            $this->objFrecuencia->setDescripcion($row['descripcion']);
        }
        $objControlConexion->cerrarBd();
        return $this->objFrecuencia;
    }

    function modificar() {
        $id= $this->objFrecuencia->getId(); 
        $descripcion= $this->objFrecuencia->getDescripcion(); 

        $comandoSql = "UPDATE frecuencia SET descripcion='$descripcion' WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function borrar() {
        $id= $this->objFrecuencia->getId(); 
        $comandoSql = "DELETE FROM frecuencia WHERE id = '$id'";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $objControlConexion->ejecutarComandoSql($comandoSql);
        $objControlConexion->cerrarBd();
    }

    function listar() {
        $comandoSql = "SELECT * FROM frecuencia";
        $objControlConexion = new ControlConexion();
        $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
        if (mysqli_num_rows($recordSet) > 0) {
            $arregloFrecuencia = array();
            $i=0;
            while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                $objFrecuencia=new Frecuencia(0,"");
                $objFrecuencia->setId($row['id']);
                $objFrecuencia->setDescripcion($row['descripcion']);
                $arregloFrecuencia[$i]=$objFrecuencia;
                $i++;
            }
        }
        $objControlConexion->cerrarBd();
        return $arregloFrecuencia;
    }
}
?>