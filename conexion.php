<?php
    $host='localhost';
    $user='root';
    $pass='';

    $bd='dbparroquia';

    $con=mysqli_connect($host,$user,$pass, $bd);

    if(!$con){
        die("Connection failed: " . mysqli_connect_error());
    }
?>