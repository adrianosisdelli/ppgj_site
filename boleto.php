<?php include 'inc/headersoap.php';?>

<?php

$idContrato=0;
$idBoleto=0; 

if ($_SERVER['REQUEST_METHOD'] == 'GET')  {          
       
           $idContrato = $_GET['idContrato'];
           $idBoleto = $_GET['idBoleto'];
 
}
    
//------------Consome Metodo Download -------------------------
    $dados = array(
        'idContrato' => $idContrato,
        'idBoleto' => $idBoleto,
        'idAcordo' => '0',
        'retornaBoleto' => true
        );

    try {
        $boleto = $client->DownloadBoleto($dados);
        $boleto = $boleto->DownloadBoletoResult;
        
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="boleto.pdf"');
        echo ($boleto);
    }
    catch(Exception $ex) {
        print_r($client->__getLastRequest());
        print_r($ex);
    }
//---------------------------------------------------------

?>
        