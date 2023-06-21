<?php
    include "conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="catolico.ico" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Parroquial</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

            <?php
            $tabla = "SELECT *FROM `tbl_iglesia`";
            $mostrartabla = mysqli_query($con, $tabla);
            $row = mysqli_fetch_assoc($mostrartabla);
            ?>

<div class="container-fluid" style="background-image: url(Files/<?php echo $row['imagen_iglesia']?>)">
    <div class="row">
        <div class="col-3 p-0">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark p-0" style="width: 420px; height:100vh; background-color: #3350FF !important; ">
                <a data-bs-toggle="modal" data-bs-target="#exampleModal1" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <img  src="https://cdn.icon-icons.com/icons2/2164/PNG/512/church_templebuilding_christmas_cold_icon_133095.png" width="45px" height="45px">
                    <span class="fs-4 ms-2 mt-3">Sistema Parroquial</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="" class="nav-link text-white btnhover" aria-current="page" style="font-size: 18px;">
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
            </div>
            <div class="col-9">
                <div class="banner">
                    <div class="texto-banner">
                        <?php
                             $tabla = "SELECT *FROM `tbl_iglesia`";
                             $mostrartabla = mysqli_query($con, $tabla);
                             $row = mysqli_fetch_assoc($mostrartabla);

                        ?>
                        <h1><?php echo $row['nombre_iglesia']?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal para visualizar los datos de la iglesia-->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" style="width: 50vw;">
    <div class="modal-content" style="width: 50vw;">
      <div class="modal-header bg-dark" style="background-color: #3350FF !important;">
        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel1">Datos de la Iglesia</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="width: 50vw;">
            <table class="table">
                <thead class="bg-dark text-white">
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
</body>
</html>