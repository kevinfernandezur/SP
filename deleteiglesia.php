<?php
    include 'conexion.php';

    $Id_mat=$_GET["Id_igl"];
    $sql= "DELETE FROM `tbl_iglesia` WHERE `Id_igl` = '$Id_mat'";
    $result = mysqli_query($con,$sql);

    if($result){
        Header("Location: index.php? msg= Data deleted successfully");
    }else{
        echo "Failed " . mysqli_error($con);
    }
?>