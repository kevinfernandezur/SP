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
        $nombre_iglesia = $_POST['nombre_parroquia'];
        $direccion_iglesia = $_POST['localizacion_parroquia'];
        $nombre_sacerdote = $_POST['nombre_sacerdote'];
        $fecha_bat = $_POST['fecha_bat'];
        $lugarnac = $_POST['lugarnac'];
        $nombre_com_baut = $_POST['nombre_com_baut'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $nomnbre_com_padre = $_POST['nomnbre_com_padre'];
        $nombre_com_madre = $_POST['nombre_com_madre'];
        $resg_libro = $_POST['resg_libro'];
        $nombre_com_padrino = $_POST['nombre_com_padrino'];
        $nombre_com_madrina = $_POST['nombre_com_madrina'];
        $notas_mar = $_POST['notas_mar'];
        $fecha_expedida = $_POST['fecha_expedida'];
        $folio = $_POST['folio'];
        $acta = $_POST['acta'];




        $tabla = "INSERT INTO `tbl_bautismo`(`nombre_parroquia`, `localizacion_parroquia`, `nombre_sacerdote`, `fecha_bat`, `lugarnac` , `nombre_com_baut`, `fecha_nacimiento` , `nomnbre_com_padre`, `nombre_com_madre`, `resg_libro`, `nombre_com_padrino`, `nombre_com_madrina`, `notas_mar`, `fecha_expedida` , `folio`, `acta`) 
         VALUES ('$nombre_iglesia','$direccion_iglesia','$nombre_sacerdote','$fecha_bat', '$lugarnac' ,'$nombre_com_baut','$fecha_nacimiento' ,'$nomnbre_com_padre' ,'$nombre_com_madre' ,'$resg_libro' ,'$nombre_com_padrino' ,'$nombre_com_madrina' ,'$notas_mar' ,'$fecha_expedida' ,'$folio' ,'$acta' )";

        $mostrartabla = mysqli_query($con, $tabla);
        
        if($mostrartabla){
            header("Location: bautismo.php?msg=New record created successfully");
        }else{
            echo "Failed: " . mysqli_error($con);
        }

    }
?>

<div class="container d-flex justify-content-center p-4">
        <div class="card p-4">
            <h2 class="text-center">Registro de Bautismo</h2>
            <hr>

                <form action="" method="post" style="width:50vw; min-width:300px;" autocomplete=off>
                  <h2 class="fs-5 text-center">Datos Parroquiales</h2>
                  <?php
                    $tabla = "SELECT *FROM `tbl_iglesia`";
                    $mostrartabla = mysqli_query($con, $tabla);
                    $row = mysqli_fetch_assoc($mostrartabla);
                  ?>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                            </div>
                            <input type="text" class="form-control" value="<?php echo $row['nombre_iglesia']?>" aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="nombre_parroquia" required>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Direccion</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  value="<?php echo $row['direccion_iglesia']?>" aria-label="Sizing example input" name="localizacion_parroquia" required>
                        </div>
                        <!--nombre_sacerdote-->
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text  " id="inputGroup-sizing-sm">Sacerdotes</span>
                            <select class="form-select " name="nombre_sacerdote" aria-label="Default select example">
                            <?php
                                $tabla2 = "SELECT * FROM `tbl_sacerdote`";
                                $mostrartabla2 = mysqli_query($con, $tabla2);
                                while ($row2 = mysqli_fetch_assoc($mostrartabla2)) {
                            ?>
                                <option value="<?php echo $row2["nombre_sac"]?> <?php echo $row2["apellido_sac"]?>"><?php echo $row2["nombre_sac"]?> <?php echo $row2["apellido_sac"]?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>

                        <!--fecha_bat-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Bautizo</span>
                            </div>
                            <input type="date" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="fecha_bat" required>
                        </div>
                        <!--resg_libro-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Libro</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="resg_libro" required>
                        </div>
                        <!--folio-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Folio</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="folio" required>
                        </div>
                        <!--acta-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Acta</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="acta" required>
                        </div>
                        <!--fecha_expedida-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Expedida</span>
                            </div>
                            <input type="date" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="fecha_expedida" required>
                        </div>

                        <h2 class="fs-5 text-center">Datos Bautizado</h2>

                        <!--nombre_com_baut-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre Bautizado</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="nombre_com_baut" required>
                        </div>
                        <!--fecha_nacimiento-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Nacimiento</span>
                            </div>
                            <input type="date" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="fecha_nacimiento" required>
                        </div>
                        <!--lugar nacimiento-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Lugar de Nacimiento</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="lugarnac" required>
                        </div>
                        <!--nomnbre_com_padre-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre Padre</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="nomnbre_com_padre" required>
                        </div>
                        <!--nombre_com_madre-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre Madre</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="nombre_com_madre" required>
                        </div>

                        <h2 class="fs-5 text-center">Datos Padrinos</h2>

                        <!--nombre_com_padrino-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre Padrino</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="nombre_com_padrino" required>
                        </div>
                        <!--nombre_com_madrina-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre Madrina</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="nombre_com_madrina" required>
                        </div>

                        <h2 class="fs-5 text-center">Otros</h2>


                        <!--notas_mar-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Notas Marginales</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="notas_mar" required>
                        </div>
                    <div class="text-center">
                        <a href="bautismo.php" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary" name="submit" onclick="mostrarNotificacionExito()">Guardar</button>
                    </div>
                </form>
            <div>
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