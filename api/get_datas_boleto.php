<?php

header('Content-Type: application/json');

require('date_generator/date_generator.php');

if (isset($_POST['atraso_contrato']) and isset($_POST['limite_assessoria'])) {

	$date_generator = new DateGenerator();

	$dates = $date_generator->get_valid_dates($_POST['atraso_contrato'], $_POST['limite_assessoria']);

	echo(json_encode($dates));

}
else {
	$data = array(
		'status' => false,
		'mensagem' => 'Necessário informar parâmetros <atraso_contrato> e <limite_assessoria>.'
	);

	echo(json_encode($data));

}
