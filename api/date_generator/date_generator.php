<?php
require('tabela_feriado_nacional.php');
require('ultimo_dia_util.php');

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

	public function get_valid_dates($dias_atraso, $limite_acessoria) {
		$valid_dates = array();

		$current_date = new DateTime('now');
		$current_date = new DateTime($current_date->format('Y-m-d'));

		$ultimo_dia_util = get_ultimo_dia_util_mes(get_last_day_of_month($current_date));

		$ultima_data_mes = get_last_day_of_month($current_date);
		$u_dia_util = get_ultimo_dia_util_mes($ultima_data_mes); 

		while(count($valid_dates) < 2) {
			if(!($this->isWeekend($current_date))) {
				if(!$this->tabela_feriado->isFeriado($current_date)){
					if($dias_atraso <= $limite_acessoria) {
						array_push($valid_dates, new DateTime($current_date->format('Y-m-d')));

						// Ao gerar a data, se a data em questão for o último dia últil do mês, encerra a execução do método
						if ($current_date == $ultimo_dia_util) {
							return $valid_dates;
						}

						$current_date->modify('+1 day');
						$dias_atraso = $dias_atraso + 1;
					} else {
						return $valid_dates;
					}
				}
				else{
					$current_date->modify('+1 day');
					$dias_atraso = $dias_atraso + 1;
				}
			}
			else {
				$current_date->modify('+1 day');
				$dias_atraso = $dias_atraso + 1;
			}
		}

		return $valid_dates; 
	}
}