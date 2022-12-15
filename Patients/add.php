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
   </title>  
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="stylesheet" href="style.css/.mq.css">
    
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
      <div class="container-fluid">
          <a class="navbar-brand" href="../index.html"><img src="../images/LOGO.jpeg"width="120px" height="100px" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-item nav-link" href="../index.html"style="color: black !important;"> INICIO </a>
            </li>
            <li class="nav-item">
              <a class="nav-item nav-link" href="../recetac.html" style="color: black !important;">CONOCE MÁS DE NOSOTROS </a>
            </li>
            <li class="nav-item">
              <a class="nav-item nav-link" href="../categorias.html"style="color: black !important;">CATEGORIAS DE REGALOS </a>
            </li>
            <li class="nav-item">
              <a class="nav-item nav-link" href="../regalos.html"style="color: black !important;"> REGALOS DE TEMPORADA </a>
            </li>
            <li class="nav-item">
              <a class="nav-item nav-link" href="../Patients/add.php"style="color: black !important;"> CONTACTANOS </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</div>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../images/bannerwebnavidad.jpg" class="d-block w-100" alt="..." height="500px">
    </div>
    <div class="carousel-item">
      <img src="../images/DULLCE.jpg" class="d-block w-100" alt="..." height="500px">
    </div>
    <div class="carousel-item">
      <img src="../images/DESAYUNO-SORPRESA-AMOR-Y-AMISTAD.png" class="d-block w-100" alt="..." height="700px">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


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
  <section>

<div class="container"><br><br><br>

    <div class="row">

        <div class="col-md-4">

            <div class="card text-center"> 

                <img class="card-img-top" src="../images/excelentepresentacion.jpg" alt="" width="1000px" height="280px">
                <div class="card-body">
                    <h5 class="card-title">EXCELENTE PRESENTACIÓN</h5>
                    <p class="card-text">El estilo y los detalles forman parte de nosotros.</p>
                    <a href="check"></a>
    </div>
</div>
</div>
        <div class="col-md-4">

             <div class="card text-center"> 
  
               <img class="card-img-top" src="../images/entregas.jpg" alt="">
               <div class="card-body">
                   <h5 class="card-title">ENTREGAS A TIEMPO</h5>
                   <p class="card-text">Nuestros envíos se realizan en el tiempo acordado.</p>
                   <a href="check"></a>
</div>

</div>

</div>
        <div class="col-md-4">

         <div class="card text-center"> 

            <img class="card-img-top" src="../images/pagoseguropayu.jpg" alt="">
            <div class="card-body">
                 <h5 class="card-title">MEDIOS DE PAGO</h5>
                 <p class="card-text">Metodos de pago 100% seguros por medio de PayuLatam</p>
                 <a href="check"></a>
</div>

</div>

</div>

</section>

</section>
  <footer>
            <address>DERECHOS RESERVADOS LUXURY.COM</address>

            <div>
                <a href="https://www.facebook.com/luxury.2204?mibextid=ZbWKwL">Facebook</a>-
                <a href="#">Instagram</a>-
            </div>
        </footer>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</body>

</html>