<?php include 'inc/header2.php';?>
<?php include 'inc/headersoap.php';?>

<?php
  $vlboleto=0;
  $dtvencimento=0;
  $idContrato=0;
  $idBoleto=0; 

  if ($_SERVER['REQUEST_METHOD'] == 'GET')  {          
         
             $idContrato = $_GET['idContrato'];
             $idBoleto = $_GET['idBoleto'];

             $vlboleto = $_GET['vlboleto'];
             $dtvencimento = $_GET['dtvencimento'];
  }
?>

<!-- Modal Opção de Pagamantos -->
<div class="modal fade" id="boletosgerado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white" id="exampleModalLongTitle">Detalhe do Boleto</h5>
        <a href="index.php" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
       <div class="row">
         <div class="col text-center">
          <h5><i class="fa fa-check-circle text-success" aria-hidden="true"></i> Boleto gerado com sucesso !</h5>
          </div>
          </div>

       <div class="row">
         <div class="col">

           <table class="table">
            <thead style="font-size: 0.8rem">   
              <tr>
                <th scope="col"></th>
                <th scope="col">Vencimento</th>
                <th scope="col">Valor</th>
              </tr>
            </thead>
            <tbody style="font-size: 0.8rem">
              <tr>
             
              <td><a href="boleto.php?idBoleto=<?php echo $idBoleto ?>&idContrato=<?php echo $idContrato ?>" class="btn btn-danger">Visualizar</a></td>
              <td><?php echo $dtvencimento ?></td>
              <td><?php echo $vlboleto ?></td>
              </tr>
            </tbody>    
          </table>                  

        </div>                 
      </div>
    </div>
    <div class="modal-footer">
      <a href="index.php" class="btn btn-danger">Sair</a>        
      </div>
    </div>
  </div>
</div>     


<?php include 'inc/footercpfcnpj.php';?>

<script>
  $(document).ready(function() {
    $('#boletosgerado').modal('show');
  });
</script>