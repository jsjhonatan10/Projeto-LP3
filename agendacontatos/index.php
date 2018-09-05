<?php

	require_once('TabelaContatos.php');

	$erros = [];


	// Processa os dados do formulário (se houver):
	if (! empty($_REQUEST)) {

		// Valida os dados informados pelo usuário:
		$req = array_map('trim', $_REQUEST);
		$req = filter_var_array(
			$req,
			[
				'nome' => [ 'filter' => FILTER_VALIDATE_REGEXP,
				            'options' => [ 'regexp' => '/^[\p{L}\p{Mn}\p{Pd}\'\s]{3,255}$/u' ] ],
				'tel' => [ 'filter' => FILTER_VALIDATE_REGEXP,
				           'options' => [ 'regexp' => '/^(\d{3}-\d{3}-\d{3}$|^\d{4}-\d{4})$/' ] ],
				'email' => FILTER_VALIDATE_EMAIL,
				'dataNasc' => [ 'filter' => FILTER_VALIDATE_REGEXP,
				                'options' => [ 'regexp' => '/^\d{4}-\d{2}-\d{2}$/' ] ],
			]
		);

		foreach ($req as $campo => $valor)
		{
			if ($valor == false)
				$erros[] = "Campo $campo inválido";
		}


		// Se todos os campos foram validados com sucesso, insere o novo contato na agenda:
		if (empty($erros))
		{
			$novoContato = [
				'nome' => $req['nome'],
				'tel' => $req['tel'],
				'email' => $req['email'],
				'dataNasc' => $req['dataNasc']
			];

			// PENDENTE: Inserir novo contato no banco de dados
		}
	}


	// Recupera todos os os contatos salvos na agenda:
	$listaContatos = ListaContatos();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8"/>
	<title>Agenda de contatos</title>
	<link rel="stylesheet" type="text/css" href="<?= basename(__FILE__, '.php') . '.css' ?>"/>
</head>
<body>
	<h1>Agenda de contatos</h1>


	<!-- Exibe mensagens de erro no processamento do formulário (se houver): -->
	<?php if (empty($erros) == false) { ?>
		<p style="background-color: LightRed">
			Erro ao inserir o contato:
			<ul>
				<?php foreach ($erros as $e) { ?>
					<li><?= $e ?></li>
				<?php } ?>
			</ul>
		</p>
	<?php } ?>


	<!-- Lista todos os contatos: -->
	<?php foreach ($listaContatos as $contato) { ?>
		<div>
			<h2><?= $contato['nome'] ?></h2>
			<dl>
				<dt>Tel.</dt>
				<dd><?= $contato['tel'] ?></dd>

				<dt>E-mail</dt>
				<dd><a href="mailto:<?= $contato['email'] ?>"><?= $contato['email'] ?></a></dd>

				<dt>Aniversário</dt>
				<dd><?= $contato['dataNasc'] ?></dd>
			</dl>
		</div>
	<?php } ?>

	<?php if (empty($listaContatos)) { ?>
		<p style="color: Gray">Agenda vazia</p>
	<?php } ?>


	<!-- Formulário para adicionar novo contato: -->
	<h1>Adicionar contato</h1>
	<form method="POST">
		<label>Nome: <input name="nome" required type="text"/></label><br/>
		<label>Tel.: <input name="tel" type="tel"/></label><br/>
		<label>E-Mail: <input name="email" type="email"/></label><br/>
		<label>Data Nasc.: <input name="dataNasc" type="date"/></label><br/>
		<input type="submit" value="Adicionar"/>
	</form>
</body>
</html>