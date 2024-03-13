<?php
include_once "../php/Sesion_Star.php";
include_once "Function_Actualizar.php";
?>

<?php
$id = $_GET['id'];
$conexion =  mysqli_connect("localhost", "root", "", "activos");
$query = "DELETE FROM cabecera where id = '" . $id . "'";
$result = mysqli_query($conexion, $query);

if (!$result) {
    echo '<script>
    alert("El Pasde de Salida NO pudo ser Eliminado");
           window.location = "/R_MEMORIAS/php/Cons_Salidas.php";
           </script>';
} else {

    echo '<script>
    alert("El Pase de Salida fue ELIMINADO EXITOSAMENTE");
    window.location = "/R_MEMORIAS/php/Cons_Salidas.php";
    </script>';
}
