<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="shortcut icon" href="public/imagenes/ing_sistemas.jpg">
  <title>INGRESO BIBLIOTECA</title>
</head>
<body>
  <?php session_start(); ?>

  <div class="container" style="margin-top:50px" align="center">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="4000">
          <img src="public/imagenes/banner1.jpg" class="d-block w-100" height="300">
        </div>
        <div class="carousel-item" data-bs-interval="4000">
          <img src="public/imagenes/banner4.jpg" class="d-block w-100" height="300">
        </div>
        <div class="carousel-item" data-bs-interval="4000">
          <img src="public/imagenes/banner3.jpg" class="d-block w-100" height="300">
        </div>
        <div class="carousel-item" data-bs-interval="4000">
          <img src="public/imagenes/banner2.jpg" class="d-block w-100" height="300">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <br>
    <?php
    if(!empty($_SESSION["mensaje"])){
      echo"<div class='alert alert-success'>".$_SESSION["mensaje"]."</div><br>";
      $_SESSION["mensaje"]="";
    }
    if(!empty($_SESSION["mensajeError"])){
      echo"<div class='alert alert-danger'>".$_SESSION["mensajeError"]."</div><br>";
      $_SESSION["mensajeError"]="";
    }
     ?>
    <div class="row justify-content-md-center">
      <div class="alert alert-secondary col-sm-12 col-md-8 col-lg-8" align="center">
        SISTEMA DE CONTROL DE INGRESO A LA BIBLIOTECA DE LA U.F.P.S
        <br> <small><i>POR FAVOR REGISTRE SU INGRESO SELECCIONANDO SU CARRERA Y DIGITANDO SU CÓDIGO PARA PODER BRINDARLE UN MEJOR SERVICIO</i></small>
      </div>
      <br>
      <form class="" action="app/control/crearIngreso.php"  method="post" name="nuevoIngreso" id="nuevoIngreso">
        <div class="card col-sm-12 col-md-8 col-lg-8">
          <div class="card-body">
            <div class="form-group" align="left">
              <a style="color:red" align="left">*</a><label for="carrera" class="form-label h4" >CARRERA</label>
              <select class="custom-select form-control" aria-label="Default select example" id="carrera" name="carrera" required>
                <option selected>Seleccione una carrera</option>
                <?php
                require_once('app/conexionBD.php');
                include ("app/modelo/listaCarreras.php");
                while($det= mysqli_fetch_array($resultAsignaturas)){
                  ?>
                  <option value="<?php echo($det['id']) ?>"><?php echo($det['nombre']) ?></option>
                <?php }
                mysqli_close($con); // cierro conexion?>
              </select>
            </div>
            <br>
            <div class="form-group" align="left">
              <a style="color:red" align="left">*</a><label class="form-label h4">CÓDIGO</label>
              <input type="text" class="form-control" name="codigo" id="codigo" required>
            </div>
          </div>
          <div class="card-footer">
            <button type="button" class="btn btn-secondary" onclick="location.href='index.php'">CANCELAR</button>
            <button type="submit" class="btn btn-danger " form="nuevoIngreso">GUARDAR</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <br><br>
  <div class=" text-secondary bg-light">
    <hr>
    <div class="" align="center">
      <div class="col-6">
        Copyright © 2022 UFPS - Todos los Derechos Reservados
        <br>
        Desarrollado por: NATALIA ORTIZ
        <br>
        Versión: 1.0
        <br>
      </div>
      <div class="col-6">
        <a href="https://ingsistemas.cloud.ufps.edu.co/" target="_blank" class="">
          <img src="public/imagenes/logo_vertical_ingsistemas.png" height="50">
        </a>
        <a href="https://ww2.ufps.edu.co/" target="_blank" class="col-4">
          <img src="public/imagenes/logo_ufps.png" height="40">
        </a>
      </div>
      <br>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
