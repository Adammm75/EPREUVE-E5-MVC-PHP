<?php

$login="";
   $motdepasse="";


echo "
<div class='container'>
<form method='POST' action='index.php?uc=administrer&action=verifconnexion'>
   <fieldset>
     <legend>CONNEXION</legend>
    <div class='form-group row'>
       <label class='col-sm-2 col-form-label' for='login'>Login</label>
       <input id='login' type='text' name='login' value='$login' size='30' maxlength='45'>
    </div>
    <div class='form-group row'>
        <label class='col-sm-2 col-form-label' for='motdepasse'>Mot de passe</label>
        <input id='motdepasse' type='password' name='motdepasse' value='$motdepasse' size='30' maxlength='45'>
    </div>
   <div class='form-group row'>
         <input type='submit' value='Valider' name='valider'>
    </div>
    </div>


</form>
</div>
";








?>










