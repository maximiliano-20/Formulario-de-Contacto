<?php

try {
    $conexion = new PDO('mysql:host=localhost;dbname=contacto','root','');
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}