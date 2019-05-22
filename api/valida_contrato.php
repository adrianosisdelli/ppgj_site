<?php

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

		return $conn;
	}
	catch(PDOException $e) {
		die("Error connecting to SQL Server: " . $e->getMessage());
	}
}

function checa_contrato_existe($id_contrato) {
	$conn = get_sql_connetion();

	$stmt = $conn->prepare('select c.Id_Contrato from cob.Contrato c where c.Id_Contrato = :id_contrato');

	$stmt->bindValue(':id_contrato', $id_contrato);

	$stmt->execute();

	$result = $stmt->fetchObject();

	if($result) {
		return true;
	}
	else {
		return false;
	}
}

function valida_contrato_ajuizado($id_contrato) {
	$conn = get_sql_connetion();

	$stmt = $conn->prepare('select c.id_contrato , c.numero_contrato , p.nr_processo , p.dt_ajuizamento from cob.contrato c join jur.processo_contrato pc on c.id_contrato = pc.id_contrato join jur.processo p on pc.id_processo = p.id_processo where 1=1 and c.contrato_aberto =1 and c.id_grupo = 1 and c.id_contrato = :id_contrato');

	$stmt->bindValue(':id_contrato', $id_contrato);

	$stmt->execute();

	$result = $stmt->fetchObject();

	if(!$result) {
		return true;
	}

	if ($result->dt_ajuizamento == null) {
		return true;
	}
	else {
		return false;
	}

}

function valida_contrato_segmento($id_contrato) {
	$conn = get_sql_connetion();

	$stmt = $conn->prepare('select ctt.Id_Contrato, cttbv.Id_Segmento_Bv from cob.contrato as ctt left join cob.Contrato_Bv as cttbv on ctt.Id_Contrato = cttbv.Id_Contrato where ctt.Id_Contrato = :id_contrato');

	$stmt->bindValue(':id_contrato', $id_contrato);

	$stmt->execute();

	$result = $stmt->fetchObject();

	switch ($result->Id_Segmento_Bv) {
		case "2":
		return false;
		break;

		case "3":
		return false;
		break;
		
		case "9":
		return false;
		break;
		
		
		default:
		return true;
		break;
	}
}

function valida_reneg_concluida($id_contrato) {
	$conn = get_sql_connetion();

	$stmt = $conn->prepare('select ctt.Id_Contrato , ctt.Id_Fase from cob.Contrato as ctt where 1 = 1 and ctt.id_contrato = :id_contrato');

	$stmt->bindValue(':id_contrato', $id_contrato);

	$stmt->execute();

	$result = $stmt->fetchObject();

	if ($result->Id_Fase == "8") { // -> RENEGOCIAÇÃO
		return false;
	}
	else if ($result->Id_Fase == "12") { // -> RETOMADOS
		return false;
	}
	else if ($result->Id_Fase == "7") { // -> ENTREGA AMIGÁVEL
		return false;
	}
	else {
		return true;
	}
}

function valida_contrato_suspenso($id_contrato) {
	$conn = get_sql_connetion();

	$stmt = $conn->prepare('select ctt.Id_Contrato , ctt.Id_Fase from cob.contrato as ctt where ctt.id_contrato = :id_contrato');

	$stmt->bindValue(':id_contrato', $id_contrato);

	$stmt->execute();

	$result = $stmt->fetchObject();

	if($result->Id_Fase == "5") {
		return false;
	}
	else {
		return true;
	}

}

function valida_geral($id_contrato) {
	if(!valida_contrato_suspenso($id_contrato)) {
		echo('Contrato suspenso.');
		return false;
	}
	else if (!valida_contrato_ajuizado($id_contrato)) {
		echo('Contrato ajuizado.');
		return false;
	}
	else if (!valida_contrato_segmento($id_contrato)) {
		echo('Segmento inválido.');
		return false;
	}
	else if(!valida_reneg_concluida($id_contrato)) {
		echo('Reneg concluída.');
		return false;
	}

	else if(!valida_ea_veiculo($id_contrato)) {
		echo('EA Veículo');
		return false;
	}

	else if(!valida_reneg_concluida_II($id_contrato)) {
		return false;
	}

	else {
		return true;
	}
}

function valida_ea_veiculo($id_contrato) {
	$conn = get_sql_connetion();

	$stmt = $conn->prepare('select c.id_contrato , c.numero_contrato , gj.tipo_entrega , gj.dt_entrega , gj.dt_restituicao , gj.dt_conversao from cob.contrato c left join cob.garantia g on c.id_contrato = g.id_contrato left join cob.garantia_juridico gj on g.id_garantia = gj.id_garantia where 1=1 and c.contrato_aberto = 1 and c.id_grupo = 1 and c.id_contrato = :id_contrato');

	$stmt->bindValue(':id_contrato', $id_contrato);

	$stmt->execute();

	$result = $stmt->fetchObject();

	if(!$result) {
		return true;
	}

	if($result->tipo_entrega == null) {
		return true;
	}

	else if ($result->tipo_entrega == "2") {
		return true;
	}

	else if (($result->tipo_entrega == "1" or $result->tipo_entrega == "0") and $result->dt_entrega != null) {
		return false;
	}

	else if (($result->tipo_entrega == "1" or $result->tipo_entrega == "0") and $result->dt_entrega == null) {
		return false;
	}

}

function valida_reneg_concluida_II($id_contrato) {
	$conn = get_sql_connetion();

	$stmt = $conn->prepare('select c.id_contrato , c.numero_contrato , p.nr_processo , pa.dt_andamento , s.cod_ocorr_sistema , s.Descricao , f.cod_fase from cob.contrato c left join jur.processo_contrato pc on c.id_contrato = pc.id_contrato left join jur.processo p on pc.id_processo = p.id_processo left join jur.processo_andamento pa on p.id_processo = pa.id_processo left join par.ocorrencia_sistema s on pa.id_ocorrencia_sistema = s.id_ocorrencia_sistema left join par.fase f on c.id_fase = f.id_fase where 1=1 and c.id_grupo = 1 and c.contrato_aberto = 1 and s.Id_Ocorrencia_Sistema = 384 and c.id_contrato = :id_contrato');

	$stmt->bindValue(':id_contrato', $id_contrato);

	$stmt->execute();

	$result = $stmt->fetchObject();

	if($result) {
		return false;
	}
	else {
		return true;
	}
}

function pesquisa_contrato_assessoria($id_contrato) {

	$conn = get_sql_connetion();

	$stmt = $conn->prepare('select cc.Id_Contrato id_contrato, ccbv.Assessoria assessoria, case when ccbv.Assessoria = 497 then 70 when ccbv.Assessoria = 101 then 120 end as limite, DATEDIFF(day, parc.Dt_Vencimento, getdate()) atraso from cob.Contrato cc left join cob.Contrato_Bv ccbv on cc.Id_Contrato = ccbv.id_contrato left join cob.parcela as parc on cc.Id_Primeira_Parcela = parc.Id_Parcela where cc.Id_Contrato = :id_contrato');


	$stmt->bindValue(':id_contrato', $id_contrato);

	$stmt->execute();

	$result = $stmt->fetchObject();

	return $result;

}

function pesquisa_veiculo_contrato($id_contrato) {

	$conn = get_sql_connetion();

	$stmt = $conn->prepare('select ct.Id_Contrato id_contrato, gt.Marca marca, gt.Modelo modelo, vc.Ano_Fabricacao ano_fabricacao, vc.Ano_Modelo ano_modelo, vc.Chassi chassi, vc.Placa placa, vc.Cor cor, vc.Renavam renavam from(cob.Contrato ct right join cob.garantia gt on ct.id_contrato = gt.id_contrato) left join cob.veiculo vc on gt.id_garantia = vc.id_garantia where ct.id_contrato = :id_contrato');


	$stmt->bindValue(':id_contrato', $id_contrato);

	$stmt->execute();

	$result = $stmt->fetchObject();

	return $result;

}

