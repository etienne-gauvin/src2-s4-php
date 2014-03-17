<?php
	require_once('bootstrap.php');
	require_once('template/header.php');
?>

<form method="post">
	<label> Pseudo : <input type="text" name="pseudo"/></label><br/>
	<label> Mot de passe : <input type="password" name="passe"/></label><br/>
	<label> Confirmer le mot de passe : <input type="password" name="passe2"/></label><br/>
	<label> Adresse e-mail : <input type="text" name="email"/></label><br/>
	<label> Adresse complète (nom de rue et numéro) : <input type="text" name="adresse"/></label><br/>
	<label> Complément d'adresse : <input type="text" name="adresse_2"/></label><br/>
	<label> Ville : <input type="text" name="ville"/></label><br/>
	<label> Code Postal: <input type="text" name="code_postal"/></label><br/>
	<label> Téléphone : <input type="text" name="telephone"/></label><br/>
	<input type="submit" value="Je m'inscris"/>
</form>

<?php
	if (!empty($_POST['pseudo']) && !empty($_POST['passe']) && !empty($_POST['passe2']) 
	&& !empty($_POST['email']) && !empty($_POST['ville']) && !empty($_POST['code_postal']))
	{
		
	}


	require_once('template/footer.php');
?>