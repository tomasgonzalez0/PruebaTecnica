USUARIO:Administrador
CONTRASEÑA:acemaINGENIERIA123

IMPORTANTE!
commit unicamente para restaurar el readme.txt durante la grabacion del video
se eliminaron lineas de codigo por error, teniendo que hacer git checkout y force
para volver a una version anterior donde no estaba el readme.txt con las preguntas
igualmente las preguntas las respondo en el video YT, gracias por la atencion

Objetivo: Crear un formulario de registro de usuarios y una tabla que muestre los usuarios 
registrados, permitiendo en la interfaz, tener botones para editar y eliminar cada usuario. 

1. Formulario en HTML y CSS con los campos: 
• Nombre 
• Email 
• Contraseña 

2. JavaScript para: 
• Validar email con regex. 
• Validar contraseña segura (mínimo 8 caracteres, 1 mayúscula, 1 número y 1 
carácter especial). 
• Permitir edición de los datos del usuario. 
• Enviar los datos al backend en PHP usando fetch(). 

3. Tabla interactiva con botones para editar y eliminar cada usuario. 

4. Backend en PHP (api.php): 
• GET /usuarios → Obtiene usuarios desde MySQL. 
• POST /usuarios → Inserta un usuario en la base de datos. 
• PUT /usuarios/:id → Actualiza un usuario. 
• DELETE /usuarios/:id → Elimina un usuario. 


Preguntas 
1. ¿Cómo harías una petición AJAX sin usar librerías como jQuery? 
R/ Utilizando la api FETCH(), que se basa en promesas y respuestas, 
basicamente le envio la URL y ella me dara la respuesta.

2. Explica la diferencia entre POST y GET en una solicitud HTTP. 
R/El POST se utiliza para enviar datos al servidor y el GET solicita
los datos de un recurso especifico del servidor, ademas de que el GET
los envia por la URL

3. ¿Cómo validarías un email en JavaScript sin usar librerías? 
R/Haciendo validaciones propias como verificar si esta vacio
y con propiedades de string se podria ir validando con un array
o con mas facilidad utilizar la funcion filter_var() de php con 
la constante FILTER_VALIDATE_EMAIL

4. ¿Cómo harías una consulta SQL en PHP para obtener todos los usuarios de una tabla? 
R/Crearia un metodo ejecutarConsulta que reciba en texto la consulta("SELECT * FROM USUARIOS") y otro conectarBD, primeramente me conectaria a la BD,
en el codigo de ejecutarConsulta me conecto llamando al metodo conectarBD, le preparo la consulta y por ultimo uso execute
---FRAGMENTO DE CODIGO DEL PROYECTO----
		/----------  Funcion conectar a BD  ----------/
		protected function conectar(){
			$conexion = new PDO("mysql:host=".$this->server.";dbname=".$this->db,$this->user,$this->pass);
			$conexion->exec("SET CHARACTER SET utf8");
			return $conexion;
		}


		/----------  Funcion ejecutar consultas  ----------/
		protected function ejecutarConsulta($consulta){ 
			$sql=$this->conectar()->prepare($consulta);
			$sql->execute();
			return $sql;
		}
---FIN FRAGMENTO DE CODIGO DEL PROYECTO---

5. ¿Cómo previenes SQL Injection en PHP sin usar librerías? 
  R/ Una forma que fue la que implente es crear un array donde
guarde todas las palabras peligros y simbolos con los cual podrian hacer
inyeccion de datos y cuando reciba la URL pasarlo por este metodo de 
validacion. (metodo dentro del proyecto)

6. ¿Cuál es la diferencia entre innerHTML y textContent en JavaScript? 
R/ innerHTML interpreta etiquetas y textcontent interpreta texto plano

7. ¿Cómo manejarías errores en una solicitud fetch() en JavaScript? 
R/Verificaria el estado de la respuesta, en caso de error lanzarla 
con throw new error() y manejarlo con cath() (errores de red)

8. Explica la diferencia entre var, let y const en JavaScript. 
R/ var actualmente es obsoleto, let se usa para variables
y const para constantes.

9. ¿Cómo mejorarías la seguridad de un formulario web en el frontend? 
R/ utilizando las propiedades como type, maxlenght, required, min, max, y
enviando que solo reciba un cierto tipo de datos [a-zA-Z]{0.9}
10. Preguntas sobre hosting: 
• ¿Qué consideraciones debes tener al subir una aplicación web estática a un 
hosting? 
R/ Lo mas importante seria que esta no tenga ningun tipo de error al momento de subirla al hosting,
  que tenga una estructura ordenada (carpetas para la api, conexion, controladores, CSS,JS,...),
  que cumpla con estandares de seguridad, protocolo https, y antes de subirla a ver hecho varias
  pruebas, testeos, pruebas de escritorio.
  
• ¿Qué diferencia hay entre un hosting compartido y un VPS?
R/VPS Servidor privado virtual, la principal diferencia es 
es que es dedicado y aislado solo para nosotros a diferencia
del host compartido que como su nombre lo dice es compartido,
entran mas diferencias como costo, uso, escalabilidad, etc...
