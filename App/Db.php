<?php

namespace App;

use PDO;


class Db
{
    // Делаем класс - Синглтоном

    use Singleton;

    // Указатель на объект PDO

    protected $pdo;

    // Конструктор

    protected function __construct()
    {
        $config = require_once __DIR__ . '/../config/database.php';

        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']};";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $this->pdo = new PDO($dsn, $config['user'], $config['password'], $options);
    }

    // Выполнение запросов к БД без выборки

    public function execute($sql, array $params = [])
    {
        $sth = $this->pdo->prepare($sql);

        return $sth->execute($params);
    }


    // Выполнение запросов к БД с возвращением выборки

    public function query($sql, $classType, array $params = [])
    {
        $sth = $this->pdo->prepare($sql);

        if (false !== $sth->execute($params)) {
            return $sth->fetchAll(PDO::FETCH_CLASS, $classType);
        }

        return [];
    }
}