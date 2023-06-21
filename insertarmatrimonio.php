<?php
include("conexion.php");

$con=conectar();

$Id_mat=$_POST['Id_mat'];
$Nombre_Esposo=$_POST['nombre_esposo'];
$Cedula_Esposo=$_POST['cedula_esposo'];
$Nombre_Esposa=$_POST['nombre_esposa'];
$Cedula_Esposa=$_POST['cedula_esposa'];
$Fecha_Mat=$_POST['fecha_casamiento'];
$Sacerdote=$_POST['nombre_reverendo'];

$sql="INSERT INTO tbl_matrimonio VALUES ('$Id_mat','$Nombre_Esposo','$Cedula_Esposo','$Nombre_Esposa','$Cedula_Esposa','$Fecha_Mat','$Sacerdote')";

$query= mysqli_query($con,$sql);

if($query){
    Header("Location: matrimonio.php");
}
else{

}

?>