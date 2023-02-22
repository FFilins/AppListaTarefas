<?php 

require "tarefa_model.php";
require "tarefa_service.php";
require "conexao.php";

$tarefa = new Tarefa();
$tarefa->__set('tarefa', $_POST['tarefa']);

$conexao = new Conexao();

$tarefaService = new TarefaService($conexao, $tarefa);
$tarefaService->inserir();

header('Location: nova_tarefa.php?inclusao=1');

echo '<pre>';
print_r($tarefaService);
echo '</pre>';





?>