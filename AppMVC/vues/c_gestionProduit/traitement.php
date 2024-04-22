<?php

require('util/fonctions.php');
session_start();
echo"EEEE";
$pMdp=$_POST["motdepasse"];
$pLogin=$_POST["login"];
$retour=verifLoginMdp($pLogin, $pMdp);
if ($retour!==false)
{

 echo"PROBLEME";	
}
else {	
	$_SESSION["login"]=$pLogin;

	 echo"vous êtes connecté";


}
?>
