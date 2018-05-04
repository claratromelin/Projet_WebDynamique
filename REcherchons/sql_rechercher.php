<?php session_start()?>
<?php
$serv="127.0.0.1:8889";
$login="root";
$mdp="root";
$Base="piscine";
$table_compte="ami";
$_SESSION["pseudo"]="aaa";

try{
	$bdd = new PDO('mysql:host=127.0.0.1:8889;
  dbname='.$Base.';charset=utf8','root','root',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	//$connect -> setAttribute(PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
	die('Erreur :'. $e-> getMessage());
}
if(isset($_POST['ajout'])){
	foreach($_POST['ajout'] as $value){

		
		
		$req = $bdd-> prepare('INSERT INTO '. $table_compte .'(pseudo1, pseudo2) VALUES(:pseudo1, :pseudo2)');

$req->execute(array('pseudo1' => htmlspecialchars($_SESSION["pseudo"]), 'pseudo2' => htmlspecialchars($value)));

		if ($req == false) { 
			intl_get_error_message();
		}
	}
}
if(isset($_POST['admini'])){
	foreach($_POST['admini'] as $value2){
				
		
		$req = $bdd-> prepare("UPDATE compte SET type=:type WHERE pseudo='".$value2."'");

$req->execute(array('type' => 'admin'));

		if ($req == false) { 
			intl_get_error_message();
		}
	}
}

header("Location:rechercher.php");
?>