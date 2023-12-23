<?php

session_start();
class DATABASE {
  private static $HOST = "127.0.0.1";
  private static $username = "root";
  private static $password = "";
  private static $database = "quizz";
  private static $connection;

  public static function getconnection() {
      if (!isset(self::$connection)) {
          try {
              self::$connection = new PDO("mysql:host=" . self::$HOST . ";dbname=" . self::$database, self::$username, self::$password);
              self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          } catch(PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
          }
      }
      return self::$connection;
  }
}

?>