<?php
  require_once 'conexion.php';
  if(isset($_POST['funcion']) && !empty($_POST['funcion'])) {
    $funcion = $_POST['funcion'];
    switch($funcion) {
      case 'create':
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $cantidad = $_POST['cantidad'];
        try {
          $conexion->beginTransaction();
          $conexion->query("INSERT INTO productos(nombre,descripcion,cantidad) VALUES ('$nombre','$descripcion','$cantidad')");
          $conexion->commit();
          echo "<div class='card'><div class='card-content'><h5 style='text-align:center;'>Se han introducido los nuevos datos</h5></div></div>";
        } catch(Exception $e) {
          echo "<div class='card'><div class='card-content'><h5 style='text-align:center;'>Ha ocurrido algún error ".$conexion->rollback()."<h5></div></div>";
        }
        break;
      case 'update':
        $idProducto = $_POST['idProducto'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $cantidad = $_POST['cantidad'];
        try {
          $conexion->beginTransaction();
          $conexion->query("UPDATE productos SET nombre='$nombre',descripcion='$descripcion',cantidad='$cantidad' WHERE id='$idProducto'");
          $conexion->commit();
          echo "<div class='card'><div class='card-content'><h5 style='text-align:center;'>Se han actualizado los datos</h5></div></div>";
        } catch(Exception $e) {
          echo "<div class='card'><div class='card-content'><h5 style='text-align:center;'>Ha ocurrido algún error ".$conexion->rollback()."<h5></div></div>";
        }
        break;
      case 'delete':
        $idProducto = $_POST['idProducto'];
        try {
          $conexion->beginTransaction();
          $conexion->query("DELETE FROM productos WHERE id='$idProducto'");
          $conexion->commit();
          echo "<td colspan='4' style='text-align:center;'>Se han eliminado los datos</td>";
        } catch(Exception $e) {
          echo "Ha ocurrido algún error ".$conexion->rollback();
        }
        break;
    }
  }
?>
