<?php

$client = new SoapClient('http://datacob.ppgj.com.br:999/webservices/boletoweb.asmx?wsdl', array('trace' => true));
$pagina = 'pagina_teste.php';


$auth = new stdClass();
$auth->id_cliente_web = 57;
$auth->usuario = 'sistema';
$auth->senha = 'stef@n121';
$header = new SoapHeader('http://datacob.com.br/webservices/boletoweb', 'wsProfile', $auth);

$client->__setSoapHeaders($header);

$dados = array(
	'cpfCnpj' => $_GET['cpfCnpj']
);

$result = null;

try{
	$result = $client->ConsultarDetalheDividaPorCpfCnpj($dados);
	$result = $result->ConsultarDetalheDividaPorCpfCnpjResult->DetalheDividaDto;

}
catch(Exception $ex) {
	echo('erro');
}

$detalhe_divida = array(
	'id_agrupamento' => $result->IdAgrupamento,
	'id_contrato' => $result->IdContrato,
	'nome_financiado' => $result->NomeFinanciado,
	'numero_contrato' => $result->NrContrato,
	'vl_divida' => $result->VlDivida,
	'vl_divida_atualizada' => $result->VlDividaAtualizada,
	'data_contrato' => $result->DtContrato,
	'parcelas' => array(),
	'id_parcelas_abertas' => array()
);

foreach($result->Parcelas->ParcelaBolWebDto as $parcela) {
	array_push($detalhe_divida['parcelas'], array(
		'id_parcela' => $parcela->IdParcela,
		'numero_parcela' => $parcela->NrParcela,
		'numero_contrato' => $parcela->NrContrato,
		'data_vencimento' => $parcela->DtVencimento,
		'valor_saldo' => $parcela->VLSaldo,
		'valor_atual' => $parcela->VLAtual
	));
}

foreach($result->Parcelas->ParcelaBolWebDto as $parcela) {
	if($parcela->Atraso > 0) {
		array_push($detalhe_divida['id_parcelas_abertas'], $parcela->IdParcela);
	}
}

require('detalhe_divida.php');

//localhost/teste/controllers_api/consulta_cpfcnpj.php?cpfCnpj=00328189200

?>

