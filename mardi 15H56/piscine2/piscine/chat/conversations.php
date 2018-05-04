<script type="text/javascript">
	/*function change(callback,id){
		var xhr = getXMLHttpRequest();
		//console.log("1");
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
				affiche(xhr.responseXML);
			}
		};
		//var message = document.getElementById("messages");
		//var textm = encodeURIComponent(document.getElementById("zone_text").value);
		//var name = encodeURIComponent(document.getElementById("name").value);
		
		xhr.open("GET", "change.php?change="+id, true);
		xhr.send(null);
	}
	function read(oChange){
		
	}*/
</script>

<?php  
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
	?>

	<a href="discussion.php?change=<?php echo $donnees['id'];?>" >
		<h4><?php echo $donnees['titre'];?></h4>
	</a>
	<?php
}
?>
