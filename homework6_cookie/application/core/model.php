<?php

abstract class BDConnect {

    const HOST = 'localhost';
    const USER = 'root';
    const PASS = '';
    const DB   = 'ads';

    private $pdo;

    private function connectionDB()
    {
        $host = self::HOST;
        $user = self::USER;
        $pass = self::PASS;
        $db   = self::DB;

        return $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    }

    private function __clone() {}
    private function __wakeup() {}

    public function getConnect() {
        $this->connectionDB()->query("SET NAMES utf-8");
        return $this->connectionDB();
    }

    abstract public function cityDisplay();
    abstract public function stationDisplay();
    abstract public function categoryDisplay();

}