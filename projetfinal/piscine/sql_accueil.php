<?php
session_start();
$serv="127.0.0.1:8889";
$login="root";
$mdp="root";
$Base="piscine";
$table_compte="filactu";

try{
	$bdd = new PDO('mysql:host=127.0.0.1:8889;
  dbname='.$Base.';charset=utf8','root','root',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	//$connect -> setAttribute(PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
	die('Erreur :'. $e-> getMessage());
}

$_SESSION["pseudo"]=aa;


$req = $bdd-> prepare("INSERT INTO filactu (texte, photo, video,type,pseudo,selection) VALUES(:texte, :photo, :video,:type,:pseudo,:selection)");

$req->execute(array('texte' => htmlspecialchars($_POST['descripitif']),'photo' => htmlspecialchars($_FILES['photocom']['name']), 'video' => htmlspecialchars($_FILES['video_file']['name']),'type' => htmlspecialchars($_POST['selection']),'pseudo' => htmlspecialchars($_SESSION['pseudo']),'selection' => htmlspecialchars($_POST['amiprecis'])));

 header("Location:accueil.php")
?>