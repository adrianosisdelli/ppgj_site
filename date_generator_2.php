<?php
require('tabela_feriado_nacional.php');

class DateGenerator {
	private $tabela_feriado;

	public function __construct() {
		$this->tabela_feriado = new TabelaFeriado();
	}

	public function isWeekend($date) {
		$week_day_number = $date->format('w');

		if($week_day_number == "6" or $week_day_number == "0") {
			return true;
		}
		else {
			return false;
		}
	}

	public function get_valid_dates() {
		$valid_dates = array();

		$current_date = new DateTime();

		while(count($valid_dates) < 2) {
			if(!($this->isWeekend($current_date))) {
				if(!$this->tabela_feriado->isFeriado($current_date)){
					array_push($valid_dates, new DateTime($current_date->format('Y-m-d')));
					$current_date->modify('+1 day');
				}
				else{
					$current_date->modify('+1 day');
				}
			}
			else {
				$current_date->modify('+1 day');
			}
		}

		return $valid_dates; 
	}
}