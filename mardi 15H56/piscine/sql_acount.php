<?php

/*function cryptage($password,$keyword)
{
	$iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $keyword, utf8_encode($password), MCRYPT_MODE_ECB, $iv);
    return $encrypted_string;
}*/

function cryptage($text,$key) {
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

if(isset($_POST['pseudo']) && isset($_POST['mail']) && htmlspecialchars($_POST['password_new']) == htmlspecialchars($_POST['password_confirm']))
{
	if(strlen($_POST['pseudo'])<255)
	{
		$Base='piscine';
		$table_compte='Compte';
		
		try{
			$bdd = new PDO('mysql:host=localhost;dbname='.$Base.';charset=utf8','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
			//$connect -> setAttribute(PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e){
			die('Erreur :'. $e-> getMessage());
		}

		$req = $bdd-> prepare('INSERT INTO '. $table_compte .'(pseudo, type,nom,prenom,email,mdp, question ,reponse) 
		VALUES(:pseudo, :type,:nom,:prenom,:mail,:mdp,:quest,:rep)');

		$reponse = $bdd-> query('SELECT pseudo FROM '.$table_compte.'');
		$test=false;

		while($donnees = $reponse-> fetch() && $test==false)
		{
			if($donnees['pseudo'] == htmlspecialchars($_POST['pseudo']))
			{
				$test=true;
			}
		}
		$reponse->closeCursor();

		if($test==false)
		{
			if($_POST['password_confirm']==$_POST['password_new']){
				$req->execute(array('pseudo'=>htmlspecialchars($_POST['pseudo']),
				'type'=>'user',
				 'nom'=>htmlspecialchars($_POST['nom']),
				  'prenom'=>htmlspecialchars($_POST['prenom']),
				   'mail'=>htmlspecialchars($_POST['mail']),
				   'mdp'=>cryptage(htmlspecialchars($_POST['password_confirm']),htmlspecialchars($_POST['reponse'])),
					'quest'=> $_POST['question'],
					'rep'=>htmlspecialchars($_POST['reponse'])));
				header('Location: index1.php');
			}
			else{
				header('Location: addaccount.php?error=Le code est incorrect.');
				echo "Le code est incorrect.";
			}
		}
		else
		{
			header('Location: addaccount.php?error=Votre pseudo est déjà utilisé, merci de bien vouloir en choisir un nouveau.');
			echo "Votre pseudo est déjà utilisé, merci de bien vouloir en choisir un nouveau.";
		}
	}
}
else
{
	header('Location: addaccount.php?error=Les informations entrées sont incomplètes.');
	echo "Les informations entrées sont incomplètes";
}
?>