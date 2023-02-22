<?php 

require "tarefa_model.php";
require "tarefa_service.php";
require "conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


if($acao == 'inserir') {
    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']);
    
    $conexao = new Conexao();
    
    $tarefaService = new TarefaService($conexao, $tarefa);
    
    $tarefaService->inserir();

    header('Location: nova_tarefa.php?inclusao=1');    
}else if($acao == 'recuperar') {
    $tarefa = new Tarefa();
    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService->recuperar();
    
}else if($acao == 'atualizar'){
    $tarefa = new Tarefa();
    $tarefa->__set('id', $_POST['id']);
    $tarefa->__set('tarefa', $_POST['tarefa']);
    $conexao = new Conexao();

    $url = $_GET['url'];

    $tarefaservice = new TarefaService($conexao, $tarefa);
    if($tarefaservice->atualizar()) {
        echo $url . ' após atualização';

        header('Location: '.$url);
    } 
}else if($acao == 'remover') {
    $tarefa = new Tarefa();
    $tarefa->__set('id', $_GET['id']);

    $conexao = new Conexao();

    $url = $_GET['url'];

    $tarefaservice = new TarefaService($conexao, $tarefa);
    $tarefaservice->remover();

    header("Location: $url");
}else if($acao == 'marcarRealizada') {
    $tarefa = new Tarefa();
    $tarefa->__set('id', $_GET['id']);
    $tarefa->__set('id_status', 2);

    $conexao = new Conexao();

    $url = $_GET['url'];

    $tarefaservice = new TarefaService($conexao, $tarefa);
    $tarefaservice->marcarRealizada();
    
    header("Location: $url");
}else if ($acao == 'recuperarPendentes') {
    $tarefa = new Tarefa();
    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService->recuperarPendentes();
    
}



?>