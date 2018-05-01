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

$req = $bdd-> prepare('INSERT INTO '. $table_compte .'(localisation, promotion,formation,experience,langue,competence,interet,volontariat,couverture,profil) VALUES(:localisation,:promotion,:formation,:experience,:langue,:competence,:interet,:volontariat,:couverture,:profil)');

$req->execute(array('localisation' => htmlspecialchars($_POST['localisation']), 'promotion' => htmlspecialchars($_POST['finetude']), 'formation' => htmlspecialchars($_POST['formation']), 'experience' => htmlspecialchars($_POST['experience']), 'langue' => htmlspecialchars($_POST['langue']), 'competence' => htmlspecialchars($_POST['competence']), 'interet' => htmlspecialchars($_POST['interet']), 'volontariat' => htmlspecialchars($_POST['volontariat']), 'couverture' => htmlspecialchars($_FILES['pdc']['name']), 'profil' => htmlspecialchars($_FILES['pdp']['name'])));

 header("Location:editer.php")
?>