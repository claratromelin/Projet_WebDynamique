<?php session_start();
include("../connexionBDD.php");
$req =$bdd->prepare("INSERT INTO discussion (pseudo1, pseudo2, titre) VALUES(:pseudo1,:pseudo2, :titre)");
$req->execute(array("pseudo1"=>$_SESSION['pseudo'], "pseudo2"=> $_POST['pseudo'], "titre"=> $_POST['titre']));
$rep = $bdd->query("SELECT id_discussion FROM discussion WHERE pseudo1=".$_SESSION['pseudo']." AND pseudo2=".$_POST['pseudo']." AND titre=".$_POST['titre']);
//while($donn=$rep->fetch()){
	$_SESSION['discu']=$donn['id_discussion'];
//}

header("Location: discussion.php");
?>