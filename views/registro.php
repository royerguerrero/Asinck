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
        <div class="col-sm-12 col-md-6 registrarse">

        </div>
        <div class="col-sm-12 col-md-6 box-1">
          <h2>Registrarse</h2>
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
          <form class="w-75" action="../controllers/user.php?action=registrarUsuario();" method="post">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputNumIdentidad4">Numero Identidad</label>
                    <input type="text" class="form-control" id="inputNumIdentidad4" placeholder="Numero Identidad" name="numId" required/>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputContraseña4">Contraseña</label>
                    <input type="password" class="form-control" id="inputContraseña4" placeholder="Contraseña" name="passU" required/>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputNombres">Nombres</label>
                    <input type="text" class="form-control" id="inputNombres" placeholder="Nombres" name="nomU" required/>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputApellidos">Apellidos</label>
                    <input type="text" class="form-control" id="inputApellidos" placeholder="Apellidos" name="appU" required/>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputTipoIdentificacion">Tipo de Identificacion</label>
                    <select id="inputTipoIdentificacion" class="form-control" name="tipoIdU" required/>
                      <option selected>Elegir...</option>
                      <option value="0">C.C</option>
                      <option value="1">T.I</option>
                      <option value="2">C.E</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputRol">Rol</label>
                    <select id="inputRol" class="form-control" name="idRol" required/>
                      <option selected>Elegir...</option>
                      <option value="0">Aprendiz</option>
                      <option value="1">Instructor</option>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="inputProgramaFormacion">Programa de Formacion</label>
                    <select id="inputProgramaFormacion" class="form-control" name="idProFor" required/>
                      <option selected>Elegir...</option>
                      <?php
                        function consultarProgramas(){
                          include('../models/database.php');
                          $sql = "SELECT * FROM programa";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              echo "<option value=" . $row["idPrograma"] . "> N° Ficha: " . $row["idPrograma"]. " | Nombre: " . $row["nombrePrograma"]. "</option>";
                            }
                          } else {
                            echo "0 Resultados de Programas";
                          }
                        }
                        consultarProgramas();
                      ?>
                    </select>
                  </div>
                </div>
                  <input type="submit" class="btn btn-success" value="Registrarse" name="register"></input>
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
