<?php
require_once('bootstrap.php');

$id_projet = isset($_GET['id']) ? $_GET['id'] : null;

$projetManager = new ProjetManager();
$projet = $projetManager->findFirst(array('conditions' => array('id' => $id_projet)));
$coupons = $projetManager->getCoupons($id_projet);

$produitManager = new ProduitManager();
$produits = $produitManager->find(array('conditions' => array('id_projet' => $projet->id)));

require_once('template/header.php');
?>

    <div class="col-lg-8 fiche-projet">
        <div class="page-header">
            <h2><?php echo $projet->nom; ?></h2>
        </div>

        <p class="description"><?php echo $projet->description; ?></p>

        <p class="lorem">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse elit ligula, fringilla sed neque sit
            amet, porta tempus nisi. Fusce tristique porta neque, at lobortis lorem pretium at. In egestas sapien a
            mauris viverra tincidunt. Cras tempor non arcu id pulvinar. Integer euismod ipsum eget tellus porta, non
            venenatis leo consectetur. Proin eu nisl et sem semper tristique. In in suscipit ligula, pellentesque
            vulputate purus. Duis non nulla eu ante lacinia rutrum. Etiam sodales quis odio nec tempus.
            <br/><br/>
            Nulla blandit id mauris eget vehicula. Suspendisse a bibendum dui. Curabitur vehicula sem vitae ante
            venenatis iaculis. Aliquam porta ante quis est vehicula, ac suscipit sapien interdum. Class aptent taciti
            sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer scelerisque, dui mattis
            convallis blandit, turpis nisl laoreet quam, eget congue ligula nunc quis dui. Cum sociis natoque penatibus
            et magnis dis parturient montes, nascetur ridiculus mus. Aliquam auctor vestibulum elit a fringilla. Nulla
            facilisi. Proin posuere luctus nisi. In lacinia, magna a ultrices viverra, quam sem tempus risus, id
            molestie ipsum neque eu eros. Aliquam erat volutpat. Vestibulum vulputate quam ut congue feugiat.
            Phasellus vitae fringilla ligula. Vivamus bibendum purus ut odio imperdiet, sit amet volutpat erat eleifend.
        </p>

        <div class="coupons">
            <h3>Financez ce projet grâce aux coupons</h3>
            <?php
                foreach($coupons as $c) {
                    echo "<a href=\"#\" class=\"coupon\">$c->libelle</a>";
                }
            ?>
        </div>

        <div class="produits">
            <h3>Produits associés au projets</h3>
            <?php
                foreach($produits as $p) {
                    echo "<a href=\"produit.php?id=$p->id\" class=\"produit\">$p->libelle</a>";
                }
            ?>
        </div>


    </div>

    <div class="col-lg-4 progression">
        <div class="page-header">
            <h2>Progression du projet</h2>
        </div>
        <h4>Objectif : <?php echo $projet->objectif; ?> €</h4>
    </div>

<?php
require_once('template/footer.php');