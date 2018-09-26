<?php
  session_start();
  $_SESSION['emailUsuarioLogado'] = "";
  // ou     unset($_SESSION['emailUsuarioLogado']);
  header('Location:../index.php');
  
?>
