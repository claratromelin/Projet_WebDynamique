<?php session_start(); 
$_SESSION['pseudo']="aaa";
$_SESSION['type']="admin";

?>
<!DOCTYPE html>
<html>
    <head>
	    <meta charset="utf-8" />
        <link rel="stylesheet" href="bootstrap.css" />
        <title>
		    Rechercher 2
	    </title>
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

   $sql ="SELECT * FROM compte WHERE prenom LIKE '%$requete%' OR nom LIKE '%$requete%'";

  $sql2='SELECT * FROM ami WHERE \''.$_SESSION['pseudo'].'\'=pseudo2  AND \''.$requete .'\'=pseudo1 ';
  $sql3='SELECT * FROM ami WHERE \''.$_SESSION['pseudo'].'\'=pseudo1  AND \''.$requete .'\'=pseudo2 ';

 $result2=mysqli_query($connect,$sql2);
$result3=mysqli_query($connect,$sql3);

    $result=mysqli_query($connect,$sql);
    if($result)
    {
      

      while($data=mysqli_fetch_assoc($result)){
        if(($data['nom'])!="" or ($data['prenom'])!="")
{

         echo "<tr>";
       echo"<td>".$data['nom']."</td>";
       echo "<td>".$data['prenom']."</td>";
       echo "<td>  <p>  <input type='submit' value=".$data['pseudo']." name='ajout[]'/> </p> </td>";
      

       
       $bool = false; 
       if($result3)
       {
        while($data3=mysqli_fetch_assoc($result3) ){
             if(($data3['pseudo1'])!="" or  ($data3['pseudo2'])!="")
        {

          echo "<td> deja ami </td>";
         // echo "</tr>";
         
       }
       
        }
        
        }
          if($result2)
       {
        while($data2=mysqli_fetch_assoc($result2)){
             if(($data2['pseudo1'])!="" or ($data2['pseudo2'])!="")
        {

          echo "<td> deja ami </td>";
         // echo "</tr>";
          
       }
       
        }

        }
       if ( $bool==false) 
       {
          echo "<td> pas ami </td>";
         // echo "</tr>";
          
       }
       
        if($_SESSION['type']=="admin")
       {
        echo "<td>  <p>  <input type='submit' value=".$data['pseudo']." name='admini[]'/> </p> </td>";
        echo "</tr>";

       }
    
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

