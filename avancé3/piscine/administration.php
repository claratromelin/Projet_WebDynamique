<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<link rel="stylesheet" href="notifications.css" />
	<title>
		Administration
	</title>

</head>


<?php
$serv="127.0.0.1:8889";
$login="root";
$mdp="root";
$Base="piscine";
$table_compte="Compte";
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
<h1>Administration</h1>
<h3> Ajout personne</h3>
<form method="post" action="sql_administration.php">
   <p>  Pseudo <br /> <input type="text" name="pseudo" required/></p>
    <p>  Email ECE <br /> <input type="text" name="emailece" required/> </p>
     <p> Mot de passe <br /> <input type="text" name="mdp" required/> </p>
    <p> Nom <br /> <input type="text" name="nom" required/> </p>
     <p> Prénom <br /> <input type="text" name="prenom" required/> </p> 
    <p> Promotion <br /> <input type="number" name="promotion" required/> </p> 
 </br>
  <input type="radio" name="types" value="admin"> Administrateur<br>
  <input type="radio" name="types" value="user"> User<br>
</br>
   
   <input type="submit" value="Envoyer" />
</form>
<h3> Supprimer une personne</h3>
<table>
   <tr>
       <th>Prénom</th>
       <th>Nom</th>
       <th>Pseudo</th>
       <th>Année fin d'étude</th>
   </tr>
<form method="post" action="sql_administration2.php">
   <?php 

   $connect=mysqli_connect($serv,$login,$mdp,$Base);
   $sql = "SELECT prenom,nom,promotion,pseudo FROM Compte WHERE promotion<2018";
    // si valuer est int : titre=".$ti;
    $result=mysqli_query($connect,$sql);
    if($result)
    {
      

      while($data=mysqli_fetch_assoc($result)){
         echo "<tr>";
       echo"<td>".$data['prenom']."</td>";
       echo "<td>".$data['nom']."</td>";
       echo "<td>".$data['pseudo']."</td>";
     echo "<td>".$data['promotion']."</td>";

     echo "<td>  <p>  <input type='checkbox' name='supr[]' value=".$data['pseudo']." /> </p> </td>";
   echo "</tr>";
      }
    }

?>
 <input type="submit" value="Supprimer" />
</form>

<!--<form method="post" action="sql_administration2.php">
   <p>  Pseudo <br /> <input type="text" name="pseudo" required/></p>
   
   <input type="submit" value="Supprimer" />
</form>  
-->
</table>

</body>

</html>
