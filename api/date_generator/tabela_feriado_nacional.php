<?php

class TabelaFeriado {
	private $lista_feriados = array(
		'01-01',
		'30-03',
		'21-04',
		'01-05',
		'07-09',
		'12-10',
		'02-11',
		'15-11',
		'25-12'
	);

	public function isFeriado($data) {
		$data = $data->format('d-m');

		foreach($this->lista_feriados as $feriado) {
			if ($data == $feriado) {
				return true;
			}
		}
	}
}