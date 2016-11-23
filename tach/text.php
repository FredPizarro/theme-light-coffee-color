 <?php
        class Conexion{
            private $cn;
            public function __construct(){
                $servidor = "NOMBRE-PC\SQLEXPRESS";
                $database = "BDPRUEBA";
                $info = array('Database'=>$database);
                $this->cn =sqlsrv_connect($servidor, $info);
            }

            public function getConecta(){
                return $this->cn;
            }

        }

?>


<?php include ("Conexion.php");     

    class MiClase{

        public function miFuncion(){

        $cn= new Conexion;

            $query = "SELECT * FROM demo";
            $registros = sqlsrv_query($cn->getConecta(), $query);
                if( $registros === false ){
                    echo "Error al ejecutar consulta.</br>";
                }  else {
                        while($demo= sqlsrv_fetch_array($registros)) {
                            $listado[] = $demo;                     
                        }
                        return $listado;
                }
        }       
    }

?>