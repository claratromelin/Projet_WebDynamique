<!DOCTYPE html>
<html>
    <head>
	    <meta charset="utf-8" />
        <link rel="stylesheet" href="bootstrap.css" />
        <title>
		    Rechercher
	    </title>
    </head>



    <body>
        <font face="calibri" size="4">
       <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="accueil.php">Accueil</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="profil.php">Mon Profil</a></li>
        <li ><a href="emploie.php">Emplois</a></li>
        <li><a href="resaux.php">Mon Résaux</a></li>
        <li><a href="notifications.php">Notifications</a></li>
        <li><a href="messagerie.php">Messagerie</a></li>
        <li><a href="administration.php">Administration</a></li>
        <li class="active" ><a href="rechercher.php">Rechercher</a></li>
        <li><a href="index1.php">Déconnexion</a></li>
    </ul>
  </div>
</nav>

<div class="container " style="margin-top:50px">
        <h2>Rechercher</h2>
        <form method="post" action="rechercher2.php">
            <input type="text" name="rechuser" required/> 
            <input type="submit" class="btn btn-Default"  value="Rechercher" />
        </form>
        

     </div>
 </font>
    </body>
</html>


