<?php
/*
Esse script funciona como um front controller, todas as requisições passam primeiro por aqui, também podemos enxergar como um gateway padrão. Isso só é possível graças ao htaccess que faz com que o todas as requisições feitas sejam redirecionadas para cá.
Da forma como esse arquivo de rotas funciona, nós não fazemos “links” para arquivos, nós associamos uma url a um controller.
****Descomentar os print_r abaixo para entender melhor****
*/

//Path é um array onde cada posição é um elemento da URL
$path = explode('/', $_SERVER['REQUEST_URI']);
//Action é a posição do array
$action = $path[sizeOf($path) - 1];

//Caso a ação tenha param GET esse param é ignorado, isso é particularmente útil para trabalhar com AJAX, já que o conteúdo do get será útil apenas para o controller e não para a rota
$action = explode('?', $action);
$action = $action[0];

//Todo controller que tiver pelo menos uma rota associada a ele deve aparecer aqui.
include_once $_SESSION["root"].'php/Controller/controllerCliente.php';
include_once $_SESSION["root"].'php/Controller/controllerVeiculo.php';

//debug($_SESSION);

if ($action == 'exibeClientes') {//Exibe Clientes
    $clientes = new controllerCliente();
    $clientes->getAllClientes();
}else if ($action == 'cadastraCliente') {//View cadastra cliente
    $clientes = new controllerCliente();
    $clientes->getData();
    require_once $_SESSION["root"].'php/View/viewCadastraCliente.php';
}else if ($action == 'postCadastraCliente') {// Requisição para inserção cliente
    $cliente = new controllerCliente();
    $cliente->setCliente();
}else if ($action == 'editaCliente') {// View edita cliente
    $cliente = new controllerCliente();
    $cliente->getBanco();
    require_once $_SESSION["root"].'php/View/viewEditaCliente.php';
}else if ($action == 'postEditaCliente') {// Requisição para edição do cliente
    $cliente = new controllerCliente();
    $cliente->updateCliente();
}else if ($action == 'postExcluirCliente') {// Requisição para delete cliente
    $cliente = new controllerCliente();
    $cliente->deleteCliente();
    header("Location: exibeClientes");
}else if ($action == 'exibeVeiculos') {//Exibe veiculos
    $veiculo = new controllerVeiculo();
    $veiculo->getAllVeiculos();
}else if ($action == 'cadastraVeiculo') {//View cadastra veiculo
    $veiculo = new controllerVeiculo();
    $veiculo->getData();
    require_once $_SESSION["root"].'php/View/viewCadastraVeiculo.php';
}else if ($action == 'postCadastraVeiculo') {// Requisição para inserção veiculo
    $veiculo = new controllerVeiculo();
    $veiculo->setVeiculo();
}else if ($action == 'editaVeiculo') {// View edita veiculo
    $veiculo = new controllerVeiculo();
    $veiculo->getBanco();
    require_once $_SESSION["root"].'php/View/viewEditaVeiculo.php';
}else if ($action == 'postEditaVeiculo') {// Requisição para edição do veiculo
    $veiculo = new controllerVeiculo();
    $veiculo->updateVeiculo();
}else if ($action == 'postExcluirVeiculo') {// Requisição para delete veiculo
    $veiculo = new controllerVeiculo();
    $veiculo->deleteVeiculo();
    header("Location: exibeVeiculos");
}

?>