<?php

echo"
<div class='container'>
<form method='POST' action='index.php?uc=gererPanier&action=confirmerCommande'>
   <fieldset>
     <legend>Commande</legend>
    <div class='form-group row'>
       <label class='col-sm-2 col-form-label' for='nom'>Nom et prenom*</label>
       <input id='nom' type='text' name='nom' value='$nom' size='30' maxlength='45'>
    </div>
    <div class='form-group row'>
	<label class='col-sm-2 col-form-label' for='rue'>rue*</label>
	<input id='rue' type='text' name='rue' value='$rue' size='30' maxlength='45'>
    </div>
    <div class='form-group row'>
         <label class='col-sm-2 col-form-label' for='cp'> code postal*: </label>
         <input id='cp' type='text' name='cp' value='$cp' size='5' maxlength='5'>
    </div>
    <div class='form-group row'>
         <label class='col-sm-2 col-form-label' for='ville'> ville*: </label>
         <input id='ville' type='text' name='ville'  value='$ville' size='20' maxlength='20'>
    </div>
    <div class='form-group row'>
         <label class='col-sm-2 col-form-label' for='mail'> mail*: </label>
         <input id='mail' type='text'  name='mail' value='$mail' size ='25' maxlength='25'>
    </div> 
    <div class='form-group row'>
         <input type='submit' value='Valider' name='valider'>
         <input type='reset' value='Annuler' name='annuler'> 
    </div>
</form>
</div>
"; 
?>



