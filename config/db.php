<?php

//класс конфигурации базы данных

class DB {
    const USER = 'root';
    const PASS = 'root';
    const HOST = 'db';
    const DB = 'avito';

    public static function db_connect() {

        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;

        try {
            $connect = new PDO("mysql:host=$host;dbname=$db;charset=UTF8", $user, $pass);
        } catch (PDOException $exception) {
            echo "Ошибка подключения к базе данных: " . $exception->getMessage();
        }
        return $connect;
    }
}