<?php
include "conexion.php";
$Id_bat = $_GET["Id_bat"];
$sql = "DELETE FROM `tbl_bautismo` WHERE `Id_bat` = '$Id_bat'";
$result = mysqli_query($con, $sql);

if ($result) {
  header("Location: bautismo.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($con);
}
