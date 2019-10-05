<?php
  session_start();
  if (isset($_SESSION['user']) && $_SESSION['user'] == "0") {
    header('Location: views/home.php');
  }elseif(isset($_SESSION['user']) && $_SESSION['user'] == "1"){
    header('Location: views/dashboard.php?rol=Instructor');
  }elseif(isset($_SESSION['user']) && $_SESSION['user'] == "999"){
    header('Location: public/landing.html');
  }else{
    header('Location: public/landing.html');
  }
 ?>
