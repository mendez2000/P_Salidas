<?php
include_once "../php/Sesion_Star.php";
include_once "Function_Actualizar.php";
?>

<?php
$id = $_GET['id'];
$conexion =  mysqli_connect("localhost", "root", "", "activos");
$query = "DELETE FROM entregas where id = '" . $id . "'";
$result = mysqli_query($conexion, $query);

if (!$result) {

     echo '<script>
     alert("El Registro de Entrega NO pudo ser Eliminado");
          window.location = "/R_MEMORIAS/php/Cons_Entrega.php";
          </script>';
} else {

     echo '<script>
     alert("El Registro de Entrega fue ELIMINADO EXITOSAMENTE");
 window.location = "/R_Memorias/php/Cons_Entrega.php";
 </script>';
}