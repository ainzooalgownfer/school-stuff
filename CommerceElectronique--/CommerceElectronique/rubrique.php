<?php
  if(isset($_GET['rubrique'])) $Rubrique=$_GET['rubrique'];
  else $Rubrique=$ListeRubriques[0];
  
  // mise à jour des quantités 
  foreach($Rubriques[$Rubrique] as $Produit => $Detail)
    { if(isset($_GET['quantite'][$Rubrique][$Produit])) 
		{ $_SESSION['panier'][$Rubrique][$Produit]=$_GET['quantite'][$Rubrique][$Produit];
        }
   }
?>
	<h2>Section <?php echo $Rubrique; ?></h2>
	<form method="get" action="?">
		<input type="hidden" name="page" value="rubrique" />
		<input type="hidden" name="rubrique" value="<?php echo $Rubrique; ?>" />
        <table style="border: solid 1px gray">
        <tr>
            <th>Produit</th>
            <th>Prix</th>
	        <th>Quantité</th>
            <th>Total</th>
        </tr>
	<?php 
	foreach($Rubriques[$Rubrique] as $Produit => $Detail)
    { 
      $Total=$Detail["Prix"]*(isset($_SESSION['panier'][$Rubrique][$Produit])?$_SESSION['panier'][$Rubrique][$Produit]:0);
      echo '
        <tr>
            <td>'.$Produit.'</td>
            <td>'.$Detail["Prix"].' €/'.$Detail["Unite"].'</td>
			<td><input 	type="number" 
						name="quantite['.$Rubrique.']['.$Produit.']"
						value="'.(isset($_SESSION['panier'][$Rubrique][$Produit])?$_SESSION['panier'][$Rubrique][$Produit]:"").'" /></td>
			<td style="text-align: right">';
      printf("%.2f",$Total);
      echo ' €
			</td>
        </tr>';
     }
	?>
		</table>
		<input type="submit" name="submit" value="Valider">
	
	
