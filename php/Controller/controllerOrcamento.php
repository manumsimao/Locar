<?php include_once $_SESSION["root"].'php/DAO/veiculoDAO.php';
include_once $_SESSION["root"].'php/Model/modelVeiculo.php';

class controllerOrcamento {
    function getVdata(){
        $veiculoDAO = new veiculoDAO();
		$veiculos=$veiculoDAO->getAllVeiculos();
        include_once $_SESSION["root"].'php/View/viewCadastraOrcamento.php';
    }
}