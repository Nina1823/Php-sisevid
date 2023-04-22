<?php
class Indicador{
    private $id;
    private $codigo;
    private $nombre;
    private $objetivo;
    private $alcance;
    private $formula;
    private $fkidtipoindicador;
    private $fkidunidadmedicion;
    private $meta;
    private $fkidsentido;
    private $fkidfrecuencia;

    function __construct($id, $codigo, $nombre, $objetivo, $alcance, $formula, $fkidtipoindicador, $fkidunidadmedicion, $meta, $fkidsentido, $fkidfrecuencia){
        $this->id = $id;
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->objetivo = $objetivo;
        $this->alcance = $alcance;
        $this->formula = $formula;
        $this->fkidtipoindicador = $fkidtipoindicador;
        $this->fkidunidadmedicion = $fkidunidadmedicion;
        $this->meta = $meta;
        $this->fkidsentido = $fkidsentido;
        $this->fkidfrecuencia = $fkidfrecuencia;
    }

    public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getCodigo() {
		return $this->codigo;
	}

	public function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	public function getNombre() {
		return $this->nombre;
	}

	public function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	public function getObjetivo() {
		return $this->objetivo;
	}

	public function setObjetivo($objetivo) {
		$this->objetivo = $objetivo;
	}

	public function getAlcance() {
		return $this->alcance;
	}

	public function setAlcance($alcance) {
		$this->alcance = $alcance;
	}

	public function getFormula() {
		return $this->formula;
	}

	public function setFormula($formula) {
		$this->formula = $formula;
	}

	public function getFkidtipoindicador() {
		return $this->fkidtipoindicador;
	}

	public function setFkidtipoindicador($fkidtipoindicador) {
		$this->fkidtipoindicador = $fkidtipoindicador;
	}

	public function getFkidunidadmedicion() {
		return $this->fkidunidadmedicion;
	}

	public function setFkidunidadmedicion($fkidunidadmedicion) {
		$this->fkidunidadmedicion = $fkidunidadmedicion;
	}

	public function getMeta() {
		return $this->meta;
	}

	public function setMeta($meta) {
		$this->meta = $meta;
	}

	public function getFkidsentido() {
		return $this->fkidsentido;
	}

	public function setFkidsentido($fkidsentido) {
		$this->fkidsentido = $fkidsentido;
	}

	public function getFkidfrecuencia() {
		return $this->fkidfrecuencia;
	}

	public function setFkidfrecuencia($fkidfrecuencia) {
		$this->fkidfrecuencia = $fkidfrecuencia;
	}
    


    
}
?>