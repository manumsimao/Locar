<?php
$titulo="Editar Funcionario";
?>
<body>
	<div class="container" >
		<div id="principal">
			<h1 class="text-center">Editar Cliente</h1>
			<form action="postEditaCliente" method="POST">
				<div class="row">
					<!-- Aviso de Sucesso ou Erro após editar -->
					<?php if(isset($_SESSION["flash"]["msg"])){
                        if($_SESSION["flash"]["sucesso"]==false)
                            echo"<div class='bg-danger text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
                        else{
                            echo"<div class='bg-success text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
                            echo"<script>
                                window.onload = function(){
                                    if(window.location['href'].split('?')[1] != undefined){
                                        document.getElementById('cpf').value = window.location['href'].split('?')[1];
                                    }else{
                                        document.getElementById('formularioEdita').style.display = 'none';
                                        document.getElementById('btnEditar').style.display = 'none';
                                        setTimeout(function(){ window.location.href = 'exibeClientes'; }, 2000);
                                    }
                                   
                                }
                            </script>";
                        }
					} ?>

                    <!-- Campos do formulário de cadastro -->
					<div class="col-md-6" id="formularioEdita">
						<div class="form-group">
							<input readonly type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF" value="<?php if(isset($_SESSION["flash"]["cpf"]))echo $_SESSION["flash"]["cpf"];?>">
						</div>
						<div class="form-group">
							<input type="text" name="nome" class="form-control" id="nome" placeholder="Nome" value="<?php if(isset($_SESSION["flash"]["nome"]))echo $_SESSION["flash"]["nome"];?>">
						</div>
                        <div class="form-group">
							<input type="text" name="cnh" class="form-control" id="cnh" placeholder="CNH" value="<?php if(isset($_SESSION["flash"]["cnh"]))echo $_SESSION["flash"]["cnh"];?>">
						</div>
                        <div class="form-group">
							<input type="text" name="endereco" class="form-control" id="endereco" placeholder="Endereco" value="<?php if(isset($_SESSION["flash"]["endereco"]))echo $_SESSION["flash"]["endereco"];?>">
						</div>
                        <div class="form-group">
							<input type="text" name="email" class="form-control" id="email" placeholder="E-mail" value="<?php if(isset($_SESSION["flash"]["email"]))echo $_SESSION["flash"]["email"];?>">
						</div>
                        <div class="form-group">
							<input type="text" name="telefone" class="form-control" id="telefone" placeholder="telefone" value="<?php if(isset($_SESSION["flash"]["telefone"]))echo $_SESSION["flash"]["telefone"];?>">
						</div>
					</div>
			  	</div>
			    <button id="btnEditar" type="submit" class="btn btn-default center-block">Atualizar</button>
			</form>
		</div>
	</div>	
</body>