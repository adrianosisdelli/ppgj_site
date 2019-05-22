<?php include 'inc/header.php';?>
<?php include 'classes/Vagas.php';
?>

<?php
  $vag = new Vagas();
?>

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

<section>
  <div class="alert alert-secondary" role="alert">
    <h5 class="text-left">Vagas</h5> 
  </div>
  <div class="container">
    <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
  <!--
      <div class="alert alert-secondary" role="alert">
         <form class="form-inline">
          <div class="form-row">
            <div class="col"> 
              <input type="text" class="form-control" id="#" placeholder="Encontrar vagas por palavra chave">
               &nbsp;<button type="submit" class="btn btn-danger"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
          </div>           
        </form>
      </div>
  -->

<table class="table table-hover">
  <thead class="bg-danger text-white">
    <tr>
      <th scope="col">Vagas em Destaque</th>
      <th></th>      
    </tr>
  </thead>
  <tbody>
  <?php
     $getvag = $vag->getAllVagas();
     if ($getvag) {         
       while ($result = $getvag->fetch_assoc()) {         
  ?>    
    <tr>    
       <td>
         <h6><a href="trabalheconosco.php" class="text-primary"><?php echo $result['funcao'];?></a></h6>
         <h6><i class="fa fa-map-marker" aria-hidden="true"></i>
            <?php echo $result['cidade']." - ".$result['uf'] ;?>
         </h6>
         <h6><?php echo $result['descricao_1'];?>...</h6>
       </td>

       <td>
         <h6></h6>
         <h6></h6>
         <h6><i class="fa fa-folder-open" aria-hidden="true"></i> <?php echo $result['centro_de_custo'];?></h6>
         <h6></h6>
         <h6></h6>
         <h6><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; 3 dias atrás</h6>

<?php
  $date1 = $result['data_inclusao'];
  $date2 = date("Y-m-d");
  echo $date1;
  echo $date2;
  $diff = $date1 - $date2;
  echo $diff->format("%R%a days");
?>

       </td>     
    </tr>

    <?php
          }
        }
    ?>       
     
  </tbody>
</table>


    </div>
    <div class="col-md-2">      
    </div>

 
</section>

<?php include 'inc/footer.php';?>