<?php 
	require_once('bootstrap.php');

	$utilisateurManager = new UtilisateurManager();

	$erreurs = $utilisateurManager->validerInscription($_POST);

	
?>