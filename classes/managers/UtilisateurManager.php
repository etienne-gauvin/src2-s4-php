<?php

/**
 * CLasse utilisateur
 */

class UtilisateurManager extends Manager
{
  protected $entity = 'Utilisateur';
  protected $table = 'utilisateurs';
  
  /**
   * Valider les données fournies lors de l'inscription.
   * @param (array) $donnees La liste des champs du formulaire
   * @return (bool) True si tous les champs sont corrects, false sinon.
   */
  
  public function validerInscription($donnees = array())
  {
    
  }
  
   /**
    * Vérifier l'existence d'un pseudo
    * @param string $pseudo
    * @return bool
    */
  
  public static function pseudoExists($pseudo) {
    return $this->find(array("pseudo" = $pseudo));
  }
}
