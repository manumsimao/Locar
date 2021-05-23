<?php
$titulo="Editar Veiculo";
?>
<body>
	<div class="container" >
		<div id="principal">
			<h1 class="text-center">Editar Veiculo</h1>
			<form action="postEditaVeiculo" method="POST">
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
                                        document.getElementById('id').value = window.location['href'].split('?')[1];
                                    }else{
                                        document.getElementById('formularioEdita').style.display = 'none';
                                        document.getElementById('btnEditar').style.display = 'none';
                                        setTimeout(function(){ window.location.href = 'exibeVeiculos'; }, 2000);
                                    }
                                   
                                }
                            </script>";
                        }
					} ?>

                    <!-- Campos do formulário de cadastro -->
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" name="id" class="form-control" id="id" placeholder="id" value="<?php if(isset($_SESSION["flash"]["id"]))echo $_SESSION["flash"]["id"];?>">
						</div>
						<div class="form-group">
							<input type="text" name="placa" class="form-control" id="placa" placeholder="placa" value="<?php if(isset($_SESSION["flash"]["placa"]))echo $_SESSION["flash"]["placa"];?>">
						</div>
                        <div class="form-group">
							<input type="text" name="transmissao" class="form-control" id="transmissao" placeholder="transmissao" value="<?php if(isset($_SESSION["flash"]["transmissao"]))echo $_SESSION["flash"]["transmissao"];?>">
						</div>
                        <div class="form-group">
							<input type="text" name="carroceria" class="form-control" id="carroceria" placeholder="carroceria" value="<?php if(isset($_SESSION["flash"]["carroceria"]))echo $_SESSION["flash"]["carroceria"];?>">
						</div>
                        <div class="form-group">
                            <select name='status' id='status'>
                                <option value='disponível'>Disponível</option>
                                <option value='alugado'>Alugado</option>
                            </select>
                        </div>
					</div>

			  	</div>
			    <button id="btnEditar" type="submit" class="btn btn-default center-block">Atualizar</button>
			</form>
		</div>
	</div>	
</body>