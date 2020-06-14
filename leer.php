<?php require_once 'conexion.php'; ?>
<div class="card">
  <div class="card-content">
    <table id="datos">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Descripción</th>
          <th>Cantidad</th>
          <th style="text-align:center;">Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $query = $conexion->prepare("SELECT * FROM productos ORDER By nombre");
          $query->execute();
          while($obj = $query->fetch(PDO::FETCH_OBJ)){
            echo "<tr id='".$obj->id."'>
                    <td hidden>".$obj->id."</td>
                    <td>".$obj->nombre."</td>
                    <td>".$obj->descripcion."</td>
                    <td>".$obj->cantidad."</td>
                    <td class='center'>
                      <a class='btn-flat' id='actualizar' title='Actualizar'>Actualizar</a>
                      <a class='btn-flat' id='eliminar' title='Eliminar'>Eliminar</a>
                    </td>
                  </tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript">
  $(document).on('click', '#actualizar', function() {
    var currentRow = $(this).closest("tr");
    var idCombustible = currentRow.find("td:eq(0)").text();
    var objeto = {
      idProducto : currentRow.find("td:eq(0)").text()
    };
    $.ajax({
      type:"POST",
      url:"actualizar.php",
      data: objeto,
      success:function(data){
        $('#resultado').html(data);
      }
    });
  });
  $(document).on('click', '#eliminar', function() {
    var currentRow = $(this).closest("tr");
    var idCombustible = currentRow.find("td:eq(0)").text();
    var objeto = {
      idProducto : currentRow.find("td:eq(0)").text(),
      funcion : "delete"
    };
    $.ajax({
      type: 'POST',
      url: "crud.php",
      data: objeto,
      success:function(data){
        $('#'+idCombustible).html(data);
      }
    });
  });
</script>
