<?php

$Base="piscine";

try{
	$bdd = new PDO('mysql:host=localhost;
	dbname='.$Base.';charset=utf8','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	//$connect -> setAttribute(PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
	die('Erreur :'. $e-> getMessage());
}

if(!isset($_SESSION['pseudo'])){
	header('Location:index.php');
}

?>