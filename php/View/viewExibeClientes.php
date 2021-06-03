<?php
$titulo = "Exibir Clientes";
include $_SESSION["root"] . 'includes/head.php';
?>

<body>
	<div class="container">
		<div id="principal">
			<h1 class="text-center">Clientes</h1>
			<table class="table">
				<tr>
					<th>Nome</th>
					<th>CPF</th>
					<th>Endereço</th>
					<th>Email</th>
					<th>Telefone</th>
				</tr>
				<?php foreach ($clientes as $value) {
					echo "<tr>";
					echo "<td>" . $value->getNome() . "</td>";
					echo "<td>" . $value->getCpf() . "</td>";
					echo "<td>" . $value->getEndereco() . "</td>";
					echo "<td>" . $value->getEmail() . "</td>";
					echo "<td>" . $value->getTelefone() . "</td>";
					echo "<td class='edit'><a  href='editaCliente?" . $value->getCpf() . "'>Editar </a>";
					echo "<td class='delete'> <a class='acaoExcluir' href='postExcluirCliente?" . $value->getCpf() . "'> Excluir</a></td>";
					echo "</tr>";
				}
				?>
			</table>
		</div>
		<a class="home-button" href="home">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
				<path d="M12 1l-12 12h3v10h18v-10h3l-12-12zm0 18c-1.607-1.626-3-2.84-3-4.027 0-1.721 2.427-2.166 3-.473.574-1.695 3-1.246 3 .473 0 1.187-1.393 2.402-3 4.027zm8-11.907l-3-3v-2.093h3v5.093z" />
			</svg> 
		</a>
	</div>

<?php
include $_SESSION["root"] . 'includes/footer.php'; ?>