<?php include 'inc/header2.php';?>
<?php include 'inc/headersoap.php';?>

<?php        

	$dados = array(
		'idContrato' => $_GET['idContrato'],
		'idBoleto' => $_GET['idBoleto'],
		'idAcordo' => '0',
		'retornaBoleto' => true
	);

	$result = null;
	$boleto = null;

	try{
		$result = $client->DownloadBoleto($dados);

		$pdf_decoded = $result->DownloadBoletoResult;

		header('Content-Type: application/pdf');
		header('Content-Disposition: inline; filename="boleto.pdf"');
		echo($pdf_decoded);

	}
	catch(Exception $ex) {
		echo('erro');
	}

?>