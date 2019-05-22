<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Tue, 23 Fev 2083 10:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
  header("Content-type: text/html; charset=UTF-8");
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
  <!--
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  -->
<!-- Required meta tags -->    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!-- Design Autor.: Rogério Luiz Candido - Data.: 05/03/2018  -->
    <title>Grupo Pasquali</title>

    <!-- Bootstrap -->
    <link href="node_modules/bootstrap/compiler/bootstrap.css" rel="stylesheet">
    <!-- Font-Awesome -->
    <link href="node_modules/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Personalizado -->
    <link href="style/css/style.css" rel="stylesheet">

    <link rel="icon" href="Imagens/Logo-Transparente.png">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
<style>
    .fixed-top-2 {
      margin-top: 46px;
    }

    .navbar-custom a {    
      color: #73090D;    
    }

    body {
      padding-top: 25px;
    }
</style>
<!--================================================================================== -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-danger">
  <div class="container">

    <a class="navbar-brand" href="index.php">
      <img src="Imagens/Logo_2.png" class="d-inline-block" alt="GRUPO PASQUALI" style="
      padding-bottom: 1px;" width="215">
    </a>

    <button class="navbar-toggler type="button" data-toggle="collapse" data-target="#navbarSite">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSite">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>                   
        </li>
        <li class="nav-item">
          <a class="nav-link" href="empresa.php">Empresa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php#servico2" onclick="ajustaservico2()">Serviços</a>                  
        </li>
        <li class="nav-item">
          <a class="nav-link" href="email.php">Trabalhe Conosco</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contato"><i class="fa fa-phone" aria-hidden="true"></i> Contato</a>
        </li>
      </ul>            
    </div>
  </div>
</nav>
<!--================================================================================== -->