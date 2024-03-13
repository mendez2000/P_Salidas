<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="/R_MEMORIAS/css/style_login.css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>


  <section class="form-login">
    <title>Login Usuario</title>
    <script src="/R_MEMORIAS/js/validar.js"></script>
</head>

<body>

  <h5>Inicio de Sesión</h5>
  </div>

  <form action="/R_MEMORIAS/php/Validar_Usuario.php" method="POST" onsubmit="return validar();">
    
  <div class="form-group input-icon">
      <label for="nom">Ingrese su Usuario*</label><br>
      <div>


        <i class="fa fa-user"></i>
        
        <input class="controls" type="text" id="nom" name="nom" value="" placeholder="Usuario" required>
      </div>
    </div>
    <div class="form-group input-icon">
      <label for="pas">Ingrese su Contraseña*</label><br>
      <div>
        <i class="fa fa-lock"></i>
        <input class="controls" type="password" id="pas" name="pas" value="" placeholder="Contraseña" required>
      </div>
    </div>
 
    <input class="buttons" type="submit" value="Ingresar">
    </section>
  </form>

</body>

</html>