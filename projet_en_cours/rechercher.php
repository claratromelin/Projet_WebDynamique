<?php session_start(); ?>
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
    <?php
include("menup.php");
?>
<script type="text/javascript">
  var onglet = document.getElementById('rech');
  onglet.setAttribute('class','active');
  
</script>

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


