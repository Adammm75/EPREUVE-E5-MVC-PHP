<?php
session_start();
include("v_entete.php") ;
include("v_bandeau.php") ;
if(!isset($_REQUEST['uc'])) {
    $uc = 'accueil';
}
else {
	$uc = $_REQUEST['uc'];
}

switch($uc)
{
	case 'accueil':
			include("vues/c_page/v_accueil.php");
			//$retour=afficherCarrouselProduits($lesProduits);

            break;
	case 'voirProduits' :
			include("c_voirProduits.php");
            break;
	case 'gererPanier' :
			include("c_gestionPanier.php");
            break; 
	case 'administrer' :

			include("c_gestionProduits.php");
            break; 
}
include("v_pied.php");
?>

