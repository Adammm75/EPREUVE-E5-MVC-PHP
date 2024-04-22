<?php
$description = $_REQUEST['description'];
$categorie = $_REQUEST['categorie'];
$idProduit = $_REQUEST['idProduit'];
$prix = $_REQUEST['prix'];
$prixAchat = $_REQUEST['prixAchat'];
$idCategorie = $_REQUEST['categorie'];

echo "
<div class='container'>
    <form method='POST' action='index.php?uc=administrer&categorie=$categorie&idProduit=$idProduit&prix=$prix&action=VerifModifierunProduit' enctype='multipart/form-data'>
        <br>
        <legend>Modifier un produit</legend>
        <br>
        <br>


      <div class='form-group row'>
        <input type='hidden' name='MAX_FILE_SIZE' value='100000000' />          
        <label class='col-sm-3' for='monFichier'>Image à importer : </label>
        <input type='file' name='monFichier' size='50'/>
        </div>
         
        <label for='description'>Description :</label>
        <input type='text' id='description' name='description' value='$description' size='30' maxlength='45'>
        
        <label for='prix'>prix :</label>
        <input type='number' id='prix' name='prix' value='$prix' size='20' maxlength='20'>

        <label for='prixAchat'>prixAchat :</label>
        <input type='number' id='prixAchat' name='prixAchat' value='$prixAchat' size='20' maxlength='20'>
            
        <input type='submit' value='Modifier' />
    </form>
</div>
";
?>
