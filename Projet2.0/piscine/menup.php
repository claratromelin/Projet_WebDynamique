<?php

echo"<nav class='navbar navbar-inverse navbar-fixed-top'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='accueil.php'>Accueil</a>
    </div>
    <ul class='nav navbar-nav'>
        <li id='prof'><a href='profil.php'>Mon Profil</a></li>
        <li id='empl'><a href='emploie.php'>Emplois</a></li>
        <li id='res'><a href='resaux.php'>Mon Résaux</a></li>
        <li id='not'><a href='notifications.php'>Notifications</a></li>
        <li id='disc'><a href='chat/discussion.php'>Messagerie</a></li>";
        
if($_SESSION['type']=="admin")
{
		echo"<li id='admin'><a href='administration.php'>Administration</a></li>";
}
        
       echo" <li id='rech'><a href='rechercher.php'>Rechercher</a></li>
        <li><a href='index.php'>Deconnexion</a></li>
    </ul>
  </div>
</nav>";
?>