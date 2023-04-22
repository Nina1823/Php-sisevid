<?php

class ControlIndicador{
    var $objIndicador;
    function __construct($objIndicador){
        $this->objIndicador = $objIndicador;
    }

    public function guardar(){
        $id = $this->objIndicador->getId();
        $codigo = $this->objIndicador->getCodigo();
        $nombre = $this->objIndicador->getNombre();
        $objetivo = $this->objIndicador->getObjetivo();
        $alcance = $this->objIndicador->getAlcance();
        $formula = $this->objIndicador->getFormula();
        $fkidtipoindicador = $this->objIndicador->getFkidtipoindicador();
        $fkidunidadmedicion = $this->objIndicador->getFkidunidadmedicion();
        $meta = $this->objIndicador->getMeta();
        $fkidsentido = $this->objIndicador->getFkidsentido();
        $fkidfrecuencia = $this->objIndicador->getFkidfrecuencia();

        $comandoSql = "INSERT INTO indicador(codigo, nombre, objetivo, alcance, formula, fkidtipoindicador, fkidunidadmedicion, meta, fkidsentido, fkidfrecuencia) 
        VALUES ('$codigo', '$nombre', '$objetivo', '$alcance', '$formula', '$fkidtipoindicador', '$fkidunidadmedicion', '$meta', '$fkidsentido', '$fkidfrecuencia')";
        
        $objControlConexionE = new ControlConexionE();
        $objControlConexionE->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $objControlConexionE->ejecutarComandoSql($comandoSql);
        $objControlConexionE->cerrarBd();
    }

    function consultar(){
        $id=$this->objIndicador->getId();

        $comandoSql = "SELECT * FROM indicador WHERE id = '$id'";
        $objControlConexionE = new ControlConexion();
        $objControlConexionE->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $recordSet = $objControlConexionE->ejecutarSelect($comandoSql); 
        if($row = $recordSet->fetch_arya(MYSQLI_BOTH)){
            $this->objIndicador->setNombre($row['nombre']);
        }
        $objControlConexionE->cerrarBd();
        return $this->objIndicador;
    }

    public function modificar(){
        $id = $this->objIndicador->getId();
        $codigo = $this->objIndicador->getCodigo();
        $nombre = $this->objIndicador->getNombre();
        $objetivo = $this->objIndicador->getObjetivo();
        $alcance = $this->objIndicador->getAlcance();
        $formula = $this->objIndicador->getFormula();
        $fkidtipoindicador = $this->objIndicador->getFkidtipoindicador();
        $fkidunidadmedicion = $this->objIndicador->getFkidunidadmedicion();
        $meta = $this->objIndicador->getMeta();
        $fkidsentido = $this->objIndicador->getFkidsentido();
        $fkidfrecuencia = $this->objIndicador->getFkidfrecuencia();

        $comandoSql = "UPDATE indicador SET codigo = '$codigo',
                                            nombre = '$nombre',
                                            objetivo = '$objetivo',
                                            alcance = '$alcance',
                                            formula = '$formula',
                                            fkidtipoindicador = '$fkidtipoindicador',
                                            fkidunidadmedicion = '$fkidunidadmedicion',
                                            meta = '$meta',
                                            fkidsentido = '$fkidsentido',
                                            fkidfrecuencia = '$fkidfrecuencia'
                                            WHERE id = '$id'";
        $objControlConexionE = new ControlConexionE();
        $objControlConexionE->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $objControlConexionE->ejecutarComandoSql($comandoSql);
        $objControlConexionE->cerrarBd();
    }

    public function borrar(){
        $id= $this->objIndicador->getId(); 

        $comandoSql = "DELETE FROM indicador WHERE id = '$id'";
        $objControlConexionE = new ControlConexionE();
        $objControlConexionE->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $objControlConexionE->ejecutarComandoSql($comandoSql);
        $objControlConexionE->cerrarBd();
    }

    public function listar(){
        $comandoSql = "SELECT * FROM indicador";
            $objControlConexionE = new ControlConexionE();                    
            $objControlConexionE->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $recordSet = $objControlConexionE->ejecutarSelect($comandoSql); 
            
            $arregloIndicador = array();
            if(mysqli_num_rows($recordSet) > 0){
               
                $i = 0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){
                    $objIndicador = new Indicador("", "", "", "", "", "", "", "", "", "", "");
                    $objIndicador->setId($row['id']);
                    $objIndicador->setCodigo($row['codigo']);
                    $objIndicador->setNombre($row['nombre']);
                    $objIndicador->setObjetivo($row['objetivo']);
                    $objIndicador->setAlcance($row['alcance']);
                    $objIndicador->setFormula($row['formula']);
                    $objIndicador->setFkidtipoindicador($row['fkidtipoindicador']);
                    $objIndicador->setFkidunidadmedicion($row['fkidunidadmedicion']);
                    $objIndicador->setMeta($row['meta']);
                    $objIndicador->setFkidsentido($row['fkidsentido']);
                    $objIndicador->setFkidfrecuencia($row['fkidfrecuencia']);
                    $arregloIndicador[$i]=$objIndicador;
                    $i++;
                }
            }
            $objControlConexionE->cerrarBd();
            return $arregloIndicador;
            
    }
}

?>