<?php include 'inc/header.php';?>
<?php include 'classes/Vagas.php';?>

<?php
    $vag = new Vagas();
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {        
        $insertVag = $vag->vagasInsert($_POST);
    }
?>
     
<section class="vagasadd">  
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php
           if (isset($insertVag)) {
               echo $insertVag;
           }                    
       ?>
      </div>
    </div>
    <div class="row">
        <div class="col-md-3">                     
          <table class="table table-dark table-hover">
              <thead>
                <tr>
                  <th class="text-center" 
                  scope="col"><h5><i class="fa fa-bar-chart text-primary"></i> Dashboard</h5></th>      
              </tr>
              </thead>
              <tbody>
                <tr>
                  <td><i class="fa fa-book text-primary"></i> Cadastrar Vaga</td>
               </tr>
               <tr>
                  <td><i class="fa fa-pencil text-primary"></i> Alterar Vaga</td>
               </tr>             
             </tbody>
        </table>
      
        </div>
        <div class="col-md-9">
          <div class="card text-center">
            <div class="card-header text-left">
              <i class="fa fa-book text-danger" aria-hidden="true"></i> Cadastrar Vaga
            </div>
            <div class="card-body">          
               <form action="vagasadd.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <input type="text" class="form-control" name="centro_de_custo" placeholder="Setor">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="funcao" placeholder="Função">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="descricao_1" placeholder="Descrição 1">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="descricao_2" placeholder="Descrição 2">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="descricao_3" placeholder="Descrição 3">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="conhecimento_1" placeholder="Conhecimento 1">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="conhecimento_2" placeholder="Conhecimento 2">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="conhecimento_3" placeholder="Conhecimento 3">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="conhecimento_4" placeholder="Conhecimento 4">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="conhecimento_5" placeholder="Conhecimento 5">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="cidade" placeholder="Cidade">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" name="uf" placeholder="Uf">
                  </div>                  
                  <div class="form-group">
                      <input type="date" class="form-control" name="data_inclusao" placeholder="Data Inclusão">
                  </div>
                  <input type="submit" class="btn btn-danger pull-left" name="submit" value="Salvar"/>
               </form>
            </div>
          </div>
        </div>
     </div>
   </div> 
</section>

<?php include 'inc/footer.php';?>