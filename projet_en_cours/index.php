<?php session_start(); session_destroy(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
	<link rel="stylesheet" href="bootstrap.css"/>
	<title>Connection</title>
</head>
<body background="photo_connexion.jpg">
	<!--<div id="header">
		<img src="logo_easycoloc.png" height="240px" width="340px" id="logo">
	</div>-->
	<font face="calibri" size="4">
	<div class="container" >
	<div class=row>
 
 

	<div id="authentification">
		<h2>BIENVENUE ! </h2>
		<br>
		<div class=col-md-4 >
		
		<form method="post" action="verif_access.php" >

			<div class="form-group">
  			<label for="text_name">Pseudo:</label>
  			<input type="text" class="form-control" id="text_name" placeholder="Entrez votre pseudo" name="text_name">
  			<label for="mail">Email:</label>
  			<input type="text" class="form-control" id="mail" placeholder="Entrez votre mail" name="mail">
  			<label for="password_secret">Mot de passe:</label>
  			<input type="password" class="form-control" id="password_secret" placeholder="Entrez votre mail" name="password_secret"> <br>
  			<input type="submit" class="btn btn-default" value="Je me connecte" />
  			<?php 
				if(isset($_GET['error']))
					echo $_GET['error']; ?><br>
			</p>
			</div>
			</form>
			


		<form action="addaccount.php">
		
			<div class="form-group">
			

				<input type="submit" class="btn btn-default" value="Créer un compte" />
			
			</div>
		</form>
		
		<form action="forgot.php">
		<div class="form-group">
			
		<input type="submit" class="btn btn-default" value="Mot de passe oublié?" />
			
			</div>
		</form>
		
		</div>
		<div class= col-md-offset-4 col-md-4 >
		<img src="photo_logo_connexion.png">
		</div>	
		</div>
		</div>
		
	</div>	
	</font>
</body>
</html>

<?php /* Création du tableau des perso: 
CREATE TABLE `Projet`.`Collocadonf` ( `Nom_coloc` VARCHAR(255) NOT NULL , `nb_point` INT NOT NULL , PRIMARY KEY (`Nom_coloc`)) ENGINE = InnoDB;
création du tableau des commentaires:
CREATE TABLE `projet`.`commentaires` ( `id` INT NOT NULL AUTO_INCREMENT , `coloc` VARCHAR(255) NOT NULL , `point` INT NOT NULL , `commentaire` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
*/?>