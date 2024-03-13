<?php
include_once '../conexion/conexiones.php';
?>

<?php
session_start();

$ma = $_POST['mar'];
$mo = $_POST['mod'];
$se = $_POST['ser'];
$ca = $_POST['cap'];
$pe = $_POST['per'];
$es = $_POST['est'];
$it = $_POST['id_itb'];
$fe = $_POST['fec'];
$ob = $_POST['obs'];

$insertar = "INSERT INTO memorias (id_marca,modelo,serie,id_cap,id_empleados,id_estado,id_itb,fecha,obs) VALUES ('$ma','$mo','$se','$ca','$pe','$es','$it','$fe','$ob')";
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
  echo 'Error al Registrar';
  
} else {
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registro Exitoso</title>
  <script type="text/javascript">
    // Función para mostrar el mensaje de éxito después de que se haya cargado la página
    window.onload = function() {
      alert("El registro de Memoria se almaceno EXITOSAMENTE");
      // Obtener el ID del último registro insertado
      var ultimo_id = "<?php echo mysqli_insert_id($conexion); ?>";
      window.location = "/R_MEMORIAS/php/Imp_Memoria.php?id=" + ultimo_id;
    };
  </script>
</head>
</html>
<?php
}
mysqli_close($conexion);
?>
