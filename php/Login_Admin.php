<?php
include_once "../php/Sesion_Star.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/R_MEMORIAS/css/stilos.css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>

  <title>Login Admin</title>
  <script src="/R_MEMORIAS/js/validar.js"></script>
</head>

<body>

  <section class="form-register">
    <div class="container justify-content-center mt5">
    <h1 class="h1-center">Permisos de Administrador</h1>
      <br>
      

    </div>

  
    <form action="/R_MEMORIAS/php/Validar_Admin.php" method="POST" onsubmit="return validar();">

    <div class="form-group input-icon">
      <label for="nom">Ingrese su Usuario*</label><br>
      <div>
      <i class="fa fa-user"></i>
      <input class="controls" type="text" id="nom" name="nom" placeholder="Ingrese su Usuario" class="input-48" required>
      </div>
    </div>
    <div class="form-group input-icon">
      <label for="pas">Ingrese su Contraseña*</label><br>
      <div>
        <i class="fa fa-lock"></i>
      <input class="controls" type="password" id="pas" name="pas" placeholder="Ingrese su Contraseña" class="input-48" required>
      </div>
    </div>
 
      <input class="botons" type="submit" value="Ingresar">

      <p><a href="/R_Memorias/php/Plantilla.php">Regresar</a></p>
  </section>
  </form>
</body>

</html>