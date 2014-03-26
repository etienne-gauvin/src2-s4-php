<?php
 
/**
 * Classe utilisateur
 */

class Utilisateur extends Entity
{
  protected $pseudo, $nom, $prenom, $email, $urlAvatar;
  
  // Regex pour le pseudonyme
  const REGEX_PSEUDO = "#^[a-z0-9-_]{3,44}$#i";
  
  /**
   * Retourne l'URL de l'avatar de l'utilisateur.
   * @param int $size La taille de l'avatar.
   * @return string
   */
   
  public function getAvatarURL($size = 48)
  {
    return "http://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?s=" . $size;
  }
   
   /**
    * Vérifier la validité d'un pseudo
    * @param string $pseudo
    * @return bool
    */
  
  public static function checkPseudo($pseudo) {
    return
      !empty($pseudo) and
      is_string($pseudo) and
      preg_match(self::REGEX_PSEUDO, $pseudo) === 1;
  }
   
   /**
    * Vérifier la validité d'un mot de passe
    * @param string $motDePasse
    * @return bool
    */
  
  public static function checkMotDePasse($motDePasse) {
    return
      !empty($motDePasse) and
      is_string($motDePasse) and
      length($motDePasse) >= 6 and
      preg_match("#[a-z]#i", $pseudo) > 0 and
      preg_match("#[0-9]#", $pseudo) > 0;
  }
   
   /**
    * Vérifier la validité d'un nom ou d'un prénom
    * @param string $nom
    * @return bool
    */
  
  public static function checkNom($nom) {
    return
      !empty($nom) and
      is_string($nom) and
      length($nom) >= 2;
  }
}
