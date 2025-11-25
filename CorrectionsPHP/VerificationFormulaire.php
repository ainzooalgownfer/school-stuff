<!DOCTYPE html>
<html>

<head>
      <title>Vérification du formulaire</title>
	  <meta charset="utf-8" />
</head>
<body>
<h1>Vérification du formulaire</h1>
<h2>Affichage des données reçues</h2>
<pre>
<?php 
  print_r($_POST); 
?>
</pre>

<h2>Rapport d'erreurs</h2>
<ul>
  <li>Sexe : <?php 
  // Vérification du sexe (vaut 'f' ou 'h') 
  if(isset($_POST['sexe'])) 			// la variable sexe est positionnée
    { $Sexe=$_POST['sexe'];				// affectation de la variable $Sexe
	  if(($Sexe=='f')||($Sexe=='h')) echo 'OK'; 
	  else echo 'différent de "f" ou "h"'; 
    }
  else echo 'absent'; 
?></li>
  <li>Nom : <?php 
  // Vérification du nom (au moins 2 lettres) 
  if(isset($_POST['nom'])) 				// la variable nom est positionnée
    { $Nom=trim($_POST['nom']);			// suppression des espaces devant et derrière 
	  if(strlen($Nom)>1) echo 'OK'; 
	  else echo 'trop court'; 
    }
  else echo 'absent'; 
?></li>
  <li>Prénom : <?php 
  // Vérification d'au moins 1 lettre et que des lettres
  if(isset($_POST['prenom'])) 			// la variable prenom est positionnée
    { $Prenom=strtolower(trim($_POST['prenom']));  	// suppression des espaces devant et derrière 
	  $AuMoinsUneLettre=false;
	  $QueDesLettres=true;
	  for($i=0;$i<strlen($Prenom);$i++)
		{ if(($Prenom[$i]>='a')&&($Prenom[$i]<='z')) $AuMoinsUneLettre=true;
	   	  else 										 $QueDesLettres=false;
	    }
	  if(!$AuMoinsUneLettre)  echo 'ne contient pas au moins 1 lettre';
	  elseif(!$QueDesLettres) echo 'contient autre chose que des lettres';
	  else 					  echo 'OK';
	}
  else echo 'absent'; 
?></li>
  <li>Date de naissance : <?php 
  // Vérification de la date de naissance
  if(isset($_POST['naissance'])) 			// la variable date de naissance est positionnée
    { $Naissance=trim($_POST['naissance']); // suppression des espaces devant et derrière 
	  if($Naissance=="") echo 'absente'; 
	  else { list($Annee,$Mois,$Jour)=explode('-',$Naissance);
			 if(checkdate($Mois,$Jour,$Annee)) echo 'OK';
			 else echo 'incorrecte';    
	       }
    }
  else echo 'absente';

?></li>
  <li>Pays d'origine : <?php 
  // Vérification d'au moins 1 lettre et pas de chiffre
  if(isset($_POST['pays'])) 			// la variable pays est positionnée
    { $Pays=trim($_POST['pays']);    	// suppression des espaces devant et derrière 
	  if($Pays=="") echo 'absent'; 
	  else {  if(in_array($Pays,array("Allemagne","Belgique","Chine","France","Maroc","Tunisie"))) echo 'OK';
			  else echo 'Pays non valide'; 
	       } 
	}	   
  else echo 'absent'; 
?></li>
</ul>
</body>
</html>
