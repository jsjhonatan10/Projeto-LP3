<?php
// Arquivo para inicializar o banco de dados.
// Deve ser executado uma única vez, quando o banco de dados é criado no SGBD.

require('TabelaContatos.php');


$bd = CriaConexãoBd();


// 1 - Cria a tabela no banco de dados:
$sql = 'CREATE TABLE Contatos(
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			nome VARCHAR(255) NOT NULL UNIQUE,
			email VARCHAR(255) UNIQUE,
			tel VARCHAR(50) UNIQUE,
			dataNasc DATE
		)';

$bd->exec($sql);


// 2 - Popula a tabela com alguns contatos iniciais:
$bd->exec(
	"INSERT INTO Contatos (nome, tel, email, dataNasc) VALUES
	(      'Ana Clara', '+55 (21) 2222-2222', 'anaclara@example.net', '1998-02-01'),
	('Ricardo Almeida', '+351 (226) 837-125', 'ralmeida@example.net', '1992-09-27'),
	(   'Dalva Santos', '+258 (84) 629-4862',   'santos@example.net', '1997-11-16');"
);

echo 'Banco de dados inicializado com sucesso.';

?>