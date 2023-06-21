<?php
    include "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="catolico.ico" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="bautismo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Bautismo</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 p-0">
                <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark p-0" style="width: 320px; height:100vh; background-color: #3350FF !important;">
                    <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <img src="https://cdn.icon-icons.com/icons2/2164/PNG/512/church_templebuilding_christmas_cold_icon_133095.png" width="45px" height="45px">
                        <span class="fs-4 ms-2 mt-3">Sistema Parroquial</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link text-white btnhover" aria-current="page" style="font-size: 18px;">
                                <img src="https://cdn-icons-png.flaticon.com/512/8244/8244571.png" width="45px" height="45px">
                                Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="matrimonio.php" class="nav-link text-white btnhover" style="font-size: 18px;">
                                <img src="https://cdn-icons-png.flaticon.com/512/3656/3656836.png" width="45px" height="45px">
                                Matrimonio
                            </a>
                        </li>
                        <li class="nav-item"> 
                            <a href="bautismo.php" class="nav-link text-white btnhover" routerLinkActive="list-item-active"  routerLink="/Bautismo" style="font-size: 18px;">
                                <img src="https://cdn-icons-png.flaticon.com/512/9836/9836003.png" width="45px" height="45px">
                                Bautismo
                            </a>
                        </li>
                        <li>
                            <a href="sacerdote.php" class="nav-link text-white btnhover"  style="font-size: 18px;">
                                <img src="https://cdn-icons-png.flaticon.com/512/2663/2663264.png" width="45px" height="45px">
                                Sacerdotes
                            </a>
                        </li>
                        <li>
                        <a href="" class="nav-link text-white btnhover" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <img src="info.png" width="45px" height="45px">
                            Informacion Parroquial
                        </a>
                    </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="col-9">
                <table class="table mt-3">
                    <thead class="bg-dark tabla" style="background-color: #B41111 !important;">
                        <tr>
                        <th scope="col">Numero Registro</th>
                        <th scope="col">Nombre Bautizado</th>
                        <th scope="col">Fecha Bautizo</th>
                        <th scope="col">Fecha Nacimiento</th>
                        <th scope="col">Nombre Padrino</th>
                        <th scope="col">Nombre Madrina</th>
                        <th scope="col">Nombre Sacerdote</th>
                        <th><a href="agregar.php" class="boton"> </a></th>
                        <th><a href="agregar.php" class="boton"><img src="agregar-usuario.png" alt="" class="icono-2"></a></th>
                        <th><a href="agregar.php" class="boton"> </a></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                           $tabla = "SELECT * FROM `tbl_bautismo`";
                           $mostrartabla = mysqli_query($con, $tabla);
                           while ($row = mysqli_fetch_assoc($mostrartabla)) {
                        ?>
                            <tr>   
                                    <td><?php  echo $row['Id_bat']?></td>
                                    <td><?php  echo $row['nombre_com_baut']?></td>
                                    <td><?php  echo $row['fecha_bat']?></td>
                                    <td><?php  echo $row['fecha_nacimiento']?></td>
                                    <td><?php  echo $row['nombre_com_padrino']?></td>
                                    <td><?php  echo $row['nombre_com_madrina']?></td>
                                    <td><?php  echo $row['nombre_sacerdote']?></td>

                            <td><a href="edit.php?Id_bat=<?php echo $row['Id_bat']?>" class="boton"><img src="editar-codigo.png" alt="" class="icono-2"></a></td>
                            <td><a href="delete.php?Id_bat=<?php echo $row['Id_bat']?>" class="boton" onclick="confirmDelete(event, '<?php echo $row['Id_bat']?>')"><img src="boton-eliminar.png" alt="" class="icono-2"></a></td>
                            <td><a href="template.php?Id_bat=<?php echo $row['Id_bat']?>" class="boton"><img src="documento.png" alt="" class="icono-2"></td>

                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>
<!-- Modal -->

<script>
function confirmDelete(event, Id_bat) {
  event.preventDefault(); // Evita el comportamiento predeterminado del enlace

  // Mostrar el cuadro de diálogo de confirmación de SweetAlert
  Swal.fire({
    title: '¿Estás seguro?',
    text: "Esta acción eliminará el registro. ¿Deseas continuar?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, eliminar',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      // Redirigir a delete.php para eliminar el registro
      window.location.href = 'delete.php?Id_bat=' + Id_bat;
    }
  });
}
</script>
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" style="width: 50vw;">
    <div class="modal-content" style="width: 50vw;">
      <div class="modal-header bg-dark" style="background-color: #3350FF !important;">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel1">Datos de la Iglesia</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="width: 50vw;">
            <table class="table">
                <thead class="bg-dark text-white" style="background-color: #B41111 !important;">
                    <tr>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Correo</th>
                    <th>Diócesis</th>
                    <th>Imagen</th>
                    <th><a href="agregariglesia.php" class="boton"><img src="agregar-usuario.png" alt="" width="45px" height="45px"></th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $tabla = "SELECT *FROM `tbl_iglesia`";
                        $mostrartabla = mysqli_query($con, $tabla);
                        while ($row = mysqli_fetch_assoc($mostrartabla)) {
                    ?>
                    <tr>
                    <td><?php echo $row['nombre_iglesia']?></td>
                    <td><?php echo $row['direccion_iglesia']?></td>
                    <td><?php echo $row['correo_iglesia']?></td>
                    <td><?php echo $row['diocesis_iglesia']?></td>
                    <td><img src="Files/<?php echo $row['imagen_iglesia']?>" alt="<?php echo $row['imagen_iglesia']?>" width="70px" heigth="70px"></td>
                    <td><a href="editariglesia.php?Id_igl=<?php echo $row['Id_igl'] ?>" class="boton"><img src="editar-codigo.png" alt="" width="45px" height="45px"></a></td>
                    <td><a href="deleteiglesia.php?Id_igl=<?php echo $row['Id_igl'] ?>" class="boton"><img src="boton-eliminar.png" alt="" width="45px" height="45px"></a></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>