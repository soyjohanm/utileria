<?php
  try {
    $controlador = 'mysql';
    $bd_nombre = 'crud';
    $bd_usuario = 'root';
    $bd_clave = '';
    $bd_host = 'localhost';
    $conexion = new PDO("$controlador:host=$bd_host;dbname=$bd_nombre", $bd_usuario, $bd_clave);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
?>
