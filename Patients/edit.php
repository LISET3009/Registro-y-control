<?php
include('../config/config.php');
include('Patient.php');
$p = new Patient();
$data = mysqli_fetch_object($p->getOne($_GET['id']));
$date = new DateTime($data->fechadeentrega);

if (isset($_POST) && !empty($_POST)){
  $_POST['imagen'] = $data->imagen;
  if ($_FILES['imagen']['name'] !== ''){
    $_POST['imagen'] = saveImage($_FILES);
  }
  $update = $p->update($_POST);
  if ($update){
    $error = '<div class="alert alert-success" role="alert">Paciente modificado correctamente</div>';
  }else{
    $error = '<div class="alert alert-danger" role="alert" > Error al modificar un paciente </div>';
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
    if (isset($error)){
      echo $error;
    }
    ?>
<!-- CREAN FORMULARIO -->
<form method="POST" enctype="multipart/form-data" class="row g-3">
  <div class="col-6">
    <label for="inputAddress" class="form-label">Nombre de quien recibe</label>
    <input type="text" name="nombredequienrecibe" id="nombredequienrecibe" value="<?= $data->nombredequienrecibe ?>" class="form-control"  >
    <input type="hidden" name="id" id="id" value="<?= $data->id ?>" class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Numero de quien recibe</label>
    <input type="text" name="numerodequienrecibe" id="numerodequienrecibe" value="<?= $data->numerodequienrecibe ?>" class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Direccion de quien recibe</label>
    <input type="text" name="direccion" id="direccion" value="<?= $data->direccion ?>" class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Fecha de entrega</label>
    <input type="date" name="fechadeentrega" id="fechadeentrega" value="<?= $data->fechadeentrega ?>" class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Hora de entrega</label>
    <input type="text" name="horadeentrega" id="horadeentrega" value="<?= $data->horadeentrega ?>" class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Nombre de quien envia</label>
    <input type="text" name="nombredequienenvia" id="nombredequienenvia" value="<?= $data->nombredequienenvia ?>" class="form-control"  >
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Mensaje</label>
    <input type="text" name="mensaje" id="mensaje" value="<?= $data->mensaje ?>" class="form-control">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Imagen</label>
    <input type="file" name="imagen" id="imagen" class="form-control">
  </div>
  <div class="col-12">
    <button  class="btn btn-primary">Modificar</button>
  </div>
</form>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>