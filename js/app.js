'use strict';

import { mostrarAlertas,
         validarCorreo,validarCaracteres } from './helpers.js';

const formulario = document.querySelector('#formulario');
const nombreInput = document.querySelector('#nombres');
const emailInput = document.querySelector('#email');
const asuntoInput = document.querySelector('#asunto');
const mensajeInput = document.querySelector('#mensaje');
const alertas = document.querySelector('#alertas');
const spinner = document.querySelector('#spinner');

formulario.addEventListener('submit',agregarDatos);


function agregarDatos(e) {
    e.preventDefault();
    if( nombreInput.value === "" || emailInput.value === ""  
    || asuntoInput.value === "" || mensajeInput.value === ""){
        mostrarAlertas("Los campos no deben ir vacios ","error");
        return;
    }
    enviarDatos();
}

async function enviarDatos() {
  try {
    const url = 'php/enviar-datos.php';
    const datos = new FormData(formulario);
    const respuesta = await fetch(url,{
      method : 'POST',
      body : datos
    });
    const resultado = await respuesta.json();
    const { validarLetras,validarEmail,success,error} = resultado;
    validarCaracteres(validarLetras);
    validarCorreo(validarEmail);
    if(success === true){
      spinner.style.display = 'flex';
      setTimeout(() =>{
         mostrarAlertas("El mensaje se envio correctamente");
         formulario.reset();
         spinner.style.display = 'none';
      },4000)
    
    }else{
       mostrarAlertas("El mensaje no se pudo enviar","error");
    }
    console.log(resultado);

   
    
  } catch (error) {
    console.log(error);
  }
}

