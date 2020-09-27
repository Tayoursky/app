<?php
namespace vendor;

class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    public function query($sql)
    {
        return $this->pdo->execute($sql);
    }

    public function findAll($params)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$params}";
        return $this->pdo->query($sql);
    }

    public function findOne(int $id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id=? LIMIT 1;";
        return $this->pdo->query($sql, [$id]);
    }

    public function findBySql($sql, $params = [])
    {
        return $this->pdo->query($sql, $params);
    }

}