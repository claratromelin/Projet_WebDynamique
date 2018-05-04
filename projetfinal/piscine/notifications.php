<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
<link rel="stylesheet" href="bootstrap.css" />
	<title>
		Mes Notifications
	</title>

</head>
<body>
<font face="calibri" size="4">
<?php
include("menup.php");
?>
<script type="text/javascript">
  var onglet = document.getElementById('not');
  onglet.setAttribute('class','active');
  
</script>

 <div class="container " style="margin-top:50px">
  <h1>Mes notifications</h1>
<table class="table">
  <form method="post" action="sql_notifications.php">
   <tr>
       <th>Pseudo</th>
       <th>Descrpitif</th>
       <th>Voir</th>
   </tr>
  

<?php 

$serv="127.0.0.1:8889";
$login="root";
$mdp="root";
$Base="piscine";

$_SESSION['pseudo']="aa";

try{
  $bdd = new PDO('mysql:host=127.0.0.1:8889;
  dbname='.$Base.';charset=utf8','root','root',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
  //$connect -> setAttribute(PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
  die('Erreur :'. $e-> getMessage());
}

     $reponse1 = $bdd-> query('SELECT filactu.pseudo AS pseudo, filactu.texte AS texte ,filactu.video AS video,filactu.photo AS photo ,filactu.id_publi AS idpubli FROM filactu INNER JOIN ami WHERE ((filactu.pseudo=ami.pseudo2 AND ami.pseudo1=\'aa\') OR (filactu.pseudo=ami.pseudo1 AND ami.pseudo2=\'aa\')) ORDER BY filactu.id_publi DESC');

if(isset($reponse1))
{

  while($donnees1 = $reponse1-> fetch())
  {
     if(($donnees1['texte']!="" )|| ($donnees1['photo']!="") || ($donnees1['video']!=""))
      {
       echo "<tr>";
       echo"<td>".$donnees1['pseudo']."</td>";
       echo "<td> Notif a voir </td>";
     echo "<td>  <p>  <input class='btn btn-Default' type='submit' value=".$donnees1['idpubli']." name='ajout[]'/> </p> </td>";
   echo "</tr>";

      }

    

}
}
   //}
    
  


?>
 </form>
</table>
</div>
</font>
</body>
</html>