<?php
$serv="127.0.0.1:8889";
$login="root";
$mdp="root";
$Base="piscine";
$table_compte="emploie";

try{
	$bdd = new PDO('mysql:host=127.0.0.1:8889;
  dbname='.$Base.';charset=utf8','root','root',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	//$connect -> setAttribute(PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
	die('Erreur :'. $e-> getMessage());
}

$req = $bdd-> prepare('INSERT INTO '. $table_compte .'(societe, descriptif,mail) VALUES(:societe, :descriptif, :mail)');

$req->execute(array('societe' => htmlspecialchars($_POST['societe']), 'descriptif' => htmlspecialchars($_POST['descripitif']), 'mail' => htmlspecialchars($_POST['mail'])));

 echo "<a href='emploie.php'> Retour page </a>";
?>