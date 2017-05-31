<?php
abstract class Inmobiliaria {
  private static $server = 'mysql.hostinger.es';
  private static $db = 'u664511945_inmob';
  private static $user = 'u664511945_jr';
  private static $password = 'juniorcastillo1997';

  public static function conectar() {
    try {
      $connection = new PDO("mysql:host=".self::$server.";dbname=".self::$db.";charset=utf8", self::$user, self::$password);
    } catch (PDOException $e) {
      echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
      die ("Error: " . $e->getMessage());
    }
 
    return $connection;
  }
}