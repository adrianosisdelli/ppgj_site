<?php include 'inc/header.php';?>
<?php include 'inc/headersoap.php';?>
<?php require('date_generator.php');

require('util.php');
require('lib/dbase_datacob.php');
require('valida_contrato.php');

$date_generator = new DateGenerator();

?>

<?php
// --- Consumir Metodo - ConsultarDetalheDividaPorCpfCnpj -----------------------------------
$cpfCnpj=0;
$action=0;

// COMENTÁRIO ADICIONADO POR ADRIANO
// comentario rogerio
// Este é um terceiro comentário adicionado por Adriano

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if(isset($_POST['cpfCnpj'])) {
		$cpfCnpj=$_POST['cpfCnpj'];
		$dados = array('cpfCnpj' => $cpfCnpj);
		try{             
			$result = $client->ConsultarDetalheDividaPorCpfCnpj($dados);
		}
		catch (SoapFault $e) {
			print_r($client->__getLastRequest());
			print_r($e);
		}       
	}
}
//print_r($result);
//var_dump($result);
?>  

<section class="fundobox">
	<div class="boxcontrat" style="margin-top: 115px;">
		<div class="container-fluid">

			<?php  					
			$contrato = $result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto->NrContrato;

			$parcelas = normaliza_parcelas($result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto->Parcelas->ParcelaBolWebDto);
			$id_contrato = $result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto->IdContrato;

			if (!valida_geral($id_contrato)) {

				?>
				<script>location.href='mensagem/contrato_71dias.php';</script>
				<?php
				die();
			}
			

			$atraso = $parcelas[0]->Atraso;
			$limite_acesoria = get_days_limit($id_contrato);


			$datas = $date_generator->get_valid_dates($atraso, $limite_acesoria);

			if(count($datas) == 0) {
				header("location: mensagem/contrato_71dias.php");
			}

// -------- Verifica Assessoria 497 ----------------------------------------------------------
			if ($limite_acesoria == 70) {
				if($atraso < 16 || $atraso > 70 ) {
					?>
					<script>location.href='mensagem/contrato_71dias.php';</script>
					<?php
				}
			}

// -------- Verifica Assessoria 101 --------------------------------------------------------------
			if ($limite_acesoria == 120) {
				if($atraso < 71 || $atraso > 120 ) {
					?>
					<script>location.href='mensagem/contrato_71dias.php';</script>
					<?php
				}
			}


			$idboleto = $result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto->IdBoleto;
			$podecobrar = $result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto->PodeCobrar;
			$idContrato = $result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto->IdContrato;

//---- Pode Cobrar = Sim (1) - Gera Negociação --------------------------------------------------------		
			if ($podecobrar == 1) {

				$financiado = $result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto->NomeFinanciado;
				$idfinanciado = $result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto->IdFinanciado;
				?> 

				<div class="row" style="border-bottom: 4px solid;">
					<div class="col-md-4">
						<h5 class="font-weight-bold text-center" style="margin-top: 15px; font-size: 1rem;">Acesso do Cliente</h5>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-8" style="background-color: #DCDCDC; border-left: 2px solid;">
								<h6 class="text-left" style="margin-top: 15px;"><b>Financiado:</b> <?php echo $financiado ?> </h6>
							</div>
							<div class="col-md-4" style="background-color: #DCDCDC;">        			
								<h6 class="text-left" style="margin-top: 15px;"><b>CPF:</b> <?php echo $cpfCnpj ?> </h6>
							</div>
						</div>            
					</div>
				</div>

				<br>

				<div class="row">
					<div class="col-md-6">

						<?php
						$vldivida = $result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto->VlDivida;
						$vldividaatualizada = $result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto->VlDividaAtualizada;
						$vldividaatualizadades = $result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto->VlDividaAtualizadaDesc;
						$dtcontrato = $result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto->DtContrato;
						$nroplano = $parcelas[0]->NrPlano;
						?>

						<h5 class="text-primary text-left font-weight-bold" style="font-size: 0.9rem">Extrato do Contrato</h5>
						<table class="table table-striped table-bordered" style="max-height: 10px; overflow-y: auto;">
							<tbody style="font-size: 0.8rem">
								<tr>
									<td style="width: 180px;" class="text-left">Data Contrato:</td>
									<?php $d2 = $dtcontrato; ?>
									<th class="text-left"><?php echo date("d/m/Y", strtotime($d2)); ?></th>
								</tr>
								<tr>
									<td class="text-left">Nr. Contrato:</td>
									<th class="text-left"><?php echo $contrato ?></th>
								</tr>
								<tr>
									<td class="text-left">Nr. Plano:</td>
									<th class="text-left"><?php echo $nroplano ?></th>
								</tr>
							</tbody>
						</table>
						<br>

						<h5 class="text-primary font-weight-bold text-left" style="font-size: 0.9rem">Parcelas em Atraso</h5>
						<table class="table">
							<thead style="font-size: 0.8rem">	  
								<tr>
									<th scope="col"></th>
									<th scope="col">Parcelas</th>
									<th scope="col">Vencimento</th>
									<th scope="col">Atraso</th>
									<th scope="col">Vl Parcela</th>
								</tr>
							</thead>
							<tbody style="font-size: 0.8rem">
								<?php 
        // ------ Dados Parcelas ----------------------------------------
								$dadosparcelasarray = $parcelas;

								foreach($dadosparcelasarray as $parcela){
									if($parcela->Atraso > 0){
        //----------------------------------------------------------------      	
										echo('<tr>');
										echo('<th>'.'</th>');
										echo('<td>'.$parcela->NrParcela.'</td>');
										$d1 = $parcela->DtVencimento;
										echo('<td>'.date("d/m/Y", strtotime($d1)).'</td>');			       				   
										echo('<td>'.$parcela->Atraso.'</td>');
										echo('<td>'.number_format($parcela->VLSaldo, 2, ',', '.').'</td>');
										echo('</tr>');
									}
								}
								?>	
							</tbody>	  
						</table>
						<!-- <img src="Imagens/desconto2.jpg" alt="desconto">		-->
						<br>

						<!-- ======== Botao Sair =========== -->
						<div class="row">
							<div class="col-md-4">
							</div>
							<div class="col-md-4">	
								<a href="index.php" class="btn btn-sm btn-outline-danger pull-right"><i class="fa fa-close" aria-hidden="true"></i> Sair</a>
							</div>
							<div class="col-md-4">
							</div>
						</div>
						<!-- ==================================== -->	


					</div>

					<?php
					$vlatual = $parcelas[0]->VLAtual;
					$vlatualdescto = $parcelas[0]->VlAtualDesconto;
					$idagrupamento = $result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto->IdAgrupamento;
					//idcontrato
// ------ Pega Id Parcelas ------------------------------------------------------------------------
					$idparcelasarray = $parcelas;

					$parcelasAbertas = array();

					foreach($idparcelasarray as $parcela){
						if($parcela->Atraso > 0){
							array_push($parcelasAbertas, $parcela->IdParcela);
						}
					}
//--------------------------------------------------------------------------------------------------- 
					?>		

					<div class="col-md-6 align-middle">

						<div class="card text-center">
							<div class="card-header text-center alert-dark">
								<h5 class="text-dark text-center font-weight-bold" style="font-size: 0.9rem">Valor da Negociação parcela(s) em atraso</h5>
							</div>

							<div class="card-body">          
								<form onSubmit="return verifica(this);" action="cadastrarnegociacao.php?idContrato=<?php echo $idContrato ?>&idAgrupamento=<?php echo $idagrupamento ?>&idParcelas=<?php echo(implode(",",$parcelasAbertas));?>" method="post">

									<div class="row">
										<div class="col-md-2">
										</div>
										<div class="col-md-8">
											<div class="alert alert-dark" role="alert">
												<h6 class="text-left text-dark">Escolha a data de Pagamento </h6>


												<?php
												foreach ($datas as $data){
													echo('<div class="form-inline">');
													echo('<input class="form-check-input" type="radio" name="pagto" value='.$data->format('d/m/Y').'>');
													echo('<input disabled type="text" class="form-control form-control-sm text-center" readonly="true" name="inppagto" placeholder='.$data->format('d/m/Y'). ' style="background-color: #ffffff;">');
													echo('</div>');
												}
												?>

											</div>
										</div>

									</div>
									<div class="col-md-2">
									</div>


									<div class="row">
										<div class="col-md-2">
										</div>
										<div class="col-md-8">		

											<div class="alert alert-dark" role="alert">         
												<h6 class="text-left" style="margin-top: 5px;">Valor Atualizado</h6>
												<div class="form-inline">
													<label>R$</label>
													<input type="txt" class="form-control form-control-sm text-center" id="vlatual"
													name="vlatual" value="" placeholder="" readonly="true" style="background-color: #ffffff;">
												</div>
												<h6 class="text-left" style="margin-top: 5px;">Valor Desconto</h6>
												<div class="form-inline">
													<label>R$</label>
													<input disabled type="txt" class="form-control form-control-sm text-center" id="vldesc"
													name="vldesc" value="" placeholder="" readonly="true" style="background-color: #ffffff;">
												</div>
												<h6 class="text-left" style="margin-top: 5px;">Valor A Pagar</h6>
												<div class="form-inline">
													<label>R$</label>
													<input type="txt" class="form-control form-control-sm text-center"
													id="vlatualdescto"	name="vlatualdescto" value="" placeholder="" 
													readonly="true" style="background-color: #ffffff;">
												</div>
												<hr>
												<button id="btn_geraboleto" class="btn btn-danger btn-block" type="submit" onclick="loaderboleto()"><i class="fa fa-barcode"></i> Gerar Boleto</button>
									<!--
										 onclick="waitingDialog.show('Carregando...');">Gerar Boleto</button>
									
										<div class="progress">
											  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>  
										</div>
									-->
								</div>

							</div>
							<div class="col-md-2">
							</div>




							<br>           
						</form>
					</div>


				</div>

			</div>

		</div>

		<?php

//------ Pode Cobrar =  Não (0) e Possui Boleto = Sim (1) ----------------------
	} else if ($podecobrar == 0 && $idboleto != 0) {				

				//header("Location:possuiboleto.php?idContrato=".$idContrato."&idBoleto=".$idboleto."&contrato=".$contrato);
		?>
		<script>location.href='possuiboleto.php?idContrato=<?php echo $idContrato ?>&idBoleto=<?php echo $idboleto ?>&contrato=<?php echo $contrato ?>';</script>
		<?php	

//------ Pode Cobrar =  Não (0) e Possui Boleto = Não (0) ----------------------
	} else if ($podecobrar == 0 && $idboleto == 0) {
		?>		
		<script>location.href='mensagem/nao_gera_boleto.php';</script>

		<?php

	}

	?> <!--================ Fim If =====================-->

</div>
</div>

<!-- Modal Carregando loader -->
<div class="modal fade" id="carregandoloader" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div id="loader"></div>
			<h5 class="modal-title text-primary text-center" id="Modalcarregando">Carregando...</h5>
		</div>
	</div>
</div>

<!-- Modal Mensagem Fraude-->
<div class="modal fade" id="msgfraude" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-circle fa-2x text-warning" aria-hidden="true"></i> <b>ATENÇÃO:</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <h5 class="text-left"><strong>A BV</strong> emite boletos apenas do <u>Banco Votorantim</u> e <u>Banco do Brasil</u>, e não solicita depósito em conta corrente ou poupança.</h5>
          <h5 class="text-left">Evite fraudes, na dúvida ligue para <strong>0800 778 9900.</strong></h5>
        </div>
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-primary" data-dismiss="modal">
        <i class="fa fa-long-arrow-right" aria-hidden="true"></i> Continue
       </button>        
      </div>
    </div>
  </div>
</div>

</section>

<?php include 'inc/footercpfcnpj.php';?>


<script type="text/javascript" src="style\js\negociacao.js"></script>
<script type="text/javascript" src="style\js\waiting.js"></script>
<script type="text/javascript" src="style\js\jquery.mask.js"></script>

<script>	

//------ Consome Metodo Get Negociacao-------------------------------
$(document).ready(function() {
	$('input[type="radio"]').click(function() {

		// atribui valor no value
		$("#vlatual").attr("value", 'Calculando...');
		$("#vldesc").attr("value", 'Calculando...');
		$("#vlatualdescto").attr("value", 'Calculando...');

		$("#btn_geraboleto").attr("disabled", "disabled");

		var idContrato = <?php echo $idContrato; ?>;
		var idParcelas = '<?php echo(implode(',', $parcelasAbertas)); ?>';
		var data = $(this).val();
		$.ajax({
			url:"get_negociacao.php",
			method:"POST",
			data:{data:data,  idContrato:idContrato, idParcelas:idParcelas},
			success:function(dados){
				
				var negociacao = new DadosNegociacao(dados);
				var total_atualizado = negociacao.get_total_atualizado();
				var desc = negociacao.get_total_desconto();
				var total_desconto = negociacao.get_total_atual_desconto();

			       // atribui valor no placeholder
			       $("#vlatual").attr("placeholder", total_atualizado.toFixed(2));
			       $("#vldesc").attr("placeholder", desc.toFixed(2));
			       $("#vlatualdescto").attr("placeholder", total_desconto.toFixed(2));

                   // atribui valor no value			       	
                   $("#vlatual").attr("value", total_atualizado.toFixed(2));
                   $("#vldesc").attr("value", desc.toFixed(2));
                   $("#vlatualdescto").attr("value",total_desconto.toFixed(2));

                   $("#btn_geraboleto").removeAttr("disabled");
               },
               error: function(XMLHttpRequest, textStatus, errorThrown) { 
               	alert("Status: " + textStatus); alert("Error: " + errorThrown);
               }
           });
	});
});


$('#price').priceFormat({
	prefix: 'R$ ',
	centsSeparator: ',',
	thousandsSeparator: '.'
});


// Carrega Modal Msg Fraude na Tela
$(document).ready(function() {
    $('#msgfraude').modal('show');
});

function verifica(form) {

	if ($("#vlatual").val()=="") {
		alert("É necessário selecionar uma data de pagamento.\nSelecione uma das opções disponíveis.");
		return false;
	} else {
		return true;
	}    
}

function loaderboleto() {
	if ($("#vlatualdescto").val()!="") {
		$('#carregandoloader').modal('show');
	}		
}


</script>






