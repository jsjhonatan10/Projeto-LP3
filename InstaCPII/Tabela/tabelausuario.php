<?php
require_once("conexaobd.php");

function insereusuario($dadosusuario){
	$bd = criaconexaobd();
	$sql = $bd -> prepare(
	"INSERT INTO usuario (nome, sobrenome, senha, email, data_nasc, ver_publicacoes, receberalertas )
	Values (:valNome, :valsobrenome, :valsenha, :valemail, :valdata_nasc, :valver_publicacoes, :valreceberalertas);");
	
	if ($dadosusuario['alertasEmail'] == null)
	{
		$dadosusuario['alertasEmail'] = false;
	}
	
	$senha = $dadosusuario['senha'];
	$hash = password_hash($senha, PASSWORD_DEFAULT);
	
	$sql -> bindValue(':valNome', $dadosusuario['nomePróprio']);
	$sql -> bindValue(':valsobrenome', $dadosusuario['sobrenome']);
	$sql -> bindValue(':valsenha', $hash);
	$sql -> bindValue(':valemail', $dadosusuario['email']);
	$sql -> bindValue(':valdata_nasc', $dadosusuario['dataNasc']);
	$sql -> bindValue(':valver_publicacoes', $dadosusuario['visibilidadePublicações']);
	$sql -> bindValue(':valreceberalertas', $dadosusuario['alertasEmail']);
	
	$sql->execute();
	
	
}
function buscausuario(string $emaillegal)
{	
	$bd = criaconexaobd();
	$sql = $bd -> prepare (
	"select email from usuario 
	where email = :valemail
	"
	);
	
	$sql -> bindValue(':valemail', $emaillegal);
	
	$sql -> execute();
	
	return $sql -> rowCount();
	
}

?>