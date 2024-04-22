<?php
echo "<div class='container float-left'>";
echo "<br />";

foreach( $lesProduits as $unProduit) 
{
	$id = $unProduit['idProduit'];
	$description = $unProduit['description'];
	$image = $unProduit['image'];
	$prix = $unProduit['prix'];
	$url ="index.php?uc=voirProduits&categorie=$categorie&produit=$id&action=voirProduitsEtAjouterAuPanier";
	
	echo "<form action='$url' method='post'>";
	echo "<div class='row border'>
			<div class='col-md-3'><img src=".$image." alt=image width=100	height=100 /></div>
			<div class='col-md-3'>".$description. "</div>
	<div class='col-md-3'>".$prix. "</div>
			<div class='col-md-3'>quantité : <input type='text' name='quantite' size='2' /></div>			
			<div class='col-md-3'><input type='submit' value='commander' /></div>		
		</div>
		</form>		
			";
}
echo "</div>";
?>


