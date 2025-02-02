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


     // ------------METODOS PARA EL CRUD--------------------
		protected function guardarDatos($tabla,$datos)
        {

			$query="INSERT INTO $tabla (";

			$C=0;//Contador
			foreach ($datos as $clave){
				if($C>=1){ $query.=","; }
				$query.=$clave["campo_nombre"];
				$C++;
			}
			
			$query.=") VALUES(";

			$C=0;
			foreach ($datos as $clave){
				if($C>=1){ $query.=","; }
				$query.=$clave["campo_marcador"];
				$C++;
			}

			$query.=")";
			$sql=$this->conectar()->prepare($query);

			foreach ($datos as $clave){
				$sql->bindParam($clave["campo_marcador"],$clave["campo_valor"]);
			}

			$sql->execute();

			return $sql;
		}



        public function seleccionarDatos($tipo,$tabla,$campo,$id){
			$tipo=$this->limpiarCadena($tipo);
			$tabla=$this->limpiarCadena($tabla);
			$campo=$this->limpiarCadena($campo);
			$id=$this->limpiarCadena($id);

            if($tipo=="Unico"){
                $sql=$this->conectar()->prepare("SELECT * FROM $tabla WHERE $campo=:ID");
                $sql->bindParam(":ID",$id);
            }elseif($tipo=="Normal"){
                $sql=$this->conectar()->prepare("SELECT $campo FROM $tabla");
            }
            $sql->execute();

            return $sql;
		}





		protected function actualizarDatos($tabla,$datos,$condicion){
			
			$query="UPDATE $tabla SET ";

			$C=0;
			foreach ($datos as $clave){
				if($C>=1){ $query.=","; }
				$query.=$clave["campo_nombre"]."=".$clave["campo_marcador"];
				$C++;
			}

			$query.=" WHERE ".$condicion["condicion_campo"]."=".$condicion["condicion_marcador"];

			$sql=$this->conectar()->prepare($query);

			foreach ($datos as $clave){
				$sql->bindParam($clave["campo_marcador"],$clave["campo_valor"]);
			}

			$sql->bindParam($condicion["condicion_marcador"],$condicion["condicion_valor"]);

			$sql->execute();

			return $sql;
		}




        protected function eliminarRegistro($tabla,$campo,$id){
            $sql=$this->conectar()->prepare("DELETE FROM $tabla WHERE $campo=:id");
            $sql->bindParam(":id",$id);
            $sql->execute();
            
            return $sql;
        }


        //Paginacion para las tablas con botones de BULMA para cuando se muestren los registros
        protected function paginadorTablas($pagina,$numeroPaginas,$url,$botones){
	        $tabla='<nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">';

	        if($pagina<=1){ //Desahibilita el boton de anterior si la pagina es la primera
	            $tabla.='
	            <a class="pagination-previous is-disabled" disabled >Anterior</a>
	            <ul class="pagination-list">
	            ';
	        }else{ //Si no es la primera pagina, se habilita el boton de anterior
	            $tabla.='
	            <a class="pagination-previous" href="'.$url.($pagina-1).'/">Anterior</a>
	            <ul class="pagination-list">
	                <li><a class="pagination-link" href="'.$url.'1/">1</a></li>
	                <li><span class="pagination-ellipsis">&hellip;</span></li>
	            ';
	        }


	        $ci=0; 
	        for($i=$pagina; $i<=$numeroPaginas; $i++){ //Ciclo para mostrar los botones, se va autoincrementando

	            if($ci>=$botones){
	                break; //Para evitar que se generen mas botones de los que se han definido
	            }

	            if($pagina==$i){ //Si la pagina es igual al boton, se cambia el color (Es la pagina actual)
	                $tabla.='<li><a class="pagination-link is-current" href="'.$url.$i.'/">'.$i.'</a></li>';
	            }else{ //Si no es la pagina actual, se muestra el boton normal
	                $tabla.='<li><a class="pagination-link" href="'.$url.$i.'/">'.$i.'</a></li>';
	            }

	            $ci++;
	        }


	        if($pagina==$numeroPaginas){ //Desahibilita el boton de siguiente si la pagina es la ultima
	            $tabla.='
	            </ul>
	            <a class="pagination-next is-disabled" disabled >Siguiente</a>
	            ';
	        }else{
	            $tabla.='
	                <li><span class="pagination-ellipsis">&hellip;</span></li>
	                <li><a class="pagination-link" href="'.$url.$numeroPaginas.'/">'.$numeroPaginas.'</a></li>
	            </ul>
	            <a class="pagination-next" href="'.$url.($pagina+1).'/">Siguiente</a>
	            ';
	        }

	        $tabla.='</nav>';
	        return $tabla;
	    }


    }

?>