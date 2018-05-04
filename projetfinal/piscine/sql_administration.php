<?php
$serv="127.0.0.1:8889";
$login="root";
$mdp="root";
$Base="piscine";
$table_compte="Compte";

try{
	$bdd = new PDO('mysql:host=127.0.0.1:8889;
  dbname='.$Base.';charset=utf8','root','root',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	//$connect -> setAttribute(PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
	die('Erreur :'. $e-> getMessage());
}

$req = $bdd-> prepare('INSERT INTO '. $table_compte .'(pseudo,email,mdp,nom,prenom,type,promotion) VALUES(:pseudo,:email,:mdp,:nom,:prenom,:type,:promotion)');

$req->execute(array('pseudo' => htmlspecialchars($_POST['pseudo']), 'email' => htmlspecialchars($_POST['emailece']), 'mdp' => htmlspecialchars($_POST['mdp']), 'nom' => htmlspecialchars($_POST['nom']), 'prenom' => htmlspecialchars($_POST['prenom']), 'type' => htmlspecialchars($_POST['types']), 'promotion' => htmlspecialchars($_POST['promotion'])));

header("Location:administration.php")
?>