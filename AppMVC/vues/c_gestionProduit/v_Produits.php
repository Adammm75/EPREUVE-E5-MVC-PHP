<?php
echo "<div class='container float-left'>";
echo "<br />";
echo "<div style='text-align: right;'>
    <form action='index.php?uc=administrer&action=Deconnexion' method='post'>
        <input type='submit' value='Déconnexion'>
    </form>
</div>";

$url = "index.php?uc=administrer&categorie=$categorie&action=Ajouterunproduit";
echo '<a class="btn btn-primary" role="button" href="' . $url . '">Ajouter un produit</a>';
?>
<br>
<br>
<br>
<?php
foreach( $lesProduits as $unProduit) 
{

	$id = $unProduit['idProduit'];
	$description = $unProduit['description'];
	$image = $unProduit['image'];
	$prix = $unProduit['prix'];
	$prixAchat = $unProduit['prixAchat'];
	$url ="index.php?uc=administrer&categorie=$categorie&idProduit=$id&action=produit";
	$url1 ="index.php?uc=administrer&categorie=$categorie&prixAchat=$prixAchat&description=$description&idProduit=$id&prix=$prix&action=ModifierunProduit";
	$url2 ="index.php?uc=administrer&categorie=$categorie&idProduit=$id&action=supprimerUnProduit";

	echo "<form action='$url&$url1&$url2' method='post'>";

	echo "<div class='row border'>

			<div class='col-md-3'><img src=".$image." alt=image width=100	height=100 /></div>
			<div class='col-md-3'>".$description. "</div>
	<div class='col-md-3'>". " Prix de vente : "  . $prix. "</div>
	<div class='col-md-3'>"." Prix Achat : "  .$prixAchat. "</div>
	";
	 echo "<div class='col-md-3'>		
			 
			<div class='col-md-2'> <a class='btn btn-primary' role='button' href=$url1 >Modifier</a></div>
			<br>
			<div class='col-md-2'> <a class='btn btn-primary' role='button' href=$url2 >Supprimer</a></div>
			<br>
			 

		</div>";
    echo "</div>";
    echo "</form>";	
			
}
echo "</div>";
?>
