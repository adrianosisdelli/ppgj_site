<?php include 'inc/header.php';?>
<?php include 'classes/Vagas.php';?>

<?php
  $vag = new Vagas();
?>

<!--
<section class="trabalhe" id="trabalhe">
   <div class="container">
    <div class="row">
     <div class="col-md-6">
      <h1 class="text-center display-5">Trabalhe conosco</h1>
    </div>
     <div class="col-md-6 divalinhacentro">
      <div class="card">
       <div class="card-body bg-danger">
        <h2 class="text-white">Somos o Grupo Pasquali</h2>
        <p class="card-title text-justify text-white">Uma das mais tradicionais empresas de gestão de recebíveis e de recuperação de crédito do Brasil, com atuação em todo o território nacional.</p>
        <p class="card-title text-justify text-white">Somos movidos pela satisfação de cada um dos nossos clientes e resultados, e para isso precisamos de pessoas talentosas, apaixonadas pelo que fazem, e que querem ir cada vez mais longe.</p>
      </div>
    </div>
  </div>          
  </div>
</section>
-->

<section class="envia_email">
</section>
<br>
 <div class="container">
  <div class="row">
    <div class="col-md-6">
      <h2>Trabalhe Conosco</h2>
      <br>
      <h5>Somos o Grupo Pasquali</h5>
        <p class="card-title text-justify">Uma das mais tradicionais empresas de gestão de recebíveis e de recuperação de crédito do Brasil, com atuação em todo o território nacional.</p>
        <p class="card-title text-justify">Somos movidos pela satisfação de cada um dos nossos clientes e resultados, e para isso precisamos de pessoas talentosas, apaixonadas pelo que fazem, e que querem ir cada vez mais longe.</p>

        <p>Envie seu currículo para <strong>vemserpasquali@ppgj.com.br</strong></p>
        <p></p>
    </div>
    <div class="col-md-6">

<form action="enviar_email.php" method="post" enctype="multipart/form-data">
     <h4 class="text-left">Dados Pessoais</h4>
     
     <div class="form-group">
       <input class="form-control form-control-lg is-invalid" type="text" name="nome" placeholder="Nome Completo">
     </div>
     <div class="form-group">
      <input class="form-control form-control-lg is-invalid" type="email" name="email" placeholder="Email">     
    </div>
    <div class="form-group">
      <textarea class="form-control form-control-lg is-invalid" rows="3" name="message" placeholder="Mensagem"></textarea>
    </div>
    <div class="form-group">
      <input type="file" class="form-control is-invalid" name="arquivo"></input>
    </div>
    <div class="form-group">
     <button class="btn btn-danger btn-lg" type="submit"><i class="fa fa-file-text-o" aria-hidden="true"></i> Enviar</button>
   </div>
 </form>
    </div>
  </div>
  </div>
<!--
<section>            
 <div class="contact-clean">
   <form action="enviar_email.php" method="post" enctype="multipart/form-data">
     <h4 class="text-center">Preencha o formulário abaixo</h4>
     <br>
     <div class="form-group">
       <input class="form-control is-invalid" type="text" name="nome" placeholder="Nome Completo">
     </div>
     <div class="form-group">
      <input class="form-control is-invalid" type="email" name="email" placeholder="Email">      
    </div>
    <div class="form-group">
      <textarea class="form-control is-invalid" rows="10" name="message" placeholder="Mensagem"></textarea>
    </div>
    <div class="form-group">
      <input type="file" class="form-control is-invalid" name="arquivo"></input>
    </div>
    <div class="form-group">
     <button class="btn btn-danger btn-block" type="submit">Enviar</button>
   </div>
 </form>     
</div>
</section>
-->

<!--
<section>
  <div class="alert alert-secondary" role="alert">
    <h5 class="text-left">Vagas</h5> 
  </div>
  <div class="container">
    <div class="row">
    <div class="col-md-12">
     <img class="img-shadow img-fluid" src="Imagens/em-construcao.gif" alt="em-construcao">
    </div>
</section>
-->

<?php include 'inc/footer.php';?>