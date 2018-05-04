<?php session_start(); 
$_SESSION['pseudo']="viv";
$_SESSION['type']="user";
$_SESSION['prenom']="vivien";
$_SESSION['nom']="bdz";
?>
<!DOCTYPE html>
<html>
    <head>
	    <meta charset="utf-8" />
        <link rel="stylesheet" href="bootstrap.css" />
        <title>
		    Rechercher 2
	    </title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>



    <body>
   <font face="calibri" size="4">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="accueil.php">Accueil</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="profil.php">Mon Profil</a></li>
        <li ><a href="emploie.php">Emplois</a></li>
        <li><a href="resaux.php">Mon Résaux</a></li>
        <li><a href="notifications.php">Notifications</a></li>
        <li><a href="messagerie.php">Messagerie</a></li>
        <li><a href="administration.php">Administration</a></li>
        <li class="active"><a href="rechercher.php">Rechercher</a></li>
        <li><a href="index1.php">Déconnexion</a></li>
    </ul>
  </div>
</nav>
       

       <div class="container " style="margin-top:50px"> 

<table class="table">
   <tr>
       <th>Nom</th>
       <th>prenom</th>
       <th> Ajouter </th>
       <th> Deja Ami ? </th>
       <?php
       if($_SESSION['type']=="admin")
       {
        echo"<th> Mettre admin </th>";
       }

       ?>

   </tr>
   <h3> Ajouter </h3>
   <form method="post" action="sql_rechercher.php">
   <?php 
$serv="127.0.0.1:8889";
$login="root";
$mdp="root";
$Base="piscine";
$table_compte="compte";

$connect=mysqli_connect($serv,$login,$mdp,$Base);

$requete = htmlspecialchars($_POST['rechuser']);

$sql ="SELECT * FROM compte WHERE (prenom LIKE '%$requete%' OR nom LIKE '%$requete%') AND (prenom!='".$_SESSION['prenom']."' OR nom!='".$_SESSION['nom']."') GROUP BY id_compte";
$sql1 = "SELECT * FROM compte WHERE prenom LIKE '%$requete%' OR nom LIKE '%$requete%'";

$result=mysqli_query($connect,$sql);
if($result)
{ 
  while($data=mysqli_fetch_assoc($result)){

    $sql2='SELECT * FROM ami WHERE (pseudo2=\''.$_SESSION['pseudo'].'\' AND pseudo1=\''. $data['pseudo'] .'\') OR (pseudo1=\''.$_SESSION['pseudo'].'\' AND pseudo2=\''. $data['pseudo'] .'\')';
    //SELECT * FROM ami WHERE (pseudo2='viv' AND pseudo1='clara') OR (pseudo1='viv AND pseudo2='clara')

    if(($data['nom'])!="" || ($data['prenom'])!="")
    {
      $result2=mysqli_query($connect,$sql2);
      echo "<tr>";
      echo"<td>".$data['nom']."</td>";
      echo "<td>".$data['prenom']."</td>";
      echo "<td>  <p>  <input type='submit' value=".$data['pseudo']." name='ajout[]' /> </p> </td>";
      //$bool = false; 
      echo "<td> <i class=\"";
      if(!empty($result2)){
        while($data2=mysqli_fetch_assoc($result2)){
          if(!empty($data2))
          {
            echo "fa fa-thumbs-up";
          }
          else
          {
            echo "fa fa-square-o";
         // echo "</tr>";
          }
        }
      }
      else
      {
        echo "fa fa-square-o";
     // echo "</tr>";
      }
      echo "\" style=\"font-size:36px;\"></i></td>";
      if($_SESSION['type']=="admin")
      {
        echo "<td>  <p>  <input type='submit' value=".$data['pseudo']." name='admini[]'/> </p> </td>";
      }
      echo "</tr>";
    }
  }
}
?>
   </form>
</table>
</div>
</font>
       
    </body>
</html>

