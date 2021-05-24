<?php
$titulo="Cadastrar Locação";
//include $_SESSION["root"].'includes/header.php';
?>
<body>
	<div class="container" >
		<div id="principal">
			<h1 class="text-center">Cadastro de Locação</h1>
			<form action="postCadastraLocacao" method="POST">
				<div class="row">
                    <?php if(isset($_SESSION["flash"]["msg"])){
                        if(str_contains($_SESSION["flash"]["msg"], 'sucesso')){
							echo"<div class='bg-success text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
							echo"<script>
								window.onload = function(){
									setTimeout(function(){ window.location.href = 'exibeLocacao'; }, 2000);
								}
							</script>";
						}else if(str_contains($_SESSION["flash"]["msg"], 'existe')){
                            echo"<div class='bg-success text-center msg'>".$_SESSION["flash"]["msg"]."</div>
                            ";
                            echo"<script>
                                setTimeout(function(){ window.location.href = 'cadastraLocacao'; }, 2000);
                            </script>";
                        }else{
							echo"<div class='bg-success text-center msg'>".$_SESSION["flash"]["msg"]."</div>
                            ";
						}
					} ?>

                    <!-- Script de calculo orçamento -->
					<script>
                        function calcularOrcamento(){
                            let opcao = document.getElementById("opcao").value;
                            let tipoSeguro = document.getElementById("opcSeguro").value;
                            let opcionais = document.getElementsByClassName('checkOpcs');

                            let precoFinal = 0;

                            if(opcao == "dia"){
                                precoFinal+= parseInt(document.getElementById("prazo").value)*50.00;
                            }else{
                                precoFinal+= (parseInt(document.getElementById("prazo").value)/100)*200.00;
                            }

                            if(tipoSeguro == "segSimples"){
                                precoFinal+= 150.99;
                            }else if(tipoSeguro == "segSemi"){
                                precoFinal+= 220.99;
                            }else if(tipoSeguro == "segCompleto"){
                                precoFinal+= 520.00;
                            }

                            for(x in opcionais){
                                if(opcionais[x].checked == true){
                                    if(opcionais[x].id == "adc1"){
                                        precoFinal+= 100.15;
                                    }else if(opcionais[x].id == "adc2"){
                                        precoFinal+= 84.15;
                                    }else if(opcionais[x].id == "adc3"){
                                        precoFinal+= 7.15;
                                    }else if(opcionais[x].id == "adc4"){
                                        precoFinal+= 14.15;
                                    }
                                }
                            }

                            document.getElementById("preco").value = precoFinal;
                        }
                    </script>
                    <!-- Fim de calculo orçamento -->

                    <!-- Campos do Orçamento -->
                    <h1>Orçamento</h1>
					<div class="col-md-6">
						<div class="form-group">
                            <select id='opcao' name="opcao" onchange="calcularOrcamento()">
                                <option value='dia'>Dia</option>
                                <option value='quilometragem'>Quilometragem</option>
                            </select>
                            <div class="form-group">
                                <input type="text" name="prazo" class="form-control" id="prazo" placeholder="Quantidade de dias" onchange="calcularOrcamento()">
                            </div>
                            <select id='opcSeguro' onchange="calcularOrcamento()">
                                <option value='segSimples'>Seguro simples</option>
                                <option value='segSemi'>Seguro semi-completo</option>
                                <option value='segCompleto'>Seguro completo</option>
                            </select>
                            <div id="opcionais">
                                <input class="checkOpcs" type="checkbox" id="adc1" onclick="calcularOrcamento()">Taque completo
                                <input class="checkOpcs" type="checkbox" id="adc2" onclick="calcularOrcamento()">Revisado
                                <input class="checkOpcs" type="checkbox" id="adc3" onclick="calcularOrcamento()">Novo
                                <input class="checkOpcs" type="checkbox" id="adc4" onclick="calcularOrcamento()">Pneu novos
                            </div>
                            Preço<input name="preco" id="preco" readonly value=""/>
                        </div>
					</div>
                    <!-- Fim Orçamento -->

                    <h1>Locação</h1>
                    <?php 
                        //Puxa os veiculos disponiveis
                        echo "<p>Selecione o veiculo</p> <select name='veiculoId' id='veiculoId'>";
                            foreach ($veiculos as $value) {
                                if($value->getStatus() == 'disponível'){
                                    echo "<option value='".$value->getId()."'>".$value->getPlaca()."</option>";
                                }
                            }
                        echo "</select>";
                        //Puxa os clientes
                        echo "<p>Selecione o cliente</p> <select name='clienteCpf' id='clienteCpf'>";
                            foreach ($clientes as $value) {
                                echo "<option value='".$value->getCpf()."'>".$value->getNome()."</option>";
                            }
                        echo "</select>";
                    ?>

                    <div class="form-group">
                        <input type="text" name="id" class="form-control" id="id" placeholder="Codigo locação">
                    </div>
			  	</div>
			    <button type="submit" class="btn btn-default center-block">Cadastrar</button>
			</form>
		</div>
	</div>	
</body>
