<?php

require_once 'conexion.php';

$nombres = isset($_POST['nombres']) ? $_POST['nombres'] : false;
$email = isset($_POST['email']) ? $_POST['email'] : false;
$asunto = isset($_POST['asunto']) ? $_POST['asunto'] : false;
$mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : false;
$errores = [];

$destinatario = "estigarribiamaximiliano73@gmail.com";
$asunto_mensaje = "De: $nombres <$email>";
$cuerpo = "Nombre: $nombres\nEmail: $email\nAsunto:\n$asunto\nMensaje:\n$mensaje";


if($nombres === "" || $email === "" || $asunto === "" || $mensaje === ""){
   $errores['camposVacios'] = true;
}

$expresion = "/^[a-zA-Z ]{3,30}+$/";
if (!preg_match($expresion,$nombres)) {
    $errores['validarLetras'] = true;
}

if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errores['validarEmail'] = true;
}


if(count($errores) == 0){
    $consulta = "INSERT INTO contactos (nombres,email,asunto,mensaje) 
    VALUES (:nombres,:email,:asunto,:mensaje)";
    $sql = $conexion->prepare($consulta);
    $sql->bindParam(":nombres",$nombres,PDO::PARAM_STR);
    $sql->bindParam(":email",$email,PDO::PARAM_STR);
    $sql->bindParam(":asunto",$asunto,PDO::PARAM_STR);
    $sql->bindParam(":mensaje",$mensaje,PDO::PARAM_STR);
    $respuesta = $sql->execute();

    mail($destinatario, $asunto_mensaje, $cuerpo);
   
    $errores['success'] = true;
}else{
   
    $errores['error'] = false;
   
}
echo json_encode($errores);

