--
-- Database: `locadora`
-- Local: http://localhost/phpmyadmin/
--

--
-- Executar os comandos abaixo em SQL
-- para criação do banco de dados
--

-- Criação das tabelas

CREATE TABLE `cliente` (
  `cpf` varchar(512) PRIMARY KEY,
  `nome` varchar(512) NOT NULL,
  `cnh` varchar(512) NOT NULL,
  `endereco` varchar(512) NOT NULL,
  `email` varchar(512) NOT NULL,
  `telefone` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `veiculo` (
  `id` varchar(512) DEFAULT NULL,
  `placa` varchar(512) DEFAULT NULL,
  `transmissao` varchar(512) DEFAULT NULL,
  `carroceria` varchar(512) DEFAULT NULL,
  `status` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `locados` (
  `id` varchar(512) PRIMARY KEY,
  `clienteCpf` varchar(512) DEFAULT NULL,
  `veiculoId` varchar(512) DEFAULT NULL,
  `prazo` varchar(512) DEFAULT NULL,
  `opcao` varchar(512) DEFAULT NULL,
  `preco` varchar(512) DEFAULT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Inserções iniciais (Opcional)

INSERT INTO `cliente` (`cpf`, `nome`, `cnh`, `endereço`, `email`, `telefone`) VALUES
('12345', 'Alexandre', '5555511111', 'Rua Riberão Preto 140', 'xandao@gmail.com', '2222233333'),
('54321', 'Manu', '1111155555', 'Rua São Carlos 580', 'manu@gmail.com', '3333322222');

INSERT INTO `veiculo` (`id`, `placa`, `transmissao`, `carroceria`, `status`) VALUES
('1', 'xxx-1234', 'Sedan', 'Simples', 'disponível'),
('2', 'yyy-4321', 'Esportiva', 'N/D', 'alugado');

INSERT INTO `locados` (`id`, `clienteCpf`, `veiculoId`, `prazo`, `opcao`, `preco`) VALUES
('1', '12345', '1', '30', 'dia', '12,50');