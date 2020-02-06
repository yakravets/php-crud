<?php
class Database
{
    private static $dbName = 'crud_tutorial' ;
    private static $dbHost = '192.168.137.2' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '12345678';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new mysqli(self::$dbHost, self::$dbUsername, self::$dbUserPassword, self::$dbName, 3306);
          if (self::$cont->connect_errno) {
            echo "Failed to connect to MySQL: (" . self::$cont->connect_errno . ") " . self::$cont->connect_error;
           }
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
      //self::$cont->close();
      self::$cont = null;
    }
}
?>