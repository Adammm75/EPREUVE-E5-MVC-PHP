<?php
echo "<div class='container float-left'>";
echo "<br />";

$categorie = $_REQUEST['categorie'];
foreach ($lesProduits as $unProduit) {
    $id = $unProduit['idProduit'];
    $description = $unProduit['description'];
    $image = $unProduit['image'];
    $prix = $unProduit['prix'];
    $prixAchat = $unProduit['prixAchat'];
    $url = "index.php?uc=voirProduits&categorie=$categorie&produit=$id&action=voirProduitsEtAjouterAuPanier&voirPanier";

    echo "<form action='$url' method='post'>";
    echo "<div class='row border'>";
    echo "<div class='col-md-3'><img src='$image' alt='image' width='100' height='100' /></div>";
    echo "<div class='col-md-3'>$description</div>";
    echo "<div class='col-md-3'>Prix de vente: $prix</div>";
    echo "<div class='col-md-3'>Prix Achat: $prixAchat</div>";

    echo "<div class='col-md-3'>
            <div>Quantité : <input type='text' id= 'quantite' name='quantite' size='2'/></div>            
            <div><input type='submit' value='Commander' /></div>    
          </div>";

    echo "</div>";
    echo "</form>";
}

echo "</div>";
?>


