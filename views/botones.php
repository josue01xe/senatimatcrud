<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION ['login'] == false){
    header('Location:../index.php');
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="boton.css">

    <title>Bienvenido</title>
   
</head>
<body>
    <h2>botones para colaboradores y estudiantes</h2>
    <div id="botones-centrados" style="display: flex; justify-content: center; align-items: center;">
  <a href="colaboradores.php">
    <button>colaboradores</button>
  </a>
  <a href="estudiantes.php">
    <button>estudiantes</button>
  </a>
</div>


    
    

                <a href="../controllers/usuario.controller.php?operacion=finalizar">Cerrar sesión</a>
</body>
</html>