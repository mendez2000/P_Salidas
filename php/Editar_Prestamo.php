<?php
include_once "../php/Sesion_Star.php";
include_once "function_Editar.php";
include_once '../conexion/conexion2.php';
include_once '../conexion/conexion3.php';
include_once "../php/plantilla3.php";
?>

<?php

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $field = array(
        "Fdev" => $_POST['Fdev'],
        "Hdev" => $_POST['Hdev'],
        "Entr" => $_POST['Entr'],
        "itbrec" => $_POST['itbrec'],
        "nota" => $_POST['nota']
    );
    $tbl = "prestamo";
    edit($tbl, $field, 'id', $id);

    $id = $_GET['id'];
    $sql = "SELECT * FROM prestamo WHERE id = $id";
    $resultEntregas = mysqli_query($enlace, $sql);

    if ($resultEntregas) {
        $row = mysqli_fetch_assoc($resultEntregas);
    } else {

        die("Error en la consulta: " . mysqli_error($enlace));
    }

    $result = mysqli_query($enlace, $sql);

    if ($result) {
        echo '<script>
        alert("El registro de Préstamo fue CERRADO correctamente");
            window.location = "/R_Memorias/php/Imp_Prestamo.php?id='.$id.'";
          </script>';
    } else {
        echo '<script>
        alert("El Registro de Prestamo NO pudo ser CERRADO");
        window.location = "/R_Memorias/php/Cons_Prestamo.php";
          </script>';

        die("Error en la consulta: " . mysqli_error($enlace));
    }
}

$sqlEntregas = "SELECT * FROM prestamo WHERE id = $id";
$resultEntregas = mysqli_query($enlace, $sqlEntregas);
$row = mysqli_fetch_assoc($resultEntregas);

$sqlDeptos = "SELECT id, nom_depto FROM depto";
$resultDeptos = mysqli_query($enlace, $sqlDeptos);
$deptos = mysqli_fetch_all($resultDeptos, MYSQLI_ASSOC);

$sqlEmpl = "SELECT id, nom FROM empleados";
$resultEmpl = mysqli_query($enlace, $sqlEmpl);
$Empl = mysqli_fetch_all($resultEmpl, MYSQLI_ASSOC);

?>

<br>
<br>
<br>
<br>
<br>
<br>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cerrar Prestamo de Equipo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="stylesheet" href="/R_MEMORIAS/css/stilos003.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<script>
    function autoResize() {
        const textArea = document.getElementById('autoResize');
        textArea.style.height = 'auto';
        textArea.style.height = textArea.scrollHeight + 'px';
    }
    window.addEventListener('load', autoResize);
</script>

<body>

    <div class="container">
        <div class="form-header">
            <div style="position: relative;">
                <img src="/R_Memorias/img/tvc.png" style="width: 100px; height: auto; position: absolute; top: 0; left: 0;">
                <p style="position: relative; z-index: 1;"></p>
            </div>
            <br></br>
            <h4 style="color: black; text-align: center;">Departamento ITBROADCAST</h4>
            <h4 style="color: black; text-align: center;">Cerrar Prestamo de Equipo</h4>
            <br></br>
        </div>
        <form action="" method="post" class="form-grid">

            <table>
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="Fdev">Seleccione Fecha:</label>
                                <input class="form-control" type="date" required name="Fdev">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="Hdev">Seleccione Hora:</label>
                                <input class="form-control" type="time" required name="Hdev">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="form-group">
                <label for="detalle">Detalles del equipo que se prestado:</label>
                <textarea name="detalle" id="autoResize" readonly><?php echo $row['detalle']; ?></textarea>
            </div>
            <div class="form-group">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="Entr">Entregado por:</label>


                                    <select class="form-control" id="Entr" name="Entr" placeholder="Seleccione el colaborador" required onchange="cargarDepartamento()">
                                        <option value="">Seleccionar</option>
                                        <?php
                                        $con = conexion();
                                        $sql = 'SELECT e.id, e.nom, d.nom_depto FROM empleados e INNER JOIN depto d ON e.id_depto = d.id';
                                        $query = mysqli_query($con, $sql);
                                        while ($rowEmp = mysqli_fetch_array($query)) {
                                            $idcap = $rowEmp['id'];
                                            $nomcap = $rowEmp['nom'];
                                            $nomDep = $rowEmp['nom_depto'];
                                            $selected = ($idcap == $row['id_emp']) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo $idcap; ?>" data-depto="<?php echo $nomDep; ?>" <?php echo $selected; ?>><?php echo $nomcap; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="dep">Departamento:</label>
                                    <input class="form-control" type="text" id="departamento" readonly value="<?php echo $nomDep; ?>">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="form-group">
                <label for="itbrec">Atendido por:</label>
                <select class="form-control" id="itbrec" name="itbrec" required>
                    <option value="">Seleccionar</option>
                    <?php
                    $sql = 'SELECT * FROM empleados WHERE id_depto = 11';
                    $query = mysqli_query($con, $sql);
                    while ($row2 = mysqli_fetch_array($query)) {
                        $iditb = $row2['id'];
                        $nomitb = $row2['nom'];
                        $selected = ($iditb == $row['id_itb']) ? 'selected' : '';
                        echo '<option value="' . $iditb . '" ' . $selected . '>' . $nomitb . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="nota">Observaciones:</label>
                <input class="form-control" type="text" name="nota" value="<?php echo $row['nota']; ?>">
            </div>

            <div class="form-group" style="text-align: center;">
                <input class="btn-submit" type="submit" name="submit" value="Actualizar Registro">
            </div>
        </form>
    </div>
</body>

</html>

<script>
    function cargarDepartamento() {
        var empleadoSeleccionado = $("#Entr").val();
        var departamentoSelect = $("#departamento");
        var depto = $("option:selected", "#Entr").attr("data-depto");
        departamentoSelect.val(depto);
    }
</script>

</body>

</html>