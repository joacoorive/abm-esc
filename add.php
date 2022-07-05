<?php

  require "database.php";

  $error = null;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || empty($_POST["phone_number"])) {
      $error = "Porfavor rellene ambos campos!!";
    }else{
      $name = $_POST["name"];
      $phoneNumber = $_POST["phone_number"];

      $statement = $conn->prepare("INSERT INTO abm (name, phone_number) VALUES (:name, :phone_number)");
      $statement->bindParam(":name", $_POST["name"]);
      $statement->bindParam(":phone_number", $_POST["phone_number"]);
      $statement->execute();

      header("Location: index.php");
    }
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.3/darkly/bootstrap.min.css" integrity="sha512-ZdxIsDOtKj2Xmr/av3D/uo1g15yxNFjkhrcfLooZV5fW0TT7aF7Z3wY1LOA16h0VgFLwteg14lWqlYUQK3to/w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


    <title>ABM Add Orive</title>

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <!-- <a href="#" class="navbar-brand font-weight-bold">
        <img src="#" alt="" class="mr-2">
      </a> -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="navbarNav" class="collapse navbar-collapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="./index.php" class="nav-link">Inicio</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Anadir</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <main>
    <div class="container pt-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Añadir nuevo contacto</div>
            <div class="card-body">
              <?php if($error):?>
                <p class="fst-italic text-danger fs-6"><?= $error?></p>
              <?php endif?>
              <form method="post" action="./add.php" >
                <div class="mb-3 row">
                  <div class="col-md-6 col-form-label text-md-end">
                    Nombre
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="name" name="name" require autocomplete="number">
                  </div>
                </div>
                <div class="mb-3 row">
                  <div class="col-md-6 col-form-label text-md-end">
                    Numero de telefono
                  </div>
                  <div class="col-md-6">
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" require autocomplete="number">
                  </div>
                </div>
                <div class="mb-3 row">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
