<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../imagenes/ing_sistemas.jpg">
    <title>INGRESO BIBLIOTECA | Panel Admin</title>
  </head>
  <body>
    <?php
      session_start();
      //include "menu.php";
    require_once('../../app/conexionBD.php');
    ?>
    <div class="container " align="center" style="margin-top:50px">
      <h3 class="text-danger">INGRESOS A LA BIBLIOTECA</h3>
      <div class="row">
        <div class="">
          <table id="ingresos" class="table table-striped table-bordered" style="width:100%">
            <thead class="bg-secondary text-white">
              <tr>
                <th>CÓDIGO</th>
                <th>CARRERA</th>
                <th>FECHA</th>
              </tr>
            </thead>
            <tbody>
              <?php

                include ("../../app/modelo/listaIngresos.php");
                while($det= mysqli_fetch_array($resultIngresos)){
                  echo "<tr>";
                  echo("<td>".$det['codigo']."</td>");
                  echo("<td>".$det['carrera']."</td>");
                  echo("<td>".$det['fecha']."</td>");
                  }
                ?>
            </tbody>
            <tfoot class="bg-secondary text-white">
                <tr>
                  <th>CÓDIGO</th>
                  <th>CARRERA</th>
                  <th>FECHA</th>
                </tr>
            </tfoot>
        </table>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <?php
          $etiquetas = [];
          $datosVentas = [];
          include ("../../app/modelo/listaIngresosCarrera.php");
          while($det= mysqli_fetch_array($resultIngresos)){
            $etiquetas[] = $det['carrera'];
            $datosVentas []= $det['total'];
            }

          ?>
          <canvas id="grafica"></canvas>
    <script type="text/javascript">
        // Obtener una referencia al elemento canvas del DOM
        const $grafica = document.querySelector("#grafica");
        // Pasaamos las etiquetas desde PHP
        const etiquetas = <?php echo json_encode($etiquetas) ?>;
        // Podemos tener varios conjuntos de datos. Comencemos con uno
        const datos2020 = {
            label: "Ingresos a la Biblioteca por Carrera",
            // Pasar los datos igualmente desde PHP
            data: <?php echo json_encode($datosVentas) ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
            borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
            borderWidth: 1, // Ancho del borde
        };
        new Chart($grafica, {
            type: 'line', // Tipo de gráfica
            data: {
                labels: etiquetas,
                datasets: [
                    datos2020,
                    // Aquí más datos...
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                },
            }
        });
    </script>
        </div>
        <div class="col-6">
          <?php
          $etiquetas = [];
          $datosVentas = [];
          include ("../../app/modelo/listaIngresosFecha.php");
          while($det= mysqli_fetch_array($resultIngresos)){
            $etiquetas[] = $det['fecha'];
            $datosVentas []= $det['total'];
            }

          ?>
          <canvas id="grafica2"></canvas>
    <script type="text/javascript">
        // Obtener una referencia al elemento canvas del DOM
        const $grafica2 = document.querySelector("#grafica2");
        // Pasaamos las etiquetas desde PHP
        const etiquetas2 = <?php echo json_encode($etiquetas) ?>;
        // Podemos tener varios conjuntos de datos. Comencemos con uno
        const datos2022 = {
            label: "Ingresos a la Biblioteca por Fecha",
            // Pasar los datos igualmente desde PHP
            data: <?php echo json_encode($datosVentas) ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
            borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
            borderWidth: 1, // Ancho del borde
        };
        new Chart($grafica2, {
            type: 'line', // Tipo de gráfica
            data: {
                labels: etiquetas2,
                datasets: [
                    datos2022,
                    // Aquí más datos...
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                },
            }
        });
    </script>
        </div>
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
            <img src="../imagenes/logo_vertical_ingsistemas.png" height="50">
          </a>
          <a href="https://ww2.ufps.edu.co/" target="_blank" class="col-4">
            <img src="../imagenes/logo_ufps.png" height="40">
          </a>
        </div>
        <br>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
      $('#ingresos').dataTable( {
          "language": {
              "url": "//cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
          },
          dom: 'Bfrtip',
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
      } );
      } );
    </script>
  </body>
</html>
