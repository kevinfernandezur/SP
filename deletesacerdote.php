<?php
    include 'conexion.php';

    $Id_sac=$_GET["Id_sac"];
    $sql= "DELETE FROM `tbl_sacerdote` WHERE `Id_sac` = '$Id_sac'";
    $result = mysqli_query($con,$sql);

    if($result){
        Header("Location: sacerdote.php? msg= Data deleted successfully");
    }else{
        echo "Failed " . mysqli_error($con);
    }
?>