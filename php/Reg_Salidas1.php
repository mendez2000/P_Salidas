<?php
include_once '../conexion/conexiones.php';
?>

<?php
session_start();

$id_det = $_POST["id_det"];
$detEqui = $_POST["detEqui"];
$marca = $_POST["marca"];
$serie = $_POST["serie"];
$cant = $_POST["cant"];
$obs = $_POST["obs"];

$insertar = "INSERT INTO detalles (id_det, detEqui, marca, serie, cant, obs) VALUES ('$id_det','$detEqui','$marca','$serie','$cant','$obs')";
$resultado = mysqli_query($conexion, $insertar);

if ($resultado) {
  echo '<script>
          alert("La nueva Fila se agregó correctamente");
          window.history.go(-2);
        </script>';
} else {
  echo '<script>
          alert("La nueva Fila NO se pudo agregar");
          window.history.go(-2);
        </script>';

  die("Error en la consulta: " . mysqli_error($enlace));
}

mysqli_close($conexion);
