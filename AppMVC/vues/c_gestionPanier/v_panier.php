<img src="images/panier.gif"	alt="Panier" title="panier"/>
<img src="images/panier.jpg"	alt="Panier" title="panier"/>
<div class='container'>
<?php

foreach( $lesProduits as $unProduit) 
{
	$id = $unProduit['id'];
	$description = $unProduit['description'];
	$image = $unProduit['image'];
	$prix = $unProduit['prix'];
	$quantite= $unProduit['quantite'];
	$url ="<a class='btn btn-primary' href=index.php?uc=gererPanier&produit=$id&action=supprimerUnProduit>supprimer </a>";
	
	echo "	
			<div class='row border'>
			<div class='col-md-3'><img src=$image alt=image width=100	height=100 /></div>
			<div class='col-md-3'>$description</div>
			<div class='col-md-3'>quantité : $quantite</div>
			<div class='col-md-3'>$url</div>
			</div>";
}
?>
<br>
<a class='btn btn-primary' href=index.php?uc=gererPanier&action=passerCommande>Passer la commande</a>
