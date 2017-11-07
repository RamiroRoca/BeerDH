<?php

class DBFactory {

    public static $db_type; //MySQLDB, JSONDB, MONGODB

    public static function getDB()
    {
        return new self::$db_type;
    }

}