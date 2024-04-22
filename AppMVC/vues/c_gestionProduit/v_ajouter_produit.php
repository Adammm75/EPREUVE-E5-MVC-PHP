<?php
$idCategorie = $_REQUEST['categorie'];
echo '
<div class="container">
    <form method="POST" action="index.php?uc=administrer&categorie='.$idCategorie.'&action=verifAjouterunproduit" enctype="multipart/form-data">
        <legend>Ajouter un produit</legend>

        <label for="description">Description :</label>
        <input type="text" id="description" name="description" size="30" maxlength="45">

        <label for="prixAchat">prixAchat :</label>
        <input type="number" id="prixAchat" name="prixAchat" size="30" maxlength="45">

        <label for="prix">Prix :</label>
        <input type="number" id="prix" name="prix" size="20" maxlength="20">


      <div class="form-group row">
        <input type="hidden" name="MAX_FILE_SIZE" value="100000000" />          
        <label class="col-sm-3" for="monFichier">Fichier de l image * : </label>
        <input type="file" name="monFichier" size="50"/>
        </div>

        <p><input type="submit" value="Ajouter" /></p>
    </form>
</div>';
?>
