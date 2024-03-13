<?php
include_once "../php/Sesion_Star.php";
include_once '../conexion/conexion3.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT cabecera.id,
        cabecera.fecha,
        cabecera.dia,
        e1.nom as nombre_jefe,
        cabecera.depto, cabecera.detGrab,
        e2.nom as nombre_asignado,
        detalles.id_det, detalles.detEqui, detalles.marca, detalles.serie, detalles.cant, detalles.obs
        FROM cabecera
        INNER JOIN empleados e1 ON e1.id = cabecera.id_jefe
        INNER JOIN empleados e2 ON e2.id = cabecera.id_emp
        LEFT JOIN detalles ON detalles.id_det = cabecera.id
        WHERE cabecera.id = $id
        ORDER BY detalles.id_det LIMIT 150";

    $result = mysqli_query($enlace, $sql);

    if (!$result) {
        die("Error en la consulta: " . mysqli_error($enlace));
    }
} else {
    echo "ID no válido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">

    <div class="image-container" style="position: absolute; top: 10px; right: 0;">
    <img src="/R_Memorias/img/tvc01.png" style="width: 100px; height: auto;">
</div>
<div class="image-container" style="position: absolute; top: -5px; left: 0;">
    <img src="/R_Memorias/img/it.jpg" style="width: 100px; height: auto;">
</div>



    <link rel="stylesheet" href="/R_MEMORIAS/css/print_Pases.css">
    <title>Imp Salidas</title>
</head>

<body>
    <div class="container">
        <?php if (mysqli_num_rows($result) > 0) : ?>
            <?php $row = mysqli_fetch_object($result); ?>
            <h2 align="center" style="font-size: 24px;">CORPORACIÓN TELEVICENTRO</h2>
            <h2 align="center" style="font-size: 20px;">Control de Equipo Utilizado en Grabaciones hechas fuera de los Estudios</h2>
            <br>

            <table style="border-collapse: collapse;">
                <tr>
                    <th style="border: none;">Departamento: <?php echo $row->depto; ?></th>
                    <th style="border: none;" colspan="2">Fecha: <?php echo $row->fecha; ?></th>
                    <th style="border: none;" colspan="2">Día: <?php echo $row->dia; ?></th>
                </tr>
                <tr>
                    <th style="border: none;">Detalle de la grabación: <?php echo $row->detGrab; ?></th>
                </tr>
                <tr>
                    <th style="border: none;">Personal asignado: <?php echo $row->nombre_asignado; ?></th>

                </tr>
                <tr>
                    <th style="border: none;">Solicitado Por: <?php echo $row->nombre_jefe; ?></th>
                </tr>
            </table>
            <br>
            <table>
                <thead>
                    <tr class="centered-row">
                        <th>Detalle de Equipo</th>
                        <th>Modelo</th>
                        <th>Seriel</th>
                        <th>Cantidad</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php mysqli_data_seek($result, 0); ?>
                    <?php while ($row = mysqli_fetch_object($result)) : ?>
                        <tr>
                            <td><?php echo $row->detEqui; ?></td>
                            <td style="width: 150px; text-align: center;"><?php echo $row->marca; ?></td>
                            <td style="width: 150px; text-align: center;"><?php echo $row->serie; ?></td>
                            <td style="width: 150px; text-align: center;"><?php echo $row->cant; ?></td>
                            <td><?php echo $row->obs; ?></td>
                        </tr>
                    <?php endwhile; ?>
                    <?php // Agregar filas vacías para completar hasta 13 filas 
                    ?>
                    <?php for ($i = mysqli_num_rows($result); $i < 14; $i++) : ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>

            <h3>Se asignó el carro:_____________________________________________________Manejado_por: __________________________________________</h3>
            <h3>Autorizado Por:______________________________________________________________________________________________________________</h3>
            <h2 align="center" style="font-size: 15px;">PARA USO DE SEGURIDAD</h2>
            <table>
                <th>Ms. de salida:_____________________________</th>
                <th>Hora de salida:____________________________</th>
                <th>Guardia de Turno:__________________________</th>
                <tr>
                    <th>Cts. De entrada:___________________________</th>
                    <th>Hora de entrada:___________________________</th>
                    <th>Guardia de Turno:___________________________</th>
                </tr>
            </table>
            <h3>Observaciones:__________________________________________________________________________________________________________________</h3>
        <?php else : ?>
            <p>No se encontraron registros para mostrar.</p>
        <?php endif; ?>
    </div>
    <script type="text/javascript">
        function imprimir() {
            if (window.print) {
                window.onafterprint = function() {
                    window.location.href = '/R_MEMORIAS/php/Cons_Salidas.php';
                };
                window.print();
            } else {
                alert("La función de impresión no está soportada por su navegador.");
            }
        }
        window.onload = imprimir;
    </script>
</body>

</html>