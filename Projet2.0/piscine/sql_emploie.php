<?php
include("connexionBDD.php");

$req = $bdd-> prepare('INSERT INTO '. $table_compte .'(societe, descriptif,mail) VALUES(:societe, :descriptif, :mail)');

$req->execute(array('societe' => htmlspecialchars($_POST['societe']), 'descriptif' => htmlspecialchars($_POST['descripitif']), 'mail' => htmlspecialchars($_POST['mail'])));

header("Location:emploie.php")
?>