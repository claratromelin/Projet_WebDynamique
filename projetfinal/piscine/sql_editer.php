<?php
session_start();
$serv="127.0.0.1:8889";
$login="root";
$mdp="root";
$Base="piscine";
$table_compte="compte";

try{
	$bdd = new PDO('mysql:host=127.0.0.1:8889;
  dbname='.$Base.';charset=utf8','root','root',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	//$connect -> setAttribute(PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
	die('Erreur :'. $e-> getMessage());
}
$_SESSION["id"]=11;


$req = $bdd-> prepare("UPDATE compte SET localisation = :localisation, promotion = :promotion ,formation = :formation ,experience = :experience,langue = :langue,competence = :competence,interet = :interet,volontariat = :volontariat,couverture = :couverture,profil = :profil WHERE id_compte=".$_SESSION["id"]);




$req->execute(array('localisation' => htmlspecialchars($_POST['localisation']), 'promotion' => htmlspecialchars($_POST['finetude']), 'formation' => htmlspecialchars($_POST['formation']), 'experience' => htmlspecialchars($_POST['experience']), 'langue' => htmlspecialchars($_POST['langue']), 'competence' => htmlspecialchars($_POST['competence']), 'interet' => htmlspecialchars($_POST['interet']), 'volontariat' => htmlspecialchars($_POST['volontariat']), 'couverture' => htmlspecialchars($_FILES['pdc']['name']), 'profil' => htmlspecialchars($_FILES['pdp']['name'])));

 header("Location:profil.php")
?>