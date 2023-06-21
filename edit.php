<?php
include "conexion.php";
$Id_bat = $_GET["Id_bat"];


if (isset($_POST["submit"])) {
  $Id_bat = $_POST['Id_bat'];
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



  $tabla = "UPDATE `tbl_bautismo` SET `Id_bat`='$Id_bat', `nombre_parroquia` = '$nombre_iglesia', `localizacion_parroquia` = '$direccion_iglesia', `nombre_sacerdote`='$nombre_sacerdote',`fecha_bat`='$fecha_bat' ,`lugarnac`='$lugarnac',`nombre_com_baut`='$nombre_com_baut',`fecha_nacimiento`='$fecha_nacimiento' ,`nomnbre_com_padre`='$nomnbre_com_padre',`nombre_com_madre`='$nombre_com_madre',`resg_libro`='$resg_libro' ,`nombre_com_padrino`='$nombre_com_padrino' ,`nombre_com_madrina`='$nombre_com_madrina',`notas_mar`='$notas_mar',`fecha_expedida`='$fecha_expedida' ,`folio`='$folio',`acta`='$acta' WHERE `Id_bat` = '$Id_bat'";

  $mostrartabla = mysqli_query($con, $tabla);

  if ($mostrartabla) {
    header("Location: bautismo.php?msg=Data updated successfully");
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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Editar</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <?php
    $tabla = "SELECT * FROM `tbl_bautismo` WHERE `Id_bat` = '$Id_bat' LIMIT 1";
    $mostrartabla = mysqli_query($con, $tabla);
    $row = mysqli_fetch_assoc($mostrartabla);
    ?>

<div class="container d-flex justify-content-center p-4">
        <div class="card p-4">
            <h2 class="text-center">Editar Registro</h2>
            <hr>
                <form action="" method="post" style="width:50vw; min-width:300px;" autocomplete=off>
                  <h2 class="fs-5 text-center">Datos Parroquiales</h2>
                        <!--ID-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Id Bautizo</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="Id_bat" value="<?php echo $row['Id_bat'] ?>" required>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre</span>
                            </div>
                            <input type="text" class="form-control"  aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="nombre_parroquia" value="<?php echo $row['nombre_parroquia']?>" required>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Direccion</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm" aria-label="Sizing example input" name="localizacion_parroquia" value="<?php echo $row['localizacion_parroquia']?>" required>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Sacerdotes</span>
                            <select class="form-select" name="nombre_sacerdote" aria-label="Default select example" required>
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
                            <input type="date" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="fecha_bat" value="<?php echo $row['fecha_bat'] ?>" required>
                        </div>
                        
                        <!--resg_libro-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Libro</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="resg_libro" value="<?php echo $row['resg_libro'] ?>" required>
                        </div>
                        <!--folio-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Folio</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="folio" value="<?php echo $row['folio'] ?>" required>
                        </div>
                        <!--acta-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Acta</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="acta" value="<?php echo $row['acta'] ?>" required>
                        </div>
                        <!--fecha_expedida-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Expedida</span>
                            </div>
                            <input type="date" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="fecha_expedida" value="<?php echo $row['fecha_expedida'] ?>" required>
                        </div>

                        <h2 class="fs-5 text-center">Datos Bautizado</h2>

                        <!--nombre_com_baut-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre Bautizado</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="nombre_com_baut" value="<?php echo $row['nombre_com_baut'] ?>" required>
                        </div>
                        <!--fecha_nacimiento-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Nacimiento</span>
                            </div>
                            <input type="date" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento'] ?>" required>
                        </div>
                        <!--lugar nacimiento-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Lugar de Nacimiento</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="lugarnac" value="<?php echo $row['lugarnac'] ?>" required>
                        </div>
                        <!--nomnbre_com_padre-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre Padre</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="nomnbre_com_padre" value="<?php echo $row['nomnbre_com_padre'] ?>" required>
                        </div>
                        <!--nombre_com_madre-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre Madre</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="nombre_com_madre" value="<?php echo $row['nombre_com_madre'] ?>" required>
                        </div>

                        <h2 class="fs-5 text-center">Datos Padrinos</h2>

                        <!--nombre_com_padrino-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre Padrino</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="nombre_com_padrino" value="<?php echo $row['nombre_com_padrino'] ?>" required>
                        </div>
                        <!--nombre_com_madrina-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nombre Madrina</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="nombre_com_madrina" value="<?php echo $row['nombre_com_madrina'] ?>" required>
                        </div>

                        <h2 class="fs-5 text-center">Otros</h2>


                        <!--notas_mar-->
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Notas Marginales</span>
                            </div>
                            <input type="text" class="form-control " aria-describedby="inputGroup-sizing-sm"  aria-label="Sizing example input" name="notas_mar" value="<?php echo $row['notas_mar'] ?>" required>
                        </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="submit" onclick="mostrarNotificacionExito()">Guardar</button>
                        <a href="bautismo.php" class="btn btn-secondary">Cancelar</a>
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


  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>