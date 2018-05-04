<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />

<link rel="stylesheet" href="bootstrap.css"/>
	
<title>
    Emploie
  </title>
</head>

<?php
$serv="localhost";
$login="root";
$mdp="";
$Base="piscine";
$table_compte="emploie";

?>

<body>
<font face="calibri" size="4">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="accueil.php">Accueil</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="profil.php">Mon Profil</a></li>
        <li class="active"><a href="emploie.php">Emplois</a></li>
        <li><a href="resaux.php">Mon Résaux</a></li>
        <li><a href="notifications.php">Notifications</a></li>
        <li><a href="chat/discussion.php">Messagerie</a></li>
        <li><a href="administration.php">Administration</a></li>
        <li><a href="rechercher.php">Rechercher</a></li>
        <li><a href="index1.php">Déconnexion</a></li>
    </ul>
  </div>
</nav>



<div class="container " style="margin-top:50px">
  <h2>Emplois disponibles</h2>            
  <table class="table">
    <thead>
      <tr>
        <th>Société</th>
        <th>Descriptif</th>
        <th>Email</th>
      </tr>
    </thead>
    
  
   
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
   </div>
</table>

<div class="container">
<div class="row">
<div class="col-md-8">


<img src="photo_emplois.jpg">
</div>



<div class="col-md-4">
<h2> Soumettre une offre</h2>
<form method="post" action="sql_emploie.php">
<div class="form-group">
      <label for="societe">Localisation:</label>
      <input type="text" class="form-control" id="societe" placeholder="Entrez le nom de la société" name="societe" required>
    </div>

<div class="form-group">
  <label for="descripitif">Descriptif:</label>
  <textarea class="form-control" rows="5" id="descripitif" placeholder="Entrez une description" name="descripitif" required></textarea>
    </div>
    
    <div class="form-group">
    <label for="mail">Mail:</label>
      <input type="email" class="form-control" id="mail" placeholder="Entrez un mail" name="mail" required>
    </div>
   
   <input type="submit" class="btn btn-default" value="Envoyer" />
</form>
</div>

</div>
</div>
</font>
</body>
</html>