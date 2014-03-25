<?php
	require_once('bootstrap.php');
	require_once('template/header.php');
?>

<form class="inscription" action="effectuer-inscription.php" method="post">
	<label> Pseudo : <input type="text" name="pseudo"/></label>
	<label> Mot de passe : <input type="password" name="pass"/></label>
	<label> Confirmer le mot de passe : <input type="password" name="pass2"/></label>
	<label> Nom : <input type="text" name="nom"/></label>
	<label> Prénom : <input type="text" name="prenom"/></label>
	<label> Adresse e-mail : <input type="text" name="email"/></label>
	<label> Adresse complète (nom de rue et numéro) : <input type="text" name="adresse"/></label>
	<label> Complément d'adresse : <input type="text" name="adresse_2"/></label>
	<label> Ville : <input type="text" name="ville"/></label>
	<label> Code Postal: <input type="text" name="code_postal"/></label>
	<label> Téléphone : <input type="text" name="telephone"/></label>
	<input type="submit" value="Je m'inscris"/>
</form>

<?php

if (!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['pass2']) && !empty($_POST['nom']) 
	&& !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['adresse']) && !empty($_POST['ville']) 
	&& !empty($_POST['code_postal']))
{

	// connexion bdd
	require_once('classes/DbConnexion.php');

	// ajout sécurité
	$pass = mysql_real_escape_string(htmlspecialchars($POST['pass']));
	$pass2 = mysql_real_escape_string(htmlspecialchars($POST['pass2']));

	if ($pass == $pass2)
	{
		$pseudo = mysql_real_escape_string(htmlspecialchars($_POST['pseudo']));
		$email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
		$nom = mysql_real_escape_string(htmlspecialchars($_POST['nom']));
		$prenom = mysql_real_escape_string(htmlspecialchars($_POST['prenom']));
		$adresse = mysql_real_escape_string(htmlspecialchars($_POST['adresse']));
		$adresse_2 = mysql_real_escape_string(htmlspecialchars($_POST['adresse_2']));
		$ville = mysql_real_escape_string(htmlspecialchars($_POST['ville']));
		$code_postal = mysql_escape_string(htmlspecialchars($_POST['code_postal']));
		$telephone = mysql_escape_string(htmlspecialchars($_POST['telephone']));

		//cryptage du mot de passe
		$pass = md5($pass);

		mysql_query("INSERT INTO utilisateurs VALUES('', '$pseudo', '$email', '$pass', '$nom', 'prenom')");
	}

	else
	{
		echo "Les deux mots de passe ne coïncident pas.";
	}
}


	require_once('template/footer.php');
?>