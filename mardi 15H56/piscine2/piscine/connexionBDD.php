<?php
$Base='piscine';

try{
			$bdd = new PDO('mysql:host=127.0.0.1:8889;
  dbname='.$Base.';charset=utf8','root','root',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
			//$connect -> setAttribute(PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e){
			die('Erreur :'. $e-> getMessage());
		}

?>