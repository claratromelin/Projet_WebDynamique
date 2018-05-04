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
$serv="127.0.0.1:8889";
$login="root";
$mdp="root";
$Base="piscine";
$table_compte="emploie";

?>

<body>
<font face="calibri" size="4">
<?php
include("menup.php");
?>
<script type="text/javascript">
  var onglet = document.getElementById('empl');
  onglet.setAttribute('class','active');
  
</script>



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