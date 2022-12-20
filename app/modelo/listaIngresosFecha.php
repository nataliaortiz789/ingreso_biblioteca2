<?php



$consultaIngresos = "SELECT CONCAT(Day(fecha_ingreso), '/', Month(fecha_ingreso), '/', Year(fecha_ingreso)) AS fecha,
                            COUNT(*) AS total
                     FROM ingresos
                     GROUP BY year(fecha_ingreso),MONTH(fecha_ingreso), DATE(fecha_ingreso)";

$resultIngresos = mysqli_query($con,$consultaIngresos);

if($resultIngresos === false){
  echo "Falló la Conexión S: Póngase en contacto con el administrador del sistema !"; ?><br /><br /><?php
  //die(print_r( odbc_error()));
}

/********************************************************************************/

 ?>
