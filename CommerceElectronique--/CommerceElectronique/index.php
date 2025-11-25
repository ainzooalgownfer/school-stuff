<?php
  session_start();
  include("donnees.inc.php");
  $ListeRubriques=array_keys($Rubriques);
?>
<!DOCTYPE html>
<html>

<head>
    <title>&Eacute;picerie du coin d'la rue</title>
	<meta charset="utf-8" />
    <link rel="stylesheet"  href="style.css" type="text/css"  media="screen" />
</head>

<body>

<header>
<h1>&Eacute;picerie du coin d'la rue</h1>
46, rue des Choux-Fleurs<br />
57000 Metz
</header>

<div id="content">
<nav>
<h2>Rubriques</h2>
<ul>
<!-- debut de generation PHP -->
<?php
  foreach($ListeRubriques as $Rubrique)
    { echo '
	<li><a href="?page=rubrique&rubrique='.$Rubrique.'">'.$Rubrique.'</a></li>'; 
    }
?>

<!-- fin de generation PHP -->
	<li style="margin-top:1em"><a href="?page=facturation">Facturation</a></li> 
</ul>
</nav>

<main>
<?php
// L'utilisateur est-il identifié ?
if(isset($_SESSION['user']))	
  {	if(!isset($_GET['page'])) $_GET['page']='accueil';
    // L'utilisateur accède-t-il à une page autorisée
    if(in_array($_GET['page'],array('accueil','rubrique','facturation')))
	  {	include($_GET['page'].".php");
      }
  }
else include('identification.php');
	

?>
</main>
</div>

<footer>&copy; Ma boutique à moi</footer>

</body>
</html>