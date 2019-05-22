<?php

$client = new SoapClient('http://datacob.ppgj.com.br:999/webservices/boletoweb.asmx?wsdl', array('trace' => true));

$auth = new stdClass();
$auth->id_cliente_web = 57;
$auth->usuario = 'sistema';
$auth->senha = 'stef@n121';
$header = new SoapHeader('http://datacob.com.br/webservices/boletoweb', 'wsProfile', $auth);

$client->__setSoapHeaders($header);

$dados = array(
	'idContrato' => $_GET['idContrato'],
	'idAgrupamento' => $_GET['idAgrupamento'],
	'idParcelas' => explode(',', $_GET['parcelas']),
	'dtPagto' => date('Y-m-d'),
	'MetodoPagamento' => '0',
	'vlCalculo' => '0'
);

$result = null;
$boleto = null;

$id_boleto = null;

try{
	$result = $client->CadastrarNegociacao($dados);
	//$pdf_decoded = $result->DownloadBoletoResult;
	
	//header('Content-Type: application/pdf');
	//header('Content-Disposition: inline; filename="boleto.pdf"');
	//echo($pdf_decoded);

}
catch(Exception $ex) {
	print_r($client->__getLastRequest());
	print_r($ex);
}


$dados = array(
	'idContrato' => $_GET['idContrato'],
	'idBoleto' => $result->CadastrarNegociacaoResult->IdBoleto,
	'idAcordo' => '0',
	'retornaBoleto' => true
	
);

try {
	$boleto = $client->DownloadBoleto($dados);
	$boleto = $boleto->DownloadBoletoResult;
	
	header('Content-Type: application/pdf');
	header('Content-Disposition: inline; filename="boleto.pdf"');
	echo($boleto);
}
catch(Exception $ex) {
	print_r($client->__getLastRequest());
	print_r($ex);
}

?>