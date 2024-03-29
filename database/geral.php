<?php
include_once __DIR__ . "/../conexao.php";

function buscarGeralProduto($eanProduto = null)
{
	$produtos = array();

	$apiEntrada = array(
		'eanProduto' => $eanProduto
	);

	$produtos = chamaAPI(null, '/sistema/geralprodutos', json_encode($apiEntrada), 'GET');
	return $produtos;
}
function buscarGeralPessoas($cpfCnpj = null)
{
	$pessoas = array();

	$apiEntrada = array(
		'cpfCnpj' => $cpfCnpj
	);

	$pessoas = chamaAPI(null, '/sistema/geralpessoas', json_encode($apiEntrada), 'GET');
	return $pessoas;
}
function buscarGeralFornecimento($eanProduto = null, $cpfCnpj = null)
{
	$fornecedor = array();

	$apiEntrada = array(
		'eanProduto' => $eanProduto,
		'cpfCnpj' => $cpfCnpj
	);

	$fornecedor = chamaAPI(null, '/sistema/geralfornecimento', json_encode($apiEntrada), 'GET');
	return $fornecedor;
}


if (isset($_GET['operacao'])) {

	$operacao = $_GET['operacao'];

	if ($operacao == "buscarGeralPessoas") {
		
		$cpfCnpj = $_POST["cpfCnpj"];
		$acao = isset($_POST["acao"]) ? $_POST["acao"] : null;

		if ($cpfCnpj == "") {
			$cpfCnpj = null;
		}
		if ($acao == "") {
			$acao = null;
		}

		$apiEntrada = array(
			'cpfCnpj' => $cpfCnpj,
			'acao' => $acao
		);

		$pessoa = chamaAPI(null, '/sistema/geralpessoas', json_encode($apiEntrada), 'GET');

		echo json_encode($pessoa);
		return $pessoa;
	}
	if ($operacao=="geralpessoasInserir") {

		$apiEntrada = array(
			'cpfCnpj' => $_POST['cpfCnpj'],
			'tipoPessoa' => $_POST['tipoPessoa'],
			'nomePessoa' => $_POST['nomePessoa'],
			'IE' => $_POST['IE'],
			'municipio' => $_POST['municipio'],
			'codigoCidade' => $_POST['codigoCidade'],
			'codigoEstado' => $_POST['codigoEstado'],
			'pais' => $_POST['pais'],
			'bairro' => $_POST['bairro'],
			'endereco' => $_POST['endereco'],
			'endNumero' => $_POST['endNumero'],
			'cep' => $_POST['cep'],
			'email' => $_POST['email'],
			'telefone' => $_POST['telefone'],
			'crt' => $_POST['crt'],
			'regimeTrib' => $_POST['regimeTrib'],
			'cnae' => $_POST['cnae'],
			'regimeEspecial' => $_POST['regimeEspecial'],
			'caracTrib' => $_POST['caracTrib'],
			'origem' => $_POST['origem'],
		);
		$pessoas = chamaAPI(null, '/sistema/geralpessoas', json_encode($apiEntrada), 'PUT');
		return $pessoas;

	}

	if ($operacao=="geralpessoasAlterar") {

		$apiEntrada = array(
			'cpfCnpj' => $_POST['cpfCnpj'],
			'tipoPessoa' => $_POST['tipoPessoa'],
			'nomePessoa' => $_POST['nomePessoa'],
			'IE' => $_POST['IE'],
			'municipio' => $_POST['municipio'],
			'codigoCidade' => $_POST['codigoCidade'],
			'codigoEstado' => $_POST['codigoEstado'],
			'pais' => $_POST['pais'],
			'bairro' => $_POST['bairro'],
			'endereco' => $_POST['endereco'],
			'endNumero' => $_POST['endNumero'],
			'cep' => $_POST['cep'],
			'email' => $_POST['email'],
			'telefone' => $_POST['telefone'],
			'crt' => $_POST['crt'],
			'regimeTrib' => $_POST['regimeTrib'],
			'cnae' => $_POST['cnae'],
			'regimeEspecial' => $_POST['regimeEspecial'],
			'caracTrib' => $_POST['caracTrib'],
			'origem' => $_POST['origem'],
		);
		$pessoas = chamaAPI(null, '/sistema/geralpessoas', json_encode($apiEntrada), 'POST');
		return $pessoas;

	}

	if ($operacao == "buscarGeralProduto") {

		$eanProduto = isset($_POST["eanProduto"]) ? $_POST["eanProduto"] : null;
    	$idGeralProduto = isset($_POST["idGeralProduto"]) ? $_POST["idGeralProduto"] : null;

		if ($eanProduto == "") {
			$eanProduto = null;
		}
		if ($idGeralProduto == "") {
			$idGeralProduto = null;
		}

		$apiEntrada = array(
			'eanProduto' => $eanProduto,
			'idGeralProduto' => $idGeralProduto
		);

		$produto = chamaAPI(null, '/sistema/geralprodutos', json_encode($apiEntrada), 'GET');

		echo json_encode($produto);
		return $produto;
	}
	
	if ($operacao=="geralProdutosInserir") {

		$apiEntrada = array(
			'eanProduto' => $_POST['eanProduto'],
			'nomeProduto' => $_POST['nomeProduto'],
			'idMarca' => $_POST['idMarca'],
			'dataAtualizacaoTributaria' => $_POST['dataAtualizacaoTributaria'],
			'codImendes' => $_POST['codImendes'],
			'prodZFM' => $_POST['prodZFM']
		);
		$produtos = chamaAPI(null, '/sistema/geralprodutos', json_encode($apiEntrada), 'PUT');
		return $produtos;

	}

	if ($operacao=="geralProdutosAlterar") {

		$apiEntrada = array(
			'idGeralProduto' => $_POST['idGeralProduto'],
			'eanProduto' => $_POST['eanProduto'],
			'nomeProduto' => $_POST['nomeProduto'],
			'idMarca' => $_POST['idMarca'],
			'dataAtualizacaoTributaria' => $_POST['dataAtualizacaoTributaria'],
			'codImendes' => $_POST['codImendes'],
			'prodZFM' => $_POST['prodZFM']
		);
		$produtos = chamaAPI(null, '/sistema/geralprodutos', json_encode($apiEntrada), 'POST');
		return $produtos;

	}

	if ($operacao == "buscarGeralFornecimento") {

		$idFornecimento = isset($_POST["idFornecimento"]) ? $_POST["idFornecimento"] : null;
		$eanProduto = isset($_POST["eanProduto"]) ? $_POST["eanProduto"] : null;
    	$cpfCnpj = isset($_POST["cpfCnpj"]) ? $_POST["cpfCnpj"] : null;

		if ($cpfCnpj == "") {
			$cpfCnpj = null;
		}
		if ($eanProduto == "") {
			$eanProduto = null;
		}
		if ($idFornecimento == "") {
			$idFornecimento = null;
		}

		$apiEntrada = array(
			'idFornecimento' => $idFornecimento,
			'eanProduto' => $eanProduto,
			'cpfCnpj' => $cpfCnpj
		);

		$fornecedor = chamaAPI(null, '/sistema/geralfornecimento', json_encode($apiEntrada), 'GET');

		echo json_encode($fornecedor);
		return $fornecedor;
	}

	if ($operacao=="geralFornecedorInserir") {

		$apiEntrada = array(
			'Cnpj' => $_POST['Cnpj'],
			'refProduto' => $_POST['refProduto'],
			'idGeralProduto' => $_POST['idGeralProduto'],
			'valorCompra' => $_POST['valorCompra']
		);
		$fornecedor = chamaAPI(null, '/sistema/geralfornecimento', json_encode($apiEntrada), 'PUT');
		return $fornecedor;

	}

	if ($operacao=="geralFornecedorAlterar") {

		$apiEntrada = array(
			'idFornecimento' => $_POST['idFornecimento'],
			'Cnpj' => $_POST['Cnpj'],
			'refProduto' => $_POST['refProduto'],
			'idGeralProduto' => $_POST['idGeralProduto'],
			'valorCompra' => $_POST['valorCompra']
		);
		$fornecedor = chamaAPI(null, '/sistema/geralfornecimento', json_encode($apiEntrada), 'POST');
		return $fornecedor;

	}
	
}
