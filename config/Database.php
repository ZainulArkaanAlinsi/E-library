<?php

class Database{
    private static$host = 'localhost';
    private static$db_name = 'peminjaman_buku';
    private static$user = 'root';
    private static$password = '';
    public static $conn;

    public static function connect(): PDO {
        if (self::$conn == null){
            try{
                self::$conn = new PDO('mysql:host=' 
                    .self::$host . ';dbname=' 
                    .self::$db_name,
                    self::$user,
                    self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error reporting mode
                // echo "Connection Estabilished";
            } catch (PDOException $e) {
                echo 'Connection Error: ' . $e->getMessage();
            }
        }
        return self::$conn;
    }

}
?>