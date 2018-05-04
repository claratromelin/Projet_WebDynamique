<?php  
echo"<div class='container' style='margin-top:70px'>";
$req1 = $bdd->query('SELECT compte.pseudo AS pseudo, compte.prenom AS prenom, compte.nom AS nom, compte.profil AS profil FROM compte INNER JOIN ami WHERE ((compte.pseudo=ami.pseudo1 AND ami.pseudo2=\''.$_SESSION['pseudo'].'\') OR (compte.pseudo=ami.pseudo2 AND ami.pseudo1=\''.$_SESSION['pseudo'].'\'))');

echo "<form method=\"POST\" action=\"new_disc.php\">
	<label>Entrer un titre: <input type=\"text\" name=\"titre\"><br>
	trouver votre ami: <select name=\"pseudo\">";

		while($donn = $req1->fetch()){
			echo "<option value=".$donn['pseudo']."><img src=".$donn['profil']." alt=\"photo de profil\"> ".$donn['prenom']." ".$donn['nom']."</option>";
		}

echo	"</select><br></label>
		<input type=\"submit\" value=\"Nouvelle discussion\">
</form>";

$req = $bdd->query("SELECT discussion.id_discussion AS id, discussion.titre AS titre FROM discussion LEFT JOIN message ON discussion.id_discussion=message.id_discussion WHERE discussion.pseudo1='".$_SESSION['pseudo']."' OR discussion.pseudo2='".$_SESSION['pseudo']."' GROUP BY discussion.id_discussion ORDER BY message.id_message, discussion.id_discussion DESC");
while($donnees = $req->fetch()){
	echo"</div>";
	?>
<div class="container" style="margin-top:70px">
	<a href="discussion.php?change=<?php echo $donnees['id'];?>" >
		<h4><?php echo $donnees['titre'];?></h4>
	</a>
</div>
	<?php
}
?>
