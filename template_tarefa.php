<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gerenciador de tarefas</title>
	<link rel="stylesheet" href="tarefas.css" type="text/css" />
</head>
<body>
	<h1>Tarefa: <?php echo $tarefa['nome']; ?> </h1>
	<p>
		<a href="tarefas.php">Voltar para lista de tarefas</a>
	</p>
	<p>
		<strong>Concluída</strong>
		<?php echo traduz_concluida($tarefa['concluida']); ?>
	</p>
	<p>
		<strong>Descricao</strong>
		<?php echo n12br($tarefa['descricao']); ?>
	</p>
	<p>
		<strong>Prazo</strong>
		<?php echo traduz_data_para_exibri($tarefa['prao']); ?>
	</p>
	<p>
		<?php echo traduz_prioridade($tarefa['prioridade']); ?>
	</p>
	<h2>Anexos</h2>
	<!-- lista de anexos -->
</body>
</html>