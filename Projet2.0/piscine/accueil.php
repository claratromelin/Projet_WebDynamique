<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<link rel="stylesheet" href="bootstrap.css" />
	<title>
		Accueil
	</title>

</head>
<body>

<font face="calibri" size="4">

<?php
include("menup.php");
?>

<div class="container " style="margin-top:50px">

<h1>Accueil</h1>

<div class="container">
<form method="post" action="sql_accueil.php" enctype="multipart/form-data">

   
  <div class="form-group">
  <label for="descripitif">Que voulez vous dire?</label>
  <textarea class="form-control" rows="5" id="descripitif" placeholder="Que voulez vous dire?" name="descripitif"></textarea>
    </div>
<div class="form-group">
   <label for="photocom">Postez une photo:</label><br />
     <input type="file" name="photocom"  /><br/><br/>
   </div>

   <div class="form-group">
  <label for="video_file">Postez une video (tous formats | max. 1 Mo) :</label><br />
  <input  name="video_file" type="file"> </br>
</div>

<div class="form-group">
    <label for="selection"> A qui partager le contenu :</label><br />

    <input type="radio" name="selection" value="public"> Public <br>
  <input type="radio" name="selection" value="ami"> Ami <br>
  <input type="radio" name="selection" value="select"> Ami selectionner <br>
</div>

  <div class="form-group">
   <label for="amiprecis">Entrez des amis seulement pour le dernier cas :</label>
   <br/> <textarea name="amiprecis" rows="5" class="form-control" placeholder="Entrez des amis seulement pour le dernier cas :" > </textarea> 

 
</br>
   <input type="submit" class="btn btn-Default" value="Envoyez" />
 </br>
 </br>
</form>
</div>
<?php 

include('connexionBDD.php');

$reponse0 = $bdd->query('SELECT filactu.type AS type FROM filactu INNER JOIN ami WHERE ((filactu.pseudo=ami.pseudo2 AND ami.pseudo1=\'aa\') OR (filactu.pseudo=ami.pseudo1 AND ami.pseudo2=\'aa\'))');
if(isset($reponse0))
{

  if($donnees0 = $reponse0-> fetch())
  {
    //if($donnees0['type']!='public' and $donnees0['type']!='select')
    //{
     $reponse1 = $bdd-> query('SELECT filactu.pseudo, filactu.texte AS texte ,filactu.video AS video,filactu.photo AS photo FROM filactu INNER JOIN ami WHERE ((filactu.pseudo=ami.pseudo2 AND ami.pseudo1=\'aa\') OR (filactu.pseudo=ami.pseudo1 AND ami.pseudo2=\'aa\')) ORDER BY filactu.id_publi DESC');
if(isset($reponse1))
{


  while($donnees1 = $reponse1-> fetch())
  {
    echo"<div class='well'>";
      if($donnees1['texte']!="")
      {
    echo"Publication: ".$donnees1['texte'];
      echo"<br>";
      }
       if($donnees1['photo']!="")
      {
    echo  " <img src=".$donnees1['photo']." alt='photo' width='304' height='236' /> ";
echo"<br>";
      }
       if($donnees1['video']!="")
      {
         echo"<video width=\"320\" height=\"240\" controls>
  <source src=".$donnees1['video']." type=\"video/mp4\">
  <source src=".$donnees1['video']." type=\"video/ogg\">
Your browser does not support the video tag.
</video>";
echo"<br>";

      }


$reponse2 = $bdd->query('SELECT nom, prenom FROM compte WHERE pseudo=\''.$donnees1['pseudo'].'\'');
while($donnees2 = $reponse2-> fetch())
  {
      if($donnees1['texte']!=""OR $donnees1['video']!="" OR $donnees1['photo']!="")
      {
              echo"<br>";
      echo"<strong> Publier par :";
      echo"<br>";
 echo" Prenom ".$donnees2['prenom'];
 echo"<br>";
  echo"Nom ".$donnees2['nom'];
 echo"</strong><br>";
  echo"<br>";
   echo"<br>";

 //echo "Nom".$donnees1['nom'];
}
}
echo"</div>";

}
}
else{
  echo"faux";
}
   // }
    
  }
}

$reponse3 = $bdd->query('SELECT type FROM filactu ');
if(isset($reponse3))
{

  if($donnees3 = $reponse3-> fetch())
  {
    if($donnees3['type']!='ami' and $donnees3['type']!='select')
    {
      $reponse4 = $bdd-> query('SELECT filactu.pseudo AS pseudo, filactu.texte AS texte ,filactu.video AS video,filactu.photo AS photo FROM filactu FULL JOIN ami ON ((filactu.pseudo = ami.pseudo2 AND ami.pseudo1=\'aa\' WHERE filactu.pseudo IS NULL) OR (filactu.pseudo = ami.pseudo1 AND ami.pseudo2=\'aa\' WHERE filactu.pseudo IS NULL) OR (filactu.pseudo = ami.pseudo2 AND ami.pseudo1=\'aa\' WHERE ami.pseudo2 IS NULL) OR (filactu.pseudo = ami.pseudo1 AND ami.pseudo2=\'aa\' WHERE ami.pseudo1 IS NULL))  ORDER BY filactu.id_publi DESC');
if($reponse4)
{

  while($donnees4 = $reponse4->fetch())
  {
    
      if($donnees4['texte']!="")
      {
    echo"Publication ".$donnees4['texte'];
      echo"<br>";
      }
       if($donnees4['photo']!="")
      {
    echo  "Photo <img src=".$donnees4['photo']." alt='photo' /> ";
echo"<br>";
      }
       if($donnees4['video']!="")
      {
         echo"<video width=\"320\" height=\"240\" controls>
  <source src=".$donnees4['video']." type=\"video/mp4\">
  <source src=".$donnees4['video']." type=\"video/ogg\">
Your browser does not support the video tag.
</video>";
echo"<br>";



      }


$reponse5 = $bdd->query('SELECT nom, prenom FROM compte WHERE pseudo=\''.$donnees4['pseudo'].'\'');
while($donnees5 = $reponse5-> fetch())
  {
      if($donnees4['texte']!=""OR $donnees4['video']!="" OR $donnees4['photo']!="")
      {
      
 echo"Prenom ".$donnees5['prenom'];
 echo"<br>";
  echo"Nom ".$donnees5['nom'];
 echo"<br>";
  echo"<br>";
   echo"<br>";

 //echo "Nom".$donnees1['nom'];
}
}


}
}
else{
  echo"Aucune publication. Allez vous faire des amis: ";
  echo"<a href='rechercher.php'>Rechercher des amis !</a>";
}
    }
    
  }
}

//$reponse1->closeCursor();
?>
</div>
</font>

</body>
</html>