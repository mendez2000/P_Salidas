<?php
include_once "../php/Sesion_Star.php";
include_once '../conexion/conexion2.php';
include_once "../php/plantilla3.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Admin</title>
  <link rel="stylesheet" href="/R_Memorias/css/Style_Admin.css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>

</head>

<body>

  <main class="page-content">
    <div class="container-fluid">
      <section class="form-login">
        <h5>Registro Administrador</h5>
        <form action="/R_Memorias/php/Reg_Admin.php" method="POST" onsubmit="return validar();">
        <div class="form-group input-icon">
      <label for="admin">Ingrese un Usuario*</label><br>
      <div>
      <i class="fa fa-user"></i>
          <input class="controls" type="text" id="nom" name="nom" placeholder="Nombre de Usuario" class="input-48" required>
          </div>
    </div>
    <div class="form-group input-icon">
      <label for="password">Ingrese una Contraseña*</label><br>
      <div>
        <i class="fa fa-lock"></i>
          <input class="controls" type="password" id="pas" name="pas" placeholder="Ingrese una Contraseña" class="input-48" required>
          </div>
    </div>
          <input class="buttons" type="submit" value="Guardar">
          <p><a href="/R_Memorias/php/Form_Usuario.php">Regresar</a></p>
      </section>
    </div>

  </main>

  </div>
</body>

</html>