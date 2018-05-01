<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<link rel="stylesheet" href="notifications.css" />
	<title>
		Edition
	</title>

</head>
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
<h1>Edition</h1>
	<form method="post" action="sql_editer.php" enctype="multipart/form-data">
   <p>  Localisation <br /> <input type="text" name="localisation" required/></p>
   <p>  Année fin d'étude <br /> <input type="number" name="finetude" required/></p>
    <p>  Formation <br /> <textarea name="formation" rows="5" cols="50" required> </textarea></p>
    <p>  Experience <br /> <textarea name="experience" rows="5" cols="50" required> </textarea></p>
    <p>  Langue <br /> <textarea name="langue" rows="5" cols="50" required> </textarea></p>
    <p>  Compétence <br /> <textarea name="competence" rows="5" cols="50" required> </textarea></p>
    <p>  Volontariat <br /> <textarea name="volontariat" rows="5" cols="50" required> </textarea></p>
    <p>  Centre d'interêt <br /> <textarea name="interet" rows="5" cols="50" required> </textarea></p>
     <label for="pdc">Photo de couverture :</label><br />
     <input type="file" name="pdc" id="pdc" /><br />
     <label for="pdp">Photo de profil :</label><br />
     <input type="file" name="pdp" id="pdp" /><br />
     <br />
  
   <input type="submit" value="Envoyer" />
</form>
	
</body>
</html>
