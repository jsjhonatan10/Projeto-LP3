<?php
	session_start();
<<<<<<< HEAD

	if(empty($_SESSION['erroLogin']) == false)
	{
	$erro = $_SESSION['erroLogin'];
	unset($_SESSION['erroLogin']);
=======
	
	if(empty($_SESSION['erroLogin']) == false)
	{
	$erro = $_SESSION['erroLogin'];
>>>>>>> 13dabbb18e1e737e3044dbdcdc273067933849d5
	}
	else {
		$erro = null;
	}
<<<<<<< HEAD
	if ($_SESSION['emailUsuarioLogado'] != "") {

		header('Location: pedidos.php');
	}
=======
>>>>>>> 13dabbb18e1e737e3044dbdcdc273067933849d5
?>

<!-- PENDENTE: Se o usuário já estiver logado, redirecioná-lo para a página de pedidos -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>Livraria CPII - Identificar-se</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container">
			<nav class="navbar navbar-dark bg-dark">
				<h1 class="navbar-brand">Livraria CPII</h1>
			</nav>

		<h1>Bem-vindo à Livraria CPII</h1>
		<p>Por favor, identifique-se:</p>

		<!-- PENDENTE: Exibir mensagens de erro de login vindas do servidor -->
		<?php if ($erro != null) { ?>
<<<<<<< HEAD

			<div class="alert alert-warning">
				<p> Erro: <?= $erro ?> </p>

			</div>
		<?php } ?>



=======
		
			<div class="alert alert-warning">
				<p> Erro: <?= $erro ?> </p>
				
			</div>
		<?php } ?>
		
		
	
>>>>>>> 13dabbb18e1e737e3044dbdcdc273067933849d5

		<form method="POST" action="Controladores/entrar.php">
			<div class="form-group">
				<label>E-mail: <input name="email" type="email" required placeholder="jpsilva@example.net" class="form-control"/></label>
			</div>
			<div class="form-group">
				<label>Senha: <input name="senha" type="password" required minlength="6" maxlength="12" placeholder="******" class="form-control"/></label>
			</div>
			<input type="submit" value="Entrar"/>
		</form>
	</div>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 13dabbb18e1e737e3044dbdcdc273067933849d5
