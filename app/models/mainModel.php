<?php
    namespace App\Models;
    use \PDO;
    
    if(file_exists(__DIR__."/../../config/server.php")) {
        require_once __DIR__."/../../config/server.php";
    }
    
    class MainModel {
        private $server=DB_SERVER;
        private $db=DB_NAME;
        private $user=DB_USER;
        private $pass=DB_PASS;

        protected function conectar() // Metodo para conectar a la base de datos
        {
            $conexion = new PDO("mysql:host=".$this->server.";dbname=".$this->db, $this->user, $this->pass);
            $conexion->exec("SET CHARACTER SET utf8");
            return $conexion;
        }

        protected function ejecutarConsultas($consulta) // Metodo para ejecutar consultas
        {
            $sql = this->conectar()->prepare($consulta);
            $sql->execute();
            return $sql;
        }

        public function limpiarCadenas($cadena) // Metodo para limpiar cadenas
        {
            $palabras=["<script>","</script>","<script src",
            "<script type=","SELECT * FROM",
            "SELECT "," SELECT ","DELETE FROM","INSERT INTO",
            "DROP TABLE","DROP DATABASE","TRUNCATE TABLE",
            "SHOW TABLES",
            "SHOW DATABASES","<?php","?>","--","^","<",">",
            "==","=",";","::"]; //ARRAY DE PALABRAS NO PERMITIDAS
            $cadena = trim($cadena);
            $cadena = stripslashes($cadena);

            foreach($palabras as $palabra){ //REMPLAZA CADA PALABRA POR UNA CADENA VACIA
				$cadena=str_ireplace($palabra, "", $cadena);
			}

            $cadena = trim($cadena);
            $cadena = stripslashes($cadena);
            return $cadena;
        }

        protected function verificarDatos($filtro,$cadena){ //RECIBE EL FILTRO EN EXPRESION IRREGULAR Y LA CADENA DE TEXTO
			if(preg_match("/^".$filtro."$/", $cadena)){ //VERIFICA QUE LA CADENA DE TEXTO CUMPLA CON EL FILTRO
				return false;
            }else{
                return true;
            }
		}
    }

?>