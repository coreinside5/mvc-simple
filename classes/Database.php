<?php
class Database
{

    public static $host = "mysql";
    public static $dbName = "SMVC";
    public static $port = "3306";
    public static $username = "root";
    public static $password = "root";

    private static function connect()
    {
        try {
            // We create a new instance of the class PDO
            $db = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";port=".self::$port.";charset=utf8", self::$username, self::$password);

            //We want any issues to throw an exception with details, instead of a silence or a simple warning
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            // We intantiate an Exception object in $e so we can use methods within this object to display errors nicely
            echo $e->getMessage();
            exit;
        }
        return $db;
        echo "<script>console.log('Connection to database successfully made.' );</script>";
    }
    public static function query($query, $params = array()){
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        if (explode (' ', $query)[0] == 'SELECT'){
            $data = $statement->fetchAll();
            return $data;
        }
    }
}
