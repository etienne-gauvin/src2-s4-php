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
  
}
