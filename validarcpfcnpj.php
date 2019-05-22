<?php include 'inc/header.php';?>

<section class="cpfcnpj-fundo"> 
  <div class="container">
    <div class="row" style="height: 397px;">
      <div class="col-md-2">
      </div>
      <div class="col-md-8" style=" margin: 110px auto;">
        <h2 class="text-center font-weight-bold">Informe seu CPF ou CNPJ</h2>
        <br>
        <form onSubmit="return valida(this);" action="contrato.php" method="post" class="form-inline my-2 my-lg-0">
          <input type="text" class="form-control mr-sm-2 form-control-lg col-lg-6 text-center cpfcnpj-centraliza" id="cpfCnpj" name="cpfCnpj" placeholder="CPF / CNPJ" maxlength="18">
          <button type="submit" value="Confirmar" name="submit" class="btn btn-outline-danger btn-lg border border-white text-white my-2 my-sm-0">Confirmar</button>
        </form>

      </div>
      <div class="col-md-2">
      </div>
    </div>
  </div>      
</section>


<?php include 'inc/footercpfcnpj.php';?>

<script type="text/javascript" src="style\js\jquery.mask.js"></script>


<script>
  // ----- formata cpf cnpj ------
  /*
  $(document).ready(function() {
      var tamanho = $("#cpfCnpj").val().length;
      alert(tamanho);
      if (tamanho == 11) {
        $("#cpfCnpj").mask('000.000.000-00', {reverse: true});
      } else {
        $("#cpfCnpj").mask('00.000.000/0000-00', {reverse: true});
      }
  }); 
  */


  function valida(form) {
    // ---- checa cpfcnpj vazio
    if ($("#cpfCnpj").val() == "") {
      alert("Necessário informar CPF ou CNPJ.");
      $("#cpfCnpj").focus();
      return false;
    } else if ($("#cpfCnpj").val() != "") {
      //00.000.000/0000-00
      // ---- checa cpfcnpj tamanho diferente de 11, 14 ou 18
      var tamanho = $("#cpfCnpj").val().length;
      if (tamanho != 11 && tamanho != 14 && tamanho != 18) {
        alert("CPF ou CNPJ invalido.");
        return false;
      } else {
        return true;
      }
    }
  }
    

</script>