<?php
include_once "../php/Sesion_Star.php";
include_once "Function_Actualizar.php";
?>

<?php
$id = $_GET['id'];
$conexion =  mysqli_connect("localhost", "root", "", "activos");
$query = "DELETE FROM detalles where id = '" . $id . "'";
$result = mysqli_query($conexion, $query);

if (!$result) {
  echo '<script>
  alert("El Pasde de Salida NO pudo ser Eliminado");
            window.history.back();
          </script>';
} else {
  echo '<script>
  alert("El Pase de Salida fue ELIMINADO EXITOSAMENTE");
            window.history.back();
          </script>';
}
