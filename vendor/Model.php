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

    private function query($sql, $params)
    {
        return $this->pdo->query($sql, $params);
    }

    private function insert($sql, $params)
    {
        return $this->pdo->insert($sql, $params);
    }

    public function countRow()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->count($sql);
    }

    public function findAllLimit($sort, $desc, $start, $onPage)
    {
        $str = "SELECT * FROM %s ORDER BY %s %s LIMIT %d, %d ;";
        $sql = sprintf($str, $this->table, $sort, $desc, $start, $onPage);
        return $this->query($sql, $params =[]);
    }

    public function findOne($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = ? LIMIT 1;";
        return $this->query($sql, [$id]);
    }

    public function create($name, $email, $text, $status)
    {
        $sql = "INSERT INTO {$this->table} (name, email, text, status) VALUES (?, ?, ?, ?)";
        return $this->insert($sql, [$name, $email, $text, $status]);
    }

    public function update($name, $email, $text, $status, $id)
    {
        $sql = "UPDATE {$this->table} SET name = :name, email = :email, text = :textarea, status = :status WHERE id = :id;";
        return $this->insert($sql, ['name' => $name, 'email' => $email, 'textarea' => $text, 'status' => $status, 'id' => $id]);

    }


}