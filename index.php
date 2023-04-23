<?php
session_start();

if (isset($_SESSION['login']) && $_SESSION['login']){
    header('Location:views/botones.php');
}
?>


<!doctype html>
<html lang="es">
<head>
    <title>Iniciar sesión</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <!-- Login Form CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-login-form@1.0.10/dist/bootstrap-login-form.min.css" rel="stylesheet" integrity="sha384-+PJn+sZQD1J9XvZQ2+ASd/zRb4D4Y4InJtT+TNEoLZpS/PfS9X1c3qDAGdOswp8z" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Iniciar sesión</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-floating mb-3">
                                <input type="text" id="usuario" class="form-control form-control-sm" autofocus>
                                <label for="usuario" class="form-label">Nombre de usuario:</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" id="clave" class="form-control form-control-sm">
                                <label for="clave" class="form-label">Contraseña:</label>
                            </div>
                           
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="#">¿Olvidaste tu contraseña?</a>
                                <button type="button" id="iniciar-sesion" class="btn btn-sm btn-success">Iniciar sesion</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="#">¿Necesitas una cuenta? ¡Regístrate!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <body>

        <!-- jQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <script>
            $(document).ready(function() {

                function iniciarSesion() {
                    const usuario = $("#usuario").val();
                    const clave = $("#clave").val();
                    if (usuario != "" && clave != "") {


                        $.ajax({
                            url: 'controllers/usuario.controller.php',
                            type: 'POST',
                            data: {
                                operacion: 'login',
                                nombreusuario: usuario,
                                claveIngresada: clave
                            },
                            dataType: 'JSON',
                            success: function(result) {
                                console.log(result);
                                if (result["status"]) {
                                    window.location.href = "views/botones.php";
                                } else {
                                    alert(result["mensaje"]);
                                }
                            }
                        });
                    }
                }
                $("#iniciar-sesion").click(iniciarSesion);
            });
        </script>
    </body>

    </html>




