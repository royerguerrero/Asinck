<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/style.css">

    <title>Asinck</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light px-5 fixed-top">
        <a class="navbar-brand" href="../index.php"><h2 class="T1" >Asinck<span class="text-success">.</span> </h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto text-center">
            <a class="nav-item nav-link mx-2 " href="../public/landingpage.html">Inicio <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link mx-2" href="../public/landingpage.html">Caracteristicas</a>
            <a class="nav-item nav-link mx-2" href="../public/landingpage.html">Soporte</a>
            <a class="nav-item nav-link mx-2" href="ingreso.php">Ingresar</a>
            <a class="nav-item nav-link mx-2 btn btn-success text-white active" href="registro.php"> Registarse </a>
          </div>
        </div>
      </nav>
    </header>
    <section class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-md-6 ingreso">
        </div>
        <div class="col-sm-12 col-md-6 box-1">
          <h2>Ingresar</h2>
          <?php
          if(isset($_GET['mensaje'])){
            echo '<div class="alert alert-danger alert-dismissible fade show w-75" role="alert">' . " <strong>Oh no! </strong>"
            . $_GET['mensaje'] .
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
          }
          ?>
          <form class="w-75 formulario" action="../controllers/user.php?action=iniciarSession();" method="post">
              <div class="form-group">
                <label for="exampleInputNumId1">Numero de identificacion</label>
                <input type="text" name="usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu numero de identificacion">
              </div>
              <div class="form-group">
                <label for="exampleInputContraseña1">Contraseña</label>
                <input type="password" name="pass" class="form-control" id="exampleInputContraseña1" placeholder="Contraseña">
                <small id="passHelp" class="form-text text-muted">Nunca compartas tu contraseña con nadien.</small>
              </div>
              <input type="submit" class="btn btn-success" value="Enviar"></input>
          </form>

        </div>
      </div>
    </section>

    <!-- Optionl JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
