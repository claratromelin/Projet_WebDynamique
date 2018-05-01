<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
	<title>Connexion</title>
</head>
<body>
	<!--<div id="header">
		<img src="logo_easycoloc.png" height="240px" width="340px" id="logo">
	</div>-->
	<div id="authentification">
		<h2>Pour avoir accès à votre compte, entrez votre pseudo et le mail associé:</h2><br>
		<form method="post" action="verif_access.php">
			<p>
				<input type="text" name="text_name" class="txt">
				<input type="text" name="mail" class="txt">
				<!--<input type="password" name="password_secret" class="txt">-->
				<input type="submit" value="Submit" class="bouton">
			</p>
		</form>
		<form action="addaccount.php">
			<p>
				<input type="submit" value="Céer un compte" class="bouton">
			</p>
		</form>
		<form action="forgot.php">
			<p>
				<input type="submit" value="Avez-vous oublié votre mot de passe ?" class="bouton">
			</p>
		</form>
	</div>
</body>
</html>

<?php /* Création du tableau des perso: 
CREATE TABLE `Projet`.`Collocadonf` ( `Nom_coloc` VARCHAR(255) NOT NULL , `nb_point` INT NOT NULL , PRIMARY KEY (`Nom_coloc`)) ENGINE = InnoDB;
création du tableau des commentaires:
CREATE TABLE `projet`.`commentaires` ( `id` INT NOT NULL AUTO_INCREMENT , `coloc` VARCHAR(255) NOT NULL , `point` INT NOT NULL , `commentaire` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
*/?>