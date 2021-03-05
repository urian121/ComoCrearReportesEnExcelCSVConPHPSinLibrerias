<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> <!--Importante--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar</title>
</head>
<body>
    
<?php
include('config.php');
date_default_timezone_set("America/Bogota");
$fecha = date("d/m/Y");

header("Content-Type: text/html;charset=utf-8");
header("Content-Type: application/vnd.ms-excel charset=iso-8859-1");
$filename = "ReporteExcel_" .$fecha. ".xls";
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Disposition: attachment; filename=" . $filename . "");


$listPais = ("SELECT * FROM countries ORDER BY countryName ASC");
$DataPaises = mysqli_query($con, $listPais);

?>


<table style="text-align: center;" border='1' cellpadding=1 cellspacing=1>
<thead>
    <tr style="background: #D0CDCD;">
    <th>#</th>
    <th>Nombre del Pais</th>
    <th>Capital</th>
    <th>Continente</th>
    </tr>
</thead>
<?php
$i =1;
    while ($pais = mysqli_fetch_array($DataPaises)) { ?>
    <tbody>
        <tr>
            <td class='style_tbody'><?php echo $i++; ?></td>
            <td class='style_tbody'><?php echo $pais['countryName']; ?></td>
            <td class='style_tbody'><?php echo $pais['capital']; ?></td>
            <td class='style_tbody'><?php echo $pais['continentName'] ; ?></td>
        </tr>
    </tbody>
    
<?php } ?>
</table>

</body>
</html>