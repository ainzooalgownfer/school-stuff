<html>
<head>
	<title>Triangle</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<!-- debut de la generation PHP -->
<?php 
  
  if(isset($_GET["taille"])) $taille=$_GET["taille"]; else $taille=0;
  
  if($taille>20) echo "Triangle trop grand<br />\n";
  else
    { if ($taille==0) $taille=10;
	  echo "Triangle de taille $taille<br /><br />\n";
      for($i=0;$i<$taille;$i++)
        { for($j=0;$j<=$i;$j++) 
            { 
              echo "*";
            }
          echo "<br />\n";
        }
    }
?>
<!-- fin de la generation PHP -->

</body>
</html>