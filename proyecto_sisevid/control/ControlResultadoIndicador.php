<?php
    class ControlResultadoIndicador{
        var $objResultadoIndicador;
            function __construct($objResultadoIndicador)
            {
                $this->objResultadoIndicador = $objResultadoIndicador;
            }
    
    
        function guardar() {
            $id = $this->objResultadoIndicador->getId();
            $resultado = $this->objResultadoIndicador->getResultado();
            $fechaCalculo = $this->objResultadoIndicador->getFechaCalculo();
            $fkidindicador = $this->objResultadoIndicador->getfkidindicador();
            
            $comandoSql = "INSERT INTO resultadoindicador(id, resultado,fechacalculo,fkidindicador) VALUES ('$id','$resultado','$fechaCalculo','$fkidindicador')";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
    
        function consultar() {
            $id= $this->objResultadoIndicador->getId(); 
            

            echo($id);
            $comandoSql = "SELECT * FROM resultadoindicador WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {
                $this->objResultadoIndicador->setResultado($row['resultado']);
                $this->objResultadoIndicador->setFechaCalculo($row['fechacalculo']);
                $this->objResultadoIndicador->setfkidindicador($row['fkidindicador']);
            }
            $objControlConexion->cerrarBd();
            return $this->objResultadoIndicador;
        }
     
        function modificar() {
            $id= $this->objResultadoIndicador->getId(); 
            $resultado= $this->objResultadoIndicador->getResultado(); 
            $fechaCalculo= $this->objResultadoIndicador->getFechaCalculo(); 
            $fkidindicador= $this->objResultadoIndicador->getfkidindicador(); 

            $comandoSql = "UPDATE resultadoindicador SET resultado='$resultado', fechacalculo='$fechaCalculo',fkidindicador='$fkidindicador' WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }
        function borrar() {
            $id= $this->objResultadoIndicador->getId(); 
            $comandoSql = "DELETE FROM resultadoindicador WHERE id = '$id'";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $objControlConexion->ejecutarComandoSql($comandoSql);
            $objControlConexion->cerrarBd();
        }

        function listar() {
            $comandoSql = "SELECT * FROM resultadoindicador";
            $objControlConexion = new ControlConexion();
            $objControlConexion->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $recordSet = $objControlConexion->ejecutarSelect($comandoSql);
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloResultadoIndicador = array();
                $i=0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objResultadoIndicador=new ResultadoIndicador("","","","");
                    $objResultadoIndicador->setId($row['id']);
                    $objResultadoIndicador->setResultado($row['resultado']);
                    $objResultadoIndicador->setFechaCalculo($row['fechacalculo']);
                    $objResultadoIndicador->setfkidindicador($row['fkidindicador']);
                    $arregloResultadoIndicador[$i]=$objResultadoIndicador;
                    $i++;
                }
            }
            $objControlConexion->cerrarBd();
            return $arregloResultadoIndicador;
        }
    }
?>