<?php
$titulo="Cadastrar Veiculo";
//include $_SESSION["root"].'includes/header.php';
?>
<body>
	<div class="container" >
		<div id="principal">
			<h1 class="text-center">Cadastro de Veiculo</h1>
			<form action="postCadastraVeiculo" method="POST">
				<div class="row">
                    <!-- Aviso de Sucesso ou Erro após cadastrar -->
					<?php if(isset($_SESSION["flash"]["msg"])){
                        if(str_contains($_SESSION["flash"]["msg"], 'sucesso')){
							echo"<div class='bg-success text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
							echo"<script>
								window.onload = function(){
									setTimeout(function(){ window.location.href = 'exibeVeiculos'; }, 2000);
								}
							</script>";
						}else{
							echo"<div class='bg-success text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
						}
					} ?>

                    <!-- Campos do formulário de cadastro -->
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" name="id" class="form-control" id="id" placeholder="id">
						</div>
						<div class="form-group">
							<input type="text" name="placa" class="form-control" id="placa" placeholder="placa">
						</div>
                        <div class="form-group">
							<input type="text" name="transmissao" class="form-control" id="transmissao" placeholder="transmissao">
						</div>
                        <div class="form-group">
							<input type="text" name="carroceria" class="form-control" id="carroceria" placeholder="carroceria">
						</div>
                        <div class="form-group">
                            <select name='status' id='status'>
                                <option value='disponível'>Disponível</option>
                                <option value='alugado'>Alugado</option>
                            </select>
                        </div>
					</div>
			  	</div>
			    <button type="submit" class="btn btn-default center-block">Cadastrar</button>
			</form>
		</div>
	</div>	
</body>
