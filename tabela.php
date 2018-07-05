<table>
	<tr>
		<th>Tarefa</th>
		<th>Descrição</th>
		<th>Prazo</th>
		<th>Prioridade</th>
		<th>Concluída</th>
		<th>Opções</th>
	</tr>
	<?php foreach ($lista_tarefas as $tarefa) : ?>
		<tr>
			<td>
				<a href="tarefa.php?id=<?php echo $tarefa['id']; ?> ">
					<?php echo $tarefa['nome']; ?>
				</a> 
			</td>
			<td>
				<?php echo $tarefa['descricao']; ?>
			</td>
			<td>
				<?php if ($tarefa['prazo'] == "" OR $tarefa['prazo'] == "0000-00-00"){
					echo " ";
				} else{
					$dados = explode('-', $tarefa['prazo']);
					$data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";

					echo $data_exibir;
				}
				?>
			</td>
			<td>
				<?php echo traduz_prioridade($tarefa['prioridade']); ?>
			</td>
			<td>
				<?php echo traduz_concluida($tarefa['concluida']); ?>
			</td>
			<td>
				<a href="editar.php?id=<?php echo $tarefa['id']; ?> ">
					Editar
				</a>
				<a href="remover.php?id=<?php echo $tarefa['id']; ?> ">
					Remover
				</a>
			</td>

		</tr>
	<?php endforeach; ?>	
</table>