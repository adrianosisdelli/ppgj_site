<?php include 'inc/header2.php';?>

<style>
    .fixed-top-2 {
      margin-top: 46px;
    }

    .navbar-custom a {    
      color: #73090D;    
    }

    body {
      padding-top: 138px;
    }
</style>





 <div class="row">
    <div class="col-lg-3">
       <div class="input-group">
         <input type="text" class="form-control">
         <span class="input-group-btn">
             <button class="btn btn-default" type="button">Go!</button>
         </span>
       </div><!-- /input-group -->
    </div><!-- /.col-lg-6 -->
</div>


<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-danger fixed-top-2">
  <div class="container">

    <a class="navbar-brand" href="index.php">
      <img src="Imagens/Logo_2.png" class="d-inline-block" alt="GRUPO PASQUALI" style="
      padding-bottom: 1px;" width="280">
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
          <a class="nav-link" href="index.php#servico2">Serviços</a>                   
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="navDrop">Negociação</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="negociacao.php">Opções</a>
            <a class="dropdown-item" href="validarcpfcnpj.php"><i class="fa fa-barcode"></i> Boleto</a>
            <a class="dropdown-item" href="#comprovante"><i class="fa fa-check-circle"></i> Comprovante</a>
            <a class="dropdown-item" href="#autonegociacao"><i class="fa fa-handshake-o"></i> Auto Negociação</a>
            <a class="dropdown-item" href="#whatsapp"><i class="fa fa-whatsapp"></i> Whatsapp</a>
            <a class="dropdown-item" href="#meligue"><i class="fa fa-phone-square"></i> Me Ligue</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="vagas2.php">Trabalhe Conosco</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contato"><i class="fa fa-phone" aria-hidden="true"></i> Contato</a>
        </li>
      </ul>            
    </div>
  </div>
</nav>


<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white navbar-custom">

  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar1">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a href="index.php" class="navbar-brand">0800 778 9900</a>
  <div class="navbar-collapse collapse" id="navbar1">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-phone" aria-hidden="true"></i> (16) 3993-9550</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-whatsapp text-success" style="font-size: 1.3rem"></i> (16) 98145-4739</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-envelope" aria-hidden="true"></i></i> faleconosco@grupopasquali.com.br</a>
      </li>
    </ul>

    <!-- direta menu ----------------------------------------------------->
    <ul class="navbar-nav ml-auto">               
      <li class="nav-item">
        <a class="nav-link font-weight-bold" href="validarcpfcnpj.php"><i class="fa fa-barcode"></i> Boleto on Line &nbsp;|</a>
      </li>               
      <li class="nav-item">
        <a class="nav-link" href="https://api.whatsapp.com/send?phone=5516981454739"><i class="fa fa-whatsapp text-success" style="font-size: 1.3rem"></i> Whatsapp &nbsp;|</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-phone" aria-hidden="true"></i> Me ligue</a>
      </li>
    </ul>     
  </div>
</nav>




<div class="container">
  <div class="row">  
  <!--    <div class="col-md-6 no-space">
        <p ><img class="img-shadow img-fluid" src="Imagens/Img_contato.jpg" alt="" style="width: 100%"></p>
      </div>                       
      <div class="col-lg-5 offset-lg-1 py-2">
      --> 
      <div class="col-md-12">
        <img src="Imagens/loaderPg.gif" alt="loading">
        <h6 class="text-primary" style="margin-top: -80px; margin-left: 185px;">Carregando</h6>
      </div>
    </div>
  </div>
 </div>

 <?php include 'inc/footercpfcnpj.php';?>
