<?php
class DB {
    private static $conn;
    public static function getConn()
    {
        if (!self::$conn) {
            $db = new PDO('mysql:host=localhost;dbname=unify_db', 'root', '');
           // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$conn = $db;
        }
        return self::$conn;
    }
}