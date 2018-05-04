<?php
include("connexionBDD.php")

$req = $bdd-> prepare('INSERT INTO '. $table_compte .'(pseudo,email,mdp,nom,prenom,type,promotion) VALUES(:pseudo,:email,:mdp,:nom,:prenom,:type,:promotion)');

$req->execute(array('pseudo' => htmlspecialchars($_POST['pseudo']), 'email' => htmlspecialchars($_POST['emailece']), 'mdp' => htmlspecialchars($_POST['mdp']), 'nom' => htmlspecialchars($_POST['nom']), 'prenom' => htmlspecialchars($_POST['prenom']), 'type' => htmlspecialchars($_POST['types']), 'promotion' => htmlspecialchars($_POST['promotion'])));

header("Location:administration.php")
?>