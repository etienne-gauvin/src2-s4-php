<?php
class ProjetManager extends Manager {

    protected $entity = 'Projet';
    protected $table = 'projets';

    public function getCoupons($id_projet) {
        $sql =  "SELECT c.* FROM coupons as c INNER JOIN coupons_projets ON id_coupon = c.id AND id_projet = $id_projet";
        return $this->query($sql);
    }
}