<?php

include_once $_SESSION["root"].'php/DAO/clienteDAO.php';
include_once $_SESSION["root"].'php/Model/modelCliente.php';

class controllerCliente {
	function getAllClientes(){
		$_SESSION["flash"]["msg"]="";
		$clienteDAO = new clienteDAO();
		$clientes=$clienteDAO->getAllClientes();
		include_once $_SESSION["root"].'php/View/viewExibeClientes.php';
	}
	function getData(){
		$_SESSION["flash"]["msg"]="";
		$clienteDAO = new clienteDAO();
		$clientes=$clienteDAO->getAllClientes();
		include_once $_SESSION["root"].'php/View/viewCadastraCliente.php';
	}
	function getBanco(){
		$_SESSION["flash"]["msg"]="";
		$clienteDAO = new clienteDAO();
		$clientes=$clienteDAO->getAllClientes();
		include_once $_SESSION["root"].'php/View/viewEditaCliente.php';
	}
	function setCliente(){
		$clienteDAO = new clienteDAO();
		$cliente = new modelCliente();
		$cliente->setClienteFromPOST();
		$resultadoInsercao = $clienteDAO->setCliente($cliente);
			
		if($resultadoInsercao){
			$_SESSION["flash"]["msg"]="Cliente cadastrado com sucesso";		
		}
		else{
			$_SESSION["flash"]["msg"]="O cliente já existe no banco";
			//Var temp de feedback	
			$_SESSION["flash"]["cpf"]=$cliente->getCpf();
			$_SESSION["flash"]["nome"]=$cliente->getNome();
			$_SESSION["flash"]["cnh"]=$cliente->getCnh();
			$_SESSION["flash"]["endereco"]=$cliente->getEndereco();
			$_SESSION["flash"]["email"]=$cliente->getEmail();
            $_SESSION["flash"]["telefone"]=$cliente->getTelefone();
		}
		include_once $_SESSION["root"].'php/View/viewCadastraCliente.php';
	}
	
	function updateCliente(){
		$clienteDAO = new clienteDAO();
		$cliente = new modelCliente();
		$cliente->updateClienteFromPOST();
		$resultadoInsercao = $clienteDAO->updateCliente($cliente);
			
		if($resultadoInsercao){
			$_SESSION["flash"]["msg"]="Cliente editado com sucesso";		
		}
		else{
			$_SESSION["flash"]["msg"]="O cliente já existe no banco";
			//Var temp de feedback	
			$_SESSION["flash"]["cpf"]=$cliente->getCpf();
			$_SESSION["flash"]["nome"]=$cliente->getNome();
			$_SESSION["flash"]["cnh"]=$cliente->getCnh();
			$_SESSION["flash"]["endereco"]=$cliente->getEndereco();
			$_SESSION["flash"]["email"]=$cliente->getEmail();
            $_SESSION["flash"]["telefone"]=$cliente->getTelefone();
		}
		include_once $_SESSION["root"].'php/View/viewEditaCliente.php';
	}

	function deleteCliente(){
		$_SESSION["flash"]["msg"]="";
		$path = explode('?', $_SERVER['REQUEST_URI']);
		$idx = $path[1];
		
		$clienteDAO = new clienteDAO();
		$resultadoInsercao = $clienteDAO->deleteCliente($idx);
	}
}