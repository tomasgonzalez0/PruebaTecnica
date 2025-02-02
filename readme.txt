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
