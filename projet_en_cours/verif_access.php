<?php session_start(); ?>

<?php
/*function decrypt($encrypted_string,$keyword)
{
	$iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $keyword, $encrypted_string, MCRYPT_MODE_ECB, $iv);
    return $decrypted_string;
}*/

function decrypt($encrypted_text,$key){
	$iv="fYfhHeDm";
	$bit_check=8;
	$cipher = mcrypt_module_open(MCRYPT_TRIPLEDES,'','cbc','');
	mcrypt_generic_init($cipher, $key, $iv);
	$decrypted = mdecrypt_generic($cipher,base64_decode($encrypted_text));
	mcrypt_generic_deinit($cipher);
	$last_char=substr($decrypted,-1);
	for($i=0;$i<$bit_check-1; $i++){
	    if(chr($i)==$last_char){
	        $decrypted=substr($decrypted,0,strlen($decrypted)-$i);
	        break;
	    }
	}
	return $decrypted;
}

$table_compte='Compte';

include("connexionBDD.php");

$reponse = $bdd-> query('SELECT * FROM '.$table_compte.'');
$test1=false;
$test2=false;
$test3=false;
//$visit=0;

while($donnees = $reponse-> fetch())
{
	if($donnees['pseudo'] == htmlspecialchars($_POST['text_name']))
	{
		$test1=true;
		$decrypt= decrypt(htmlspecialchars($donnees['mdp']),htmlspecialchars($donnees['reponse']));
		$pass=$_POST['password_secret'];

		if($donnees['email'] == $_POST['mail'])
		{
			$test2=true;

			if(strcmp(trim($decrypt), trim($pass))==0)
			{
				$test3=true;
				$_SESSION['id']=$donnees['id_compte'];
				$_SESSION['nom']=$donnees['nom'];
				$_SESSION['prenom']=$donnees['prenom'];
				$_SESSION['mail']=$donnees['email'];
				$_SESSION['pseudo']=$donnees['pseudo'];
				$_SESSION['profil']=$donnees['profil'];
				$_SESSION['type']=$donnees['type'];
				
				//$_SESSION['formation'] = 'formation_'.$donnees['id_compte'];
				//$_SESSION['experience'] = 'experience_'.$donnees['id_compte'];
				//$_SESSION['volontariat'] = 'volontariat_'.$donnees['id_compte'];
			}
		}
		/*else if(decrypt(htmlspecialchars($donnees['password']),$donnees['reponse']) != $_POST['password_secret'])
			echo " nouvo";
		else if(decrypt(htmlspecialchars($donnees['password']),$donnees['reponse']) !== $_POST['password_secret'])
			echo "out of the if";*/
	}
}
$reponse->closeCursor();

//$modif = $bdd -> prepare('UPDATE '. $table_compte .' SET visits = :incremt WHERE groupe_name = :nom');

if($test1==true)
{
	if($test2==true)
	{
		if($test3==true){
			//$modif->execute(array('incremt' => $visits + 1, 'nom' => htmlspecialchars($_POST['text_name']) ));
			//echo $_SESSION['groupe'];
			//echo "<br>";
			//echo $_SESSION['coment'];
			header('Location: profil.php');///////// a remplir avec la page d'accueil après connexion/////////
		}
		else
		{
			header("Location: index.php?error=Votre mot de passe est incorrect.");
			echo "Votre mot de passe est incorrect.";
		}
	}
	else
	{
		header("Location: index.php?error=Votre mail ne correspond pas.");
		echo "Votre mail ne correspond pas.";
	}
}
else
{
	header("Location: index.php?error=Votre pseudo est introuvable.");
	echo "Votre pseudo est introuvable.";
}

?>