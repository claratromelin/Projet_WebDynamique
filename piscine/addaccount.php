<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
	<title>Creation of your account</title>
</head>
<body>
	<div id="body">
		<h3>Pour créer un compte, il vous faut entrer un pseudo puis un mail:</h3><br>
	<form method="post" action="sql_acount.php">
		<p>Entrez le pseudo:
			<input type="text" name="pseudo" class="txt"> <br>
			Entrez le mail:
			<input type="text" name="mail" class="txt"> <br>
			Entrez le nom:
			<input type="text" name="nom" class="txt"> <br>
			Entrez le prénom:
			<input type="text" name="prenom" class="txt"> <br>
			
			<!--Tape the password:
			<input type="password" name="password_new" class="txt">
			Confirm your password:
			<input type="password" name="password_confirm" class="txt">
			<br>
			Choose a secret question: 
			<select name="question">
				<option value="question1">What animal would you like to have in your room mate ?</option>
				<option value="question2">What kind of videogame do you play together in your room mate ?</option>
				<option value="question3">What is the faverite plate of your room mate ?</option>
				<option value="question4">In what city is the flat/house of your room mate ?</option>
			</select>
			and tape your answer:
			<input type="text" name="answer" class="txt">-->
			<input type="submit" value="SUBMIT" class="bouton">
		</p>
	</form>
	</div>
</body>
</html>