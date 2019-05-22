<?php

  if ($_SERVER['HTTPS']!='on') {
  $new_url = "https://" . 'www.grupopasquali.com.br' . $_SERVER['REQUEST_URI']; 
?>
    <script>location.href='<?php echo $new_url ?>';</script>
<?php     
    }
?>
<?php phpinfo() ?>


<?php

function get_days_limit($numero_contrato) {
	$serverName = "177.126.171.133\SQL2012EN0";
	$database = "DataCob_Ppgj";
	$uid = 'ppgj.leitura';
	$pwd = 'D@tac0b';
	try {
		$conn = new PDO(
                          "dblib:host=$serverName;Database=$database",
                        //"mssql:host=$serverName;Database=$database",
                        //"odbc:mssql=$serverName;Database=$database",
			//"mssql:server=$serverName;Database=$database",
			//"sqlsrv:server=$serverName;Database=$database",
			$uid,
			$pwd,
			array(
                //PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			)
		);
	}
	catch(PDOException $e) {
		die("Erro ao conectar no SQL Server: " . $e->getMessage());
	}

	$stmt = $conn->prepare('select cttbv.Assessoria
		                    from cob.Contrato as ctt
		                    left join Cob.Contrato_Bv as cttbv
		                        on ctt.Id_Contrato = cttbv.Id_Contrato
		                        where
		                        1=1
		                        and ctt.Id_Contrato = :id_contrato');
	$stmt->bindValue(':id_contrato', $numero_contrato);

	$stmt->execute();

	$result = $stmt->fetchObject();

	if ($result->Assessoria == '497') {
		return 70;
	}
	else {
		return 90;
	}
}

echo(get_days_limit(3588032));