<?php



$consultaIngresos = "select i.codigo_estudiante as codigo,c.nombre as carrera, i.fecha_ingreso as fecha
                         FROM   ingresos i INNER JOIN carrera c ON i.carrera=c.id
                         WHERE  1";

$resultIngresos = mysqli_query($con,$consultaIngresos);

if($resultIngresos === false){
  echo "Falló la Conexión S: Póngase en contacto con el administrador del sistema !"; ?><br /><br /><?php
  //die(print_r( odbc_error()));
}

/********************************************************************************/

 ?>
