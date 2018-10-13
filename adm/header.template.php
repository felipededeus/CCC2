<?php session_start(); 

if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
  exit;
}

else{
  if (!isset($_SESSION['senha'])) {
    header("Location: ../index.php");
    exit;

  }
}

if (!isset($_SESSION['admin'])) {
  header("Location: ../index.php");    
  exit;      

}

?> <!-- Verificando se o infeliz tah logado e pode ver essa página-->




<!DOCTYPE html>
<html lang="pt-br">
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administração</title>
 <?php  include 'imp.css.php';  ?> <!-- Importando CSS -->

</head>
<body>

  <?php  include 'imp.java.php';  ?> <!-- Importando Scripts -->

  <div class="container-fluid bgnav">
    <?php include 'nav.php';  ?> <!-- Importando Barra de Navegação -->
  </div>
