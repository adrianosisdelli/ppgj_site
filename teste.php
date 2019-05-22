
<?php
/*phpinfo(); */

function get_sql_connetion() {
	$serverName = "177.126.171.133\SQL2012EN0";
	$database = "DataCob_Ppgj";
	$uid = 'ppgj.leitura';
	$pwd = 'D@tac0b';
	try {
		$conn = new PDO(
			"sqlsrv:server=$serverName;Database=$database",
			$uid,
			$pwd,
			array(
                //PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			)
		);
		echo("Conectou");

		return $conn;
	}
	catch(PDOException $e) {
		die("Error connecting to SQL Server: " . $e->getMessage());
	}
}
$conect = get_sql_connetion();


?>