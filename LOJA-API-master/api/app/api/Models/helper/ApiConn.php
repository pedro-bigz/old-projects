<?php

namespace Api\Models\helper;

if (!defined("URL"))
{
    header("Location: /");
    exit();
}

use PDO;

class ApiConn {
    public static $Host = HOST;
    public static $User = USER;
    public static $Pass = PASSWORD;
    public static $Database = DATABASE;
    private static $Connection = null;

    private static function Connect ()
    {
        try
        {
            if(self::$Connection == null):
                self::$Connection = new PDO ("mysql:host=" . self::$Host . ";dbname=" . self::$Database, self::$User, self::$Pass);
            endif;
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
            die;
        }
        
        return self::$Connection;
    }

    public function getConn () 
    {
        return self::Connect ();
    }
}

?>