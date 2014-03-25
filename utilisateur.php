<?php
require_once('bootstrap.php');

$id_utilisateur = @$_GET['id'];

$utilisateurManager = new UtilisateurManager();
$utilisateur = $utilisateurManager->findFirst(array('conditions' => array('id' => $id_utilisateur)));

require_once('template/header.php');
?>

    <div class="col-lg-8 fiche-utilisateur">
        <?php if ($utilisateur) : // Page de profil privée ?>
        <div class="page-header">
            
            <img class="avatar" src="<?php echo $utilisateur->getAvatarURL(48) ?>" alt="Avatar de <?php echo $utilisateur->pseudo ?>" />
            
            <h2>
              <?php echo $utilisateur->pseudo ?>
              <small>(<?php echo $utilisateur->prenom, " ", $utilisateur->nom ?>)</small>
            </h2>
            
        </div>
        <div class="page-content">
            <p><?php echo $utilisateur->email ?></p>
            
            <h3>Historique de vos commandes</h3>
            <ol>
              <?php //foreach () : ?>
              <li></li>
              <?php //endforeach ?>
            </ol>
        </div>
        <?php else : // Utilisateur non trouvé ?>
        <div class="page-header">
            <p>Utilisateur introuvable.</p>
        </div>
        <?php endif ?>
    </div>

<?php
require_once('template/footer.php');
