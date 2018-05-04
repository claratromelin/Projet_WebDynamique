<?php

/*function cryptage($password,$keyword)
{
	$iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $keyword, utf8_encode($password), MCRYPT_MODE_ECB, $iv);
    return $encrypted_string;
}*/
$Base="piscine";
function cryptage($text,$key) {
	echo "crypt";
	$text_num =str_split("fYfhHeDm",8);
	$text_num = 8-strlen($text_num[count($text_num)-1]);
	for ($i=0;$i<$text_num; $i++) 
		{$text = $text . chr($text_num);}
	$cipher = mcrypt_module_open(MCRYPT_TRIPLEDES,'','cbc','');
	mcrypt_generic_init($cipher, $key, "fYfhHeDm");
	$decrypted = mcrypt_generic($cipher,$text);
	mcrypt_generic_deinit($cipher);
	return base64_encode($decrypted);
}
echo "1";
if(isset($_POST['pseudo']) && isset($_POST['mail']) && htmlspecialchars($_POST['password_new']) == htmlspecialchars($_POST['password_confirm']))
{
	echo "2";
	if(strlen($_POST['pseudo'])<255)
	{
		echo "3";
		$table_compte='compte';

		try{
			$bdd = new PDO('mysql:host=localhost;
			dbname='.$Base.';charset=utf8','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
			//$connect -> setAttribute(PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e){
			die('Erreur :'. $e-> getMessage());
		}

		$req = $bdd-> prepare('INSERT INTO '. $table_compte .'(pseudo, type,nom,prenom,email,mdp, question ,reponse) VALUES(:pseudo, :type,:nom,:prenom,:mail,:mdp,:quest,:rep)');

		$reponse = $bdd-> query('SELECT pseudo FROM '.$table_compte.'');
		$test=false;

		while($donnees = $reponse-> fetch() && $test==false)
		{
			echo "4";
			if($donnees['pseudo'] == htmlspecialchars($_POST['pseudo']))
			{
				$test=true;
			}
		}
		$reponse->closeCursor();

		if($test==false)
		{
			echo "5";
			if(htmlspecialchars(trim($_POST['password_confirm']))==htmlspecialchars(trim($_POST['password_new']))){
				echo "6";
				$req->execute(
					array('pseudo'=>htmlspecialchars($_POST['pseudo']),
					'type'=>'user',
					'nom'=>htmlspecialchars($_POST['nom']),
					'prenom'=>htmlspecialchars($_POST['prenom']),
					'mail'=>htmlspecialchars($_POST['mail']),
					'mdp'=>cryptage(htmlspecialchars($_POST['password_confirm']),htmlspecialchars($_POST['reponse'])),
					'quest'=> $_POST['question'],
					'rep'=>htmlspecialchars($_POST['reponse'])));
				if($req!=false){
					//echo $req;
					//header('Location: index.php?error=Compte ajouté.');
					echo "7";
				}
				else
					echo "pas marcher";
			}
			else{
				header('Location: addaccount.php?error=Le mot de passe est incorrect.');
				echo "Le code est incorrect.";
			}
		}
		else
		{
			header('Location: addaccount.php?error=Votre pseudo est déjà utilisé, merci de bien vouloir en choisir un nouveau.');
			echo "Votre pseudo est déjà utilisé, merci de bien vouloir en choisir un nouveau.";
		}
	}
	else
		header('Location: addaccount.php?error=Votre pseudo est trop long, choisissez une pseudo de moins de 255 charactères.');
}
else
{
	header('Location: addaccount.php?error=Les informations entrées sont incomplètes.');
	echo "Les informations entrées sont incomplètes";
}
?>