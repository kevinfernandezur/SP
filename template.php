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
    die('Error de conexión (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$id_trabajador = $_GET['Id_bat']; // Cambia esto por el ID del trabajador que deseas obtener

$sql = "SELECT * FROM `tbl_bautismo` WHERE `Id_bat` = '$id_trabajador'";
$resultado = $mysqli->query($sql);

$templateWord = new TemplateProcessor('plantillafedebautismo.docx');

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    
    $nombre_iglesia = $fila['nombre_parroquia'];
    $direccion_iglesia = $fila['localizacion_parroquia'];
    $nombre_sacerdote = $fila['nombre_sacerdote'];
    $fecha_bat = $fila['fecha_bat'];
    $lugarnac = $fila['lugarnac'];

    $nombre_com_baut = $fila['nombre_com_baut'];
    $fecha_nacimiento = $fila['fecha_nacimiento'];
    $nomnbre_com_padre = $fila['nomnbre_com_padre'];
    $nombre_com_madre = $fila['nombre_com_madre'];

    $resg_libro = $fila['resg_libro'];
    $nombre_com_padrino = $fila['nombre_com_padrino'];
    $nombre_com_madrina = $fila['nombre_com_madrina'];

    $notas_mar = $fila['notas_mar'];
    $fecha_expedida = $fila['fecha_expedida'];
    $folio = $fila['folio'];
    $acta = $fila['acta'];


    
    // Asignamos los valores a la plantilla
    $templateWord->setValue('nombre_parroquia', $nombre_iglesia);
    $templateWord->setValue('localizacion_parroquia', $direccion_iglesia);
    $templateWord->setValue('nombre_sacerdote', $nombre_sacerdote);
    $templateWord->setValue('fecha_bat', $fecha_bat);
    $templateWord->setValue('lugarnac', $lugarnac);
    $templateWord->setValue('nombre_com_baut', $nombre_com_baut);
    $templateWord->setValue('fecha_nacimiento', $fecha_nacimiento);
    $templateWord->setValue('nomnbre_com_padre', $nomnbre_com_padre);
    $templateWord->setValue('nombre_com_madre', $nombre_com_madre);
    $templateWord->setValue('resg_libro', $resg_libro);
    $templateWord->setValue('nombre_com_padrino', $nombre_com_padrino);
    $templateWord->setValue('nombre_com_madrina', $nombre_com_madrina);
    $templateWord->setValue('notas_mar', $notas_mar);
    $templateWord->setValue('fecha_expedida', $fecha_expedida);
    $templateWord->setValue('folio', $folio);
    $templateWord->setValue('acta', $acta);

    $nombrecompleto = $nombre_com_baut . ' ' . $fecha_expedida . ' Acta Baustimal.docx';

    // Guardamos el documento
    $templateWord->saveAs($nombrecompleto);

    // Descargamos el documento
    header("Content-Disposition: attachment; filename=$nombrecompleto; charset=iso-8859-1");
    echo file_get_contents($nombrecompleto);
} else {
    echo "No se encontraron resultados para el ID de trabajador especificado.";
}

$mysqli->close();
?>