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
   * @param (array) $d La liste des champs du formulaire
   * @return (bool) True si tous les champs sont corrects, false sinon.
   */
  
  public function validerInscription($d = array())
  {
    $erreurs = array();
    
    if (!Utilisateur::checkPseudo(@$d['pseudo']))
      $erreurs[] = "Le format de votre pseudo est invalide. Celui-ci ne doit contenir que des lettres, des chiffres ou des tirets.";
    
    if (!Utilisateur::checkMotDePasse(@$d['pass']))
      $erreurs[] = "Le format de votre mot de passe est invalide. Celui-ci doit faire au moins 6 caractères, et contenir des lettres et des chiffres.";
    
    if (@$d['pass'] !== @$d['pass2'])
      $erreurs[] = "Les deux mots de passe ne correspondent pas.";
    
    if (!Utilisateur::checkNom(@$d['nom']))
      $erreurs[] = "Le nom est invalide. Celui-ci doit faire au moins 2 caractères.";
    
    if (!Utilisateur::checkNom(@$d['prenom']))
      $erreurs[] = "Le prénom est invalide. Celui-ci doit faire au moins 2 caractères.";
    
    return $erreurs;
  }
  
   /**
    * Vérifier l'existence d'un pseudo
    * @param string $pseudo
    * @return bool
    */
  
  public function pseudoExists($pseudo) {
    return !empty($this->find(array("conditions" => array("pseudo" => $pseudo))));
  }
}
