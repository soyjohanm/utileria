<div class="card">
  <div class="card-content">
    <form id="formCrear" name="formCrear" method="post" role="form">
      <div class="container">
        <div class="row">
          <div class="input-field col s5 l5">
            <input type="text" name="nombre" id="nombre" maxlength="32" required>
            <label for="nombre" class="active">Nombre</label>
          </div>
          <div class="input-field col s5 l5">
            <input type="text" name="descripcion" id="descripcion" maxlength="50" required>
            <label for="descripcion" class="active">Descripcion</label>
          </div>
          <div class="input-field col s2 l2">
            <input type="number" name="cantidad" id="cantidad" step="0.1" min="0" required>
            <label for="cantidad" class="active">Cantidad</label>
          </div>
          <div class="col s12 center-align">
            <input class="btn btn-large" type="submit" value="Ingresar">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<div id="cuerpo"></div>
<script type="text/javascript">
  $('#formCrear').submit(function(event) {
    var parametros = $(this).serialize() + '&funcion=create';
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
