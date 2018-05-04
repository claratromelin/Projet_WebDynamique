<?php
session_start();
header("Content-Type: text/xml");
include("../connexionBDD.php");
	
if($reponse = $bdd->query("SELECT id_message, pseudo, textm FROM message WHERE id_discussion=".$_SESSION['discu']." ORDER BY id_message ASC"))
{
	
	/*echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";*/
	echo "<list>";
	while ($donnees = $reponse->fetch()) {
		echo "<soft id_message=\"".$donnees["id_message"]."\" pseudo=\"".$donnees["pseudo"]."\" textm=\"".$donnees["textm"]."\" />";
	}
	echo "</list>";
}

?>