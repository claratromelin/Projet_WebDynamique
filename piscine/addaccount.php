<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
	<title>Creation de votre compte</title>
</head>
<body>
	<div id="body">
		<h3>Pour créer un compte, il vous faut entrer un pseudo, un mail puis votre mot de passe:</h3><br>
	<form method="post" action="sql_acount.php">
		<p>Entrez le pseudo:
			<input type="text" name="pseudo" class="txt"> <br>
			Entrez le mail:
			<input type="text" name="mail" class="txt"> <br>
			Entrez le nom:
			<input type="text" name="nom" class="txt"> <br>
			Entrez le prénom:
			<input type="text" name="prenom" class="txt"> <br>
			
			Entrer votre mot de passe:
			<input type="password" name="password_new" class="txt">
			Confirmer votre mot de passe:
			<input type="password" name="password_confirm" class="txt">
			<br>
			Choisissez votre question secrète (faite une réponse en un mot):
			<select name="question">
				<option value="question1">Quel est le prénom de votre animal ?</option>
				<option value="question2">Quel est le prénom de votre grand-mère ?</option>
				<option value="question3">Quel votre lieu préféré pour partir en vacance ?</option>
				<option value="question4">Quel est votre film préféré ?</option>
			</select>
			et entrez votre réponse:
			<input type="text" name="reponse" class="txt">
			<input type="submit" value="Valider" class="bouton"><br>
			<?php 
			if(isset($_GET['error']))
				echo $_GET['error']; 
			?>
		</p>
	</form>
	</div>
</body>
</html>