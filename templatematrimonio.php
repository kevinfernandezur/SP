<?php
    require_once dirname(__FILE__).'/PHPWord-master/src/PhpWord/Autoloader.php';
    \PhpOffice\PhpWord\Autoloader::register();
    
    use PhpOffice\PhpWord\TemplateProcessor;

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'dbparroquia';

    $mysqli = new mysqli($host, $user, $password, $database);

    if ($mysqli->connect_error) {
        die('Error de conexión (' . $mysqli->connect_error . ') ' . $mysqli->connect_error);
    }
    
    $Id_mat = $_GET['Id_mat'];

    $sql = "SELECT * FROM `tbl_matrimonio` WHERE `Id_mat` = '$Id_mat'";
    $resultado = $mysqli->query($sql);

    $templateWord = new TemplateProcessor('plantillamatrimonio.docx');

    if($resultado->num_rows > 0){
        $fila = $resultado->fetch_assoc();

        $Nombre_Parroquia = $fila['nombre_parroquia'];
        $Localizacion = $fila['localizacion_parroquia'];
        $Fecha_Casamiento = $fila['fecha_casamiento'];
        $Sacerdote = $fila['nombre_reverendo'];
        $Nombre_Esposo  = $fila['nombre_esposo'];
        $Edad_Esposo = $fila['edad_esposo'];
        $Cedula_Esposo = $fila['cedula_esposo'];
        $Nacionalidad_Esposo = $fila['nacionalidad_esposo'];
        $Fecha_Nac_Esposo = $fila['fecha_nac_esposo'];
        $Direccion_Esposo = $fila['direccion_esposo'];
        $Padre_Esposo = $fila['padre_esposo'];
        $Madre_Esposo = $fila['madre_esposo'];
        $Nombre_Esposa = $fila['nombre_esposa'];
        $Edad_Esposa = $fila['edad_esposa'];
        $Cedula_Esposa = $fila['cedula_esposa'];
        $Nacionalidad_Esposa = $fila['nacionalidad_esposa'];
        $Fecha_Nac_Esposa = $fila['fecha_nac_esposa'];
        $Direccion_Esposa = $fila['direccion_esposa'];
        $Padre_Esposa = $fila['padre_esposa'];
        $Madre_Esposa = $fila['madre_esposa'];
        $Nombre_Testigo1 = $fila['nombre_testigo1'];
        $Cedula_Testigo1 = $fila['cedula_testigo1'];
        $Direccion_Testigo1 = $fila['direccion_testigo1'];
        $Padre_Testigo1 = $fila['padre_testigo1'];
        $Madre_Testigo1 = $fila['madre_testigo1'];
        $Nombre_Testigo2 = $fila['nombre_testigo2'];
        $Cedula_Testigo2 = $fila['cedula_testigo2'];
        $Direccion_Testigo2 = $fila['direccion_testigo2'];
        $Padre_Testigo2 = $fila['padre_testigo2'];
        $Madre_Testigo2 = $fila['madre_testigo2'];


        $templateWord->setValue('nombre_parroquia', $Nombre_Parroquia);
        $templateWord->setValue('localizacion_parroquia', $Localizacion);  
        $templateWord->setValue('fecha_casamiento', $Fecha_Casamiento);
        $templateWord->setValue('nombre_reverendo', $Sacerdote);
        $templateWord->setValue('nombre_esposo', $Nombre_Esposo);
        $templateWord->setValue('edad_esposo', $Edad_Esposo);
        $templateWord->setValue('cedula_esposo', $Cedula_Esposo);
        $templateWord->setValue('nacionalidad_esposo', $Nacionalidad_Esposo);
        $templateWord->setValue('fecha_nac_esposo', $Fecha_Nac_Esposo);
        $templateWord->setValue('direccion_esposo', $Direccion_Esposo);
        $templateWord->setValue('padre_esposo', $Padre_Esposo);
        $templateWord->setValue('madre_esposo', $Madre_Esposo);
        $templateWord->setValue('nombre_esposa', $Nombre_Esposa);
        $templateWord->setValue('edad_esposa', $Edad_Esposa);
        $templateWord->setValue('cedula_esposa', $Cedula_Esposa);
        $templateWord->setValue('nacionalidad_esposa', $Nacionalidad_Esposa);
        $templateWord->setValue('fecha_nac_esposa', $Fecha_Nac_Esposa);
        $templateWord->setValue('direccion_esposa', $Direccion_Esposa);
        $templateWord->setValue('padre_esposa', $Padre_Esposa);
        $templateWord->setValue('madre_esposa', $Madre_Esposa);
        $templateWord->setValue('nombre_testigo1', $Nombre_Testigo1);
        $templateWord->setValue('cedula_testigo1', $Cedula_Testigo1);
        $templateWord->setValue('direccion_testigo1' , $Direccion_Testigo1);
        $templateWord->setValue('padre_testigo1', $Padre_Testigo1);
        $templateWord->setValue('madre_testigo1', $Madre_Testigo1);
        $templateWord->setValue('nombre_testigo2', $Nombre_Testigo2);
        $templateWord->setValue('cedula_testigo2', $Cedula_Testigo2);
        $templateWord->setValue('direccion_testigo2', $Direccion_Testigo2);
        $templateWord->setValue('padre_testigo2', $Padre_Testigo2);
        $templateWord->setValue('madre_testigo2', $Madre_Testigo2);

        $nombrecompleto = $Nombre_Esposo . ' y ' .  $Nombre_Esposa . ' ' .  $Fecha_Casamiento . ' Acta Matrimonial.docx';

        $templateWord->saveAs($nombrecompleto);

        header("Content-Disposition: attachment; filename=$nombrecompleto; charset=iso-8859-1");

        echo file_get_contents($nombrecompleto);

    } else {
        echo "No se encontraron resultados para el ID de Acta especificado.";
    }

    $mysqli->close();
?>