<?php
  require "database.php";

  $contacts = $conn->query("SELECT * FROM abm");

  // if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //   var_dump($_POST);
  //   die();
  // }

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


    <title>ABM Orive</title>

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
            <a href="#" class="nav-link">Inicio</a>
          </li>
          <li class="nav-item">
            <a href="./add.php" class="nav-link">Anadir</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main>
    <div class="container pt-4 p-3">
      <div class="row">
        <?php if (($contacts->rowCount()) == 0): ?>
          <div class="col-md-4 mx-auto">
            <div class="card card-body text-center">
              <p>No hay contactos anadidos</p>
              <a href="add.php">Anadir uno</a>
            </div>
          </div>
        <?php endif ?>
        <?php foreach ($contacts as $contact): ?>
          <div class="col-md-4 mb-3">
            <div class="card text-center">
              <div class="card-body">
                <h3 class="card-title text-capitalize"><?= $contact["name"]?></h3>
                <p class="n-2"><?= $contact["phone_number"] ?></p>
                <a href="./edit.php?id=<?= $contact["id"] ?>&name=<?= $contact["name"]?>&phone_number=<?= $contact["phone_number"]?>" class="btn nb-2 btn-secondary">Editar contacto</a>
                <a href="delete.php?id=<?= $contact["id"] ?>" class="btn nb-2 btn-danger">Eliminar contacto</a>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </main>
</body>     
</html>     
