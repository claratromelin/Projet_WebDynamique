<?php session_start();?>
<?php

include("connexionBDD.php");

////////////////////                 AJOUT AMIS          //////////////////////
if(isset($_POST['ajout'])){
	foreach($_POST['ajout'] as $value){

		$req = $bdd-> prepare('INSERT INTO ami (pseudo1, pseudo2) VALUES(:pseudo1, :pseudo2)');
		$req->execute(array('pseudo1' => htmlspecialchars($_SESSION["pseudo"]), 'pseudo2' => htmlspecialchars($value)));

		if ($req == false) { 
			intl_get_error_message();
		}
	}
}

/////////////////////      Administration      ///////////////////////////
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