<?php
    include "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php

    if(isset($_POST["submit"])) {
        $Nombre_Iglesia = $_POST["nombre_iglesia"];
        $Direccion_Iglesia = $_POST["direccion_iglesia"];
        $Correo_Iglesia = $_POST["correo_iglesia"];
        $Diocesis_Iglesia = $_POST["diocesis_iglesia"];
        $Imagen_Iglesia = $_POST["imagen_iglesia"];
        $sql = "INSERT INTO `tbl_iglesia` (`nombre_iglesia`, `direccion_iglesia`, `correo_iglesia`, `diocesis_iglesia` , `imagen_iglesia`)
        VALUES ('$Nombre_Iglesia' , '$Direccion_Iglesia', '$Correo_Iglesia', '$Diocesis_Iglesia', '$Imagen_Iglesia')";

        $result = mysqli_query($con, $sql);

        if($result){
            header("Location: index.php?msg=New record created successfully");
        }else{
            echo "Failed: " . mysqli_error($con);
        }
    }
?>

<div class="container d-flex justify-content-center p-4">
        <div class="card p-4">
            <h2 class="text-center">Registro Iglesia</h2>
            <hr>
            <form method="POST" style="width:50vw" autocomplete=off>
            <h2 class="fs-5 mb-3 text-center">Datos Iglesia</h2>
            <?php
                
            ?>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                <input type="text" class="form-control" name="nombre_iglesia" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Direccion</span>
                <input type="text" class="form-control" name="direccion_iglesia" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Correo</span>
                <input type="email" class="form-control" name="correo_iglesia" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Diócesis Parroquial</span>
                <select class="form-select" name="diocesis_iglesia" aria-label="Default select example" required>
                    <option value="Arquidiócesis de Santo Domingo">Arquidiócesis de Santo Domingo</option>
                    <option value="Diócesis de Santiago de los Caballeros">Diócesis de Santiago de los Caballeros</option>
                    <option value="Diócesis de La Vega">Diócesis de La Vega</option>
                    <option value="Diócesis de San Francisco de Macorís">Diócesis de San Francisco de Macorís</option>
                    <option value="Diócesis de San Juan de la Maguana">Diócesis de San Juan de la Maguana</option>
                    <option value="Diócesis de Baní">Diócesis de Baní</option>
                    <option value="Diócesis de Barahona">Diócesis de Barahona</option>
                    <option value="Diócesis de San Pedro de Macorís">Diócesis de San Pedro de Macorís</option>
                    <option value="Diócesis de Mao-Monte Cristi">Diócesis de Mao-Monte Cristi</option>
                    <option value="Diócesis de Puerto Plata">Diócesis de Puerto Plata</option>
                    <option value="Diócesis de Higüey">Diócesis de Higüey</option>
                    <option value="Diócesis de Nuestra Señora de la Altagracia en Higüey">Diócesis de Nuestra Señora de la Altagracia en Higüey</option>
                    <option value="Diócesis de La Altagracia en Higüey">Diócesis de La Altagracia en Higüey</option>
                    <option value="Diócesis de El Seibo">Diócesis de El Seibo</option>
                    <option value="Diócesis de Puerto Plata">Diócesis de Puerto Plata</option>
                </select>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Imagen</span>
                <input type="file" class="form-control" name="imagen_iglesia" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary" name="submit" onclick="mostrarNotificacionExito()">Guardar</button>
        </form>
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