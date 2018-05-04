<?php
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
if(isset($_POST['supr'])){
	foreach($_POST['supr'] as $value){
		
		$req = $bdd-> exec('DELETE FROM compte WHERE pseudo =\''.$value.'\'');
		$req2 = $bdd-> exec('DELETE FROM ami WHERE pseudo1=\''.$value.'\'');
		$req3 = $bdd-> exec('DELETE FROM ami WHERE pseudo2=\''.$value.'\'');
		$req4 = $bdd-> exec('DELETE FROM filactu WHERE pseudo=\''.$value.'\'');
		$req5 = $bdd-> exec('DELETE FROM message WHERE pseudo=\''.$value.'\'');
		$req6 = $bdd-> exec('DELETE FROM discussion WHERE pseudo1=\''.$value.'\'');
		$req7 = $bdd-> exec('DELETE FROM discussion WHERE pseudo2=\''.$value.'\'');

		if ($req == false) { 
			intl_get_error_message();
		}
	}
}

header("Location:administration.php");
?>