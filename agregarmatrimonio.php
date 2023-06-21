<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="catolico.ico" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Agregar Datos</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php

    include "conexion.php";
    if(isset($_POST["submit"])) {
        $Nombre_Parroquia=$_POST['nombre_parroquia'];
        $Localizacion_Parroquia=$_POST['localizacion_parroquia'];
        $Sacerdote=$_POST['nombre_reverendo'];
        $Fecha_Mat=$_POST['fecha_casamiento'];

        $Nombre_Esposo=$_POST['nombre_esposo'];
        $Edad_Esposo=$_POST['edad_esposo'];
        $Cedula_Esposo=$_POST['cedula_esposo'];
        $Nacionalidad_Esposo=$_POST['nacionalidad_esposo'];
        $Fecha_Nac_Esposo=$_POST['fecha_nac_esposo'];
        $Direccion_Esposo=$_POST['direccion_esposo'];
        $Padre_Esposo=$_POST['padre_esposo'];
        $Madre_Esposo=$_POST['madre_esposo'];

        $Nombre_Esposa=$_POST['nombre_esposa'];
        $Edad_Esposa=$_POST['edad_esposa'];
        $Cedula_Esposa=$_POST['cedula_esposa'];
        $Nacionalidad_Esposa=$_POST['nacionalidad_esposa'];
        $Fecha_Nac_Esposa=$_POST['fecha_nac_esposa'];
        $Direccion_Esposa=$_POST['direccion_esposa'];
        $Padre_Esposa=$_POST['padre_esposa'];
        $Madre_Esposa=$_POST['madre_esposa'];

        $Nombre_Testigo1=$_POST['nombre_testigo1'];
        $Cedula_Testigo1=$_POST['cedula_testigo1'];
        $Direccion_Testigo1=$_POST['direccion_testigo1'];
        $Padre_Testigo1=$_POST['padre_testigo1'];
        $Madre_Testigo1=$_POST['madre_testigo1'];

        $Nombre_Testigo2=$_POST['nombre_testigo2'];
        $Cedula_Testigo2=$_POST['cedula_testigo2'];
        $Direccion_Testigo2=$_POST['direccion_testigo2'];
        $Padre_Testigo2=$_POST['padre_testigo2'];
        $Madre_Testigo2=$_POST['madre_testigo2'];


        $sql = "INSERT INTO `tbl_matrimonio` (`nombre_parroquia`,`localizacion_parroquia`,`nombre_reverendo`,`fecha_casamiento`,`nombre_esposo`,`edad_esposo`,`cedula_esposo`,`nacionalidad_esposo`,`fecha_nac_esposo`, `direccion_esposo`, `padre_esposo`, `madre_esposo`, `nombre_esposa`, `edad_esposa`, `cedula_esposa`, `nacionalidad_esposa`, `fecha_nac_esposa`, `direccion_esposa`, `padre_esposa`, `madre_esposa`, `nombre_testigo1`, `cedula_testigo1`, `direccion_testigo1`, `padre_testigo1`, `madre_testigo1`, `nombre_testigo2`, `cedula_testigo2`, `direccion_testigo2`, `padre_testigo2`, `madre_testigo2`)
        VALUES ('$Nombre_Parroquia','$Localizacion_Parroquia','$Sacerdote','$Fecha_Mat','$Nombre_Esposo','$Edad_Esposo','$Cedula_Esposo','$Nacionalidad_Esposo','$Fecha_Nac_Esposo','$Direccion_Esposo','$Padre_Esposo','$Madre_Esposo','$Nombre_Esposa','$Edad_Esposa','$Cedula_Esposa','$Nacionalidad_Esposa','$Fecha_Nac_Esposa','$Direccion_Esposa','$Padre_Esposa','$Madre_Esposa','$Nombre_Testigo1','$Cedula_Testigo1','$Direccion_Testigo1','$Padre_Testigo1','$Madre_Testigo1','$Nombre_Testigo2','$Cedula_Testigo2','$Direccion_Testigo2','$Padre_Testigo2','$Madre_Testigo2')";

        $result = mysqli_query($con, $sql);
        
        if($result){
            header("Location: matrimonio.php?msg=New record created successfully");
        }else{
            echo "Failed: " . mysqli_error($con);
        }

    }
?>

    
    <div class="container d-flex justify-content-center p-4">
        <div class="card p-4">
            <h2 class="text-center">Registro Matrimonio</h2>
            <hr>
            <form method="POST" style="width:50vw" autocomplete=off>
            <h2 class="fs-5 mb-3 text-center">Datos Parroquia</h2>
            <?php
                    $tabla = "SELECT *FROM `tbl_iglesia`";
                    $mostrartabla = mysqli_query($con, $tabla);
                    $row = mysqli_fetch_assoc($mostrartabla);
                  ?>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                <input type="text" class="form-control" name="nombre_parroquia" value="<?php echo $row['nombre_iglesia']?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Localizacion</span>
                <input type="text" class="form-control" name="localizacion_parroquia" value="<?php echo $row['direccion_iglesia']?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Sacerdotes</span>
                <select class="form-select" name="nombre_reverendo" aria-label="Default select example" required>
                <?php
                    $tabla = "SELECT * FROM `tbl_sacerdote`";
                    $mostrartabla = mysqli_query($con, $tabla);
                    while ($row = mysqli_fetch_assoc($mostrartabla)) {
                ?>
                    <option value="<?php echo $row["nombre_sac"]?> <?php echo $row["apellido_sac"]?>"><?php echo $row["nombre_sac"]?> <?php echo $row["apellido_sac"]?></option>
                <?php
                    }
                ?>
                </select>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Casamiento</span>
                <input type="date" class="form-control" name="fecha_casamiento" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <h2 class=" text-center fs-5 mb-3">Datos Esposo</h2>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                <input type="text" class="form-control" name="nombre_esposo" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Edad</span>
                <input type="text" class="form-control" name="edad_esposo" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Cedula</span>
                <input type="text" class="form-control" name="cedula_esposo" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nacionalidad</span>
                <input type="text" class="form-control" name="nacionalidad_esposo" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Direccion</span>
                <input type="text" class="form-control" name="direccion_esposo" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Padre</span>
                <input type="text" class="form-control" name="padre_esposo" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Madre</span>
                <input type="text" class="form-control" name="madre_esposo" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Nacimiento</span>
                <input type="date" class="form-control" name="fecha_nac_esposo" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            

            <h2 class=" text-center fs-5 mb-3">Datos Esposa</h2>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                <input type="text" class="form-control" name="nombre_esposa" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Edad</span>
                <input type="text" class="form-control" name="edad_esposa" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Cedula</span>
                <input type="text" class="form-control" name="cedula_esposa" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nacionalidad</span>
                <input type="text" class="form-control" name="nacionalidad_esposa" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Direccion</span>
                <input type="text" class="form-control" name="direccion_esposa" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Padre</span>
                <input type="text" class="form-control" name="padre_esposa" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Madre</span>
                <input type="text" class="form-control" name="madre_esposa" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Nacimiento</span>
                <input type="date" class="form-control" name="fecha_nac_esposa" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <h2 class=" text-center fs-5 mb-3">Datos Testigo 1</h2>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                <input type="text" class="form-control" name="nombre_testigo1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Cedula</span>
                <input type="text" class="form-control" name="cedula_testigo1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Direccion</span>
                <input type="text" class="form-control" name="direccion_testigo1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Padre</span>
                <input type="text" class="form-control" name="padre_testigo1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Madre</span>
                <input type="text" class="form-control" name="madre_testigo1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

            <h2 class=" text-center fs-5 mb-3">Datos Testigo 2</h2>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                <input type="text" class="form-control" name="nombre_testigo2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Cedula</span>
                <input type="text" class="form-control" name="cedula_testigo2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Direccion</span>
                <input type="text" class="form-control" name="direccion_testigo2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Padre</span>
                <input type="text" class="form-control" name="padre_testigo2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Madre</span>
                <input type="text" class="form-control" name="madre_testigo2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" required>
            </div>

                    <div class="botones d-flex justify-content-center">
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