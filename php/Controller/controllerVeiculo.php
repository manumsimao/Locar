<?php

include_once $_SESSION["root"].'php/DAO/veiculoDAO.php';
include_once $_SESSION["root"].'php/Model/modelVeiculo.php';

class controllerVeiculo {
	function getAllVeiculos(){
		$_SESSION["flash"]["msg"]="";
		$veiculoDAO = new veiculoDAO();
		$veiculos=$veiculoDAO->getAllVeiculos();
		include_once $_SESSION["root"].'php/View/viewExibeVeiculo.php';
	}
	function getData(){
		$_SESSION["flash"]["msg"]="";
		$veiculoDAO = new veiculoDAO();
		$veiculos=$veiculoDAO->getAllVeiculos();
		include_once $_SESSION["root"].'php/View/viewCadastraVeiculo.php';
	}
	function getBanco(){
		$_SESSION["flash"]["msg"]="";
		$veiculoDAO = new veiculoDAO();
		$veiculos=$veiculoDAO->getAllVeiculos();
		include_once $_SESSION["root"].'php/View/viewEditaVeiculo.php';
	}
	function setVeiculo(){
		$veiculoDAO = new veiculoDAO();
		$veiculo = new modelVeiculo();
		$veiculo->setVeiculoFromPOST();
		$resultadoInsercao = $veiculoDAO->setVeiculo($veiculo);
			
		if($resultadoInsercao){
			$_SESSION["flash"]["msg"]="Veiculo cadastrado com sucesso";		
		}
		else{
			$_SESSION["flash"]["msg"]="O veiculo já existe no banco";
			//Var temp de feedback	
			$_SESSION["flash"]["id"]=$veiculo->getId()();
			$_SESSION["flash"]["placa"]=$veiculo->getPlaca();
			$_SESSION["flash"]["transmissao"]=$veiculo->getTransmissao();
			$_SESSION["flash"]["carroceria"]=$veiculo->getCarroceria();
			$_SESSION["flash"]["status"]=$veiculo->getStatus();
			$_SESSION["flash"]["preco"]=$veiculo->getPreco();
		}
		include_once $_SESSION["root"].'php/View/viewCadastraVeiculo.php';
	}
	
	function updateVeiculo(){
		$veiculoDAO = new veiculoDAO();
		$veiculo = new modelVeiculo();
		$veiculo->updateVeiculoFromPOST();
		$resultadoInsercao = $veiculoDAO->updateVeiculo($veiculo);
			
		if($resultadoInsercao){
			$_SESSION["flash"]["msg"]="Veiculo editado com sucesso";		
		}
		else{
			$_SESSION["flash"]["msg"]="O veiculo já existe no banco";
			//Var temp de feedback	
			$_SESSION["flash"]["id"]=$veiculo->getId()();
			$_SESSION["flash"]["placa"]=$veiculo->getPlaca();
			$_SESSION["flash"]["transmissao"]=$veiculo->getTransmissao();
			$_SESSION["flash"]["carroceria"]=$veiculo->getCarroceria();
			$_SESSION["flash"]["status"]=$veiculo->getStatus();
		}
		include_once $_SESSION["root"].'php/View/viewEditaVeiculo.php';
	}

	function deleteVeiculo(){
		$_SESSION["flash"]["msg"]="";
		$path = explode('?', $_SERVER['REQUEST_URI']);
		$idx = $path[1];
		
		$veiculoDAO = new veiculoDAO();
		$resultadoInsercao = $veiculoDAO->deleteVeiculo($idx);
	}
}