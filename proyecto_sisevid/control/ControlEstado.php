<?php
                                                 //require_once '../modelo/Estado.php';
    class ControlEstado{
        var $objEstado;                          //Para acceder a esta varibale, se coloca $this
         function __construct($objEstado){
          $this->objEstado=$objEstado;
 
         }
 

        public function guardar() {                                 //Add

        $id= $this->objEstado->getId();                                                         //$This, para acceder a los atributos
        $nomb=$this->objEstado->getNombre();                                                      //Se toman con variables locales, y se usan los métodos get
                
        $comandoSql = "INSERT INTO tblestado(id,nombre) VALUES ('$id', '$nomb')";            //Instancia de la clase o creación del objeto, para llamar a los métodos
        $objControlConexionE = new ControlConexionE();
        $objControlConexionE->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);         //Argumentos, son los Datos enviados
        $objControlConexionE->ejecutarComandoSql($comandoSql);
        $objControlConexionE->cerrarBd();

        }

        function consultar() {                                                                                 //Toma del objeto, utilizando el método get saca al usuario del objeto y lo mete en la consulta
            $id=$this->objEstado->getId(); 
            
            $comandoSql = "SELECT * FROM tblestado WHERE id = '$id'";
            $objControlConexionE = new ControlConexionE();
            $objControlConexionE->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $recordSet = $objControlConexionE->ejecutarSelect($comandoSql);                                      //recordSet, apunta al encabezado de la tabla
            if ($row = $recordSet->fetch_array(MYSQLI_BOTH)) {                                                  //fetch_array, obliga a la varibles a cambiar de registro, del encabezado lo lleva al primer registro
                $this->objEstado->setNombre($row['nombre']);                                           //MYSQLI_BOTH Puedo colocar el nombre del campo o un número
            }       
            $objControlConexionE->cerrarBd();
            return $this->objEstado;                                                                           //En este punto, ya tiene tanto el usuario como la contraseña
        }
        
        public function modificar() {                               //edit

        $id=$this->objEstado->getId(); 
        $nomb=$this->objEstado->getNombre();
        
        $comandoSql = "UPDATE tblestado SET nombre ='$nomb' WHERE id = '$id'";          //'', son de sql, se coloca adentro la variable varchar, o fechas 
        $objControlConexionE = new ControlConexionE();
        $objControlConexionE->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $objControlConexionE->ejecutarComandoSql($comandoSql);
        $objControlConexionE->cerrarBd();

        }
        
        public function borrar() {                                  //delete

        $id= $this->objEstado->getId(); 
        $comandoSql = "DELETE FROM tblestado WHERE id = '$id'";
        $objControlConexionE = new ControlConexionE();
        $objControlConexionE->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
        $objControlConexionE->ejecutarComandoSql($comandoSql);
        $objControlConexionE->cerrarBd();

        }

        function listar() {

            $comandoSql = "SELECT * FROM tblestado";
            $objControlConexionE = new ControlConexionE();                      //Instanciando la clase ControlConexión, creación del objeto
            $objControlConexionE->abrirBd($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat'],$GLOBALS['port']);
            $recordSet = $objControlConexionE->ejecutarSelect($comandoSql);      //recordSet, para saber cuantas filas retornó esta consulta
            if (mysqli_num_rows($recordSet) > 0) {
                $arregloEstados = array();
                $i=0;
                while($row = $recordSet->fetch_array(MYSQLI_BOTH)){         //fetch_array, Cambia de fila en fila y de uno en uno
                    $objEstado=new Estado("","");
                    $objEstado->setId($row['id']);
                    $objEstado->setNombre($row['nombre']);
                    $arregloEstados[$i]=$objEstado;
                    $i++;
                }                                                           //Este ciclo llena el arreglo de usuarios
            }
            $objControlConexionE->cerrarBd();
            return $arregloEstados;                                                    //Aquí retorna a la vista

        }
    }

?>