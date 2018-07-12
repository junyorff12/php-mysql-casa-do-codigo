<?php

session_start();

include "banco.php";
include "ajudantes.php";

$exibir_tabela = false;
$tem_erros = false;
$erros_validacao = array();

if (tem_post()) {
    if(isset($_POST['nome']) && strlen($_POST['nome']) > 0){
        $tarefa['nome'] = $_POST['nome'];
    }else{
        $tem_erros = true;
        $erros_validacao = 'O nome da tarefa é obrigatorio';
    }

	$tarefa = array();

	$tarefa['id'] = $_POST['id'];

	$tarefa['nome'] = $_POST['nome'];

	isset($_POST['descricao'])
	? $tarefa['descricao'] = $_POST['descricao']
	: $tarefa['descricao'] = '';

	if (isset($_POST['prazo']) && strlen($_POST['prazo']) > 0) {
        if(valida_prazo($_POST['prazo'])){
            $tarefa['prazo'] = $_POST['prazo'];
        }else{
            $tem_erros = true;
            $erros_validacao = 'Oprazo não é um data válida!';
        }
    }

    $tarefa['prioridade'] = $_POST['prioridade'];

    isset($_POST['concluida'])
    ? $tarefa['concluida'] = 1
    : $tarefa['concluida'] = 0;

    if(! $tem_erros){
        editar_tarefa($conexao, $tarefa);
        header('Location : tarefas.php');
        die;
    }
	
}

$tarefa = buscar_tarefa($conexao, $_GET['id']);

$tarefa['nome'] = (isset($_POST['nome'])) ? $_POST['nome'] : $tarefa['nome'];

$tarefa['descricao'] = (isset($_POST['descricao'])) ? $_POST['descricao'] : $tarefa['descricao'];

$tarefa['praza'] = (isset($_POST['prazo'])) ? $_POST['prazo'] : $tarefa['prazo'];

$tarefa['prioridade'] = (isset($_POST['prioridade'])) ? $_POST['prioridade'] : $tarefa['prioridade'];

$tarefa['concluida'] = (isset($_POST['concluida'])) ? $_POST['concluida'] : $tarefa['concluida'];

include "template.php";