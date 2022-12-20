<?php



$consultaAsignatura = "select c.nombre,c.id
                         FROM   carrera c
                         WHERE  c.estado = 'ACTIVA'
                         ORDER BY c.nombre";

$resultAsignaturas = mysqli_query($con,$consultaAsignatura);

if($resultAsignaturas === false){
  echo "Falló la Conexión S: Póngase en contacto con el administrador del sistema !"; ?><br /><br /><?php
  //die(print_r( odbc_error()));
}

/********************************************************************************/

 ?>
