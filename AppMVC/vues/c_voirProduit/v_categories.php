<?php
echo "<div class='container float-left'>";
echo "<br />";
foreach( $lesCategories as $uneCategorie) {
	$idCategorie = $uneCategorie['idCategorie'];
	$libCategorie = $uneCategorie['libelle'];
	$url ="<a class='btn btn-primary' href=index.php";
	$url .= "?uc=voirProduits&categorie=$idCategorie&action=voirProduits> $libCategorie </a>&nbsp&nbsp&nbsp";
	echo $url;
}
echo "</div>";
?> 
