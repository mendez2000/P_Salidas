<?php
include_once '../conexion/conexiones.php';
?>

<?php
session_start();

$fe = $_POST['Fpres'];
$he = $_POST['Hpres'];
$de = $_POST['detalle'];
$pe = $_POST['id_emp'];
$it = $_POST['id_itb'];
$nota = $_POST['nota'];

$insertar = "INSERT INTO prestamo (Fpres,Hpres,detalle,id_empleados,id_itb,nota) VALUES ('$fe','$he','$de','$pe','$it','$nota')";
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
        alert("El registro de Prestamo se almaceno EXITOSAMENTE");
        // Obtener el ID del último registro insertado
        var ultimo_id = "<?php echo mysqli_insert_id($conexion); ?>";
        window.location = "/R_MEMORIAS/php/Imp_Prestamo.php?id=" + ultimo_id;
      };
    </script>
  </head>

  </html>
<?php
}
mysqli_close($conexion);
?>