<?php  
class Database {  
    private static $conn = null;  
  
    public static function getConnection() {  
        if (self::$conn === null) {  
            $serverName = "P911124001\\SQLEXPRESS";  
            $connectionOptions = [  
                "Database" => "E-DCL",  
            ];  
            self::$conn = sqlsrv_connect($serverName, $connectionOptions);  
            if (self::$conn === false) {  
                die(print_r(sqlsrv_errors(), true));  
            }  
        }  
        return self::$conn;  
    }  
  
    public static function close() {  
        if (self::$conn) {  
            sqlsrv_close(self::$conn);  
            self::$conn = null;  
        }  
    }  
}  