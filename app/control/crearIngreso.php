<?php
session_start();
if(!empty($_POST)){
  require('../conexionBD.php');
  $carrera=strtoupper(($_POST['carrera']));
  $codigo_estudiante=strtoupper(($_POST['codigo']));
  include("../modelo/insertarIngreso.php");
}

 ?>
