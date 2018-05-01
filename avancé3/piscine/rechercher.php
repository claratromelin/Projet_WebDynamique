<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<link rel="stylesheet" href="notifications.css" />
    <title>
		rechercher
	</title>
</head>

<?php
$serv="localhost";
$login="root";
$mdp="root";
$Base="piscine";
$table_compte="compte";

?>

<body>
<div class="menufixe">
    <ul>
        <li><a href="profil.php">Mon Profil</a></li>
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="resaux.php">Mon Résaux</a></li>
        <li><a href="emploie.php">Emplois</a></li>
        <li><a href="notifications.php">Notifications</a></li>
        <li><a href="messagerie.php">Messagerie</a></li>
        <li><a href="administration.php">Administration</a></li>
        <li><a href="rechercher.php">Rechercher</a></li>
    </ul>
</div>

<form method="post" action="sql_rechercher.php">
   
<input type="text" name="recherche_de_l'utilisateur" required/>

<input type="submit" value="Rechercher" />
</form>
        

</body>
</html>
