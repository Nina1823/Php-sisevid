<?php

class ControlVariableIndicador
{
    var $objVariableIndicador;

    function __construct($objVariableIndicador)
    {
        $this->objVariableIndicador = $objVariableIndicador;
    }

    public function guardar()
    {

        $id = $this->objVariableIndicador->getId();
        $fkidvariable = $this->objVariableIndicador->getFkidvariable();
        $fkidindicador = $this->objVariableIndicador->getFkidindicador();
        $dato = $this->objVariableIndicador->getDato();
        $fechadato = $this->objVariableIndicador->getFechadato();
        $fknomusuario = $this->objVariableIndicador->getFknomusuario();

        $comandoSql = "INSERT INTO variable_indicador(fkidvariable, fkidindicador, dato, fechadato, fknomusuario)
        VALUES ('$fkidvariable', '$fkidindicador', '$dato', '$fechadato', '$fknomusuario')";

        $objControlConexionE = new ControlConexionE();
        $objControlConexionE->abrirBd($GLOBALS['serv'], $GLOBALS['usua'], $GLOBALS['pass'], $GLOBALS['bdat'], $GLOBALS['port']);
        $objControlConexionE->ejecutarComandoSql($comandoSql);
        $objControlConexionE->cerrarBd();
    }

    function consultar(){
        $id=$this->objVariableIndicador->getId();

        $comandoSql = "SELECT * FROM variable_indicador WHERE id = '$id'";
        $objControlConexionE = new ControlConexion();
        $objControlConexionE->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $recordSet = $objControlConexionE->ejecutarSelect($comandoSql);
        if($row = $recordSet->fetch_array(MYSQLI_BOTH)){
            $this->objVariableIndicador->setNombre($row['dato']);
        }
        $objControlConexionE->cerrarBd();
        return $this->objVariableIndicador;
    }

    public function modificar(){

        $id = $this->objVariableIndicador->getId();
        $fkidvariable = $this->objVariableIndicador->getFkidvariable();
        $fkidindicador = $this->objVariableIndicador->getFkidindicador();
        $dato = $this->objVariableIndicador->getDato();
        $fechadato = $this->objVariableIndicador->getFechadato();
        $fknomusuario = $this->objVariableIndicador->getFknomusuario();

        $comandoSql = "UPDATE variable_indicador SET fkidvariable = '$fkidvariable',
                                                     fkidindicador = '$fkidindicador',
                                                     dato = '$dato',
                                                     fechadato = '$dato',
                                                     fknomusuario = '$fknomusuario'
                                                     WHERE id = '$id'";
        $objControlConexionE = new ControlConexionE();
        $objControlConexionE->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $objControlConexionE->ejecutarComandoSql($comandoSql);
        $objControlConexionE->cerrarBd();                                            
    }

    public function borrar(){
        $id=$this->objVariableIndicador->getID();

        $comandoSql = "DELETE FROM variable_indicador WHERE id = '$id'";
        $objControlConexionE = new ControlConexionE();
        $objControlConexionE->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $objControlConexionE->ejecutarComandoSql($comandoSql);
        $objControlConexionE->cerrarBd();
    }

    public function listar(){
        $comandoSql = "SELECT * FROM variable_indicador";
        $objControlConexionE = new ControlConexionE();                    
        $objControlConexionE->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $recordSet = $objControlConexionE->ejecutarSelect($comandoSql); 

        $arregloVariableIndicador = array();

        if(mysqli_num_rows($recordSet) > 0){
            
            $i = 0;

            while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                
                $objVariableIndicador = new VariableIndicador("", "", "", "", "", "");
                $objVariableIndicador->setId($row['id']);
                $objVariableIndicador->setFkidvariable($row['fkidvariable']);
                $objVariableIndicador->setFkidindicador($row['fkidindicador']);
                $objVariableIndicador->setDato($row['dato']);
                $objVariableIndicador->setFechadato($row['fechadato']);
                $objVariableIndicador->setFknomusuario($row['fknomusuario']);
                $arregloVariableIndicador[$i] = $objVariableIndicador;
                $i++;
            }
        }
        $objControlConexionE->cerrarBd();
        return $arregloVariableIndicador;
           
    }
}
