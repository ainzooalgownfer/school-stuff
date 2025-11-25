<?php  
// Vérification du formulaire

if(isset($_POST['submit']))  // le formulaire vient d'être soumis
  { 
	$ClassSexe='ok';
	$ClassNom='ok';
	$ClassPrenom='ok';
	$ClassNaissance='ok';
	$ClassPays='ok';
    $ChampsIncorrects='';
	
	// Vérification du sexe (vaut 'f' ou 'h') 
    if(  (!isset($_POST['sexe'])) 			// la variable sexe n'est pas positionnée
	   ||(  (trim($_POST['sexe'])!='f')     // sexe ne vaut pas 'f'
	      &&(trim($_POST['sexe'])!='h')     // ni 'h' 
		 )
	  )
      { $ChampsIncorrects=$ChampsIncorrects.'<li>sexe</li>';
	    $ClassSexe='error';
	  }

	// Vérification du nom (au moins 2 lettres) 
	if(  (!isset($_POST['nom'])) 			// la variable nom n'est pas positionnée
	   ||(strlen(trim($_POST['nom']))<2)	// le nom est trop court
      )
	  { $ChampsIncorrects=$ChampsIncorrects.'<li>nom</li>';
	    $ClassNom='error';
	  }

    // Vérification du prenom (au moins 1 lettre et pas de chiffre)
    if(!isset($_POST['prenom']))			// la variable prenom est pas positionnée
	  { $ChampsIncorrects=$ChampsIncorrects.'<li>prénom</li>';
		$ClassPrenom='error';
	  }
	else
	  { $Prenom=strtolower(trim($_POST['prenom']));  	// suppression des espaces devant et derrière 
		$AuMoinsUneLettre=false;
		$QueDesLettres=true;
		for($i=0;$i<strlen($Prenom);$i++)
			{ if(($Prenom[$i]>='a')&&($Prenom[$i]<='z')) $AuMoinsUneLettre=true;
			  else 										 $QueDesLettres=false;
	        }
		if((!$AuMoinsUneLettre)||(!$QueDesLettres))
		  { $ChampsIncorrects=$ChampsIncorrects.'<li>prénom</li>';
			$ClassPrenom='error';
		  }
	  }
	  
	// Vérification de la date de naissance
    if(  (!isset($_POST['naissance'])) 		// la variable naissance n'est pas positionnée
       ||(trim($_POST['naissance'])=='')    // naissance vide
	  )
	  { $ChampsIncorrects=$ChampsIncorrects.'<li>date de naissance</li>';
	    $ClassNaissance='error';
	  }
	else
	  { list($Annee,$Mois,$Jour)=explode('-',$Naissance);
		if(!checkdate($Mois,$Jour,$Annee)) 
		  { $ChampsIncorrects=$ChampsIncorrects.'<li>date de naissance</li>';
			$ClassNaissance='error';
		  }
	  }

	// Vérification du pays (commence par 'f')
	if(  (!isset($_POST['pays'])) 			// la variable pays n'est pas positionnée
	   ||(!in_array(trim($_POST['pays']),array("Allemagne","Belgique","Chine","France","Maroc","Tunisie")))
	  )
	  { $ChampsIncorrects=$ChampsIncorrects.'<li>pays</li>';
	    $ClassPays='error';
	  }
	  
  // Sauvegarde des données	 
  if($ChampsIncorrects=='') 
    { echo 'Formulaire bien rempli : '.
                        ucwords(strtolower(trim($_POST['prenom']))).' '.
						ucwords(strtolower(trim($_POST['nom']))).' ('.
						$_POST['sexe'].'), né(e) le '
						.$Jour.'/'.$Mois.'/'.$Annee.' ('
						.strtoupper(trim($_POST['pays'])).') </body></html>';
	  exit;
    }
	
  }	
?>
<!DOCTYPE html>
<html>

<head>
      <title>Vos données</title>
	  <meta charset="utf-8" />
	  <style type="text/css"> 
.ok {
    }
.error
    {  background-color: red;
	}
	  </style>
</head>
<body>
<h1>Vos données</h1>



<form method="post" action="#" >
<fieldset>
    <legend>Informations personnelles</legend>
	Vous êtes :  
  <span class="<?php echo $ClassSexe; ?>">
	<input type="radio" name="sexe" value="f" 
	<?php if((isset($_POST['sexe']))&&($_POST['sexe'])=='f') echo 'checked="checked"'; ?>
	/> une femme 	
	<input type="radio" class="<?php echo $ClassSexe; ?>" name="sexe" value="h"
	<?php if((isset($_POST['sexe']))&&($_POST['sexe'])=='h') echo 'checked="checked"'; ?>
	/> un homme
  </span>	
	<br />
    Nom :    
	<input type="text" class="<?php echo $ClassNom; ?>" name="nom" required="required" 
		   value="<?php if(isset($_POST['nom']))  echo $_POST['nom']; ?>"/>
	<br />   
    Prénom : 
	<input type="text" class="<?php echo $ClassPrenom; ?>" name="prenom" 
	       value="<?php if(isset($_POST['prenom']))  echo $_POST['prenom']; ?>"/>
	<br /> 	
    Date de naissance : 
	<input type="date" class="<?php echo $ClassNaissance; ?>" name="naissance" 
	       value="<?php if(isset($_POST['naissance'])) echo $_POST['naissance']; ?>"/>
    <br /> 	
	Pays d'origine :
    <input name="pays" class="<?php echo $ClassPays; ?>" list="pays" 
	       value="<?php if(isset($_POST['pays'])) echo $_POST['pays']; ?>"/>
	<datalist id="pays">
		<option value="Allemagne" />
		<option value="Belgique" />
		<option value="Chine" />
		<option value="France" />
		<option value="Maroc" />
		<option value="Tunisie" />
	</datalist> 	
	
</fieldset>


	<br />
<input type="submit" name="submit" value="Valider" />
</form>

<?php 
if(isset($_POST['submit'])) 	// le formulaire a été soumis (et est incomplet)	
  { echo '
<br />
Merci de remplir correctement les champs ci-dessous :
<ul> 
'.$ChampsIncorrects.'
</ul>';
  }
?>  

</body>
</html>
