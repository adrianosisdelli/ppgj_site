<?php
if ($_SERVER['HTTPS']!='on') {
  $new_url = "https://" . 'www.grupopasquali.com.br' . $_SERVER['REQUEST_URI']; 
  ?>
  <script>location.href='<?php echo $new_url ?>';</script>
  <?php     
}
?>

<?php include 'inc/header.php';?>

<section class="py-4">	
  <div id="carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carousel" data-slide-to="0" class="active"></li>
      <li data-target="#carousel" data-slide-to="1"></li>
      <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <!--    <img class="d-block w-100" src="Imagens/pessoa-juridica.jpg" alt="Second slide"> -->
        <img class="d-block w-100" src="Imagens/cobranca_amigavel_2.png" alt="Second slide">
        <div class="carousel-caption d-xs-block">
          <h1 class="lead text-center">
           <b>A Recuperação de Crédito iniciou suas atividades em 2010, com o compromisso de fornecer soluções personalizadas, que atendam de forma abrangente as necessidades de nossos clientes.</b>
         </h1>
         <p class="text-center">
           <a href="#cobranca-amigavel" class="btn btn-danger btn-lg">Saiba Mais</a>
         </p>
       </div>   
     </div>
     <div class="carousel-item">
      <img class="d-block w-100" src="Imagens/contact_center_2.png" alt="Third slide">
      <!--        <img class="d-block w-100" src="Imagens/recuperacao_credito.jpg" alt="Third slide"> -->
      <div class="carousel-caption d-xs-block">
        <h1 class="lead text-center">
         <b>O Contact Center é a mais nova divisão de serviços do Grupo Pasquali, e está apta a ampliar as atividades já desenvolvidas pela divisão de Recuperação de Crédito.</b>
       </h1>
       <p class="text-center">
         <a href="#contact-center2" class="btn btn-danger btn-lg">Saiba Mais</a>
       </p>
     </div>      
   </div>
   <div class="carousel-item">
    <!--      <img class="d-block w-100" src="Imagens/assessoria-juridica.jpg" alt="First slide"> -->
    <img class="d-block w-100" src="Imagens/juridico_2.png" alt="First slide"> 
    <div class="carousel-caption d-xs-block">
      <h1 class="lead text-center">
       <b>O GRUPO PASQUALI surgiu da união de dois conceituados escritórios de advocacia.</b>
     </h1>
     <p class="text-center">
       <a href="#juridico" class="btn btn-danger btn-lg">Saiba Mais</a>
     </p>
   </div>
 </div>
</div>
<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>
</section>


<section id="servico2" class="servico2 mb-5">
 <div class="container">
   <div class="row"> 
    <div class="col-12 text-center">
     <h1 class="text-center display-5 py-3">Serviços</h2>
       <h3 class="text-center mb-5 py-3">Possuímos 3 (três) unidades de negócio, prestando os seguintes serviços:</h3>
     </div>
   </div>
 </div>
</section>

<section id="cobranca-amigavel" class="cobranca-amigavel">
 <div class="container-fluid">
   <div class="row">
    <div class="col-md-12">
      <h1 class="text-center text-white img-shadow">Cobrança Amigável</h1>
    </div>  
  </div>
  <hr>
  <br> 
  <div class="row align-items-center py-3">
    <div class="col-md-6 text-center">
      <img class="img-shadow img-fluid rounded-circle" src="Imagens/logo_cobranca_amigavel-3.png" alt="Logo-cobranca-amigavel">
    </div>
    <div class="col-md-6">                                
      <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
       <div class="card-header">Crédito e Cobrança</div>
       <div class="card-body">                                        
        <ul class="fa-ul">
         <li class="car-text"><i class="fa fa-check" aria-hidden="true"></i> Cobrança Ativa
         </li>                                            
         <li class="car-text"><i class="fa fa-check" aria-hidden="true"></i> Cobrança Receptiva
         </li>
         <li class="car-text"><i class="fa fa-check" aria-hidden="true"></i> Cobrança Blended
         </li>
         <li class="car-text"><i class="fa fa-check" aria-hidden="true"></i> Checagem Cadastral
         </li>
         <li class="car-text"><i class="fa fa-check" aria-hidden="true"></i> Mesa de Fraude
         </li>
       </ul>                                        
     </div>
   </div>                      
 </div>
</div>
</div>      
</section>


<section id="contact-center2" class="contact-center2">
 <div class="container-fluid">
   <div class="row">
    <div class="col-md-12">
      <h1 class="text-center text-white">Contact Center</h1>
    </div>
  </div>
  <hr> 
  <br>
  <div class="row align-items-center py-3">
    <div class="col-md-3">
      <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
       <div class="card-header">Aquisição</div>
       <div class="card-body">
         <ul class="fa-ul">
          <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Televendas Ativa</li>
          <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Televendas Receptiva</li>                              
          <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Televendas Blended</li>                              
          <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Agendamento para vendas in-loco</li>                              
          <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Ativação</li>                              
          <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Pesquisa de mercado </li>
          <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Welcome call </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
     <div class="card-header">Atendimento</div>
     <div class="card-body">
      <ul class="fa-ul">
        <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i>Atendimento ao cliente</li>
        <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i>Help Desk / Suporte técnico</li>
        <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i>Despacho / Apoio a campo</li>
        <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i>Web Call Center</li>
        <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i>Atualização de banco de dados / Cadastral</li>
        <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i>BackOffice</li>
        <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i>Pesquisa de Satisfação de Clientes</li>
      </ul>
    </div>
  </div>
</div>
<div class="col-md-3">
  <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
   <div class="card-header">Relacionamento</div>
   <div class="card-body">
     <ul class="fa-ul">
      <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> CrossSell</li>
      <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> CRM</li>
      <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Up Sell</li>
    </ul>
  </div>
</div>
<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
 <div class="card-header">Manutenção</div>
 <div class="card-body">
   <ul class="fa-ul">
    <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Retenção</li>
    <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Reversão</li>
  </ul>
</div>
</div>
</div>

<div class="col-md-3 text-center">
  <img class="img-shadow img-fluid rounded-circle" src="Imagens/logo_contact_center-2.png" alt="Logo-contact-center">
</div>
</div>

</div>
</div>      
</section>


<section id="juridico" class="juridico">
 <div class="container-fluid">
   <div class="row">
    <div class="col-md-12">
      <h1 class="text-center text-white">Jurídico</h1>
    </div>
  </div>
  <hr>
  <br>
  
  <div class="row align-items-center py-3">

    <div class="col-md-6 text-center">
      <img class="img-shadow img-fluid rounded-circle" src="Imagens/logo_juridico-3.png" alt="Logo-juridico">
    </div>
    <div class="col-md-6">
     <div class="card bg-light mb-3" style="max-width: 18rem;">
      <div class="card-header">Jurídico</div>
      <div class="card-body">
        <ul class="fa-ul">
         <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Cível (Cobrança jurídica)</li>
         <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Contratos</li>
         <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Consumidor</li> 
         <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Família e Sucessões</li> 
         <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Trabalhista</li> 
         <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Tributário</li> 
         <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Direito público</li> 
         <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Constitucional</li>
         <li class="card-text"><i class="fa-li fa fa-check" aria-hidden="true"></i> Eleitoral</li>
       </ul>
     </div>
   </div>
 </div>
</div>
</div>
</section>


<section id="clientesdiagrama" class="clientes-diagrama">
 <div class="container">
  <div class="row">
   <div class="col-md-12">
    <h1 class="text-center">Alguns de Nossos Clientes</h1>                  
    <hr>
    <img class="img-fluid" src="Imagens/clientes_2.gif" alt="clientes" style="width: 100%">
  </div>
</div>
</div>        
</section>

<section class="py-5" id="parceiros">
  <div class="container">
   <div class="row">
    <div class="col-md-12">
     <h1 class="text-center">Parceiros</h1>                  
     <hr>
   </div>
 </div>
 <div class="container">
  <div class="row">        
   <div class="col-md-12">
    <div class="brands">
     <a href="#">
      <img src="Imagens/ph3a.jpg">
      <img src="Imagens/olos.png">
      <img src="Imagens/aspect.jpg">
      <img src="Imagens/avaya.jpg">
      <img src="Imagens/embratel.jpg">
    </a>
  </div>
  <div class="brands">
   <a href="#">
    <img src="Imagens/microsoft.png">
    <img src="Imagens/dell.png">
    <img src="Imagens/ibm.png">
    <img src="Imagens/telefonica.png">
    <img src="Imagens/algar.png">
  </a>
</div>      
</div>

</div>
</div>
</section>

	<!-- ======== Botao chat =========== 
	<button>
		<h4 class="botaochat text-center text-danger" id="botaochat">
			<span class="fa-stack fa-lg">
				<i class="fa fa-circle fa-stack-2x"></i>
				<i class="fa fa-comments-o fa-stack-1x fa-inverse"></i>
			</span>
		</h4>
	</button>
-->
<!--
	<div class="col-md-3 chat" id="chat">
		<div class="card mb-4 box-shadow">
			<div class="card-header bg-danger text-left" style="color: #ffffff;">Chat</div>
			<div class="card-body">
				 <form method="post">
					 <div class="form-group">
						 <textarea class="form-control is-invalid" rows="5" name="message" placeholder="Mensagem"></textarea>
					 </div>
					 </form>
			</div>
		</div>
	</div>
-->

<?php include 'inc/footer.php';?>


<script>

  //function ajustaservico2() {
    
  //  $(#servico2).
  // }

  $(document).ready(function(){
    $("p").click(function(){
      $(this).hide();
    });
  });
</script>

<!-- =========== BotaChat ========================================== -->
<script>
  $(document).ready(function(){   

   $("#botaochat").click(function(){
    $("#chat").slidetoggle();
  });

 });
</script>
<!-- ======== FIM botaochat ========================================= -->

<!--================================================================== -->
<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId            : '296349977405011',
			autoLogAppEvents : true,
			xfbml            : true,
			version          : 'v2.12'
		});
	};

	(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "https://connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));
</script>
<!--======== FIM ========================================================== -->

<!--========= CAROUSEL ==================================================== -->
<script>
	$('#carousel').carousel({
		interval: 5000
    height: 
  })
</script>
<!--========= FIM CAROUSEL ==================================================== -->   

<!-- Hotjar Tracking Code for ======================================== -->   
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1293315,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>

<!-- =================== FIM Hotjar Tracking Code for ================== -->  




