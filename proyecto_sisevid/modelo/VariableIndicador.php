<?php 
class VariableIndicador{
    private $id;
    private $fkidvariable;
    private $fkidindicador;
    private $dato;
    private $fechadato;
    private $fknomusuario;

    function __construct($id, $fkidvariable, $fkidindicador, $dato, $fechadato, $fknomusuario){
        $this->id = $id;
        $this->fkidvariable = $fkidvariable;
        $this->fkidindicador = $fkidindicador;
        $this->dato = $dato;
        $this->fechadato = $fechadato;
        $this->fknomusuario = $fknomusuario;
    }

    public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getFkidvariable() {
		return $this->fkidvariable;
	}

	public function setFkidvariable($fkidvariable) {
		$this->fkidvariable = $fkidvariable;
	}

	public function getFkidindicador() {
		return $this->fkidindicador;
	}

	public function setFkidindicador($fkidindicador) {
		$this->fkidindicador = $fkidindicador;
	}

	public function getDato() {
		return $this->dato;
	}

	public function setDato($dato) {
		$this->dato = $dato;
	}

	public function getFechadato() {
		return $this->fechadato;
	}

	public function setFechadato($fechadato) {
		$this->fechadato = $fechadato;
	}

	public function getFknomusuario() {
		return $this->fknomusuario;
	}

	public function setFknomusuario($fknomusuario) {
		$this->$fknomusuario = $fknomusuario;
	}



}

?>