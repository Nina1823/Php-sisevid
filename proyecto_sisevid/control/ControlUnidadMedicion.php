<?php
    class ControlUnidadMedicion{
        var $objUnidadMedicion;
            function __construct($objUnidadMedicion)
            {
                $this->objUnidadMedicion = $objUnidadMedicion;
            }
    
    
        function guardar() {
            $id = $this->objUnidadMedicion->getId();
            $descripcion = $this->objUnidadMedicion->getDescripcion();
            
            $comandoSql = "INSERT INTO `unidad_de_medicion`(id, descripcion) VALUES ('$id','$descripcion')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
    
        function consultar() {
            $id= $this->objUnidadMedicion->getId(); 
            echo($id);
            $comandoSql = "SELECT * FROM unidad_de_medicion WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
                $this->objUnidadMedicion->setDescripcion($row['descripcion']);
            }
            $objControlConexion->cerrarBd();
            return $this->objUnidadMedicion;
        }
     
        function modificar() {
            $id= $this->objUnidadMedicion->getId(); 
            $descripcion= $this->objUnidadMedicion->getDescripcion(); 
            
            $comandoSql = "UPDATE unidad_de_medicion SET descripcion='$descripcion' WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        function borrar() {
            $id= $this->objUnidadMedicion->getId(); 
            $comandoSql = "DELETE FROM unidad_de_medicion WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar() {
            $comandoSql = "SELECT * FROM unidad_de_medicion";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arreglounidad_de_medicion = array();
                $i=0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objUnidadMedida=new UnidadMedida("","");
                    $objUnidadMedida->setId($row['id']);
                    $objUnidadMedida->setDescripcion($row['descripcion']);
                    $arreglounidad_de_medicion[$i]=$objUnidadMedida;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arreglounidad_de_medicion;
        }
    }
?>