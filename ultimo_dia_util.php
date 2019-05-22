<?php

require_once('tabela_feriado_nacional.php');

function get_last_day_of_month($date) {
	$passed_month = $date->format('m');
	$passed_day = $date->format('d');
	$passed_year = $date->format('Y');

	$last_day_of_month = date('t', strtotime($date->format('Y-m-d')));

	$final_date = new DateTime($passed_year.'-'.$passed_month.'-'.$last_day_of_month);
	return $final_date;
}


function isWeekend($date) {
	$week_day_number = $date->format('w');

	if($week_day_number == "6" or $week_day_number == "0") {
		return true;
	}
	else {
		return false;
	}
}

function get_ultimo_dia_util_mes($data) {
	$nova_data = new DateTime($data->format('Y-m-d'));
	$tabela_feriado = new TabelaFeriado();

	$dia_util = !(isWeekend($nova_data) or $tabela_feriado->isFeriado($nova_data));

	while(!$dia_util) {
		$nova_data->modify('-1 day');
		$dia_util = !(isWeekend($nova_data) or $tabela_feriado->isFeriado($nova_data));
	}

	return $nova_data;
}
