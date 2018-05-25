<?php session_start(); ?>

<html>
    <head>
	    <title>Gerenciador de Tarefas</title>
    </head>
    <body>
	    <h1>Gerenciador de Tarefas</h1>

	    <form>
	    	<fieldset>
	    		<legend>Novo Contato</legend>
	    		<label>
	    			Nome:
	    			<input type="text" name="nome" required="true"/></br>
	    			Telefone:
	    			<input type="text" name="fone" required="true" /></br>
	    			Email:
	    			<input type="Email" name="email" required="true"/><br>
	    		
	    		<input type="submit" value="Cadastrar" />
	    	</fieldset>
	    </form>
	    <?php
            $lista_contato = array();

	        if (isset($_GET['nome'])) {
	        	$_SESSION['lista_contato'][] = $_GET['nome']; # adiciona dentro do array $_SESSION 
	        } 

	        if (isset($_GET['fone'])) {
	        	$_SESSION['lista_contato'][] = $_GET['fone']; # adiciona dentro do array $_SESSION 
	        } 

	        if (isset($_GET['email'])) {
	        	$_SESSION['lista_contato'][] = $_GET['email']; # adiciona dentro do array $_SESSION 
	        } 

	        $lista_contato = array(); # define $lista_tarefas com um vetor

	        if (isset($_SESSION['lista_contato'])) {
	        	$lista_contato = $_SESSION['lista_contato'];# passa tudo que tem em $_SESSION para $lista_tarefas
	        }
	    ?>

	    <table>
	    	<tr>
	    		<th>Contato cadastrado:</th>
	    	</tr>

	    	<?php foreach ($lista_contato as $contato): ?>
	    	    <tr>
	    	    	<td> <?php echo $contato; ?> </td>
	    	    </tr> 
	    	<?php endforeach; ?>	
	    </table>

    </body>
</html>