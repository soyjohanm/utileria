<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Prueba</title>
    <link rel="stylesheet" href="./estilos.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
  </head>
  <body style="background-color:#f2f2f2;">
    <main>
      <div class="container">
        <a href="index.php"><h1 style="text-align:center;font-weight:700;">CRUD de prueba</h1></a>
        <div class="row">
          <div class="col s6 m6 l6">
            <a href="#" id="crear">
              <div class="card">
                <div class="card-content">
                  <span class="card-tittle">Crear</span>
                </div>
              </div>
            </a>
          </div>
          <div class="col s6 m6 l6">
            <a href="#" id="leer">
              <div class="card">
                <div class="card-content">
                  <span class="card-tittle">Leer</span>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col s12 m12 l12">
            <div id="resultado"></div>
          </div>
        </div>
      </div>
    </main>
    <script type="text/javascript">
      $(document).on('click', '#leer', function() {
        $.ajax({
          url:"leer.php",
          success:function(data) {
            $('#resultado').html(data);
          }
        });
      });
      $(document).on('click', '#crear', function() {
        $.ajax({
          url:"crear.php",
          success:function(data) {
            $('#resultado').html(data);
          }
        });
      });
    </script>
  </body>
</html>
