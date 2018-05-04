<?php session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<link rel="stylesheet" href="bootstrap.css" />
	<title>
		Mon Résaux 
	</title>

</head>
<body>
<font face="calibri" size="4">

<?php include("connexionBDD.php"); 
$table_ami="ami";
$table_nom="compte";
?>
<?php
include("menup.php");
?>
<script type="text/javascript">
  var onglet = document.getElementById('res');
  onglet.setAttribute('class','active');
  
</script>

<div class="container " style="margin-top:50px">

<h1>Mon résaux </h1>


<table class="table">

   <?php
    if($reponse = $bdd-> query('SELECT compte.prenom, compte.nom, compte.profil FROM compte INNER JOIN ami WHERE ((compte.pseudo=ami.pseudo1 AND ami.pseudo2=\''.$_SESSION['pseudo'].'\') OR (compte.pseudo=ami.pseudo2 AND ami.pseudo1=\''.$_SESSION['pseudo'].'\'))'))
    {
      if(isset($reponse)){
        echo "<tr>
        <th class='text-center' >Nom</th>
        <th class='text-center'>Prenom</th>
        <th >Photo</th>
        </tr>";
        while($donnees = $reponse-> fetch())
        {
          $photo="";

          if($donnees['profil']!="")
          {
            $photo=$donnees['profil'];
            //echo"1";
          }
          else
          {
             $photo="profil_null.gif";
             //echo"2";
          }
          echo "<tr>";
          echo "<td class='text-center'>".$donnees['prenom']."</td>";
          echo "<td class='text-center'>".$donnees['nom']."</td>";
          echo ('<td> <img src='.$photo.' alt="photo de profil" class="img-circle" width="100" height="100"> </td>');
          //echo ('<img src="DOSSIER/DOSSIER QUI CONTIENT MES IMAGES/'.$votesmax.' style="height140px" />');
          echo "</tr>";
        }
        $reponse->closeCursor();
      }
      else
      {
        echo "Vous n'avez pas d'amis... haha";
      }
    }
    else
    {
      echo "Impossible de trouver vos amis !";
    }
   ?>
</table>

</div>
</font>
</body>
</html>