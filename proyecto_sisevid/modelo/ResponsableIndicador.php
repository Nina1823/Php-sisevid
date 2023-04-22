<?php
  class ResponsableIndicador{
  	var $fkidresponsable;
  	var $fkidindicador;
    var $fechaasignacion;
    var $fknomusuario;
  	function __construct($fkidresponsable,$fkidindicador,$fechaasignacion,$fknomusuario){
  		$this->fkidresponsable=$fkidresponsable;
  		$this->fkidindicador=$fkidindicador;
        $this->fechaasignacion=$fechaasignacion;
        $this->fknomusuario=$fknomusuario;
  	}
  	function setFkidresponsable($fkidresponsable){
  		$this->fkidresponsable=$fkidresponsable;
  	}
  	function getFkidresponsable(){
  		return $this->fkidresponsable;
  	} 

  	function setFkidindicador($fkidindicador){
  		$this->fkidindicador=$fkidindicador;
  	}
  	function getFkidindicador(){
  		return $this->fkidindicador;
  	}   

    function setFechaasignacion($fechaasignacion){
        $this->fechaasignacion=$fechaasignacion;
    }
    function getFechaasignacion(){
        return $this->fechaasignacion;
    } 

    function setFknomusuario($fknomusuario){
        $this->fknomusuario=$fknomusuario;
    }
    function getFknomusuario(){
        return $this->fknomusuario;
    } 

  }
?>