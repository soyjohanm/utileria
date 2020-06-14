<?php
  require_once 'conexion.php';
  $idProducto = $_POST['idProducto'];
  $query = $conexion->prepare("SELECT * FROM productos WHERE id='$idProducto'");
  $query->execute();
  $obj = $query->fetch(PDO::FETCH_OBJ);
?>
<div class="card">
  <div class="card-content">
    <form id="formActualizar" name="formActualizar" method="post" role="form">
      <div class="container">
        <div class="row">
          <div class="input-field col s5 l5">
            <input type="text" value="<?php echo $idProducto; ?>" id="idProducto" name="idProducto" hidden>
            <input type="text" name="nombre" id="nombre" maxlength="32" value="<?php echo $obj->nombre; ?>" required>
            <label for="nombre" class="active">Nombre</label>
          </div>
          <div class="input-field col s5 l5">
            <input type="text" name="descripcion" id="descripcion" maxlength="50" value="<?php echo $obj->descripcion; ?>" required>
            <label for="descripcion" class="active">Descripcion</label>
          </div>
          <div class="input-field col s2 l2">
            <input type="number" name="cantidad" id="cantidad" step="0.1" min="0" value="<?php echo $obj->cantidad; ?>" required>
            <label for="cantidad" class="active">Cantidad</label>
          </div>
          <div class="col s12 center-align">
            <input class="btn btn-large" type="submit" value="Actualizar">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<div id="cuerpo"></div>
<script type="text/javascript">
  $('#formActualizar').submit(function(event) {
    var parametros = $(this).serialize() + '&funcion=update';
    $.ajax({
      type: "POST",
      url: "crud.php",
      data: parametros,
      success: function(data) {
        $('#cuerpo').html(data);
      }
    });
    event.preventDefault();
  });
</script>
