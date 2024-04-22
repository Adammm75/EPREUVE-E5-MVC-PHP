<?php
echo "<div class='container float-left'>";
echo "<br />";
echo "<div style='text-align: right;'>
    <form action='index.php?uc=administrer&action=Deconnexion' method='post'>
        <input type='submit' value='Déconnexion'>
    </form>
</div>";
foreach( $lesCategories as $uneCategorie) {
	$idCategorie = $uneCategorie['idCategorie'];
	$libCategorie = $uneCategorie['libelle'];
	$url ="<a class='btn btn-primary' href=index.php";
	$url .= "?uc=administrer&categorie=$idCategorie&action=produit> $libCategorie </a>&nbsp&nbsp&nbsp";
	echo $url;
}
echo "</div>";
?> 
