<?php
  class ResultadoIndicador{
  	var $id;
  	var $resultado;
    var $fechaCalculo;
    var $fkidindicador;
	
  	function __construct($id,$resultado,$fechaCalculo,$fkidindicador){
  		$this->id=$id;
  		$this->resultado=$resultado;
		$this->fechaCalculo=$fechaCalculo;
        $this->fkidindicador=$fkidindicador;
  	}
  	function setId($id){
  		$this->id=$id;
  	}
  	function getId(){
  		return $this->id;
  	} 
  	function setResultado($resultado){
  		$this->resultado=$resultado;
  	}
  	function getResultado(){
  		return $this->resultado;
  	}    
    
    function setFechaCalculo($fechaCalculo){
        $this->fechaCalculo=$fechaCalculo;
    }
    function getFechaCalculo(){
        return $this->fechaCalculo;
    }  

    function setfkidindicador($fkidindicador){
        $this->fkidindicador=$fkidindicador;
    }
    function getfkidindicador(){
        return $this->fkidindicador;
    }  
  }
?>