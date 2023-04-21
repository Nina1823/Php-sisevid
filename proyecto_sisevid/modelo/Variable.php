<?php
  class Variable{
  	var $id;
  	var $nom;
    var $fechaCreacion;
    var $fkEmailUsuario;
  	function __construct($id,$nom,$fechaCreacion,$fkEmailUsuario){
  		$this->id=$id;
  		$this->nom=$nom;
        $this->fechaCreacion=$fechaCreacion;
        $this->fkEmailUsuario=$fkEmailUsuario;
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
    
    function setfechaCreacion($fechaCreacion){
        $this->fechaCreacion=$fechaCreacion;
    }
    function getfechaCreacion(){
        return $this->fechaCreacion;
    } 

    function setfkEmailUsuario($fkEmailUsuario){
        $this->fkEmailUsuario=$fkEmailUsuario;
    }
    function getfkEmailUsuario(){
        return $this->fkEmailUsuario;
    } 


  }
?>