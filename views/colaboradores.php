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
  
  <!-- Modal trigger button -->
  <button type="button" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#modal-colaborador">
    Agregar
  </button>

  <div class="container">
    <table id="tabla-colaboradores" class="table table-striped table-sm">

      <thead>
        <tr>
          <th>#</th>
          <th>Apellidos</th>
          <th>Nombres</th>
          <th>cargo</th>
          <th>sede</th>
          <th>telefono</th>
          <th>tipocontrato</th>
          <th>direccion</th>
          <th>Operaciones</th>
          
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
  
  <!-- Modal Body -->
  <div class="modal fade" id="modal-colaborador" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary text-light">
          <h5 class="modal-title" id="modalTitleId">Registro de colaboradores</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
          <form action="" autocomplete="off" id="formulario-colaboradores" enctype="multipart/form-data">
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" class="form-control form-control-sm" id="apellidos">
              </div>
              <div class="mb-3 col-md-6">
                <label for="nombres" class="form-label">Nombres:</label>
                <input type="text" class="form-control form-control-sm" id="nombres">
              </div>
            </div>
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="cargo" class="form-label">cargo</label>
                <select id="cargo" class="form-select form-select-sm">
                <option value="">Seleccione</option>
    <option value="1">Jefe Centro</option>
    <option value="2">Asistente Administrativo</option>
    <option value="3">Instructor</option>
    <option value="4">Coordinador ETIA</option>
</select>                  
              </div>
              <div class="mb-3 col-md-6">
                <label for="sede" class="form-label">sede</label>
                <select id="sede" class="form-select form-select-sm">
    <option value="">Seleccione</option>
    <option value="1">Chincha</option>
    <option value="2">Pisco</option>
    <option value="3">Ica</option>
    <option value="4">Ayacucho</option>
</select>
              </div>
            </div>
            <div class="row">
              <div class="mb-3 col-md-6">
                <label for="telefono" class="form-label">telefono</label>
                <input type="text" class="form-control form-control-sm" id="telefono">
              </div>
              <div class="mb-3 col-md-6">
                    <label for="tipocontrato" class="">tipocontrato</label>
                    <select id="tipocontrato" class="form-select form-select-sm">
    <option value="">Seleccione</option>
    <option value="P">Parcial</option>
    <option value="C">Completo</option>
</select>
 
                
                
            </div>
            <div class="row">
              <div class="mb-3 col-md-6">
              <label for="cv">cv</label>
              <input type="file" id="cv" accept=".pdf" class="form-control form-control-sm">
            </div>
            
              <div class="mb-3 col-md-6">
                <label for="direccion" class="form-label">direccion:</label>
                <input type="text" class="form-control form-control-sm" id="direccion">
              </div>
            </div>
             
            
            
            
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-sm btn-primary" id="guardar-colaborador">Guardar</button>
        </div>
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

  <script>
    $(document).ready(function (){
      

       function obtenerSedes(){
        $.ajax({
          url: '../controllers/sede.controller.php',
          type: 'POST',
          data: {operacion: 'listar'},
          dataType: 'text',
          success: function(result){
            $("#sede").html(result);
          }
        });
      }

      function obtenerCargos(){
        $.ajax({
          url: '../controllers/cargo.controller.php',
          type: 'POST',
          data: {operacion: 'listar'},
          dataType: 'text',
          success: function (result){
            $("#cargo").html(result);
          }
        });
      }

      function registrarColaborador(){
  //Enviaremos los datos dentro de un OBJETO
  
  var formData = new FormData();

  formData.append("operacion", "registrar");
  formData.append("apellidos", $("#apellidos").val());
  formData.append("nombres", $("#nombres").val());
  formData.append("idcargo", $("#cargo").val());
  formData.append("idsede", $("#sede").val());
  formData.append("telefono", $("#telefono").val());
  formData.append("tipocontrato", $("#tipocontrato").val());
  formData.append("direccion", $("#direccion").val());
  formData.append("cv", $("#cv")[0].files[0]); // Actualizado: cambiado "fotografia" a "cv"

  $.ajax({
    url: '../controllers/colaborador.controller.php',
    type: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    cache: false,
    success: function(e){
      console.log(e);
      $("#formulario-colaboradores")[0].reset();
      $("#modal-colaborador").modal("hide");
      alert("Guardado correctamente");
      
    }
  });
}


function preguntarRegistro(){
        Swal.fire({
          icon: 'question',
          title: 'Matrículas',
          text: '¿Está seguro de registrar al colaborador?',
          footer: 'Desarrollado con PHP',
          confirmButtonText: 'Aceptar',
          confirmButtonColor: '#3498DB',
          showCancelButton: true,
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          //Identificando acción del usuario
          if (result.isConfirmed){
            registrarColaborador();
          }
        });
      }

        function mostrarColaboradores() {
                    $.ajax({
                        url: '../controllers/colaborador.controller.php',
                        type: 'POST',
                        data: {
                            operacion: 'listar'
                        },
                        dataType: 'text',
                        success: function(result) {
                        console.log(result); // <--- Agregar esta línea
                    $("#tabla-colaboradores tbody").html(result);
}
                    });
                }

                $("#guardar-colaborador").click(preguntarRegistro);
                 

                $("#modal-colaborador").on("shown.bs.modal", event => {
        $("#apellidos").focus();

        obtenerSedes();
        obtenerCargos();
      });

      //Funciones de carga automática
      mostrarColaboradores();
    });
  </script>

</body>

</html>