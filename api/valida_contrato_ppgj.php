<?php 

require('valida_contrato.php');
header('Content-Type: application/json');

if(!isset($_POST['id_contrato']) or $_POST['id_contrato'] == '') {
	$resultado = array(
		'mensagem' => 'É necessário informar o id do contrato para efetuar a validação.'
	);

	echo(json_encode($resultado));

	die();
}

$id_contrato = $_POST['id_contrato'];

if(!checa_contrato_existe($id_contrato)) {
	$resultado = array(
		'mensagem' => 'Contrato não localizado. Verifique se o id_contrato informado está correto.'
	);

	echo(json_encode($resultado));

	die();
}

try {
	$contrato_ajuizado = valida_contrato_ajuizado($id_contrato);
	$contrato_segmento = valida_contrato_segmento($id_contrato);
	$fase_valida = valida_reneg_concluida($id_contrato);
	$contrato_supenso = valida_contrato_suspenso($id_contrato);
	$ea_veiculo = valida_ea_veiculo($id_contrato);
	$reneg_concluida_II = valida_reneg_concluida_II($id_contrato);

	$dados_contrato_assessoria = pesquisa_contrato_assessoria($id_contrato);

	$teste_amigavel = (($dados_contrato_assessoria->assessoria == "497") and (intval($dados_contrato_assessoria->atraso) <= 70) and (intval($dados_contrato_assessoria->atraso) >= 16) );
	
	$teste_contencioso = (($dados_contrato_assessoria->assessoria == "101") and (intval($dados_contrato_assessoria->atraso) <= 120) and (intval($dados_contrato_assessoria->atraso) >= 71));

	$teste_dias_limite = ($teste_amigavel or $teste_contencioso);

	$result = array(
		'contrato_valido' => (
			$contrato_ajuizado and
			$contrato_segmento and
			$fase_valida and
			$contrato_supenso and
			$ea_veiculo and
			$reneg_concluida_II and
			$teste_dias_limite
		),
		'id_contrato' => $id_contrato,
		'fase' => $dados_contrato_assessoria->assessoria,
		'dias_limite' => $dados_contrato_assessoria->limite,
		'atraso' => $dados_contrato_assessoria->atraso,
		'validacoes' => array(
			array(
				'descricao' => 'Validação contrato ajuízado',
				'retorno' => $contrato_ajuizado
			),
			array(
				'descricao' => 'Validação contrato segmentos',
				'retorno' => $contrato_segmento 
			),
			array(
				'descricao' => 'Validação contrato fases',
				'retorno' => $fase_valida
			),
			array(
				'descricao' => 'Validação contrato suspenso',
				'retorno' => $contrato_supenso
			),
			array(
				'descricao' => 'Validação EA veículo',
				'retorno' => $ea_veiculo
			),
			array(
				'descricao' => 'Validação Reneg concluída II',
				'retorno' => $reneg_concluida_II
			),
			array (
				'descricao' => 'Validação limite assessoria',
				'retorno' => $teste_dias_limite
			)
		)
	);

	echo(json_encode($result));
}

catch(Exception $e) {
	$resultado = array(
		'mensagem' => 'Ocorreu um erro ao tentar localizar o contrato. Verifique se o id do contrato informado é válido.'
	);

	echo(json_encode($resultado));
}
