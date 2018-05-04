<?php
session_start();
include("connexionBDD.php");

$req = $bdd-> prepare("INSERT INTO filactu (texte, photo, video,type,pseudo,selection) VALUES(:texte, :photo, :video,:type,:pseudo,:selection)");

$req->execute(array('texte' => htmlspecialchars($_POST['descripitif']),'photo' => htmlspecialchars($_FILES['photocom']['name']), 'video' => htmlspecialchars($_FILES['video_file']['name']),'type' => htmlspecialchars($_POST['selection']),'pseudo' => htmlspecialchars($_SESSION['pseudo']),'selection' => htmlspecialchars($_POST['amiprecis'])));

 header("Location:accueil.php")
?>