<?php

namespace App;


abstract class Model
{
    const TABLE = '';

    public $id;

    // Возвращаем все значения из таблицы

    public static function findAll()
    {
        $db = Db::instance();

        return $db->query(
            "SELECT * from " . static::TABLE,
            static::class
        );
    }

    // Находим значение по "ID" и возвращаем его

    public static function findById($id)
    {
        $db = Db::instance();

        $res = $db->query(
            "SELECT * from " . static::TABLE . " WHERE id = :id",
            static::class,
            [':id' => $id]
        );

        if (!empty($res)) {
            return array_shift($res);
        }

        return false;
    }

    // Вставка записи в таблицу

    public function insert()
    {
        if (!$this->isNew()) {
            return;
        }

        $columns = [];
        $values = [];

        foreach ($this as $key => $val) {
            if ('id' == $key) {
                continue;
            }

            $columns[] = $key;
            $values[':' . $key] = $val;
        }

        $sql = 'INSERT INTO ' . static::TABLE .
            '(' . implode(',', $columns) . ') 
            VALUES (' . implode(',', array_keys($values)) . ')';


        $db = Db::instance();

        $db->execute($sql, $values);
    }

    public function isNew()
    {
        return empty($this->id);
    }

}