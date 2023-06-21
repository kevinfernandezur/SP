<?php

    include "conexion.php";
    $Id_sac = $_GET["Id_sac"];

    if(isset($_POST["submit"])){
        $Id_sac2 = $_POST["Id_sac"];
        $Nombre_Sac = $_POST["nombre_sac"];
        $Apellido_Sac = $_POST["apellido_sac"];
        $Direccion_Sac = $_POST["direccion_sac"];
        $Fecha_Nac_Sac = $_POST["fecha_nac_sac"];
        $Telefono_Sac = $_POST["telefono_sac"];

        $tabla = "UPDATE `tbl_sacerdote` SET `Id_sac` = '$Id_sac', `Id_sac` = '$Id_sac2', `nombre_sac` = '$Nombre_Sac', `apellido_sac` = '$Apellido_Sac',`direccion_sac` = '$Direccion_Sac',`fecha_nac_sac` = '$Fecha_Nac_Sac',`telefono_sac` = '$Telefono_Sac' WHERE `Id_sac` = '$Id_sac'";

        $mostrartabla = mysqli_query($con, $tabla);

        if($mostrartabla){
            header("Location: sacerdote.php?msg=Data update succesfully");
          } else {
            echo "Failed: " . mysqli_error($con);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="catolico.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
        $tabla = "SELECT * FROM `tbl_sacerdote` WHERE `Id_sac` = '$Id_sac' LIMIT 1";
        $mostrartabla = mysqli_query($con, $tabla);
        $row = mysqli_fetch_assoc($mostrartabla);
    ?>
    <div class="container d-flex justify-content-center p-4">
        <div class="card p-4">
            <h2 class="text-center">Registro Sacerdote</h2>
            <hr>
            <form method="POST" style="width:50vw" autocomplete=off>
            <h2 class="fs-5 mb-3 text-center">Datos Sacerdote</h2>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Id Registro</span>
                <input type="text" class="form-control" name="Id_sac" value="<?php echo $row['Id_sac']?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                <input type="text" class="form-control" name="nombre_sac" value="<?php echo $row['nombre_sac']?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Apellido</span>
                <input type="text" class="form-control" name="apellido_sac" value="<?php echo $row['apellido_sac']?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Direcccion</span>
                <input type="text" class="form-control" name="direccion_sac" value="<?php echo $row['direccion_sac']?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Nacimiento</span>
                <input type="date" class="form-control" name="fecha_nac_sac" value="<?php echo $row['fecha_nac_sac']?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Telefono</span>
                <input type="text" class="form-control" name="telefono_sac" value="<?php echo $row['telefono_sac']?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <a href="sacerdote.php" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary" name="submit" onclick="mostrarNotificacionExito()">Guardar</button>
        </form>
        </div>
    </div>
    <script>
function mostrarNotificacionExito() {
  Swal.fire({
    icon: "success",
    title: "Éxito",
    text: "Los datos se han guardado correctamente",
    showConfirmButton: false, // Deshabilita el botón de confirmación automático
    timer: 3000 // Duración de 3 segundos (3000 milisegundos)
  }).then(function() {
    // Código opcional a ejecutar después de que la alerta se haya cerrado
  });
}
</script>

</body>
</html>