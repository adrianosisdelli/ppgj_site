
<!-- <?php
/*
//echo('teste');

$params = array(
    'trace'=>true,
  );
$client = new SoapClient('http://datacob.ppgj.com.br/webservices/boletoweb.asmx?wsdl', $params);
$auth = new stdClass();
$auth->id_cliente_web = 57;
$auth->usuario = 'TI_api';
$auth->senha = 'TI@123';
$header = new SoapHeader('http://datacob.com.br/webservices/boletoweb', 'wsProfile', $auth);

$client->__setSoapHeaders($header);

$dados = array('cpfCnpj' => '79822452934', 'dataNascimento' => '1962-11-21');
try{
    $result = $client->ConsultarDocumento($dados);
}
catch (SoapFault $e) {
    print_r($client->__getLastRequest());
    print_r($e);
}
print_r($result);

*/
?>
-->

<?php
// ---- Inicio Head SOAP ----------------------------------------------------
    $params = array(
        'trace'=>true,
      );
    $client = new SoapClient('http://datacob.ppgj.com.br:86/webservices/boletoweb.asmx?wsdl', $params);
    $auth = new stdClass();
    $auth->id_cliente_web = 57;
    
    // ----- usuario e senha  -  producao --------------
    $auth->usuario = 'TI_api';
    $auth->senha = '@1Nt3Gr4C40#';
    //$auth->senha = 'TI#123';
    //$auth->usuario = 'sistema';
    //$auth->senha = 'm@ry0108';
    
    // ----- usuario e senha  -  homologação --------------
    //$auth->usuario = 'sistema';
    //$auth->senha = 'stef@n121';
    $header = new SoapHeader('http://datacob.com.br/webservices/boletoweb', 'wsProfile', $auth);

    $client->__setSoapHeaders($header);
// --- Fim Header SOAP ------------------------------------------------------
?>