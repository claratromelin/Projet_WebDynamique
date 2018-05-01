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
		$Base='piscine';
		$table_compte='compte';
		try{
			$bdd = new PDO('mysql:host=localhost;dbname='.$Base.';charset=utf8','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
			//$connect -> setAttribute(PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e){
			die('Erreur :'. $e-> getMessage());
		}

		$pass=null;
		$rep=null;
		$reponse = $bdd-> query('SELECT pseudo, email, mdp, question, reponse FROM '.$table_compte.'');
		while($donnees = $reponse-> fetch())
		{
			if($donnees['pseudo'] == htmlspecialchars($_POST['account']) && $donnees['email'] == htmlspecialchars($_POST['mail']))
			{
				if($donnees['question']=='question1')
				{
					echo "<h3>Quel est le prénom de votre animal ?</h3>";
				}
				else if($donnees['question']=='question2')
				{
					echo "<h3>Quel est le prénom de votre grand-mère ?</h3>";
				}
				else if($donnees['question']=='question3')
				{
					echo "<h3>Quel votre lieu préféré pour partir en vacance ?</h3>";
				}
				else if($donnees['question']=='question4')
				{
					echo "<h3>Quel est votre film préféré ?</h3>";
				}
				$_SESSION['pass']=$donnees['mdp'];
				$_SESSION['rep']=$donnees['reponse'];
			}
			else
			{
				header("Location: forgot.php?error= Informations éronnées !")
			}
		}
		$reponse->closeCursor();
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