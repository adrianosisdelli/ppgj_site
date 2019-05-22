<?php include 'inc/header2.php';?>
<?php include 'inc/headersoap.php';?>

<?php
    $date=0;
    $valorboleto=0;
    $datapagto=0;
 
    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {          
            if(isset($_POST['pagto'])) {
               
               $date = $_POST['pagto'];        
               $datas = str_replace('/', '-', $date);
               $datapagto = date('Y-m-d', strtotime($datas));

               $idContrato = $_GET['idContrato'];
               $valorboleto = $_POST['vlatualdescto'];
              
            }
    }

//------Consumir Cadastrar Negociacao -------------------------------------------    
$dados = array(
  'idContrato' => $idContrato,
  'idAgrupamento' => $_GET['idAgrupamento'],
  'idParcelas' => explode(',', $_GET['idParcelas']),
  'dtPagto' => $datapagto,
  'MetodoPagamento' => '0',
  'vlCalculo' => $valorboleto);

$result = null;
$boleto = null;

$id_boleto = null;
$idBoleto = null;

try{

    $result = $client->CadastrarNegociacao($dados);
}
catch(Exception $ex) {
        print_r($client->__getLastRequest());
        print_r($ex);
    }

$idBoleto = $result->CadastrarNegociacaoResult->IdBoleto;

//var_dump($result->CadastrarNegociacaoResult);
//echo($result->CadastrarNegociacaoResult->IdBoleto);
//die();

if($idBoleto === 0) {
  header('location: mensagem/contrato_71dias.php');
  die();
}

header("Location:boletosgerado.php?idContrato=".$idContrato."&idBoleto=".$idBoleto."&dtvencimento=".$date."&vlboleto=".$valorboleto);
                             
?>
<?php 
//------------Consome Metodo Download -------------------------
/*
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
*/
//-------------------------------------------------------------------------
?>