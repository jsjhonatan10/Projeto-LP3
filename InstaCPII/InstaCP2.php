	<?php
	session_start();


		if(empty($_SESSION['erroLogin']) == false)
		{
			$erro = $_SESSION['erroLogin'];
			unset($_SESSION['erroLogin']);
		}
		else {
			$erro = null;
		}
		
		if ($_SESSION['emailUsuarioLogado'] != "") {
		header('Location: Perfil.php');
		}
	?>
 
 
 
 
 
 <!DOCTYPE html>

<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>InstaCPII</title>
</head>
<body>

	<h1>InstaCPII</h1>

	<!-- TODO: Formulário de login -->
	
	<h2> Login <h2>
	
	<?php if ($erro != null) { ?>

        <div class="alert alert-warning">
          <script>alert("<?= $erro ?>");</script>

        </div>
      <?php } ?>
	
	
	
	
	
	
	
	
	<form method="POST" action = "Controlador/Usuário/entrar.php">
		
		<input name="email1"  required type="email" placeholder="Insira seu Email" /> 
		<br>
		<input name="senha1" minlength="6" maxlength = "12" required type="password" placeholder="Insira sua Senha"/>
		<br>
		<input type="Submit" value="Entrar"/>
	</form>
	
	<br>
	<h2> Cadastro </h2>
	<form method="POST" novalidate action="Controlador/Usuário/Cadastrausuário.php" >
		<input name="nomePróprio" minlength= "3" maxlength= "35" required  type="text" placeholder="Nome próprio" />
		
		<input name="sobrenome" minlength= "3" maxlength= "35" required type="text" placeholder="Sobrenome"/><br/>

		<input name="email"  type="email" required placeholder="E-Mail"/><br/>

		<input name="senha" type="password" required placeholder="Senha"/><br/>

		<input name="confirmaSenha" required type="password" minlength="6" maxlength="12" placeholder="Confirmar senha"/><br/>

		<label>Data de nascimento: <input name="dataNasc" type="date" required/></label><br/>

		<label>
			Quem pode ver as suas publicações?
			<select name="visibilidadePublicações">
				<option value="" selected disabled>Selecione</option>
				<option value="1">Amigos</option>
				<option value="2">Amigos de amigos</option>
				<option value="3">Todos</option>
			</select>
		</label><br/>

		<label><input name="alertasEmail"  type="checkbox"/>Receber alertas por e-mail.</label><br/>

		<label><input name="aceitaTermos" required type="checkbox"/>Li e concordo com os termos de uso e com a política de privacidade.</label><br/>

		<input type="submit" value="Cadastrar"/>
	</form>

</body>
</html>