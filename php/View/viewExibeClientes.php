<?php
$titulo="Exibir Clientes";
//include $_SESSION["root"].'includes/header.php';
?>
<body>
	<div class="container" >
		<div id="principal">
			<h1 class="text-center">Clientes</h1>
			<table class="table table-striped">
			<?php 
				//$clientes foi criado no controller que chamou essa classe;
				echo "<tr>";
					echo "<th onclick='sortName()' style='cursor: pointer; color: blue;'>Nome</th>";
					echo "<th>CPF</th>";
					echo "<th>Endereço</th>";
					echo "<th>Email</th>";
                    echo "<th>Telefone</th>";
					//if ($_SESSION["nivelAcesso"]==1){
					//	echo "<th>Administrar</th>";
					//}
				echo "</tr>";
				foreach ($clientes as $value) {
					echo "<tr>";
						echo "<td>".$value->getNome()."</td>";
						echo "<td>".$value->getCpf()."</td>";
						echo "<td>".$value->getEndereco()."</td>";
						echo "<td>".$value->getEmail()."</td>";
						echo "<td>".$value->getTelefone()."</td>";
						echo "<th><a style='cursor: pointer;' href='editaCliente?".$value->getCpf()."'>Editar </a> | <a style='cursor: pointer;' class='acaoExcluir' href='postExcluirCliente?".$value->getCpf()."'> Excluir</a></th>";
					echo "</tr>";
				}
			?>
			</table>
		</div>
	</div>	
</body>

<!-- add no footer -->
<?php 
	//include $_SESSION["root"].'includes/footer.php';
	//if(isset($_SESSION["flash"])){
	//	foreach ($_SESSION["flash"] as $key => $value) {
	//		unset($_SESSION["flash"][$key]);	
	//	}
	//}
?>
<!-- fim footer -->

<script>
	function sortName() {
		var table, rows, switching, i, x, y, shouldSwitch;
		table = $('.table-striped')[0];
		switching = true;
		while (switching) {
			switching = false;
			rows = table.rows;
			for (i = 1; i < (rows.length - 1); i++) {
			shouldSwitch = false;
			x = rows[i].getElementsByTagName("TD")[0];
			y = rows[i + 1].getElementsByTagName("TD")[0];
			if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
				shouldSwitch = true;
				break;
			}
			}
			if (shouldSwitch) {
				rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
				switching = true;
			}
		}
	}

	$(document).ready(function () {
        $('.visualizarFuncionario').addClass('active');
		$('.acaoEditar').click(function() {
			console.log('url_atual');
		});
		$('.acaoExcluir').click(function() {
			console.log('url_atual');
		});
    });
</script>