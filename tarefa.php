<?php

include "banco.php";
include "ajudantes.php";

$tem_erros = false;
$erros_validacao = array();

if (tem_post()){
	//add anexos
	$tarefa['id'] = $_POST['tarefa_id'];

	if(! isset($_FILES['anexo'])) {
		$tem_erros = true;
		$erros_validacao['anexo'] = "Você deve selecionar um arquivo para enviar" ;
	}else {

		if(tratar_anexo($_FILES['anexo'])){
			$anexo = array();
			$anexo['tarefa_id'] = $tarefa_id;
			$anexo['nome'] = $_FILES['anexo']['name'];
			$anexo['arquivo'] = $_FILES['anexo']['name'];
		}else {
			$tem_erros = true;
			$erros_validacao['anexo'] = "Envie apenas PDF ou ZIP" ;
		}
	}

	if(! $tem_erros){
		gravar_anexo($conexao, $anexo);
	}
}

$tarefa = buscar_tarefa($conexao, $_GET['id']);

include "template_tarefa.php";

