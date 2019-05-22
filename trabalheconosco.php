<?php include 'inc/header.php';?>
<?php include 'classes/Vagas.php';?>

<?php
  $vag = new Vagas();
?>

<section class="trabalhe" id="trabalhe">
   <div class="container-fluid">
    <div class="row py-5">
     <div class="col-md-12">
      <h1 class="text-center display-5">Trabalhe com a gente</h1>
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
         <h5 class="text-primary"><?php echo $result['funcao'];?></h5>
         <h6 class="text-primary"><i class="fa fa-map-marker" aria-hidden="true"></i>
            <?php echo $result['cidade']." - ".$result['uf'] ;?>
         </h6>
         <h6><?php echo $result['descricao_1'];?></h6>
         <h6><?php echo $result['descricao_2'];?></h6>
         <h6><?php echo $result['descricao_3'];?></h6>         
         <h6>&nbsp; <?php echo $result['conhecimento_1'];?></h6>
         <h6>&nbsp; <?php echo $result['conhecimento_2'];?></h6>
         <h6>&nbsp; <?php echo $result['conhecimento_3'];?></h6>
         <h6>&nbsp; <?php echo $result['conhecimento_4'];?></h6>
         <h6>&nbsp; <?php echo $result['conhecimento_5'];?></h6>
         <a href="candidatar.php" class="btn btn-danger pull-right">Candidatar-se à vaga</a>
       </td>

       <td>
         <h6></h6>
         <h6></h6>
         <h6><i class="fa fa-folder-open" aria-hidden="true"></i> <?php echo $result['centro_de_custo'];?></h6>
         <h6></h6>
         <h6></h6>
         <?php                  
             $dt_hoje = date('Y-m-d H:i:s');
             $dt_inclus = $result['data_inclusao'];                    
             $diff = date_diff($dt_inclusao,$dt_hoje);
         ?>
         <h6><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; <?php echo $diff ?> dias atrás</h6>
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