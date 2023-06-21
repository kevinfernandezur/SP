<?php
    include 'conexion.php';

    $Id_mat=$_GET["Id_mat"];
    $sql= "DELETE FROM `tbl_matrimonio` WHERE `Id_mat` = '$Id_mat'";
    $result = mysqli_query($con,$sql);

    if($result){
        Header("Location: matrimonio.php? msg= Data deleted successfully");
    }else{
        echo "Failed " . mysqli_error($con);
    }
?>