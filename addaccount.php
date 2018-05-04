<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
	<link rel="stylesheet" href="bootstrap.css"/>
	<title>Creation de votre compte</title>
</head>
<body background="photo_connexion.jpg">
<font face="calibri" size="4">
<div class="container" >
	<div class=row>
 <div class=col-md-4 col-md-offset-4>
 

	<div id="body">
		<br>
		<h2>Se créer un compte</h2>
	<form method="post" action="sql_acount.php">
		<div class="form-group">
  			<label for="pseudo">Pseudo:</label>
  			<input type="text" class="form-control" id="pseudo" placeholder="Entrez votre pseudo" name="pseudo">
		
			  <label for="mail">Mail:</label>
  			<input type="text" class="form-control" id="mail" placeholder="Entrez votre mail" name="mail">

		<label for="nom">Nom:</label>
  			<input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" name="nom">

		<label for="prenom">Prenom:</label>
  			<input type="text" class="form-control" id="prenom" placeholder="Entrez votre prénom" name="prenom">
			  
		<label for="password_new">Mot de passe:</label>
  			<input type="text" class="form-control" id="password_new" placeholder="Entrez votre mot de passe" name="password_new">
			  
		<label for="password_confirm">Confirmez votre mot de passe:</label>
  			<input type="text" class="form-control" id="password_confirm" placeholder="Confirmez votre mot de passe" name="password_confirm">

			<label for="question">Choisissez votre question secrète (faite une réponse en un mot):</label>
			<select name="question" class="form-control">
				<option value="question1">Quel est le prénom de votre animal ?</option>
				<option value="question2">Quel est le prénom de votre grand-mère ?</option>
				<option value="question3">Quel votre lieu préféré pour partir en vacance ?</option>
				<option value="question4">Quel est votre film préféré ?</option>
			</select>
			<label for="reponse">Réponse:</label>
			<input type="text" name="reponse" class="form-control" placeholder="Entrez votre réponse">
			<br><input type="submit" value="Valider" class="btn btn-default"><br>
			<?php 
			if(isset($_GET['error']))
				echo $_GET['error']; 
			?>
		</div>
	</form>
	</div>
	</div>
	</div>
	</font>
</body>
</html>