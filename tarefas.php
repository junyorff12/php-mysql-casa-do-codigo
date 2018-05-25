<?php session_start(); ?>

<html>
    <head>
	    <title>Gerenciador de Tarefas</title>
    </head>
    <body>
	    <h1>Gerenciador de Tarefas</h1>

	    <form>
	    	<fieldset>
	    		<legend>Nova tarefa</legend>
	    		<label>
	    			Tarefas:
	    			<input type="text" name="nome" />
	    		</label>
	    		<input type="submit" value="Cadastrar" />
	    	</fieldset>
	    </form>
	    <?php
            $lista_tarefas = array();

	        if (isset($_GET['nome'])) {
	        	$_SESSION['lista_tarefas'][] = $_GET['nome']; # adiciona dentro do array $_SESSION 
	        } 

	        $lista_tarefas = array(); # define $lista_tarefas com um vetor

	        if (isset($_SESSION['lista_tarefas'])) {
	        	$lista_tarefas = $_SESSION['lista_tarefas'];# passa tudo que tem em $_SESSION para $lista_tarefas
	        }
	    ?>

	    <table>
	    	<tr>
	    		<th>Tarefa:</th>
	    	</tr>

	    	<?php foreach ($lista_tarefas as $tarefa): ?>
	    	    <tr>
	    	    	<td> <?php echo $tarefa; ?> </td>
	    	    </tr> 
	    	<?php endforeach; ?>	
	    </table>

    </body>
</html>