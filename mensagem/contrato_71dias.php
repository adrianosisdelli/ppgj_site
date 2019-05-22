<?php include '../inc/header_mensagem.php';?>

<!-- Modal Página Mensagem - Contrato Maior que 70 -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Não é possível realizar Negociação</h5>
    <a href="../index.php" class="close" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </a>
 </div>
 <div class="modal-body">  
  <h6 class="text-center">Ligue <strong>0800 778 9900</strong> ou entre em contato abaixo:</h6>
</div>
<div class="modal-footer">
<a href="../index.php" class="btn btn-danger">Voltar</button>
   <a href="https://api.whatsapp.com/send?phone=5516981454739" class="btn btn-success" style="color: #ffffff;"><i class="fa fa-whatsapp"></i> Whatsapp</a>
 </div>
</div>
</div>
</div>    

<?php include '../inc/footer_mensagem.php';?>


<script>
  $(document).ready(function() {
    $('#exampleModalCenter').modal('show');
  });
</script> 
