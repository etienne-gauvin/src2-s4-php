<?php
 
/**
 * Classe utilisateur
 */

class Utilisateur extends Entity
{
  protected $pseudo, $nom, $prenom, $email, $urlAvatar;
  
  /**
   * Retourne l'URL de l'avatar de l'utilisateur.
   * @param int $size La taille de l'avatar.
   * @return string
   */
   
   public function getAvatarURL($size = 48)
   {
      return "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) . "?s=" . $size;
   }
}
