<?php
	require_once("../../Tabela/conexaobd.php");

	function verificaEmail(string $emaillegal){
	$bd = criaconexaobd();
	$sql = $bd -> prepare (
    "select email from usuario
    where email = :valemail");
    $sql -> bindValue(':valemail', $emaillegal);
    $sql -> execute();
    return $sql -> rowCount();
   }
   
	function buscaSenha(string $emaillegal){
    $bd = criaconexaobd();
    $sql = $bd -> prepare (
      "select senha from usuario
      where email = :valemail");
      $sql -> bindValue(':valemail', $emaillegal);
      $valor	= $sql -> execute();
      $resultado = $sql->fetch();
      return $resultado['senha'];
    }

	$erro = null;
    $_request = array_map('trim', $_REQUEST);
    $_request = filter_var_array(
      $_request,
      [ 'email1' => FILTER_VALIDATE_EMAIL,
		'senha1' => FILTER_DEFAULT ]
    );
    $email = $_request['email1'];
    $senha = $_request['senha1'];
    if ($email == false)
    {
      $erro = "E-Mail não informado";
    }
    else if ($senha == false)
    {
      $erro = "Senha não informada";
    }
    else if (verificaEmail($email)==0){
      $erro = "Nenhum usuário cadastrado com o email informado";
    }
    else if (password_verify($senha, buscasenha($email))==false)
    {
      $erro = "Senha inválida";
	}
	
	if($erro != null){
      session_start();
      $_SESSION['erroLogin'] = $erro;
      header('Location: ../../InstaCP2.php');
    }
    else {
      session_start();
	  $_SESSION['emailUsuarioLogado'] = $email;
      header('Location: ../../Perfil.php');
    }
?>