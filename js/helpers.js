
export function mostrarAlertas(mensaje,tipoError) {
    const alerta = document.querySelector('.error');
    if(!alerta){
        const divSpan = document.createElement('div');
        divSpan.classList.add('error');
      if (tipoError === 'error') {
        divSpan.classList.add('alerta');
      }else{
        divSpan.classList.add('exito');
      }

      divSpan.textContent = mensaje;
      alertas.appendChild(divSpan);
      setTimeout(()=>{
            divSpan.remove();
      },3000)
    }

}

export function validarCorreo(correo) {
    if(correo === true){
        mostrarAlertas("Debe ser un email valido",'error');
        return;
    }
}

export function validarCaracteres(nombres) {
    if(nombres === true){
        mostrarAlertas("EL campo solo debe contener letras",'error');
        return;
    }
}