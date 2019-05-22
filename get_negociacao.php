
<?php
require('util.php');

$dpagto=0;

if ($_SERVER['REQUEST_METHOD'] == 'POST')  {          
    if(isset($_POST['data'])){
        $date = $_POST['data'];        
        $datas = str_replace('/', '-', $date);
        $datapagto = date('Y-m-d', strtotime($datas));
    }
}

// ------------ Consumir Get Negociacao --------------------------------
// ---- Inicio Head SOAP ----------------------------------------------------
    $params = array(
        'trace'=>true,
      );
    $client = new SoapClient('http://datacob.ppgj.com.br:86/webservices/boletoweb.asmx?wsdl', $params);
    $auth = new stdClass();
    $auth->id_cliente_web = 57;
    $auth->usuario = 'TI_api';
    $auth->senha = '@1Nt3Gr4C40#';
    //$auth->senha = 'TI#123';

    //$auth->usuario = 'sistema';
    //$auth->senha = 'm@ry0108';
    //$auth->usuario = 'sistema';
    //$auth->senha = 'stef@n121';
    $header = new SoapHeader('http://datacob.com.br/webservices/boletoweb', 'wsProfile', $auth);

    $client->__setSoapHeaders($header);
// --- Fim Header SOAP ------------------------------------------------------

$dadosgetneg = array(
    'idContrato' => $_POST['idContrato'],
    'idParcelas' => explode(',', $_POST['idParcelas']),
    'dtPagto' => $datapagto,
    'vlCalculo' => '0.0');

try{
    $getnegocia = $client->GetNegociacao($dadosgetneg);
    $getnegocia = $getnegocia->GetNegociacaoResult;   
   
}
catch (SoapFault $e) {
    print_r($client->__getLastRequest());
    print_r($e);
}
    // print_r($getnegocia);

    //$result = json_encode($getnegocia);
    //echo json_encode($result);

    //$variavel = array('nome' => 'Adriano', 'idade' => 27);

$detalhe_divida = array(
    'id_agrupamento' => $getnegocia->IdAgrupamento,
    'id_contrato' => $getnegocia->IdContrato,
    'nome_financiado' => $getnegocia->NomeFinanciado,
    'numero_contrato' => $getnegocia->NrContrato,
    'vl_divida' => $getnegocia->VlDivida,
    'vl_divida_atualizada' => $getnegocia->VlDividaAtualizada,
    'data_contrato' => $getnegocia->DtContrato,
    'parcelas' => array(),
    'id_parcelas_abertas' => array()
);

$parcelas = normaliza_parcelas($getnegocia->Parcelas->ParcelaBolWebDto);

foreach($parcelas as $parcela) {
    array_push($detalhe_divida['parcelas'], array(
        'id_parcela' => $parcela->IdParcela,
        'numero_parcela' => $parcela->NrParcela,
        'numero_contrato' => $parcela->NrContrato,
        'data_vencimento' => $parcela->DtVencimento,
        'valor_saldo' => $parcela->VLSaldo,
        'valor_atual' => $parcela->VLAtual,
        'valor_atual' => $parcela->VLAtual,
        'valor_atual_desconto' => $parcela->VlAtualDesconto,
        'atraso' => $parcela->Atraso
    ));
}

foreach($parcelas as $parcela) {
    if($parcela->Atraso > 0) {
        array_push($detalhe_divida['id_parcelas_abertas'], $parcela->IdParcela);
    }
}

echo(json_encode($detalhe_divida));


?>