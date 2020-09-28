<?php
namespace vendor;

class Model
{
    protected $pdo;
    protected $table;
    protected $pk = 'id';

    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    public function query($sql)
    {
        return $this->pdo->execute($sql);
    }

    public function countRow()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->count($sql);
    }

    public function findAll($limit)
    {
        $sql = "SELECT * FROM {$this->table} {$limit}";
        return $this->pdo->query($sql);
    }

    public function findOne(int $id, $field = '')
    {
        $field = $field ?: $this->pk;
        $sql = "SELECT * FROM {$this->table} WHERE {$field} = ? LIMIT 1;";
        return $this->pdo->query($sql, [$id]);
    }

    public function findBySql($sql, $params = [])
    {
        return $this->pdo->query($sql, $params);
    }

    public function create($name, $email, $text, $status = 0)
    {
        $sql = "INSERT INTO {$this->table} (name, email, text, status) VALUES ('{$name}', '{$email}', '{$text}', {$status})";
        return $this->pdo->insert($sql);
    }

    public function update(int $id)
    {

    }


}