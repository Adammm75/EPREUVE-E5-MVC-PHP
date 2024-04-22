<?php
include("util/fonctions.php");
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirCategories':
  		$lesCategories = getLesCategories();
		include("vues/c_voirProduit/v_categories.php");
  		break;
	case 'voirProduits' :
		$lesCategories = getLesCategories();
		include("vues/c_voirProduit/v_categories.php");
  		$categorie = $_REQUEST['categorie'];
		$lesProduits = getLesProduits($categorie);
		include("vues/c_voirProduit/v_produits.php");
		break;

	case 'Connexion' :
		$lesCategories = getLesCategories();
		include("vues/c_voirProduit/v_categories.php");
  		$categorie = $_REQUEST['categorie'];
		$lesProduits = getLesProduits($categorie);
		include("vues/c_voirProduit/v_produits.php");
		break;

	case 'voirProduitsEtAjouterAuPanier' :
		$lesCategories = getLesCategories();
		include("vues/c_voirProduit/v_categories.php");
  		$categorie = $_REQUEST['categorie'];
		$lesProduits = getLesProduits($categorie);
		include("vues/c_voirProduit/v_produits.php");
		$idProduit=$_REQUEST['produit'];
		$quantite=$_REQUEST['quantite'];
	  	ajouterAuPanier($idProduit, $quantite);
        break;
}
?>

