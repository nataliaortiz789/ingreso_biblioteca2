<?php



$consultaIngresos = "select count(i.id) as total,c.nombre as carrera
                         FROM   ingresos i INNER JOIN carrera c ON i.carrera=c.id
                         WHERE  1 GROUP BY carrera order by carrera";

$resultIngresos = mysqli_query($con,$consultaIngresos);

if($resultIngresos === false){
  echo "Falló la Conexión S: Póngase en contacto con el administrador del sistema !"; ?><br /><br /><?php
  //die(print_r( odbc_error()));
}

/********************************************************************************/

 ?>
