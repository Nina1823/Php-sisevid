<?php

class ControlConexionE{
	
	var $nomm;
	
	function __construct(){
		$this->nomm=null;
	}

    function abrirBd($servidor, $id, $nombre, $db, $port){						//parámetros del método
    	try	{
			$this->nomm = new mysqli($servidor, $id, $nombre, $db, $port);		
			if ($this->nomm->connect_errno) {
			printf(" Connect failed: %s\n", $this->nomm->connect_error);
			exit();
			}
      	}
      	catch (Exception $e){
          	echo "ERROR AL CONECTARSE AL SERVIDOR ".$e->getMessage()."\n";
      	}

    }

    function cerrarBd() {
		try{
			$this->nomm->close();
			}
			catch (Exception $e){
				echo "ERROR AL CONECTARSE AL SERVIDOR ".$e->getMessage()."\n";
			}
		}	
    

    function ejecutarComandoSql($sql) {
    	try	{
			$this->nomm->query($sql);
			}
		catch (Exception $e) {
				echo " NO SE AFECTARON LOS REGISTROS: ". $e->getMessage()."\n";
		  }	
		}

	function ejecutarSelect($sql) {
			try	{
				$recordSet=$this->nomm->query($sql);				
				}
			catch (Exception $e) {
					echo " ERROR: ". $e->getMessage()."\n";
			}	
		return $recordSet;
		}   
	}
	
?>
