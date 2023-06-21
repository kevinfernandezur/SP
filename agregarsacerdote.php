<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="catolico.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
    include "conexion.php";
    if(isset($_POST["submit"])) {
        $Nombre_Sac = $_POST['nombre_sac'];
        $Apellido_Sac = $_POST['apellido_sac'];
        $Direccion_Sac = $_POST['direccion_sac'];
        $Fecha_Nac_Sac = $_POST['fecha_nac_sac'];
        $Telefono_Sac = $_POST['telefono_sac'];

        $sql = "INSERT INTO `tbl_sacerdote` (`nombre_sac`, `apellido_sac`, `direccion_sac`, `fecha_nac_sac`, `telefono_sac`) 
        VALUES ('$Nombre_Sac', '$Apellido_Sac', '$Direccion_Sac', '$Fecha_Nac_Sac', '$Telefono_Sac')";

        $result = mysqli_query($con, $sql);

        if($result){
            header("Location: sacerdote.php?msg=New record created successfully");
        }
        else{
            echo "Failed: " . mysqli_error($con);
        }
    }
?>

<div class="container d-flex justify-content-center p-4">
        <div class="card p-4">
            <h2 class="text-center">Registro Sacerdote</h2>
            <hr>
            <form method="POST" style="width:50vw" autocomplete=off>
            <h2 class="fs-5 mb-3 text-center">Datos Sacerdote</h2>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                <input type="text" class="form-control" name="nombre_sac" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Apellido</span>
                <input type="text" class="form-control" name="apellido_sac" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Direcccion</span>
                <input type="text" class="form-control" name="direccion_sac" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Nacimiento</span>
                <input type="date" class="form-control" name="fecha_nac_sac" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Telefono</span>
                <input type="text" class="form-control" name="telefono_sac" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <div class="text-center">
                <a href="matrimonio.php" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary" name="submit" onclick="mostrarNotificacionExito()">Guardar</button>
            </div>
           
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>