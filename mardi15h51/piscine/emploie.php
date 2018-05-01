<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<link rel="stylesheet" href="notifications.css" />
	<title>
		Emploie
	</title>

</head>

<?php
$serv="127.0.0.1:8889";
$login="root";
$mdp="root";
$Base="piscine";
$table_compte="emploie";

?>

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
<h1>Emplois</h1>
<h3> Soumettre une offre</h3>
<form method="post" action="sql_emploie.php">
   <p>  Société  <br /> <input type="text" name="societe" required/></p>
    <p>  Descripitif <br /> <textarea name="descripitif" rows="5" cols="50" required> </textarea></p>
   <p> Email <br /> <input type="email" name="mail" required/></p>
   
   <input type="submit" value="Envoyer" />
</form>
<table>
   <tr>
       <th>Société</th>
       <th>Descrpitif</th>
       <th>Email</th>
   </tr>
   <?php 

   $connect=mysqli_connect($serv,$login,$mdp,$Base);
   $sql = "SELECT * FROM emploie";
    // si valuer est int : titre=".$ti;
    $result=mysqli_query($connect,$sql);
    if($result)
    {
      

      while($data=mysqli_fetch_assoc($result)){
         echo "<tr>";
       echo"<td>".$data['societe']."</td>";
       echo "<td>".$data['descriptif']."</td>";
     echo  "<td> <a href=mailto:".$data['mail'].">".$data['mail']."</a> </td>";
   echo "</tr>";
      }
    }

?>
   
</table>

</body>
</html>