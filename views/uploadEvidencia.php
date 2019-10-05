<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://unpkg.com/feather-icons"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/style.css">

    <title>Asinck</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
            <a class="navbar-brand" href="../home.php">
                <h2 class="T1">Asinck<span class="text-success">.</span> </h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto text-center">
                    <a class="nav-item nav-link btn btn-danger text-white active"
                        href="../controllers/user.php?action=cerrarSession();"><i data-feather="power"></i></a>
                </div>
            </div>
        </nav>
    </header>
    <?php
      session_start();
      if ($_GET['rol'] = 'Aprendiz') {
        $_SESSION['user'] = '0';
      }elseif ($_GET['rol'] = 'Instructor') {
        $_SESSION['user'] = '1';
      }
  ?>
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky ">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Cursos</span>
                    <a class="d-flex align-items-center text-muted" href="#">
                        <span data-feather="list"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <!-- Añadir funcionalidad de multiples cursos -->
                    <li class="nav-item">
                        <a class="nav-link" href="fallas.php">
                            <span data-feather="box"></span>
                            1821630 | ADSI
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <section class="col-md-10">
            <br><br><br>
            <center>
                <?php
                    $_SESSION['idFalla'] = $_GET['idFalla'];
                ?>
                <div class="card w-50 p-4">
                    <form class="" action='../controllers/user.php?action=subirEvidencia();' method="post"
                        enctype="multipart/form-data">
                        <div class="form-group m-4">
                            <h2>Subir evidencias <i data-feather="upload" color="#3498db"></i> </h2>
                            <?php
                                if(isset($_GET['mensaje'])){
                                echo '<div class="alert alert-' . $_GET['color'] . ' alert-dismissible fade show w-75" role="alert">' . " <strong>Hey! </strong>"
                                . $_GET['mensaje'] .
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                </div>';
                                 }
                            ?>
                            <div class="form-group">
                                Seleccionar archivos: <input type="file" name="fileToUpload"><br><br>
                                <input type="submit" value="Subir evidencia"
                                    class="form-control-file w-50 btn btn-success">
                            </div>
                        </div>
                        <br>
                        <br>
                    </form>
                </div>
            </center>
        </section>
    </div>

    <!-- Optionl JavaScript -->
    <script src="../public/js/clock.js"></script>
    <script src="../public/js/confirmacion.js"></script>
    <script>
        feather.replace()
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>