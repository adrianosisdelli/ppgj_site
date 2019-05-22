

function DadosNegociacao(dados) {
	var dados = JSON.parse(dados);
	
	this.get_total_atualizado = function() {
		var valor = 0.00;
		dados.parcelas.forEach(function(element, index, array) {
			if(element.atraso > 0) {
				valor += parseFloat(element.valor_atual);
			}
		});

		return parseFloat(valor);
	}

	this.get_total_desconto = function() {
		var valor_desconto = 0.00;
		dados.parcelas.forEach(function(element, index, array){
			if (element.atraso > 0) {
				valor_desconto += parseFloat((element.valor_atual - element.valor_atual_desconto));
			}
		});

		return parseFloat(valor_desconto);
	}

	this.get_total_atual_desconto = function() {
		var total_atual_desconto = 0.00;
		dados.parcelas.forEach(function(element, index, array){
			if (element.atraso > 0) {
				total_atual_desconto += parseFloat(element.valor_atual_desconto);
			}
		});

		return parseFloat(total_atual_desconto);
	}
}