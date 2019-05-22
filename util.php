<?php

function normaliza_parcelas($parcelas) {
	if (gettype($parcelas) == 'object') {
		$parcelas_normalizadas = array();
		array_push($parcelas_normalizadas, $parcelas);

		return $parcelas_normalizadas;
	}
	else {
		return $parcelas;
	}
}
