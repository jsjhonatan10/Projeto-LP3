<?php
require_once("../../Tabela/tabelausuario.php");
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
				'visibilidadePublicações' => FILTER_VALIDATE_INT,
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
	$erros[] = "A quantidade de caracteres do nome deve estar entre 3 e 35";
}

	$sobre = $request['sobrenome'];
	
	if($sobre == false)
	{
		$erros[] = "O sobrenome não é válido";
	}
	
	else if ( strlen($sobre) < 3 || strlen($sobre) > 35)
	{
	$erros[] = "A quantidade de caracteres do sobrenome deve estar entre 3 e 35";
	}
	
	$senha = $request['senha'];
	
	if($senha == false)
	{
		$erros[] = "Insira uma senha";
	}
    
	else if ( strlen($senha) < 6 || strlen($senha) > 12 )
	{
		$erros[] = "A quantidade de caracteres da senha deve estar entre 6 e 12";
	}
	
	$confsenha = $request['confirmaSenha'];
	
	if($confsenha == false)
	{
		$erros[] = "Insira a confirmação de senha";
	}
	
	else if ( strlen($confsenha) < 6 || strlen($confsenha) > 12 )
	{
		$erros[] = "O número de caracteres da confirmação de senha deve estar entre 6 e 12";	
	}
	
	
	$termos = $request['aceitaTermos'];
	
	if($termos == false)
	{
		$erros[] = "Aceite os termos de uso";
	}

	
	
	if($senha != $confsenha)
	{
		$erros[] = "Senhas diferentes"; 
	}
	
	
	
	$vis = $request['visibilidadePublicações'];
	
	if ($vis != 1 && $vis != 2 && $vis != 3)
	{
		$erros[] = "Escolha uma opção";
	}
	
	
	$nascimento = $request['dataNasc'];
	$datausuario = DateTime::createFromFormat('Y-m-d', $nascimento);
	if($datausuario == false)
	{
	$erros[] = "Data inválida";
	}
	else {
	$hoje = new DateTime();	
	$dife = $datausuario->diff($hoje);
	$anoscorridos = $dife->y;
	if($anoscorridos < 16)
	{
		$erros[] = "Usuário precisa ter mais de 16 anos";
	
	}
	
	}
	if(buscausuario($request['email'])>0){
			$erros[] = "Email já existe" ;
	}
	 
	if (empty($erros) == true) {
	insereusuario($request);
	header("Location:../../InstaCP2.php");
	
	}
		
		
?>

 

<?php foreach($erros as $msg) { ?>
			<li><?= $msg ?></li>
		<?php } ?>
		



    
	