<?php
$serv="127.0.0.1:8889";
$login="root";
$mdp="root";
$Base="piscine";
$table_compte="filactu";
echo"<link rel='stylesheet' href='bootstrap.css' />";
echo"<font face='calibri' size='4'>";

try{
	$bdd = new PDO('mysql:host=127.0.0.1:8889;
  dbname='.$Base.';charset=utf8','root','root',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
	//$connect -> setAttribute(PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
	die('Erreur :'. $e-> getMessage());
}



include("menup.php");
?>
<script type="text/javascript">
  var onglet = document.getElementById('not');
  onglet.setAttribute('class','active');
  
</script>
<?php

echo"<div class='container' style='margin-top:50px'>";



if(isset($_POST['ajout'])){

	foreach($_POST['ajout'] as $value){

	

		
$req = $bdd-> query('SELECT * FROM filactu WHERE id_publi ='.$value);

if(isset($req))
{


  while($donnees1 =$req-> fetch())
  {
    if($donnees1['pseudo']!="")
      {
        
    echo"Pseudo: ".$donnees1['pseudo'];
      echo"<br>";
      }
      echo"<div class='well'>";
  	
      if($donnees1['texte']!="")
      {
        echo"<h3> Publication </h3>";
    echo"".$donnees1['texte'];
      echo"<br>";
      }
       if($donnees1['photo']!="")
      {
    echo  " <img src=".$donnees1['photo']." alt='photo' /> ";
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


echo"</div>";
}
}

		
	}
}
echo"</div>";
echo"</font>";

//header("Location:notifications2.php");
?>