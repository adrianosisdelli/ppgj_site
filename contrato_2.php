<?php include 'inc/header_3.php';?>
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

<!--
<section class="fundobox" >
	<div class="boxcontrat" style="margin-top: 115px;">
	-->
<!--
<section class="">
	<div style="margin-top: 115px;">
	-->


	<div class="container-fluid" style="margin-top: 65px;">
		<div class="row">
			<div class="col-md-12">

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
						<div class="col-md-12">
							<h6 class="text-left"><b>Nome:</b> <?php echo $financiado ?> </h6>
							<h6 class="text-left"><b>CPF:</b> <?php echo $cpfCnpj ?> </h6>
						</div>
					</div>

					<br>

					<div class="row">
						<div class="col-md-12">

							<?php
							$vldivida = $result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto->VlDivida;
							$vldividaatualizada = $result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto->VlDividaAtualizada;
							$vldividaatualizadades = $result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto->VlDividaAtualizadaDesc;
							$dtcontrato = $result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto->DtContrato;
							$nroplano = $parcelas[0]->NrPlano;
							?>


		<!--						<?php 
        // ------ Dados Parcelas ----------------------------------------
		//						$dadosparcelasarray = $parcelas;

		//						foreach($dadosparcelasarray as $parcela){
		//							if($parcela->Atraso > 0){
		//								echo('<td>'.$parcela->NrParcela.'</td>');
		//							}
		//						}
								?>
							-->									
							<!-- <img src="Imagens/desconto2.jpg" alt="desconto">		-->


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



							<form onSubmit="return verifica(this);" action="cadastrarnegociacao.php?idContrato=<?php echo $idContrato ?>&idAgrupamento=<?php echo $idagrupamento ?>&idParcelas=<?php echo(implode(",",$parcelasAbertas));?>" method="post">

								<div class="row">
									<div class="col-md-4">											
									</div>

									<div class="col-md-4">
										<div class="alert alert-dark align-items-center" role="alert">
											<h6 class="text-left"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Selecione a data do seu boleto</h6>
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
									<div class="col-md-4">											
									</div>
								</div>
								


								<div class="row">
									<div class="col-md-4">											
									</div>
									<div class="col-md-4">		

										<div class="alert alert-dark" role="alert">         
											<h6 class="text-left" style="margin-top: 5px;">Valor Atualizado R$</h6>
											<div class="form-inline-center">
												<input type="txt" class="form-control form-control-sm text-center" id="vlatual"
												name="vlatual" value="" placeholder="" readonly="true" style="background-color: #ffffff;">
											</div>
											<h6 class="text-left" style="margin-top: 5px;">Valor Desconto R$</h6>
											<div class="form-inline-center">
												<input disabled type="txt" class="form-control form-control-sm text-center" id="vldesc"
												name="vldesc" value="" placeholder="" readonly="true" style="background-color: #ffffff;">
											</div>
											<h6 class="text-left" style="margin-top: 5px;">Valor A Pagar R$</h6>
											<div class="form-inline-center">
												<input type="txt" class="form-control form-control-sm text-center"
												id="vlatualdescto"	name="vlatualdescto" value="" placeholder="" 
												readonly="true" style="background-color: #ffffff;">
											</div>
											<button id="btn_geraboleto" class="btn btn-danger btn-block" type="submit" onclick="loaderboleto()"><i class="fa fa-barcode"></i> Gerar Boleto</button>

										</div>

									</div>
									<div class="col-md-4">								
									</div>

									<br>           
								</form>
							</div>


							<div class="accordion text-center" id="accordionExample">
								<div class="card">
									<div class="card-header" id="headingOne">
										<h5 class="mb-0">
											<button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												<i class="fa fa-file-text-o" aria-hidden="true"></i> Extrato do Contrato
											</button>
										</h5>
									</div>

									<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
										<div class="card-body">
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

										</div>
									</div>
								</div>


								<div class="card">
									<div class="card-header" id="headingTwo">
										<h5 class="mb-0 text-dark">
											<button class="btn btn-danger collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												<i class="fa fa-files-o" aria-hidden="true"></i> Parcelas em Atraso
											</button>
										</h5>
									</div>
									<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
										<div class="card-body">
											<table class="table table-striped" style="overflow-y: auto;">
												<thead style="font-size: 0.8rem">	  
													<tr>
														<th ></th>
														<th >Parcelas</th>
														<th >Vencimento</th>
														<th >Vl Parcela</th>
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
															echo('<td>'.number_format($parcela->VLSaldo, 2, ',', '.').'</td>');
															echo('</tr>');
														}
													}
													?>	
												</tbody>	  
											</table>
										</div>
									</div>
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

				?> <!--================ Fim If $podecobrar =====================-->

			</div>

		</div>


	</div> <!--=========== Fim container ===========-->
	<!-- </div> -->

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
						<p class="text-left"><strong>A BV</strong> emite boletos apenas do <u>Banco Votorantim</u> e <u>Banco do Brasil</u>, e não solicita depósito em conta corrente ou poupança. Evite fraudes, na dúvida ligue para <strong>0800 778 9900.</strong></p>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">
						<i class="fa fa-long-arrow-right" aria-hidden="true"></i> Continue
					</button>        
				</div>
			</div>
		</div>
	</div>

	<!--</section> --> <!--=========== Fim section ===========-->


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

<!-- ================= Hotjar Tracking Code ===========-->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1293365,hjsv:6};
       a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
<!-- ================= FIM Hotjar Tracking Code ===========-->







