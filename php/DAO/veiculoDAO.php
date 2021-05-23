<?php
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/modelVeiculo.php';

class veiculoDAO {

	function getAllVeiculos(){	
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		$statement = $conn->prepare("SELECT * FROM veiculo");		
		$statement->execute();

		$linhas = $statement->fetchAll();
		
		//Verifico se houve algum retorno, senão retorno null
		if(count($linhas)==0)
				return null;

		//Var que irá armazenar um array de obj do tipo veiculo
		$veiculos;		
		
		foreach ($linhas as $value) {
			$veiculo = new modelVeiculo();
			$veiculo->setVeiculoFromDataBase($value);			
			$veiculos[]=$veiculo;
		}	
		return $veiculos;		
	}

	//Retorna 1 se conseguiu inserir;
	function setVeiculo($veiculo){			

		try {
			//monto a query
            $sql = "INSERT INTO `veiculo` (		
                id,
                placa,
                transmissao,
                carroceria,
                status) 
                VALUES (
                :id,
                :placa,
                :transmissao,
                :carroceria,
                :status)"
        	;

            //pego uma ref da conexão
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

            $statement->bindValue(":id", $veiculo->getId());
            $statement->bindValue(":placa", $veiculo->getPlaca());
            $statement->bindValue(":transmissao", $veiculo->getTransmissao());
            $statement->bindValue(":carroceria", $veiculo->getCarroceria());
            $statement->bindValue(":status", $veiculo->getStatus());
            return $statement->execute();
			
        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.";
        }		
	}
	
	//Retorna 1 se conseguiu inserir;
	function updateVeiculo($veiculo){			

		try {
			$sql = "UPDATE `veiculo` SET 
												`id`=:id,
												`placa`=:placa,
												`transmissao`=:transmissao,
												`carroceria`=:carroceria,
												`status`=:status
												WHERE `id`=:id"
												;

            //pego uma ref da conexão
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

            $statement->bindValue(":id", $veiculo->getId());
            $statement->bindValue(":placa", $veiculo->getPlaca());
            $statement->bindValue(":transmissao", $veiculo->getTransmissao());
            $statement->bindValue(":carroceria", $veiculo->getCarroceria());
            $statement->bindValue(":status", $veiculo->getStatus());
            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao alterar na base de dados.";
        }		
	}

	//Retorna 1 se conseguiu "deletar":
	function deleteVeiculo($idx){			

		try {
			$sql = "DELETE FROM veiculo WHERE id=:idx";

			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();

			$statement = $conn->prepare($sql);
			$statement->bindValue(":idx", $idx);

            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao deletar na base de dados.".$e->getMessage();
        }		
	}

}