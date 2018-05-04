<?php session_start();

include("../connexionBDD.php");

//require_once('./xajax_core/xajax.inc.php');
echo"<link rel='stylesheet' href='../bootstrap.css' />";

echo"<nav class='navbar navbar-inverse navbar-fixed-top'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='../accueil.php'>Accueil</a>
    </div>
    <ul class='nav navbar-nav'>
        <li><a href='../profil.php'>Mon Profil</a></li>
        <li ><a href='../emploie.php'>Emplois</a></li>
        <li><a href='../resaux.php'>Mon Résaux</a></li>
        <li ><a href='../notifications.php'>Notifications</a></li>
        <li class='active'><a href='discussion.php'>Messagerie</a></li>
        <li><a href='../administration.php'>Administration</a></li>
        <li><a href='../rechercher.php'>Rechercher</a></li>
        <li><a href='../index.php'>Deconnexion</a></li>
    </ul>
  </div>
</nav>";



if(isset($_GET['change']))
	$_SESSION['discu']=$_GET['change'];

if(isset($_SESSION['discu'])){
	$req = $bdd->query("SELECT pseudo2, titre FROM discussion WHERE id_discussion=".$_SESSION['discu']);
	while($donnees = $req-> fetch())
	{
		$_SESSION['titre']=$donnees['titre'];
		$_SESSION['pseudo2']=$donnees['pseudo2'];
	}
	$req2 = $bdd->query("SELECT prenom, nom FROM compte WHERE pseudo='".$_SESSION['pseudo2']."'");
	while($donnees2 = $req2-> fetch())
	{
		$_SESSION['nom2']=$donnees['nom'];
		$_SESSION['prenom2']=$donnees['prenom'];
	}
}

include("conversations.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<div class="container" style="margin-top:50px">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<title>Discussion</title>
	<script type="text/javascript" src="oXHR.js"></script>
	<script type="text/javascript">

	function getmessage(callback){
		console.log('oups');
		var xhr = getXMLHttpRequest();
		console.log("1");
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
				affiche(xhr.responseXML);
			}
		};
		//var message = document.getElementById("messages");
		//var textm = encodeURIComponent(document.getElementById("zone_text").value);
		//var name = encodeURIComponent(document.getElementById("name").value);
		
		xhr.open("GET", "receive.php?", true);
		xhr.send(null);
	}

	function affiche(oData) {
		if(oData!=""){
			//console.log(oData);
			//textm.value="";
			//var XMLDoc = oData.getElementById('list');
			//var XMLDoc = oData.responseXML;
			//console.log(oData);
			var nodes = oData.getElementsByTagName("soft");
			var oMessage = document.getElementById("messages");
			var oBulle, oTitre, oPara;
			
			oMessage.innerHTML = "";
			for (var i=0; i<nodes.length; i++) {
				//console.log('5');
				var pseudo= nodes[i].getAttribute("pseudo");
				oDiv = document.createElement("div");
				if(pseudo == '<?php echo $_SESSION['pseudo']?>')
					oDiv.setAttribute('class','bulle1');
				else
					oDiv.setAttribute('class','bulle2');
				//oDiv.setAttribute('class','bulle2');
				oTitre = document.createElement("h4");
				oTitre.textContent = pseudo;
				oPara  = document.createTextNode(nodes[i].getAttribute("textm"));
				
				oDiv.appendChild(oTitre);
				oDiv.appendChild(oPara);
				oMessage.appendChild(oDiv);
			}
		}
	}

	function request() {
		var xhr = getXMLHttpRequest();
		console.log("1");
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
				callback(xhr.responseXML);
			}
		};
		//var message = document.getElementById("messages");
		var textm = encodeURIComponent(document.getElementById("zone_text").value);
		//var name = encodeURIComponent(document.getElementById("name").value);
		
		xhr.open("GET", "post.php?textm=" + textm, true);
		xhr.send(null);
	}

	function readData(oData) {
		console.log('2');
		//alert(oData);

		var textm = document.getElementById('zone_text');
	    if(oData!="ERREUR !! (post.php)"){
			//console.log(oData);
			textm.value="";
			//var XMLDoc = oData.getElementById('list');
			//var XMLDoc = oData.responseXML;
			//console.log(oData);
			var nodes = oData.getElementsByTagName("soft");
			var oMessage = document.getElementById("messages");
			var oBulle, oTitre, oPara;
			
			oMessage.innerHTML = "";
			for (var i=0; i<nodes.length; i++) {
				//console.log('5');
				var pseudo= nodes[i].getAttribute("pseudo");
				oDiv = document.createElement("div");
				if(pseudo == '<?php echo $_SESSION['pseudo']?>')
					oDiv.setAttribute('class','bulle1');
				else
					oDiv.setAttribute('class','bulle2');
				//oDiv.setAttribute('class','bulle2');
				oTitre = document.createElement("h4");
				oTitre.textContent = pseudo;
				oPara  = document.createTextNode(nodes[i].getAttribute("textm"));
				
				oDiv.appendChild(oTitre);
				oDiv.appendChild(oPara);
				oMessage.appendChild(oDiv);
			}
		}
		else
		{
			alert(oData);
		}
	}
	</script>
</head>
</div>

<body>
<div class="container" style="margin-top:50px">

	<?php
if(isset($_SESSION['discu']))
{
	if(isset($_SESSION['titre']))
	{
		echo "<h1>".$_SESSION['titre']."</h1>";
	}
	else
	{
		echo "<h1>Discussion avec ".$_SESSION['pseudo2']."</h1>";
	}
	?>
	<h1></h1>
	<fieldset >
	<div id="messages" overflow-x:scroll>
		
		<?php
			$req3 = $bdd->query("SELECT message.textm AS textm, message.pseudo AS pseudo, compte.profil AS profil FROM message INNER JOIN compte ON message.pseudo=compte.pseudo WHERE id_discussion=".$_SESSION['discu']." ORDER BY id_message ASC");
			while($donnees3 = $req3-> fetch())
			{
				if($donnees3['pseudo']==$_SESSION['pseudo'])
				{
					echo "<div class='bulle1'>
					<img src='..' alt=\"photo de profil\">
					<h4>".$donnees3['pseudo']."</h4>
					<p>".$donnees3['textm']."</p>
					</div>";
				}
				else
				{
					echo "<div class='bulle2'>
					<h4>".$donnees3['pseudo']."</h4>
					<p>".$donnees3['textm']."</p>
					</div>";
				}
			}
		?>
	
	</div>
	</fieldset>
	<fieldset>
		<div id="envoie">
			<textarea id="zone_text"></textarea><br>
			<input type="button"  onclick="request(readData);" value="Envoyer" id="post" />
		</div>
	</fieldset>
	<?php 
}
	?>
	<script type="text/javascript">
		var repeat = window.setInterval(getmessage,1000);
		//console.log("test");
	</script>
</div>
</body>

</html>