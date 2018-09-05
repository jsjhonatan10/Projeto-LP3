<?php
	function CriaConexãoBd() : PDO
	{
		$bd = new PDO('mysql:host=localhost;dbname=agendacontatos;charset=utf8', 'agendacontatos', '123');

		$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $bd;
	}


	// Retorna um vetor com os dados do usuário (ou `false` se não encontrar).
	function ListaContatos()
	{
		$db = CriaConexãoBd();

		$resultado = $db->query('SELECT * FROM Contatos ORDER BY nome ASC');

		return $resultado->fetchAll();
		// Retornar diretamente o resultado de `fetch()` neste ponto só funciona
		// nesse caso porque nós estamos usando exatamente os mesmos nomes nas
		// colunas da tabela do banco de dados e na nossa aplicação.
	}
	
	function calculamed($x,$y)
	{
	}
	
	function InsereContato($dadosNovoContato){		
	$bd = CriaConexãoBd();
	
	$sql = $bd -> prepare(
	"INSERT INTO contatos (nome, tel, email, dataNasc)
	Values (:valNome, :valTelefone, :valEmail, :valdataNasc);");
	
	$sql -> bindValue(':valNome', $dadosNovoContato['nome']);
	$sql -> bindValue(':valTelefone', $dadosNovoContato['tel']);
	$sql -> bindValue(':valEmail', $dadosNovoContato['email']);
	$sql -> bindValue(':valdataNasc', $dadosNovoContato['dataNasc']);
	
	$sql->execute();
	}
	
?>