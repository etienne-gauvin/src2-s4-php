<?php
class DbConnexion {
    private static $connexion;

    public static $host;
    public static $dbname;
    public static $user;
    public static $pass;
    private static $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    );

    public static function getConnexion() {
        if(!isset(self::$connexion)) {
            try {
                self::$connexion = new PDO(
                    'mysql:host=' . self::$host . ';dbname=' . self::$dbname,
                    self::$user,
                    self::$pass,
                    self::$options);
            } catch(Exception $e) {
                die('Connexion à la base de données impossible.');
            }
        }
        return self::$connexion;
    }
}
