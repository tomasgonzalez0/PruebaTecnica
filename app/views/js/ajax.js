const formularios_ajax=document.querySelectorAll(".FormularioAjax");//Seleccionamos todos los formularios


//-----------Enviar datos por medio de AJAX-------------------
formularios_ajax.forEach(formularios => { //Recorremos cada formulario
    formularios.addEventListener("submit",function(e){ //Agregamos un evento submit a cada formulario
        e.preventDefault();//Prevenimos que se recargue la página
        
        Swal.fire({ //Codigo de sweetalert
            title: '¿Estas seguro?',
            text: "¿Realmente deseas realizar esta acción?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, continuar',
            cancelButtonText: 'No, cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
               
                    let data = new FormData(this);
                    let method = this.getAttribute("method");
                    let action = this.getAttribute("action");
                    let encabezados = new Headers();
                    let config= //Configuracion para enviar datos pro FETCH
                    {   
                        method:method,
                        headers:encabezados,
                        mode:'cors',
                        cache:'no-cache',
                        body:data
                    };

                    fetch(action,config)
                    .then(respuesta => respuesta.json())//Recibo una respuesta (Promesa) y la formateo a json
                    .then(respuesta => {//Cuando la reciba hara el bloque de codigo
                        return alertas_ajax(respuesta);
                    });
            }
        })
    });
});


function alertas_ajax(alerta)
{
    if(alerta.tipo=="simple")
    {

        Swal.fire({
            icon: alerta.icono,
            title: alerta.titulo,
            text: alerta.texto,
            confirmButtonText: 'Aceptar'
        });
        
    }else if(alerta.tipo=="recargar")
        {
            Swal.fire({
                icon: alerta.icono,
                title: alerta.titulo,
                text: alerta.texto,
                confirmButtonText: 'Aceptar'
            }).then((result) => {
                if(result.isConfirmed){
                    location.reload();
                }
            });
        }else if(alerta.tipo=="limpiar")
            {
                document.querySelector(".FomularioAjax").reset();
            }else if(alerta.tipo=="redireccionar")
                {
                    window.location.href=alerta.url;
                }
}