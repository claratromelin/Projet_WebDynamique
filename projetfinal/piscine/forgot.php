<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
	<link rel="stylesheet" href="bootstrap.css"/>
	<title>Mot de passe oublié</title>
</head>
<body background="photo_connexion.jpg">
<font face="calibri" size="4">
	<div class="container" >
	<h3>Récupérer votre mot de passe:</h3><br>
	<div class=col-md-4 >
	<form method="post" action="passwrd_disc.php">
		<div class="form-group">
  			<label for="account">Pseudo:</label>
  			<input type="text" class="form-control" id="account" placeholder="Entrez votre pseudo" name="account">
			  <label for="mail">Email:</label>
  			<input type="mail" class="form-control" id="mail" placeholder="Entrez votre mail" name="mail">
			  <br><input type="submit" class="btn btn-default" value="Envoyer" />
			<?php 
			if(isset($_GET['error']))
				echo $_GET['error'];
			 ?>
		</div>
	</form>
	</div>
	</div>
	</font>
</body>
</html>