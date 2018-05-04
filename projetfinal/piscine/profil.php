<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<link rel="stylesheet" href="bootstrap.css" />
	<title>
		Mon profil
	</title>

</head>
<body>
<font face="calibri" size="4">
<?php
include("menup.php");
?>
<script type="text/javascript">
  var onglet = document.getElementById('prof');
  onglet.setAttribute('class','active');
  
</script>


<div class="container" style="margin-top:50px">
<h1>Mon profil</h1>
<?php

$serv="127.0.0.1:8889";
$login="root";
$mdp="root";
$Base="piscine";
$table_compte="compte";

$_SESSION["id"]=11;

$connect=mysqli_connect($serv,$login,$mdp,$Base);
   $sql = "SELECT * FROM compte WHERE id_compte=".$_SESSION["id"];
    // si valuer est int : titre=".$ti;
    $result=mysqli_query($connect,$sql);
    if($result)
    {
      

      while($data=mysqli_fetch_assoc($result)){
     echo"<div class='row'>";
    echo  "<img src=".$data['couverture']." alt='photo de couverture' id='couv' width=800 height=250/> ";
    echo"<div class=col-md-4 >";
    echo  "<br><img src=".$data['profil']." alt='photo de profil' id='prof' width=160 height=160 class=pull-left/></br>";
    echo"<br><br> <form method='post' action='editer.php'>";
    echo"<button class='btn btn-default'>Editer mon profil</button>";
    echo"</form>";
    echo"</div>";
    echo"<div class=col-md-4 >";
    echo"<br><div class='well'>";
     echo "".$data['nom']."";
     echo "<br>".$data['prenom']."";
     echo "<br>Statut: ".$data['type']."";
     echo "<br>".$data['localisation']."";
     echo"</div>";
     echo"<div class='well'>";
     echo "Diplomé en ".$data['promotion']."";
     echo "<br>Formation: ".$data['formation']."";
     echo "<br>Experiences: ".$data['experience']."";
     echo "<br>Volontariat: ".$data['volontariat']."";
     echo "<br>Langues: ".$data['langue']."";
     echo "<br>Compétences: ".$data['competence']."";
     echo "<br>Centres d'intêrets: ".$data['interet']."";
     echo"</div>";
    echo"</div>";
    echo"</div>";
    


   
      }
    }

?>
</div>
</font>
</body>
</html>