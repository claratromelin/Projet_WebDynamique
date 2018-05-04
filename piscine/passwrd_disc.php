<?php session_start()?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
	<title>Répondre à la question</title>
</head>
<body>
	<h3>Maintenant répondez à votre question secrète</h3><br>
	<?php
		
		$table_compte='compte';
		$email="";
		$pseudo="";
		$quest="";
		$mdp="";
		$rep="";
		include("connexionBDD.php");

		$pass=null;
		$rep=null;
		$reponse = $bdd-> query('SELECT pseudo, email, mdp, question, reponse FROM '.$table_compte.' WHERE pseudo=\''.$_POST['account'].'\'');
		while($donnees = $reponse-> fetch())
		{
			$email=$donnees['email'];
			$pseudo=$donnees['pseudo'];
			$quest=$donnees['question'];
			$mdp=$donnees['mdp'];
			$rep=$donnees['reponse'];
		}
		$reponse->closeCursor();

		if($pseudo == htmlspecialchars(trim($_POST['account'])) && $email == htmlspecialchars(trim($_POST['mail'])))
		{
			if($quest=='question1')
			{
				echo "<h3>Quel est le prénom de votre animal ?</h3>";
			}
			else if($quest=='question2')
			{
				echo "<h3>Quel est le prénom de votre grand-mère ?</h3>";
			}
			else if($quest=='question3')
			{
				echo "<h3>Quel votre lieu préféré pour partir en vacance ?</h3>";
			}
			else if($quest=='question4')
			{
				echo "<h3>Quel est votre film préféré ?</h3>";
			}
			$_SESSION['pass']=$mdp;
			$_SESSION['rep']=$rep;
		}
		else
		{
			header("Location: forgot.php?error= Informations éronnées !");
		}
	?>
	<br>
	<form method="post" action="reponse.php">
		<p>
			<input type="text" name="reponse" class="txt">
			<input type="submit" name="submit" value="Valider" class="bouton"> 
		</p>
	</form>
</body>
</html>