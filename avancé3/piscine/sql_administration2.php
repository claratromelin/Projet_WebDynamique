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

		if ($req == false) { 
			intl_get_error_message();
		}
	}
}

header("Location:administration.php");
?>