<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />

<link rel="stylesheet" href="bootstrap.css"/>
	<title>
		Edition
	</title>

</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="accueil.php">Accueil</a>
    </div>
    <ul class="nav navbar-nav">
        <li class="active"><a href="profil.php">Mon Profil</a></li>
        <li ><a href="emploie.php">Emplois</a></li>
        <li><a href="resaux.php">Mon Résaux</a></li>
        <li><a href="notifications.php">Notifications</a></li>
        <li><a href="chat/discussion.php">Messagerie</a></li>
        <li><a href="administration.php">Administration</a></li>
        <li><a href="rechercher.php">Rechercher</a></li>
        <li><a href="index1.php">Déconnexion</a></li>
    </ul>
  </div>
</nav>

<div class="container" style="margin-top:50px">
  <h2>Editer mon profil</h2>
  <form method="post" action="sql_editer.php" enctype="multipart/form-data">

    <div class="form-group">
      <label for="localisation">Localisation:</label>
      <input type="text" class="form-control" id="localisation" placeholder="Entrez votre localisation" name="localisation">
    </div>

    <div class="form-group">
      <label for="finetude">Année fin d'étude:</label>
      <input type="text" class="form-control" id="finetude" placeholder="Entrez votre année de fin d'études" name="finetude">
    </div>

    <div class="form-group">
  <label for="formation">Formations:</label>
  <textarea class="form-control" rows="5" id="formation" placeholder="Quelles formations avez vous faites ?" name="formation"></textarea>
    </div>

    <div class="form-group">
  <label for="experience">Experiences:</label>
  <textarea class="form-control" rows="5" id="experience" placeholder="Quelles sont vos experiences ?" name="experience"></textarea>
    </div>

    <div class="form-group">
  <label for="langue">Langues:</label>
  <textarea class="form-control" rows="5" id="langue" placeholder="Quelles langues parlez vous ?" name="langue"></textarea>
    </div>

    <div class="form-group">
  <label for="competence">Compétences:</label>
  <textarea class="form-control" rows="5" id="competence" placeholder="Inscrivez vos compétences ?"name="competence"></textarea>
    </div>

    <div class="form-group">
  <label for="volontariat">Volontariat:</label>
  <textarea class="form-control" rows="5" id="volontariat" placeholder="Avez vous deja fait du volontariat ?" name="volontariat"></textarea>
    </div>

    <div class="form-group">
  <label for="interet">Centres d'interêts:</label>
  <textarea class="form-control" rows="5" id="interet" placeholder="Avez vous des centres d'interêts ?" name="interet"></textarea>
    </div>

    <div class="form-group">
    <label for="pdc">Photo de couverture</label>
    <input type="file" class="form-control-file" id="pdc" name="pdc">
  </div>

  <div class="form-group">
    <label for="pdp">Photo de profil</label>
    <input type="file" class="form-control-file" id="pdp" name="pdp">
  </div>
    
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
	
</body>
</html>
