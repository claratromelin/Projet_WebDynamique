<?php session_start() ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Quicksand" />
	<title>Now</title>
</head>
<body>
	<?php
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

	if(htmlspecialchars($_POST['reponse'])==$_SESSION['rep'])
	{
		$password=decrypt($_SESSION['pass'],$_POST['reponse']);
	}
	else
	{
		header("Location: index1.php?error=Mauvaise réponse !");
		$password="Mauvaise réponse !";
	}
	?>
	<h3>Your password: <strong><?php echo trim($password); ?></strong></h3><br>
	
	<form action="index.php">
		<p>
			<input type="submit" value="Retour" class="bouton">
		</p>
	</form>
	<?php session_destroy()?>
</body>