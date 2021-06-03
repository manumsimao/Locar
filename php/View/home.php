<?php
$titulo = "Home";
include $_SESSION["root"] . 'includes/head.php';
?>

<body>
	<div class="container">
		<h1 class="title">Locar</h1>
		<div class="buttons">
			<a class="button button-1" href="cadastraCliente">Cadastrar Cliente</a>
			<a class="button button-2" href="exibeClientes">Exibir Clientes</a>
			<a class="button button-3" href="cadastraVeiculo">Cadastrar Veículo</a>
			<a class="button button-4" href="exibeVeiculos">Exibir Veículos</a>
			<a class="button button-5" href="cadastraLocacao">Cadastrar Locação</a>
			<a class="button button-6" href="exibeLocacao">Exibir Locações</a>
			<a class="button button-7" href="orcamento">Orçamento</a>
		</div>
	</div>
	
<?php
include $_SESSION["root"] . 'includes/footer.php'; ?>