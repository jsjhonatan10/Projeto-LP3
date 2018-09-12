<?php
function criaconexaobd() {
	
	$bd = new PDO ('mysql:host=localhost;dbname=instacp2;charset=utf8', 'instacp2', '1234');
	
	$bd ->setAttribute (PDO :: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	return $bd;	
}  


?>