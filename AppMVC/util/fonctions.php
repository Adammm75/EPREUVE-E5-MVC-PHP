<?php
define("BDD","boutique");
define("USER_BDD","root");
define("PASSWORD_USER","");
define("SERVEUR","localhost");
function connexion(){
	$connexion = new PDO("mysql:host=".SERVEUR.";dbname=".BDD, USER_BDD, PASSWORD_USER);
	return $connexion;
}
function getLesCategories(){
	$connexion = connexion();
	$req="select * from categorie";
   	$rsCategorie = $connexion->query($req);
   	$lesCategories = $rsCategorie->fetchAll();
	return $lesCategories;
}


 function verifLoginMdp($pLogin, $pMdp){
        $retour = false;
		$connexion = connexion();
		$pMdp = md5($pMdp);	
        $req="select * from administrateur where login = '$pLogin' AND motdepasse = '$pMdp';";
       	$req1 = $connexion->query($req);
   		$retour = $req1->fetch();
		return $retour;
 }



 function verifhashagemdp ($pLogin, $pMdpHash) {

		$connexion = connexion();  		
        $req ="UPDATE administrateur SET motdepasse= '$pMdpHash' WHERE login= '$pLogin';";
       	$retour = $connexion->query($req); 
       	echo "Mot de passe bien hacher";

 }


 function getLesProduits($uneCategorie){
	$connexion = connexion();
	$req="select * from produit where idCategorie = '$uneCategorie'";
   	$rsProduit = $connexion->query($req);
    $lesProduits = $rsProduit->fetchAll();
   	return $lesProduits;
}
function afficher_prix ($prix)
{
	$connexion = connexion();
	$req="select prix from produit '";
   	$rsProduit = $connexion->query($req);
    $lesProduits = $rsProduit->fetchAll();
	return $prix;
}

function verif_supprimer_produit ($idProduit) {

	$connexion = connexion();
	$req1="SELECT idCommande FROM contenir WHERE idProduit = '$idProduit'";
	$req = $connexion->query($req1); 
	$retour1 = $req->fetch();
	return $retour1;
}
function supprimer_produit ($idProduit)
{
	$connexion = connexion();

	$req="DELETE FROM produit WHERE idProduit = '$idProduit'";
   	$retour = $connexion->query($req); 
	return $retour;
}
function modifier_produit ($idProduit, $description,$image, $idCategorie, $prix, $prixAchat)
{
	$connexion = connexion();
	$req="select * from categorie where idCategorie = '$idCategorie'";
    $resultat = $connexion->query($req);
    $categorie = $resultat->fetch();  
	$file_def="images".'/'.$categorie['libelle'].'/'.$image["name"];
        copy($image['tmp_name'], $file_def); 
    $image="images".'/'.strtolower($categorie['libelle']).'/'.$image["name"];
	$req="UPDATE produit 
            SET description = '$description', prix = '$prix', image = '$image', prixAchat = '$prixAchat'
            WHERE idProduit = '$idProduit'";

   $retour = $connexion->query($req); 
	return $retour;
}

function recuperation_NomImage($idProduit) {

	$connexion = connexion();

	$req="SELECT image FROM produit WHERE idProduit=?";
	$retour = $connexion->prepare($req);
    $retour->execute([$idProduit]);
	$resultat = $retour->fetch(PDO::FETCH_ASSOC);
	$nom_image = $resultat['image'];
	return $nom_image;
}
function ajouter_produit($description, $prix, $image, $idCategorie, $prixAchat)
{
       // chargement image
    $connexion = connexion();
    $req="select * from categorie where idCategorie = '$idCategorie'";
    $resultat = $connexion->query($req);
    $categorie = $resultat->fetch();    
    $file_def="images".'/'.$categorie['libelle'].'/'.$image["name"];
        copy($image['tmp_name'], $file_def);                
 // recherche du numéro max de produit pour la catégorie
    $req="select MAX(idProduit) as max from produit";
    $resultat = $connexion->query($req);
    $ligne = $resultat->fetch();
    $max = $ligne['max'];
    $max++;
    $num = $max;
    $image="images".'/'.strtolower($categorie['libelle']).'/'.$image["name"];
    $req="insert into Produit (idProduit,description,prix, idCategorie,image,prixAchat) value('$num','$description','$prix','$idCategorie','$image','$prixAchat')";
    //echo $req;
    $resultat= $connexion->query($req); 
    return $resultat;


}
function afficherCarrouselProduits($lesProduits) {


    

    $produitsAleatoires = array_slice($lesProduits, 0, 3);

    }




function ajouterAuPanier($idProduit, $quantite){
	if($quantite>6){

			echo"Vous ne pouvez pas commander plus de 6 articles ";
		}
		else {



		}
	if(!isset($_SESSION['produits'])){
		$_SESSION['produits']= array();
	}
	$_SESSION['produits'][$idProduit] = $quantite;	
}

function retirerDuPanier($idProduit){
	unset($_SESSION['produits'][$idProduit]);
}
function creerCommande($nom,$rue,$cp,$ville,$mail){
	$connexion = connexion();
	$req1="select max(idCommande) as maxi from commande";
   	$rsCategorie = $connexion->query($req1);
   	$lgCategorie = $rsCategorie->fetch();
   	$idCommande = $lgCategorie['maxi'];
   	$idCommande++;
	$date = date("y-m-d");

   	$req2 = "insert into commande values ('$idCommande','$date','$nom','$rue','$cp','$ville','$mail')";
   
   	$rsCommande = $connexion->query($req2);
   	$lesProduits = $_SESSION['produits'];

	foreach($lesProduits as $idProduit=>$quantite)	{
		$req3 = "INSERT INTO contenir (idCommande, idProduit, quantite) VALUES ($idCommande, $idProduit, $quantite)";

		$rs3 = $connexion->query($req3);	
	}	
	$connexion=null;
	session_destroy();
}
function estUnCp($codePostal){
   // Le code postal doit comporter 5 chiffres
   return strlen($codePostal)== 5 && estEntier($codePostal);
}

// Si la valeur transmise ne contient pas d'autres caract�res que des chiffres,
// la fonction retourne vrai
function estEntier($valeur){
   return !preg_match ("/^[^0-9]./", $valeur);
}
function estUnMail($mail){
$regexp="/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";
return preg_match ($regexp, $mail);
}
function getErreursSaisieCommande($cp,$mail){
 $lesErreurs = array();
 if(!estUnCp($cp))
 	$lesErreurs[]= "erreur de code postal";
 if(!estUnMail($mail))
 	$lesErreurs[]= "erreur de mail";
 return $lesErreurs;
}
function Estuntelephone($telClient){	
return !preg_match ("/^[^0-9]./", $telClient);


	}
function getLesProduitsDuPanier(){	
	$lesProduits = array();
	if(isset($_SESSION['produits'])&& count($_SESSION['produits'])!=0)
	{
		$connexion = connexion();
	
		foreach($_SESSION['produits'] as $unIdProduit=>$quantite)
		{
	 		$req="select * from produit where idProduit = '$unIdProduit'";
			$rsProduit = $connexion->query($req);
            $lgProduit = $rsProduit->fetch();
            $id=$lgProduit['idProduit'];
            $description = $lgProduit['description'];
	  		$image = $lgProduit['image'];
			$prix = $lgProduit['prix'];
			$unProduit = array('id'=>$id,'description'=>$description,'image'=>$image,'prix'=>$prix,'quantite'=>$quantite);
			$lesProduits[] = $unProduit;
		}		
		$connexion=null;
	}
        return $lesProduits;
}
?>
