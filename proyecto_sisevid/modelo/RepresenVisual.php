<?php
  class RepresenVisual{
  	var $id;
  	var $nom;
  	function __construct($id,$nom){
  		$this->id=$id;
  		$this->nom=$nom;
  	}
  	function setId($id){
  		$this->id=$id;
  	}
  	function getId(){
  		return $this->id;
  	} 
  	function setNombre($nom){
  		$this->nom=$nom;
  	}
  	function getNombre(){
  		return $this->nom;
  	}    		
  }
?>