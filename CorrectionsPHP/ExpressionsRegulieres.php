<html>
<head>
	<title>Extraction avec des expressions régulières</title>
	<meta charset="iso-8859-1">
</head>

<body>
<?php 
  
  // $Fichier=file_get_contents("http://www.php.net/");
  $Fichier=file_get_contents("www.php.net.html");

  // Extraction du contenu de l'élément title
  if(preg_match("|<title>([^<]*)</title>|i",$Fichier,$Tab))
    { echo "Contenu de l'élément <b>title</b> : ".$Tab[1]."<br /><br />\n";
    }
  
  // Récupération des URL dans un tableau
  preg_match_all('/href="([^"]+)"/',$Fichier,$Tab);
  print_r($Tab[1]);
  $TabUrl=$Tab[1];
  
  // Parcours du tableau pour extraire les différents sites web
  foreach($TabUrl as $Url) 
    { if(preg_match("|http://([^/]*)/|",$Url,$Tab))
        { $TabSites[$Tab[1]]=$Tab[1];
		}
    }
	
  echo "Liste des sites web accessibles à partir de www.php.net\n<ul>\n";	
  foreach($TabSites as $Site) { echo "<li>$Site</li>\n"; } 
  echo "</ul>\n\n";	
 
  // Liste des URL qui ne contiennent pas php 
  echo "Liste des URL qui ne contiennent pas 'php'\n<ul>\n";	
  foreach($TabUrl as $Url) 
    { if(!preg_match("|php|",$Url)) echo "<li>$Url</li>\n";
    }
  echo "</ul>\n\n";	
 
  // Liste des URL qui ne contiennent pas php dans le nom du site   
  echo "Liste des URL avec indication si elles contiennent ou non 'php' dans le nom du site<ul>\n";	
  foreach($TabUrl as $Url) 
    { echo '<li>'.$Url.' : <font color="'
	.(preg_match("|http://[^/]*php[^/]*/|",$Url)?'green">OUI':'red">NON')
	."</font></li>\n";
    }
  echo "</ul>\n";	
  
 ?>
</body>
</html>