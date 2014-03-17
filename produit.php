<?php
require_once('bootstrap.php');

$id_produit = isset($_GET['id']) ? $_GET['id'] : null;

$produitManager = new ProduitManager();
$produit = $produitManager->findFirst(array('conditions' => array('id' => $id_produit)));
$produits = $produitManager->find(array('conditions' => array('id_projet' => $produit->id_projet)));

require_once('template/header.php');
?>

    <div class="col-lg-8 fiche-projet">
        <div class="page-header">
            <h2><?php echo $produit->libelle; ?></h2>
        </div>

        <p class="description"><?php echo $produit->description; ?></p>

        <p class="lorem">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse elit ligula, fringilla sed neque sit
            amet, porta tempus nisi. Fusce tristique porta neque, at lobortis lorem pretium at. In egestas sapien a
            mauris viverra tincidunt. Cras tempor non arcu id pulvinar. Integer euismod ipsum eget tellus porta, non
            venenatis leo consectetur. Proin eu nisl et sem semper tristique. In in suscipit ligula, pellentesque
            vulputate purus. Duis non nulla eu ante lacinia rutrum. Etiam sodales quis odio nec tempus.
        </p>

        <h3 class="price">Prix : <?php echo $produit->prix; ?> €</h3>

        <a href="#" class="btn btn-primary" role="button">Ajouter au panier</a>
    </div>

    <div class="col-lg-4 progression">
        <div class="page-header">
            <h2>Produits associés</h2>
        </div>

        <?php
            foreach($produits as $p) {
                if($p->id != $id_produit) {
                    echo    '<div class="thumbnail">' .
                                '<div class="caption">' .
                                    '<h4>' .
                                        '<a href="produit.php?id=' . $p->id . '">' . $p->libelle . '</a>' .
                                    '</h4>' .
                                    '<p class="clearfix">' .
                                        '<a href="produit.php?id=' . $p->id . '" class="btn btn-primary" role="button" title="' . $p->libelle . '">Voir le produit</a>' .
                                    '</p>' .
                                '</div>' .
                            '</div>';
                }
            }
        ?>

    </div>

<?php
require_once('template/footer.php');