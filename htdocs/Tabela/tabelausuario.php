<?php
require_once("conexaobd.php");

function insereusuario($dadosusuario){
$bd = criaconexaobd();

$sql = $bd -> prepare(
	"INSERT INTO usuario (nome, sobrenome, senha, email, data_nasc, ver_publicacoes, receberalertas )
	Values (:valNome, :valsobrenome, :valsenha, :valemail, :valdata_nasc, :valver_publicacoes, :valreceberalertas);");
	
	$sql -> bindValue(':valNome', $dadosusuario['nomePróprio']);
	$sql -> bindValue(':valsobrenome', $dadosusuario['sobrenome']);
	$sql -> bindValue(':valsenha', $dadosusuario['senha']);
	$sql -> bindValue(':valemail', $dadosusuario['email']);
	$sql -> bindValue(':valdata_nasc', $dadosusuario['dataNasc']);
	$sql -> bindValue(':valver_publicacoes', $dadosusuario['visibilidadePublicações']);
	$sql -> bindValue(':valreceberalertas', $dadosusuario['alertasEmail']);
	
	$sql->execute();
}


?>