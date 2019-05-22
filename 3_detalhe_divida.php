<?php
$date = new DateTime();
$date = $date->add(new DateInterval('P1D'));
$date = date_format($date, 'Y-m-d');
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title>Detalhes da dívida</title>
</head>
<body style="margin-top: 10px;">
	<div class="container-fluid">
		<div class="jumbotron">
			<h1 style="font-size: 25px;"><strong>Pasquali Parisi e Gasparini Júnior Advgados Associados</strong></h1>
		</div>
		<div class="row">
			<div class="col-md-6">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Id Parcela</th>
							<th>Nr. Parcela</th>
							<th>Vencto</th>
							<th>Valor</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($detalhe_divida['parcelas'] as $parcela) {
							echo('<tr>');
							echo('<td>'.$parcela['id_parcela'].'</td>');
							echo('<td>'.$parcela['numero_parcela'].'</td>');
							echo('<td>'.$parcela['data_vencimento'].'</td>');
							echo('<td>'.$parcela['valor_atual'].'</td>');
							echo('</tr>');
						}
						?>
					</tbody>
				</table>
			</div>

			<div class="col-md-6">
				<div class="jumbotron">
					<h1 style="font-size: 20px;">Detalhes da dívida de <strong><?php echo($detalhe_divida['nome_financiado']);?></strong></h1>
					<ul>
						<li style="font-size: 14px;"><strong>Contrato: </strong><?php echo($detalhe_divida['numero_contrato']);?></li>
						<li style="font-size: 14px;"><strong>Valor da dívida: </strong><?php echo($detalhe_divida['vl_divida']);?></li>
						<li style="font-size: 14px;"><strong>Valor da dívida atualizada: </strong><?php echo($detalhe_divida['vl_divida_atualizada']);?></li>
					</ul>
					<br>
					<br>
					<a class="btn btn-primary" href="cadastrar_negociacao.php?idContrato=<?php echo($detalhe_divida['id_contrato']);?>&idAgrupamento=<?php echo($detalhe_divida['id_agrupamento']);?>&parcelas=<?php echo(implode($detalhe_divida['id_parcelas_abertas']));?>&dataPagamento=<?php echo($date);?>">Gerar Boleto</a>
				</div>
			</div>
		</div>
		
	</div>
</body>
</html>