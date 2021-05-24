<?php
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/modelLocacao.php';

class locacaoDAO {

	function getAllLocacoes(){	
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		$statement = $conn->prepare("SELECT * FROM locados");		
		$statement->execute();

		$linhas = $statement->fetchAll();
		
		//Verifico se houve algum retorno, senão retorno null
		if(count($linhas)==0)
				return null;

		//Var que irá armazenar um array de obj do tipo veiculo
		$locacacoes;		
		
		foreach ($linhas as $value) {
			$locacao = new modelLocacao();
			$locacao->setLocacaoFromDataBase($value);			
			$locacacoes[]=$locacao;
		}	
		return $locacacoes;		
	}

	//Retorna 1 se conseguiu inserir;
	function setLocacao($locacao){			

		try {
			//monto a query
            $sql = "INSERT INTO `locados` (		
                id,
                clienteCpf,
                veiculoId,
                prazo,
                opcao,
                preco) 
                VALUES (
                :id,
                :clienteCpf,
                :veiculoId,
                :prazo,
                :opcao,
                :preco)"
        	;

            //pego uma ref da conexão
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

            $statement->bindValue(":id", $locacao->getId());
            $statement->bindValue(":clienteCpf", $locacao->getClienteCpf());
            $statement->bindValue(":veiculoId", $locacao->getVeiculoId());
            $statement->bindValue(":prazo", $locacao->getPrazo());
            $statement->bindValue(":opcao", $locacao->getOpcao());
            $statement->bindValue(":preco", $locacao->getPreco());
            return $statement->execute();
			
        } catch (PDOException $e) {
            return false;
        }		
	}

	//Retorna 1 se conseguiu "deletar":
	function deleteLocacao($idx){			

		try {
			$sql = "DELETE FROM locados WHERE id=:idx";

			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();

			$statement = $conn->prepare($sql);
			$statement->bindValue(":idx", $idx);

            return $statement->execute();

        } catch (PDOException $e) {
            return false;
        }		
	}

}