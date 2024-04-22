<?php
include("util/fonctions.php");
$action = $_REQUEST['action'];
switch($action)
{
	case 'voirPanier':

		$lesProduits = getLesProduitsDuPanier();
		include("vues/c_gestionPanier/v_panier.php");
	
		break;
	case 'supprimerUnProduit':
		$idProduit=$_REQUEST['produit'];
		retirerDuPanier($idProduit);
		$lesProduits = getLesProduitsDuPanier();
		include("vues/c_gestionPanier/v_panier.php");
		break;
	case 'passerCommande' :

	    $bool= isset($_SESSION['produits']);
		if($bool){
			$nom ='';$rue='';$ville ='';$cp='';$mail='';$telClient ='';
			include ("vues/c_gestionPanier/v_commande.php");
		}
		else {
			echo "panier vide";
		}
		break;
	case 'confirmerCommande'	:
		$nom =$_REQUEST['nom'];
		$rue=$_REQUEST['rue'];
		$ville =$_REQUEST['ville'];
		$cp=$_REQUEST['cp'];
		$mail=$_REQUEST['mail'];

	 	include ("vues/c_gestionPanier/v_commande.php");
		$msgErreurs = getErreursSaisieCommande($cp,$mail);
		if (count($msgErreurs)!=0){
			include ("vues/v_erreurs.php");
		}
		else {
			creerCommande($nom,$rue,$cp,$ville,$mail);
			header("Location: index.php");
			echo "Commande Enregistrée";
		
		}
		break;
}


?>


