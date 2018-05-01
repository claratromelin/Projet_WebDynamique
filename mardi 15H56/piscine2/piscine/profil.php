<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<link rel="stylesheet" href="notifications.css" />
	<title>
		Mon profil
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
<h1>Mon profil</h1>

<?php

$serv="127.0.0.1:8889";
$login="root";
$mdp="root";
$Base="piscine";
$table_compte="compte";

$connect=mysqli_connect($serv,$login,$mdp,$Base);
   $sql = "SELECT * FROM compte WHERE id_compte=16";
    // si valuer est int : titre=".$ti;
    $result=mysqli_query($connect,$sql);
    if($result)
    {
      

      while($data=mysqli_fetch_assoc($result)){
     
     echo  "<img src=".$data['couverture']." alt='photo de couverture' id='couv'/> ";
     echo  "<img src=".$data['profil']." alt='photo de profil' id='prof'/> ";

   
      }
    }

?>

</body>
</html>