<?php
include_once '../conexion/conexiones.php';
session_start();

$n = $_POST['nom'];
$p = $_POST['pas'];
$e = $_POST['emp'];
$p = hash('sha512', $p);


$verificar_empleado = mysqli_query($conexion, "SELECT * FROM usuarios WHERE id_empl = '$e'");
if (mysqli_num_rows($verificar_empleado) > 0) {
    echo '<script>
              alert("El colaborador ya tiene un usuario asociado");
              window.location = "/R_Memorias/php/Form_Usuario.php";
          </script>';
    exit; 
}

$insertar = "INSERT INTO usuarios (user, pass, id_empl) VALUES ('$n','$p','$e')";
$resultado = mysqli_query($conexion, $insertar);

if (!$resultado) {
    echo 'Error al registrar el Usuario';
} else {
    echo '<script>
              alert("El Usuario se registró EXITOSAMENTE");
              window.location = "/R_Memorias/php/Form_Usuario.php";
          </script>';
}

mysqli_close($conexion);
?>
