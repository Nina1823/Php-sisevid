<?php
  class RepresentVisual_Indicador{
  	var $fkidindicador;
  	var $fkidrepresentacionvisual;
  	function __construct($fkidindicador,$fkidrepresentacionvisual){
  		$this->fkidindicador=$fkidindicador;
  		$this->fkidrepresentacionvisual=$fkidrepresentacionvisual;
  	}
  	function setFkidindicador($fkidindicador){
  		$this->fkidindicador=$fkidindicador;
  	}
  	function getFkidindicador(){
  		return $this->fkidindicador;
  	} 
  	function setFkidrepresentacionvisual($fkidrepresentacionvisual){
  		$this->fkidrepresentacionvisual=$fkidrepresentacionvisual;
  	}
  	function getFkidrepresentacionvisual(){
  		return $this->fkidrepresentacionvisual;
  	}    		
  }
?>