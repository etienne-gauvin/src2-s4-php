<?php
require_once('bootstrap.php');

$id_utilisateur = @$_GET['id'];

$utilisateurManager = new UtilisateurManager();
$utilisateur = $utilisateurManager->findFirst(array('conditions' => array('id' => $id_utilisateur)));

require_once('template/header.php');
?>

    <div class="col-lg-8 fiche-utilisateur">
        <?php if ($utilisateur) : ?>
        <div class="page-header">
            <h2>
              <?php echo $utilisateur->pseudo ?>
              <small>(<?php echo $utilisateur->prenom, " ", $utilisateur->nom ?>)</small>
            </h2>
        </div>
        <?php else : ?>
        <div class="page-header">
            <p>Utilisateur introuvable.</p>
        </div>
        <?php endif ?>
    </div>

<?php
require_once('template/footer.php');