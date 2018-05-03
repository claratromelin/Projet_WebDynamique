<!DOCTYPE html>
<html>
    <head>
	    <meta charset="utf-8" />
        <link rel="stylesheet" href="notifications.css" />
        <title>
		    Rechercher
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
        <p>rechercher</p>
        <form method="post" action="rechercher.php">
            <input type="text" name="recherche_de_lutilisateur" required/> 
            <input type="submit" name="Rechercher" value="Rechercher" />
        </form>
        

<?php
if(isset($_POST['recherche_de_lutilisateur'])){
       echo " <table>";
            echo "<tr>";
             echo "<th>Nom</th>";
                echo "<th>Prenom</th>";
           echo" </tr>";

$connect=mysql_connect('localhost','root','');
mysql_select_db('piscine',$connect);
  if(!empty($_POST['Rechercher'])){

    
  $recherche=$_POST['Rechercher'];

  $sql='SELECT * FROM compte WHERE nom LIKE "%'.$recherche.'%" OR prenom LIKE "%'.$recherche.'%"';

  $result=mysql_query($sql);
if($result)
{

  while($data=mysql_fetch_assoc($result)){
     echo "<tr>";
     echo"<td>".$data['nom']."</td>";
     echo "<td>".$data['prenom']."</td>";
 
     echo "</tr>";
  }
}
mysql_close(); 

  }
}
 echo "</table>";
?>
        
    </body>
</html>


