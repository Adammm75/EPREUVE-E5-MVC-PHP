
<?php
include("util/fonctions.php");
$action = $_REQUEST['action'];


switch($action)
{
case 'connexion' :
    if (isset($_SESSION['login']))
    {

    echo "Vous êtes toujours connecté !";
    $lesCategories= getLesCategories();
    include("vues/c_gestionProduit/v_categorie.php");
    }
    else {
    session_destroy();
    include("vues/c_gestionProduit/v_connexion.php");
    
    }

    
    break;

case 'verifconnexion' :
    $pLogin = $_REQUEST['login'];
    $pMdp = $_REQUEST['motdepasse'];
    $retour=verifLoginMdp($pLogin, $pMdp);
    if ($retour==true)
    {

        $_SESSION['login'] = $pLogin;
        echo"Bienvenue sur votre Espace Admin ! ";
        $lesCategories= getLesCategories();
        include("vues/c_gestionProduit/v_categorie.php");

    }
    else {

        echo"Login ou Mot de passe Incorrect";
        include("vues/c_gestionProduit/v_connexion.php");

    }
    break;

case 'Deconnexion' :
    if (isset($_SESSION['login']))
    {
    session_destroy();
    echo" Vous vous êtes Déconnecté ! " ;
include("vues/c_gestionProduit/v_connexion.php");
}
break;

case 'produit' :


     $categorie = $_REQUEST['categorie'];
     $lesProduits= getLesProduits($categorie);
     include("vues/c_gestionProduit/v_Produits.php");
     
     break;

     break;


case 'Ajouterunproduit':


     include("vues/c_gestionProduit/v_ajouter_produit.php");
    
    break;


case 'verifAjouterunproduit':
        $image=$_FILES["monFichier"];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $prixAchat = $_POST['prixAchat'];
        $idCategorie = $_REQUEST['categorie'];
        $req=ajouter_produit ($description, $prix, $image, $idCategorie, $prixAchat);
        $categorie = $_REQUEST['categorie'];
        $lesProduits= getLesProduits($categorie);
        include("vues/c_gestionProduit/v_Produits.php");

break;

case 'supprimerUnProduit':
    $categorie = $_REQUEST['categorie'];
    $idProduit = $_REQUEST['idProduit'];
    $CheminImage=recuperation_NomImage($idProduit);
    $retour1= verif_supprimer_produit ($idProduit);
   if ($retour1 == true) {

    echo " Le Produit ne peut pas être supprimé car il est commandé !";
     $categorie = $_REQUEST['categorie'];
     $lesProduits= getLesProduits($categorie);
     include("vues/c_gestionProduit/v_Produits.php");
   }
   else {

	$retour=supprimer_produit ($idProduit);
    if($retour == false){
        echo"erreur";
    }
    else {
     $categorie = $_REQUEST['categorie'];
     $lesProduits= getLesProduits($categorie);
     include("vues/c_gestionProduit/v_Produits.php");
     echo" Produit bien supprimé";
     if (file_exists($CheminImage)) {
        if (unlink($CheminImage)){
            ?>
            <br>
            <?php
            echo "Fichier bien Supprimé";
        }
        else {
            echo "Problème";
        }
     }
     else
     {
        echo "Le Fichier n'existe pas ! ";
     }
     
    }
}
    break;


case 'ModifierunProduit':

include("vues/c_gestionProduit/v_modification_produit.php");
break;

case 'VerifModifierunProduit':
    $idProduit = $_REQUEST['idProduit'];
    $CheminImage=recuperation_NomImage($idProduit);
       if (file_exists($CheminImage)) {
        if (unlink($CheminImage)){
            ?>
            <br>
            <?php
            echo "Modification Bien Effectué";
        }
        else {
            echo "Problème";
        }
     }
     else
     {
        echo "Le Fichier n'existe pas ! ";
     }
    $image=$_FILES['monFichier'];
    $description = $_REQUEST['description'];
    $prix = $_REQUEST['prix'];
    $prixAchat = $_REQUEST['prixAchat'];
    $idCategorie = $_REQUEST['categorie'];
    

    $req = modifier_produit ($idProduit, $description,$image,$idCategorie, $prix, $prixAchat);
    if ($req == false) {

        echo"ERREUR";

    }
    else {

         $categorie = $_REQUEST['categorie'];
        $lesProduits= getLesProduits($categorie);
        include("vues/c_gestionProduit/v_Produits.php");
    }


break;

}
?>