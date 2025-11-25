<?php 
  
  // Vérification d'un formulaire bien rempli

  function est_vide($chaine)
  {
    return (trim($chaine)=='');
  }

  $complet=false;
  if(isset($_GET["submit"])) // le formulaire vient d'etre valide
    {
      if(    !est_vide($_GET["nom"]) 
	      && !est_vide($_GET["prenom"]) 
	      && !est_vide($_GET["adresse"]) 
	      && !est_vide($_GET["cp"]) 
	      && !est_vide($_GET["ville"])
		)
        { // le formulaire est complet : sauvegarde des données
		  $_SESSION['user']['nom']		=$_GET["nom"];
		  $_SESSION['user']['prenom']	=$_GET["prenom"];
		  $_SESSION['user']['adresse']	=$_GET["adresse"];
		  $_SESSION['user']['cp']		=$_GET["cp"];
		  $_SESSION['user']['ville']	=$_GET["ville"];
		  $complet=true;
        }
     }

  if($complet)
    { include('accueil.php');
    }
  else  
    { if(isset($_GET['submit']))
        { echo 'Veuillez compléter tous les champs, svp.';
	    }
	  else
        { echo 'Veuillez remplir le formulaire.';
	    }
	      ?>     
	<form method="get" action="?page=identification">
    Nom :
	<input type="text" name="nom" 
	       value="<?php echo (isset($_GET['nom'])?$_GET['nom']:''); ?>"><br />
    Prénom :
	<input type="text" name="prenom"
	       value="<?php echo (isset($_GET['prenom'])?$_GET['prenom']:''); ?>"><br />
    Adresse :
	<input type="text" name="adresse"
	       value="<?php echo (isset($_GET['adresse'])?$_GET['adresse']:''); ?>"><br />
    Code Postal :
    <input type="text" name="cp"
	       value="<?php echo (isset($_GET['cp'])?$_GET['cp']:''); ?>"><br />
    Ville : 
    <input type="text" name="ville"
	       value="<?php echo (isset($_GET['ville'])?$_GET['ville']:''); ?>"><br />
	<input type="submit" name="submit" value="Valider">	   
	</form>
		<?php
	}	