<?php
$titulo = "Cadastrar Cliente";
include $_SESSION["root"] . 'includes/head.php';
?>

<body>
	<div class="container">
		<div id="principal">
			<h1 class="text-center">Cadastro de Cliente</h1>
			<form action="postCadastraCliente" method="POST">
				<!-- Aviso de Sucesso ou Erro após cadastrar -->
				<?php if (isset($_SESSION["flash"]["msg"])) {
					if ($_SESSION["flash"]["msg"] == 'sucesso') {
						echo "<div class='bg-success text-center msg'>" . $_SESSION["flash"]["msg"] . "</div>";
						echo "<script>
								window.onload = function(){
									setTimeout(function(){ window.location.href = 'exibeClientes'; }, 2000);
								}
							</script>";
					} else {
						echo "<div class='bg-success text-center msg'>" . $_SESSION["flash"]["msg"] . "</div>";
					}
				} ?>

				<!-- Campos do formulário de cadastro -->
				<div class="form">
					<div class="form-group">
						<input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF">
					</div>
					<div class="form-group">
						<input type="text" name="nome" class="form-control" id="nome" placeholder="Nome">
					</div>
					<div class="form-group">
						<input type="text" name="cnh" class="form-control" id="cnh" placeholder="CNH">
					</div>
					<div class="form-group">
						<input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereço">
					</div>
					<div class="form-group">
						<input type="text" name="email" class="form-control" id="email" placeholder="E-mail">
					</div>
					<div class="form-group">
						<input type="text" name="telefone" class="form-control" id="telefone" placeholder="Telefone">
					</div>
				</div>
				<button type="submit" class="button button-send">Cadastrar</button>
		</div>
		</form>
		<a class="home-button" href="home">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
				<path d="M12 1l-12 12h3v10h18v-10h3l-12-12zm0 18c-1.607-1.626-3-2.84-3-4.027 0-1.721 2.427-2.166 3-.473.574-1.695 3-1.246 3 .473 0 1.187-1.393 2.402-3 4.027zm8-11.907l-3-3v-2.093h3v5.093z" />
			</svg> 
		</a>
	</div>

<?php
include $_SESSION["root"] . 'includes/footer.php'; ?>