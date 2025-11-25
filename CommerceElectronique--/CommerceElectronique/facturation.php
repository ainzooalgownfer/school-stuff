  <h2>Facture adressée à : </h2>

  <?php
echo $_SESSION['user']['nom'].' '.$_SESSION['user']['prenom'].'<br />'
    .$_SESSION['user']['adresse'].'<br />'
    .$_SESSION['user']['cp'].' '.$_SESSION['user']['ville'];
?>
   
  <h2>Récapitulatif de votre commande</h2>
  <form method="get" action="?page=commander">
  <table style="border: solid 1px gray">
        <tr>
            <th>Produit</th>
            <th>Prix</th>
	        <th>Quantité</th>
            <th>Total</th>
        </tr>
	<?php 
	$Total=0;
	foreach($_SESSION['panier']as $Rubrique =>$Produits)
    { 
	  foreach($Produits as $Produit=>$Quantite)
	    {
		  if($Quantite>0)
		    { $TotalLigne=$Quantite*$Rubriques[$Rubrique][$Produit]["Prix"];
			   $Total+=$TotalLigne;
			  echo '
        <tr>
            <td>'.$Produit.'</td>
            <td>'.$Rubriques[$Rubrique][$Produit]["Prix"].' €/'
				 .$Rubriques[$Rubrique][$Produit]["Unite"].'</td>
			<td><input 	type="number" disabled="disabled" 
						name="quantite['.$Rubrique.']['.$Produit.']"
						value="'.$Quantite.'" /></td>
			<td style="text-align: right">'.number_format($TotalLigne,2).' €</td>
        </tr>';
			}
		}	
    }  
?>
  </table>    

  <h2>Total : <?php echo number_format($Total,2); ?> €</h2>
  <input type="submit" name="submit" value="Commander">
  </form>