<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
	<title>Mot de passe oublié</title>
</head>
<body>
	<h3>Pour avoir accès à votre mot de passe, entrer tout d'abord votre pseudo et votre mail:</h3><br>
	
	<form method="post" action="passwrd_disc.php">
		<p>
			Pseudo: <input type="text" name="account" class="txt">
			Email: <input type="mail" name="mail" class="txt">
			<input type="submit" value="Valider" class="bouton">
			<?php 
			if(isset($_GET['error']))
				echo $_GET['error'];
			 ?>
		</p>
	</form>
</body>
</html>