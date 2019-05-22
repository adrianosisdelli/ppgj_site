<pre>
<?php
 
ini_set("soap.wsdl_cache_enabled", "0");
 
// A seguir você devera informar a URL do webservice.
$oSoapClient = new SoapClient("http://SeuDominio/DiretorioSOAP/service.wsdl");
 
$aOptions = array (
       "start_debug"=> "1",
       "debug_port"=> "10000",
       "debug_host"=> "localhost",
       "debug_stop"=> "1");
 
foreach($aOptions as $key => $val) {
        $oSoapClient->__setCookie($key,$val);
}
var_dump($oSoapClient->getUser());
?>
</pre>
[<a href=".">Voltar</a>]