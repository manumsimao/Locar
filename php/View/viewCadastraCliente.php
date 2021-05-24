<?php
$titulo="Cadastrar Cliente";
//include $_SESSION["root"].'includes/header.php';
?>
<body>
	<div class="container" >
		<div id="principal">
			<h1 class="text-center">Cadastro de Cliente</h1>
			<form action="postCadastraCliente" method="POST">
				<div class="row">
                    <!-- Aviso de Sucesso ou Erro após cadastrar -->
					<?php if(isset($_SESSION["flash"]["msg"])){
                        if(str_contains($_SESSION["flash"]["msg"], 'sucesso')){
							echo"<div class='bg-success text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
							echo"<script>
								window.onload = function(){
									setTimeout(function(){ window.location.href = 'exibeClientes'; }, 2000);
								}
							</script>";
						}else{
							echo"<div class='bg-success text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
						}
					} ?>

                    <!-- Campos do formulário de cadastro -->
					<div class="col-md-6">
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
							<input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereco">
						</div>
                        <div class="form-group">
							<input type="text" name="email" class="form-control" id="email" placeholder="E-mail">
						</div>
                        <div class="form-group">
							<input type="text" name="telefone" class="form-control" id="telefone" placeholder="telefone">
						</div>
					</div>
			  	</div>
			    <button type="submit" class="btn btn-default center-block">Cadastrar</button>
			</form>
		</div>
	</div>	
</body>
