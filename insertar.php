<?php
include("conexion.php");

$con=conectar();lugarnac

        $Id_bat = $_POST['Id_bat'];
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

$sql="INSERT INTO tbl_bautismo VALUES ('$Id_bat' ,'$nombre_sacerdote','$fecha_bat', '$lugarnac' ,'$nombre_com_baut','$fecha_nacimiento' ,'$nomnbre_com_padre' ,'$nombre_com_madre' ,'$resg_libro' ,'$nombre_com_padrino' ,'$nombre_com_madrina' ,'$notas_mar' ,'$fecha_expedida' ,'$folio' ,'$acta' )";

$query= mysqli_query($con,$sql);

if($query){
    Header("Location: bautismo.php");
}
else{

}

?>