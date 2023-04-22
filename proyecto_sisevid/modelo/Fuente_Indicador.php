<?php
  class RepresentVisual_Indicador{
  	var $fkidfuente;
  	var $fkidindicador;
  	function __construct($fkidfuente,$fkidindicador){
  		$this->fkidfuente=$fkidfuente;
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