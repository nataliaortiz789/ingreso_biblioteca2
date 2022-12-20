<?php
$insertIngreso = "INSERT INTO ingresos
                              (codigo_estudiante, carrera)
                              VALUES ($codigo_estudiante,$carrera)";

$resultInsertIngreso = mysqli_query($con,$insertIngreso);

if($resultInsertIngreso === false){
  $_SESSION['mensajeError']="Error: ".mysqli_error($con);
  }
  else{
    $_SESSION['mensaje']="Ingreso fue registrado correctamente, gracias por su colaboración.";
  }
  header('Refresh: 0; URL=../../index.php');

  mysqli_close($con); // cierro conexion
 ?>
