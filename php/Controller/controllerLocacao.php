<?php

include_once $_SESSION["root"].'php/DAO/locacaoDAO.php';
include_once $_SESSION["root"].'php/Model/modelLocacao.php';

include_once $_SESSION["root"].'php/DAO/clienteDAO.php';
include_once $_SESSION["root"].'php/Model/modelCliente.php';

include_once $_SESSION["root"].'php/DAO/veiculoDAO.php';
include_once $_SESSION["root"].'php/Model/modelVeiculo.php';

class controllerLocacao {
    function getCVdata(){
        $clienteDAO = new clienteDAO();
		$clientes=$clienteDAO->getAllClientes();
        $veiculoDAO = new veiculoDAO();
		$veiculos=$veiculoDAO->getAllVeiculos();
        include_once $_SESSION["root"].'php/View/viewCadastraLocacao.php';
    }
	function getAllLocacoes(){
		$_SESSION["flash"]["msg"]="";
		$locacaoDAO = new locacaoDAO();
		$locacaoes=$locacaoDAO->getAllLocacoes();
		include_once $_SESSION["root"].'php/View/viewExibeLocacao.php';
	}
	function setLocacao(){
		$locacaoDAO = new locacaoDAO();
		$locacao = new modelLocacao();
		$locacao->setLocacaoFromPOST();
		$resultadoInsercao = $locacaoDAO->setLocacao($locacao);
			
		if($resultadoInsercao){
			$_SESSION["flash"]["msg"]="Locação cadastrado com sucesso";		
		}
		else{
			$_SESSION["flash"]["msg"]="A locação já existe no banco";
		}
		include_once $_SESSION["root"].'php/View/viewCadastraLocacao.php';
	}

	function deleteLocacao(){
		$_SESSION["flash"]["msg"]="";
		$path = explode('?', $_SERVER['REQUEST_URI']);
		$idx = $path[1];
		
		$locacaoDAO = new locacaoDAO();
		$resultadoInsercao = $locacaoDAO->deleteLocacao($idx);
	}
}