<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<link rel="stylesheet" href="bootstrap.css" />
	<title>
		Administration
	</title>

</head>


<?php
include('connexionBDD.php');
?>


<body>
<font face="calibri" size="4">

<?php
include("menup.php");
?>
<script type="text/javascript">
  var onglet = document.getElementById('admin');
  onglet.setAttribute('class','active');
  
</script>



<div class="container " style="margin-top:50px">
<h1>Administration</h1>
<div class="col-md-4">
<h3> Ajout personne</h3>
<form method="post" class="form-horizontal" action="sql_administration.php">
     <div class="form-group">
   <p>  Pseudo <br /> <input type="text" name="pseudo" required/></p>
    
    <p>  Email ECE <br /> <input type="text" name="emailece" required/> </p>
     <p> Mot de passe <br /> <input type="text" name="mdp" required/> </p>
    <p> Nom <br /> <input type="text" name="nom" required/> </p>
     <p> Prénom <br /> <input type="text" name="prenom" required/> </p> 
    <p> Promotion <br /> <input type="number" name="promotion" required/> </p> 
 </div>
 </br>
 <div class="radio">
  <input type="radio" name="types" value="admin"> Administrateur<br>
  <input type="radio" name="types" value="user"> User<br>
</div>
</br>
   <div class="col-sm-offset-2 col-sm-10">
   <input type="submit" class="btn btn-Default" value="Envoyer" />
</div>
</form>
</div>
<div class="col-md-8">

<h3> Supprimer une personne</h3>

<table class="table">
   <tr>
       <th>Prénom</th>
       <th>Nom</th>
       <th>Pseudo</th>
       <th>Année fin d'étude</th>
       <th> Supprimer </th>
   </tr>
<form method="post" action="sql_administration2.php">
   <?php 

   $sql = "SELECT prenom,nom,promotion,pseudo FROM Compte WHERE promotion<2018";
    // si valuer est int : titre=".$ti;
    $result=$bdd->query($sql);
    if($result)
    {
      while($data=$result->fetch()){
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
</table>
 <input type="submit" class="btn btn-Default" value="Supprimer" />

</form>




</div>
</div>
</font>
</body>

</html>
