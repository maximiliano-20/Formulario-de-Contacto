<htm<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
   <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <title>Formulario de Contacto</title>


</head>
<body>

<div class="container">
  <div class="titulo"><span>Contactame</span></div>
  <div id="alertas"></div>
  <form action="php/enviar-datos.php" method="POST" id="formulario">
    <div class="fila">
       <input type="text" class="alertas" name="nombres" id="nombres" placeholder="Nombre y Apellido">
    </div>
    <div class="fila">
       <input type="text"class="alertas"  name="email" id="email" placeholder="Email">
    </div>
    <div class="fila">
       <input type="text" class="alertas" name="asunto" id="asunto" placeholder="Asunto">
    </div>
    <div class="fila">
       <textarea class="alertas" name="mensaje" id="mensaje" placeholder="Mensaje"></textarea>
    </div>
    <div id="spinner">
         <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
         </div>
   </div>

    <div class="fila">
       <input type="submit" >
    </div>
  
  </form>
</div>




<script type="module" src="js/app.js"></script>
</body>
</html>