<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION ['login'] == false){
    header('Location:../index.php');
}
?>


<!doctype html>
<html lang="es">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- Iconos de Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

  <!-- Lightbox CSS -->
  <link rel="stylesheet" href="../dist/lightbox2/src/css/lightbox.css">

</head>
<body>

<div style="display:flex; justify-content:center; align-items:center; height:70vh;">
    <div>
     
    <h2>Botones para colaboradores y estudiantes</h2>
    
    <div id="botones-centrados" style="display:flex; justify-content:center; margin-top:120px;">
  <a href="colaboradores.php">
    <button type="button" class="btn btn-sm btn-primary" style="font-size: 24px; padding: 10px;">Colaboradores</button>
  </a>
  <div style="width:40px;"></div> <!-- Este div separa los botones -->
  <a href="estudiantes.php">
    <button type="button" class="btn btn-sm btn-primary" style="font-size: 24px; padding: 10px;">Estudiantes</button>
  </a>
</div>

<div style = "width:40px;"></div>

<div style="display:flex; justify-content:center; margin-top:50px;">
  <a href="../controllers/usuario.controller.php?operacion=finalizar">Cerrar sesión</a>
</div>
</div>
  </div>
    



                <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Lightbox JS -->
  <script src="../dist/lightbox2/src/js/lightbox.js"></script>
</body>
</html>