<?php
$erros = [];
		
		$request = array_map('trim', $_REQUEST);

		
		$request = filter_var_array(
			$request,
			[
				'nomePróprio' => FILTER_DEFAULT,
				'sobrenome' => FILTER_DEFAULT,
				'email' => FILTER_VALIDATE_EMAIL,
				'senha' => FILTER_DEFAULT,
				'confirmaSenha' => FILTER_DEFAULT,
				'dataNasc' => FILTER_DEFAULT,
				'visibilidadePublicações' => FILTER_DEFAULT,
				'alertasEmail' => FILTER_VALIDATE_BOOLEAN,
				'aceitaTermos' => FILTER_VALIDATE_BOOLEAN,
			]
		);
		
		$nomePróprio = $request['nomePróprio'];
	if($nomePróprio == false)
	{
		$erros[] = "O nome informado não é válido";
	}
 else if( strlen($nomePróprio) < 3 || strlen($nomePróprio) > 35)
{
	$erros[] = "A quantidade de caracteres deve estar entre 3 e 35";
}
?>


<?php foreach($erros as $msg) { ?>
			<li><?= $msg ?></li>
		<?php } ?>