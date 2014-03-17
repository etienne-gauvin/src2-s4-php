<?php
require_once('bootstrap.php');

$projetManager = new ProjetManager();
$projets = $projetManager->find();


require_once('template/header.php');
?>

    <div class="col-lg-12 project-list">

        <div class="page-header">
            <h2>Tous les projets</h2>
        </div>

        <div class="row">
            <?php
                foreach ($projets as $p) {
                    echo    '<div class="col-lg-4 projet">' .
                                '<div class="thumbnail">' .
                                    '<div class="caption">' .
                                        '<h4>' .
                                            '<a href="projet.php?id=' . $p->id . '">' . $p->nom . '</a>' .
                                        '</h4>' .
                                        '<p class="description">' .
                                            Tools::trimWords($p->description, 18) .
                                        '</p>' .
                                        '<p class="clearfix">' .
                                            '<a href="projet.php?id=' . $p->id . '" class="btn btn-primary" role="button" title="' . $p->nom . '">Voir le projet</a>' .
                                        '</p>' .
                                    '</div>' .
                                '</div>' .
                            '</div>';
                }
            ?>
        </div>
    </div>

<?php
require_once('template/footer.php');