<?php
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/modelCliente.php';

class clienteDAO {

	function getAllClientes(){	
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		$statement = $conn->prepare("SELECT * FROM cliente");		
		$statement->execute();

		$linhas = $statement->fetchAll();
		
		//Verifico se houve algum retorno, senão retorno null
		if(count($linhas)==0)
				return null;

		//Var que irá armazenar um array de obj do tipo cliente
		$clientes;		
		
		foreach ($linhas as $value) {
			$cliente = new modelCliente();
			$cliente->setClienteFromDataBase($value);			
			$clientes[]=$cliente;
		}	
		return $clientes;		
	}

	//Retorna 1 se conseguiu inserir;
	function setCliente($cliente){			

		try {
			//monto a query
            $sql = "INSERT INTO `cliente` (		
                cpf,
                nome,
                cnh,
                endereco,
                email,
                telefone) 
                VALUES (
                :cpf,
                :nome,
                :cnh,
                :endereco,
                :email,
                :telefone)"
        	;

            //pego uma ref da conexão
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

            $statement->bindValue(":cpf", $cliente->getCpf());
            $statement->bindValue(":nome", $cliente->getNome());
            $statement->bindValue(":cnh", $cliente->getCnh());
            $statement->bindValue(":endereco", $cliente->getEndereco());
            $statement->bindValue(":email", $cliente->getEmail());
            $statement->bindValue(":telefone", $cliente->getTelefone());
            return $statement->execute();
			
        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.";
        }		
	}
	
	//Retorna 1 se conseguiu inserir;
	function updateCliente($cliente){			

		try {
			$sql = "UPDATE `cliente` SET 
												`cpf`=:cpf,
												`nome`=:nome,
												`cnh`=:cnh,
												`endereco`=:endereco,
												`email`=:email,
												`telefone`=:telefone
												WHERE `cpf`=:cpf"
												;

            //pego uma ref da conexão
			$instance = DatabaseConnection::getInstance();
			$conn = $instance->getConnection();
			//Utilizando Prepared Statements
			$statement = $conn->prepare($sql);

            $statement->bindValue(":cpf", $cliente->getCpf());
            $statement->bindValue(":nome", $cliente->getNome());
            $statement->bindValue(":cnh", $cliente->getCnh());
            $statement->bindValue(":endereco", $cliente->getEndereco());
            $statement->bindValue(":email", $cliente->getEmail());
            $statement->bindValue(":telefone", $cliente->getTelefone());
            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao alterar na base de dados.";
        }		
	}

	//Retorna 1 se conseguiu "deletar":
	function deleteCliente($idx){			

		try {
			$sql = "DELETE FROM cliente WHERE cpf=:idx";

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