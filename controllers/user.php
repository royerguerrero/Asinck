<?php

function registrarUsuario(){
  include("../models/database.php");
  //Datos desde el formulario de registro
  $idUser = $_POST['numId'];
  $passUser = $_POST['passU'];
  $nomUser = $_POST['nomU'];
  $appUser = $_POST['appU'];
  $tipoIdUser = $_POST['tipoIdU'];
  $rolUser = $_POST['idRol'];
  $programaUser = $_POST['idProFor'];

  $sql = "INSERT INTO `usuarios` (`idUsuario`, `nombresUsuario`, `apellidosUsuario`, `passUsuario`, `IdTipoIdentificacion`, `idRol`, `idPrograma`)
  VALUES ('$idUser', '$nomUser', '$appUser', '$passUser', '$tipoIdUser', '$rolUser', '$programaUser')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
      header('Location: ../views/ingreso.php');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      header('Location: ../views/registro.php?mensaje=El usuario ya esiste, comunicate con nosotros para recuperar tu contraseña');
    }
}

function iniciarSession(){
  include('../models/database.php');

  $sql = "SELECT idUsuario, passUsuario, idRol, idPrograma FROM usuarios WHERE idUsuario='".$_POST["usuario"]."' AND passUsuario='".$_POST["pass"]."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          if($row['idRol'] == 0){
            session_start();
            $_SESSION['id'] = $row['idUsuario'];

            header('Location: ../views/home.php');
          }elseif ($row['idRol'] == 1) {
            marcarFalla($row['idPrograma']);
            header('Location: ../views/dashboard.php');
          }
        }
      } else {
        echo "0 results";
        header('Location: ../views/ingreso.php?mensaje=El usuario o la contraseña estan incorrectas probablemente el usuario no existe, verifica los datos e intenta nuevamente');
      }
}

function cerrarSession(){
  session_start();
  $_SESSION['user'] = '999';
  header('Location: ../index.php');
}

function marcarAsistencia(){
  include('../models/database.php');

  //verificar que el usuario exista
  date_default_timezone_set("America/Bogota");
  $fechaActual = date("Y-m-d") . '|';
  $sql = "SELECT idUsuario FROM `fallas` WHERE idUsuario = '".$_POST["doc"]."' AND fechaFalla = '". $fechaActual ."' ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      //doc a MARCAR $_POST["doc"]
      //alert header('Location: ../views/dashboard.php?mensaje=El usuario no existe&color=danger'); 

      $sql = "DELETE FROM fallas WHERE idUsuario = '".$_POST["doc"]."'";

      if ($conn->query($sql) === TRUE) {
          //echo "Record deleted successfully";
          header('Location: ../views/dashboard.php?rol=Instructor&mensaje=Asistencia marcada&color=success'); 
      } else {
          //echo "Error deleting record: " . $conn->error;
          header('Location: ../views/dashboard.php?rol=Instructor&mensaje=Ocurrio un error :(&color=danger'); 
      }

  } else {
      //echo "0 results";
      header('Location: ../views/dashboard.php?mensaje=La asistencia ya ha sido aplicada&color=warning');
  }

  

}

function marcarFalla($promId){
    include('../models/database.php');
    $sql = "SELECT idUsuario FROM usuarios WHERE idRol = 0 AND idPrograma = '".$promId."'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //aplicar falla

            //obtener fecha
            date_default_timezone_set("America/Bogota");
            $fechaActual = date("Y-m-d") . '#';

            $idFalla = $row['idUsuario'] . "-" . $fechaActual;

            $sql = "INSERT INTO `fallas` (`idFalla`, `fechaFalla`, `justificacionFalla`, `idUsuario`) 
            VALUES ('". $idFalla ."', '".$fechaActual."', '', '".$row['idUsuario']."')";
            
            if ($conn->query($sql) === TRUE) {
              //falla Marcada
                echo "New record created successfully";
            } else {
              //error en la marcacion de la falla
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "0 results";
    }
}

function verificarUsuario($ruta){
    if($_SESSION['user'] = '0'){
      //Aprendiz
      header('Refresh:86400 ; url=' . $ruta . '?rol=Aprendiz');
    }elseif ($_SESSION['user'] = '1') {
      //Instructor
      header('Location: ' . $ruta . '?rol=Instructor');
      
    }
}

function mostarTodasFallas($idFicha){
    include('../models/database.php');
    //inner join para extraer la ficha
    $sql = "SELECT * FROM fallas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          //verificar justificacion
          if($row['justificacionFalla'] == ""){
            echo '<tr><th scope="row">' . $row['idUsuario'] .  '</th><td>' . $row['fechaFalla'] . '</td><td> N/A </td><td>' . $row['idFalla'] . '</td></tr>';
          }else{
            echo '<tr><th scope="row">' . $row['idUsuario'] .  '</th><td>' . $row['fechaFalla'] . '</td><td><a href="' . $row["justificacionFalla"] . '" download class="link"><i data-feather="download"></i> Descargar evidencia</a></td><td>' . $row['idFalla'] . '</td></tr>';
          }
        }
    } else {
        echo "0 results";
    }
}

function mostarMisFallas(){
  include('../models/database.php');
  session_start();
  $sql = "SELECT * FROM fallas WHERE idUsuario = " . $_SESSION['id'];
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        //verificar justificacion
        if($row['justificacionFalla'] == ""){
          echo '<tr><th scope="row">' . $row['idUsuario'] .  '</th><td>' . $row['fechaFalla'] . '</td><td><a href="uploadEvidencia.php?idFalla=' . $row["idFalla"] . '" class="link"><i data-feather="upload"></i> Subir Evidencia</a></td><td>' . $row['idFalla'] . '</td></tr>';
        }else{
          echo '<tr><th scope="row">' . $row['idUsuario'] .  '</th><td>' . $row['fechaFalla'] . '</td><td><a href="' . $row["justificacionFalla"] . '" download class="link"><i data-feather="download"></i> Descargar evidencia</a></td><td>' . $row['idFalla'] . '</td></tr>';      
        }
      }
  } else {
      echo "0 results";
  }
}

function getUser($id){
    //datos de usuario para subir archivos
    include('../models/database.php');
    $sql = "SELECT * FROM usuarios WHERE idUsuario = '". $id ."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        //    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 results";
    }
}

function subirEvidencia(){
      session_start();
      $target_dir = "../uploads/";
      date_default_timezone_set("America/Bogota");
      $target_file = $target_dir . "asinck-" . $_SESSION['id'] . date("Y-m-d") . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
              echo "El archivo es una imagen - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
            //error esto no es una imagen
              header('Location:'. getenv('HTTP_REFERER') . '&mensaje=El archivo no es una imagen &color=danger');              
              echo "File is not an image.";
              $uploadOk = 0;
          }
      }
      // Check if file already exists
      if (file_exists($target_file)) {
          //ya exsiste el archivo
          header('Location:'. getenv('HTTP_REFERER') . '&mensaje=mmm... ya existe un archivo con el mismo nombre &color=warning');
          echo "Sorry, file already exists.";
          $uploadOk = 0;
      }
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
          header('Location:'. getenv('HTTP_REFERER') . '&mensaje=Lo sentimos tu archivo debe pesar menos de 5MB &color=danger');
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
      }
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
          header('Location:'. getenv('HTTP_REFERER') . '&mensaje=Solo se admiten archivos JPG, PNG, JPEG y GIF &color=danger');
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
          header('Location:'. getenv('HTTP_REFERER') . '&mensaje=Lo sentimos su archivo no pudo ser subido &color=danger');
          echo "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
      } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

              //añadir a la base de datos
              include('../models/database.php');
              $sql = "UPDATE fallas SET justificacionFalla = '../uploads/asinck-" . $_SESSION['id'] . date("Y-m-d") .basename( $_FILES["fileToUpload"]["name"]) ."' WHERE idFalla='". $_SESSION['idFalla'] ."'";

              if ($conn->query($sql) === TRUE) {
                  echo "Record updated successfully";
                  header('Location: ../index.php');
              } else {
                  header('Location:'. getenv('HTTP_REFERER') . '&mensaje=Lo sentimos su archivo no pudo ser subido &color=danger');
                  echo "Error updating record: " . $conn->error;
              }

          } else {
              echo "Sorry, there was an error uploading your file.";
          }
      }
}

function crearCurso(){
    include('../models/database.php');
    $sql = "INSERT INTO programa (idPrograma, nombrePrograma) VALUES ('". $_POST['idPrograma'] ."', '". $_POST['nomFicha'] ."');";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../views/dashboard.php');
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if(isset($_GET['action'])){

  switch ($_GET['action']){
    case 'registrarUsuario();':
      registrarUsuario();
      break;
  
    case 'iniciarSession();':
      iniciarSession();
      break;
  
    case 'cerrarSession();':
      cerrarSession();
      break;
  
    case 'marcarAsistencia();':
       marcarAsistencia();
       break;

    case 'subirEvidencia();':
       subirEvidencia();
       break;

    case 'crearCurso();':
       crearCurso();
       break;
       
    default:
      // code...
      break;
    }

}