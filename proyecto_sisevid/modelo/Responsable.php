<?php
  class Responsable{
  	var $cedula;
  	var $nom;
    var $email;
	
  	function __construct($cedula,$nom,$email){
  		$this->cedula=$cedula;
  		$this->nom=$nom;
		$this->email=$email;
  	}
  	function setCedula($cedula){
  		$this->cedula=$cedula;
  	}
  	function getCedula(){
  		return $this->cedula;
  	} 
  	function setNombre($nom){
  		$this->nom=$nom;
  	}
  	function getNombre(){
  		return $this->nom;
  	}    
    
    function setEmail($email){
        $this->email=$email;
    }
    function getEmail(){
        return $this->email;
    }  
  }
