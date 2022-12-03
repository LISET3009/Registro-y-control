<?php
include('../config/config.php');
include('Patient.php');

if (isset($_POST) && !empty($_POST)){
  /* SI EXISTE UN REGISTRO Y NO ESTA VACIO */

  $data= new Patient(); /* LLAMO A MI LIBRO DE RECETAS */

  if ($_FILES['imagen']['name'] !== ''){
    $_POST['imagen'] = saveImage($_FILES);
  }

  $save = $data-> save($_POST); /* UTILICE LA RECETA SAVE */
  if($save){
    $mensaje= '<div class="alert alert-success" role="alert">Usuario creado correctamente </div> ';
  }else{
    $mensaje='<div class="alert alert-danger" role="alert">Error al crear el usuario </div> ';
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<?php include('../menu.php') ?>

<?php 
      if (isset($mensaje)){
        echo $mensaje;
      }
?>
<!-- CREAN FORMULARIO -->
<form method="POST" enctype="multipart/form-data" class="row g-3">
  
  <div class="col-6">
    <label for="inputAddress" class="form-label">Nombre de quien recibe</label>
    <input type="text" name="nombredequienrecibe" id="nombredequienrecibe" class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Numero de quien recibe</label>
    <input type="text" name="numerodequienrecibe" id="numerodequienrecibe" class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Direccion de quien recibe</label>
    <input type="text" name="direccion" id="direccion" class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Fecha de entrega</label>
    <input type="date" name="fechadeentrega" id="fechadeentrega" class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Hora de entrega</label>
    <input type="text" name="horadeentrega" id="horadeentrega" class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Nombre de quien envia</label>
    <input type="text" name="nombredequienenvia" id="nombredequienenvia" class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Mensaje</label>
    <input type="text" name="mensaje" id="mensaje" class="form-control">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Imagen</label>
    <input type="file" name="imagen" id="imagen" class="form-control">
  </div>
  <div class="col-12">
    <button  class="btn btn-primary">Registrar</button>
  </div>
</form>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>