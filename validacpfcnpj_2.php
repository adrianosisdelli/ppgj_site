<?php include 'inc/header_3.php';?>

<div class="container-fluid" style="margin: 60px auto;">
    <!--
    <div class="row" style="height: 333px;">
      <div class="col-12" style=" margin: 110px auto;">
        
       
      </div>
      </div>
    -->

      <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
         <form onSubmit="return valida(this);" action="contrato_2.php" method="post">


          <div class="form-group row">
            <label for="inputcpfcnpj" class="col-sm-3 col-form-label font-weight-bold">CPF/CNPJ:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control form-control-lg" id="cpfCnpj" name="cpfCnpj" placeholder="Entre com o CPF/CNPJ" maxlength="18">
            </div>
          </div>
          <hr>
          <button type="submit" value="Confirmar" name="submit" class="btn btn-danger btn-block btn-lg">
            <i class="fa fa-search" aria-hidden="true"></i> Consultar
         </button>
         <hr>
           <a href="https://api.whatsapp.com/send?phone=5516981454739" class="btn btn-success btn-block btn-lg" style="color: #ffffff;"><i class="fa fa-whatsapp"></i> Whatsapp</a>
         <hr>
           <a href="tel:08007789900"class="btn btn-primary btn-block btn-lg" style="color: #ffffff;"><i class="fa fa-phone" aria-hidden="true"></i> Ligue</a>
         <hr>
            <a class="btn btn-dark btn-block btn-lg" href="index.php"><i class="fa fa-times" aria-hidden="true"></i> Sair</a>
         <hr>

      


<!-------------  Utilizado atualmente  -------------------------
            <div class="col-lg-5 mx-auto">
              <div class="input-group mb-3">
                <input type="text" class="form-control form-control-lg text-center" id="cpfCnpj" name="cpfCnpj" placeholder="CPF / CNPJ" maxlength="18">
                <div class="input-group-append">
                  <button class="btn btn-outline-light btn-lg rounded-right" type="submit" value="Confirmar" name="submit">Confirmar</button>
                </div>
                ---------------------------------------------------------------->



   </form>
              </div>
              <div class="col-md-4">
              </div>
            </div>

 <div class="d-flex justify-content-center" id="carregando">
  <div class="spinner-border" role="status">
    <span class="sr-only">Carregando...</span>
  </div>
</div>

          



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


<!-- ============= Hotjar Tracking Code -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1290412,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
<!-- ============= FIM Hotjar Tracking Code -->
