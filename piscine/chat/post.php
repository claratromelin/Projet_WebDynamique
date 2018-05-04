<?php
session_start();
header("Content-Type: text/xml");
include("../connexionBDD.php");

$req=$bdd->prepare('INSERT INTO message (id_discussion, pseudo, textm) VALUES(:id,:pseudo,:textm)');

if($req->execute(array("id"=> $_SESSION['discu'], "pseudo"=> $_SESSION['pseudo'], 'textm' => $_GET['textm'])))
{
	//echo "<script type='text/javascript'>console.log('4')</script>";
		
	if($reponse = $bdd->query("SELECT id_message, pseudo, textm FROM message WHERE id_discussion=".$_SESSION['discu']." ORDER BY id_message ASC"))
	{
		
		/*echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";*/
		echo "<list>";
		while ($donnees = $reponse->fetch()) {
			echo "<soft id_message=\"".$donnees["id_message"]."\" pseudo=\"".$donnees["pseudo"]."\" textm=\"".$donnees["textm"]."\" />";
		}
		echo "</list>";
	}
	else{
		echo "ERREUR !! (post.php)";
	}
}
?>